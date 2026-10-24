#importamos la libreria 
from flask import Flask, render_template, redirect, request

app = Flask(__name__)
app.config["TEMPLATES_AUTO_RELOAD"] = True

from flask_mysqldb import MySQL

#importamos librerias para generar un hash y comprobar que el hash coincida con la contraseña
from werkzeug.security import generate_password_hash, check_password_hash

#configuracion de la conexion 
app.config['MYSQL_HOST'] = 'localhost'
app.config['MYSQL_USER'] = 'root'
app.config['MYSQL_PASSWORD'] = ''
app.config['MYSQL_DB'] = 'dbFlask'
app.secret_key = 'mysecretkey'



@app.route("/")
def home():
    return render_template("login.html")


@app.route("/registro", methods=["GET", "POST"])
def registro():
    if request.method == "POST":
        nombre = request.form["nombre"]
        apellido_p = request.form["apellido_p"]
        apellido_m = request.form["apellido_m"]
        correo = request.form["correo"]
        password = request.form["password"]
        
        #generamos un hash a partir de la contraseña
        password_hash = generate_password_hash(password)
        
        # TODO: Guardar en base de datos
        return redirect("/")

    return render_template("registro.html")


if __name__ == "__main__":
    app.run(port=5000, debug=True)
