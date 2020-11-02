<?php
include 'view/loginView.php';
include_once 'model/UserModel.php';
include_once 'controller/UserSessions.php';

if (isset($_POST['usuario']) && isset($_POST['passwd'])){

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
	}

}
?>