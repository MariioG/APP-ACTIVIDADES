<?php
//Recogemos los datos del formulario y los insertamos directamente en la base de datos para que despues salga un mensaje depende d
//del usuario que hayamos puesto
include 'conexion.php';

$nombre = $_POST['nombre_usuario'];
$correo = $_POST['correo_usuario'];
$contra = $_POST['contra_usuario'];

   

if (empty($nombre) or empty($correo) or empty($contra)) {
    header('Location: ../paginas/registro.php?registro=vacio');
} else {
    $connection = mysqli_connect('localhost', 'root', '', 'bd_projecto');

    $correo_encontrado = false;

    $cons = "SELECT correo_usuario FROM tbl_usuario;";
    $comprobar = mysqli_query($connection,$cons);

    foreach ($comprobar as $key => $tabla) {
        foreach ($tabla as $atributo => $email) {
            if ($correo == $email){
                $correo_encontrado = true;
                }
            }
        }
        if (!$correo_encontrado){
            $sql = "INSERT INTO `tbl_usuario` (`nombre_usuario`,`correo_usuario`, `contra_usuario`) VALUES ('$nombre','$correo','$contra')";
            $insert = mysqli_query($connection, $sql);
            header('Location: ../view/actividades.php');
            $num = mysqli_num_rows($result);
        if($num==1){
            session_start();
            $_SESSION['correo_usuario']= $correo;


        }
            ?>
            
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
         <script>
        function aviso(url) {
            Swal.fire({
                    title: 'Proceso terminado',
                    icon: 'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Volver'
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = url;
                    }
                })
        }

        aviso('../index.php');
    </script>
                <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <?php
        } else {
        
            ?>
                <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                    <script>
                        function aviso(url) {
                            Swal.fire({
                                    title: 'Ya existe una cuenta con este correo!',
                                    icon: 'warning ',
                                    confirmButtonColor: '#3085d6',
                                    confirmButtonText: 'Volver'
                                })
                                .then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = url;
                                    }
                                })
                        }

                        aviso('../paginas/registro.html');
                    </script>
                    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

            <?php                       
        }
    }
