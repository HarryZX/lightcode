<?php
include_once 'model/UserModel.php';
include_once 'controller/UserSessions.php';

// INSTANCIAMOS AL USUARIO
$sessionInst = new UserSessions();
$userInst = new UserModel();

// COMPROBAMOS QUE HAY UNA SESIÓN
if (isset($_SESSION['user'])) {
	
	// SI ESTÁ INICIADA MOSTRAR DATOS DEL USUARIO Y SU SESIÓN
	$userInst->setUser($sessionInst->getCurrentUser());

	header('location: view/myroom.php');

}else{

	// SINO SOLO MOSTRAR LA PÁGINA PRINCIPAL
	
	include_once 'view/exploring.php';

}
?>
