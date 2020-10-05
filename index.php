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

}else if (isset($_POST['usuario']) && isset($_POST['passwd'])){

	// SI NO HAY SESIÓN INICIADA SE ENVIARÁN LAS CREDENCIALES
	$userForm = $_POST['usuario'];
	$passForm = $_POST['passwd'];

	// COMPROBAMOS QUE EXISTE EL USUARIO Y ACCEDEMOS A LA SESIÓN DEL USUARIO
	if($userInst->userExists($userForm, $passForm)){
		$sessionInst->setCurrentUser($userForm);
		$userInst->setUser($userForm);
		
		header('location: view/myroom.php');
		
	}else{

		// SI LAS CREDENCIALES SON INCORRECTAS
		$errorLogin = "Nombre de usuario y/o password es incorrecto";

		include_once 'view/exploring.php';
	}

}else{

	// SINO SOLO MOSTRAR LA PÁGINA PRINCIPAL
	
	include_once 'view/exploring.php';

}
?>
