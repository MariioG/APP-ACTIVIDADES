<?php
//Llamamos a la base de dstos para ver si el usuario ya existe o no y depende hacemos una cosa o otra
if (isset($_POST['Inicio'])) {
    if (isset($_POST['correo']) && isset($_POST['pwd']) ) {
        $email = $_POST['correo'];
        $contra = $_POST['pwd'];
        $sql="Select * from tbl_usuario where correo_usuario = '{$email}' and contra_usuario = '{$contra}';" ;
        $conexion = mysqli_connect('localhost', 'root', '', 'bd_projecto');
        $result = mysqli_query($conexion, $sql);
        $num = mysqli_num_rows($result);
        if($num==1){
            session_start();
            $_SESSION['correo']= $email;
            header('Location: ../view/actividades.php');
        }
    }
}
?>  
