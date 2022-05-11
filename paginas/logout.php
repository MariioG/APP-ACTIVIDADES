<?php
//iniciamos la sesion y luego la destruimos y los mandamos al index.php
session_start();
    session_destroy();

    
header ("Location: ../index.php");