#importamos libreria de flask
from flask import Flask, redirect, render_template, request, url_for, session

#Importar la libreria de MYSQL para flask
from flask_mysqldb import MySQL

#Importar librerias para generar un hash y para 
# comprobar que el hash coincida con la contraseña
from werkzeug.security import generate_password_hash, check_password_hash

app = Flask(__name__)
app.config["TEMPLATES_AUTO_RELOAD"] = True

#configuracion de la conexion
app.config['MYSQL_HOST'] = 'localhost'
app.config['MYSQL_USER'] = 'root'
app.config['MYSQL_PASSWORD'] = ''
app.config['MYSQL_DB'] = 'flaskdb'
app.secret_key = 'mysecretkey'

mysql = MySQL(app)


@app.route("/")
def home():
    return render_template("login.html")

@app.route("/login")
def login():
    return render_template("login.html")


@app.route("/registro", methods=("GET", "POST"))
def registro():
    if request.method == "POST":
        nombre = request.form["nombre"]
        apellido_p = request.form["apellido_p"]
        apellido_m = request.form["apellido_m"]
        correo = request.form["correo"]
        # Contraseña escrita por el usuario
        password_plano = request.form.get("password_hash") or request.form.get("password")
        id_rol = request.form.get("id_rol", 1)

        # Generamos el hash a partir de la contraseña plana
        hash_seguro = generate_password_hash(password_plano)
        
        print("\n--- NUEVO REGISTRO ---")
        print(f"Correo: {correo}")
        print(f"Contraseña original: {password_plano}")
        print(f"Hash generado: {hash_seguro}")
        print("-----------------------\n")

        cursor = mysql.connection.cursor()

        # Comprobar si el correo ya existe
        cursor.execute(
            "SELECT id FROM usuarios WHERE correo = %s",
            (correo,)
        )

        if cursor.fetchone():
            print("El correo ya existe en la base de datos.")
            cursor.close()
            return render_template("registro.html")

        # Guardar el usuario con su contraseña encriptada (hash_seguro)
        cursor.execute(
            """INSERT INTO usuarios
            (nombre, apellido_p, apellido_m, correo, password_hash, id_rol)
            VALUES (%s, %s, %s, %s, %s, %s)
            """, (
                nombre,
                apellido_p,
                apellido_m,
                correo,
                hash_seguro,
                id_rol
            )
        )
        mysql.connection.commit()
        cursor.close()
        print("Usuario registrado con éxito en la base de datos.")

        return redirect(url_for("home"))

    return render_template("registro.html")

#ruta de login
@app.route("/login", method= ["GET", "POST"])
def login():
    

    if request.method == "POST":
        correo = request.form["correo"]
        password = request.form ["password_hash"]
        
        cursor = mysql.connection.cursor()
        
        sql = """
        SELECT
            usuarios.id,
            usuarios.nombre,
            usuarios.apellído_p,
            usuarios.apellido_m,
            usuarios.correo,
            usuarios.password,
            roles.nombre
            FROM usuarios
            INNER JOIN roles
            ON usuarios.id_rol = roles.id_rol
            WHERE usuarios.correo = %s



            """
      
      
      
        cursor.execute(sql,(correo,))
        
        usuario = cursor.fetchone()
        
        cursor.close()
        if usuario and check_password_hash(usuario[5], password):
            
            session["id_usuario"] = usuario[0]
            
            session["nombre"] = usuario[1]
            
            session["rol"]=usuario[6]
            
            if session["rol"] == "Administrador":
                return redirect(url_for("admin"))
            
            return redirect(url_for("usuario"))
        return render_template("login.html", error = "Correo o contraseña incorrectos")
    return render_template




if __name__ == '__main__':
    app.run(port=5000, debug=True)

    app.run(port=5000, debug=True)