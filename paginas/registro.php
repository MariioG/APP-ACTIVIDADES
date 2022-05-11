<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Formulario Login</title>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/login.css">
</head>

<body>
<!--Formulario para registrate en la pagina y te lleve a donde diga-->
    <a href="./login.html"> <button class="btn btn-light form-control ms-1" type="button">Iniciar sesion</button></a>
    <form action="./crear_usuarios.php" method='POST'>
        <section class="form-login">
            <h5>REGISTRSE</h5>
            <input class="controls" type="text" name="nombre_usuario" value="" placeholder="Nombre completo" required>
            <input class="controls" type="correo" name="correo_usuario" value="" placeholder="Correo" required>
            <input class="controls" type="password" name="contra_usuario" value="" placeholder="Contraseña" required>
            

            <input class="buttons" type="submit" name="login" value="Registrate">
        </section>
    </form>