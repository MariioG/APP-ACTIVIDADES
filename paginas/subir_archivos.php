<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
 //recogemos los datos del formulario de colgar las actividades y lo enviamos a la base de datos con sus respectivos nombres
   session_start();
   $titulo = $_POST['titulo'];
   $desc = $_POST['descripcion'];
   $foto = $_FILES['foto'];
   $usuario = $_SESSION['nombre_usu'];

   
   $connection = mysqli_connect('localhost', 'root', '', 'bd_projecto');
   $sql1 = "SELECT id_usuario FROM tbl_usuario WHERE nombre_usuario = '$usuario';"; 
   $buscar = mysqli_query($connection, $sql1);
   $row = mysqli_fetch_array($buscar);

   $usuario_fk = $row[0];

   $opcion = $_POST['opcion'];
   $topic = $_POST['topic'];

   

   $path = "/www/Projecto/APP-ACTIVIDADES/img";
   $destino = $_SERVER['DOCUMENT_ROOT'].$path."/".$foto['name'];

   if(($foto['size']<1000*1024) && ($foto['type']=="image/jpeg" || $foto['type']=="image/png" || $foto['type']=="image/gif")) {
       $exito = move_uploaded_file($foto['tmp_name'], $destino);
       if ($exito) {
           // HACEMOS LA CONEXION CON LA BASE DE DATOS Y SUBIMOS LOS DATOS A LA TABLA CORRESPONDIENTE: (tbl_actividad)
           $destino = $foto['name'];
           $connection = mysqli_connect('localhost', 'root', '', 'bd_projecto');
           $sql = "INSERT INTO tbl_actividad (nombre_actividad, desc_actividad, foto_actividad, opcion_actividad, topic_actividad, usuario_fk) VALUES ('$titulo','$desc','$destino','$publico_privado','$topic',$usuario_fk);";
           $insert= mysqli_query($connection, $sql);
           ?>
           <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
               <script>
                   function aviso(url) {
                       Swal.fire({
                               title: 'Post subido correctamente!',
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
               aviso('../view/actividades.php');
           </script>
       <?php
       }
   } else {
       ?>
       <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
           <script>
               function aviso(url) {
                   Swal.fire({
                           title: 'El archivo es demasiado grande o no tiene el formato adecuado',
                           icon: 'error',
                           confirmButtonColor: '#3085d6',
                           confirmButtonText: 'Volver'
                       })
                       .then((result) => {
                           if (result.isConfirmed) {
                               window.location.href = url;
                           }
                       })
               }
               aviso('../paginas/colgar_actividad.html');
           </script>
       <?php
   }
   ?>