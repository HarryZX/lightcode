<?php
// INCLUIMOS EL CONTROLADOR PARA LAS SESIONES
include_once 'UserSessions.php';

// ELIMINAMOS LA SESIÓN
$session = new UserSessions();
$session->closeSession();

// REDIRIGIMOS AL USUARIO A UNA PÁGINA DE INICIO
header("location: ../index.php");
?>