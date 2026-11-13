from flask import Flask, render_template, request, redirect, url_for
from flask_mysqldb import MySQL

app = Flask(__name__)
app.config["TEMPLATES_AUTO_RELOAD"] = True

# Configuracion de conexion a la base de datos
app.config['MYSQL_HOST'] = 'localhost'
app.config['MYSQL_USER'] = 'root'
app.config['MYSQL_PASSWORD'] = ''
app.config['MYSQL_DB'] = 'uniautos'

mysql = MySQL(app)



@app.route("/")
def home():
    return render_template("inicio.html")



@app.route("/registro", methods=["GET", "POST"])
def registro():
    cursor = mysql.connection.cursor()

    if request.method == "POST":
        id_auto = request.form.get("id")
        nombre  = request.form.get("nombre")
        modelo  = request.form.get("modelo")
        color   = request.form.get("color")
        ano     = request.form.get("ano")

        if id_auto and id_auto.strip():
            cursor.execute(
                "INSERT INTO autos (id, nombre, modelo, color, ano) VALUES (%s, %s, %s, %s, %s)",
                (id_auto, nombre, modelo, color, ano)
            )
        else:
            cursor.execute(
                "INSERT INTO autos (nombre, modelo, color, ano) VALUES (%s, %s, %s, %s)",
                (nombre, modelo, color, ano)
            )

        mysql.connection.commit()
        cursor.close()
       
        return redirect(url_for("registro"))


    cursor.execute("SELECT * FROM autos")
    autos = cursor.fetchall()
    cursor.close()

    return render_template("registro.html", autos=autos)


# 3. PAGINA PARA EDITAR AUTO
@app.route("/editar/<id>", methods=["GET", "POST"])
def editar(id):
    cursor = mysql.connection.cursor()

    if request.method == "POST":
        nombre = request.form.get("nombre")
        modelo = request.form.get("modelo")
        color  = request.form.get("color")
        ano    = request.form.get("ano")

        cursor.execute(
            "UPDATE autos SET nombre = %s, modelo = %s, color = %s, ano = %s WHERE id = %s",
            (nombre, modelo, color, ano, id)
        )
        mysql.connection.commit()
        cursor.close()
        return redirect(url_for("registro"))

    cursor.execute("SELECT * FROM autos WHERE id = %s", (id,))
    auto = cursor.fetchone()
    cursor.close()

    if not auto:
        return redirect(url_for("registro"))

    return render_template("editar.html", auto=auto)


# 4. PAGINA PARA CONFIRMAR Y ELIMINAR AUTO
@app.route("/eliminar/<id>", methods=["GET", "POST"])
def eliminar(id):
    cursor = mysql.connection.cursor()

    if request.method == "POST":
        cursor.execute("DELETE FROM autos WHERE id = %s", (id,))
        mysql.connection.commit()
        cursor.close()
        return redirect(url_for("registro"))

    cursor.execute("SELECT * FROM autos WHERE id = %s", (id,))
    auto = cursor.fetchone()
    cursor.close()

    if not auto:
        return redirect(url_for("registro"))

    return render_template("eliminar.html", auto=auto)


if __name__ == '__main__':
    app.run(port=5000, debug=True)
