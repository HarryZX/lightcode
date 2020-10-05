<?php
include 'ConnectionDB.php';

/**
 * CLASE PARA CONTROLAR EL ACCESO DEL USUARIO
 */
class UserModel extends ConnectionDB{

	private $userName;
	private $userEMail;
	private $userPassword;
	private $rolUser;

	public function userExists($uName, $uPasswd)
	{
		$encriptPasswd = md5($uPasswd);
		
		// REALIZAMOS LA CONSULTA
		$queryUser = $this->connect()->prepare('SELECT * FROM USERS WHERE USER_NAME = :user AND USER_PASSWORD = :pass');
		$queryUser->execute(['user' => $uName, 'pass' => $encriptPasswd]);

		// BUSCAMOS LA FILA EN LA QUE APARECE EL USUARIO
		$search = $queryUser->rowCount();

		// VALIDAMOS SI SE ENCUENTRA
		if($search){
			return true;
		}else{
			return false;
		}

		/*
		$row = $query->columnCount();
		if($row){
			//validar rol
			$rol = $row;
			$this->$rolUser = $rol;
		}else{
			echo 'el usuario o contraseña son incorrectos';
		}*/
	}

	/*public function getRolUsr(){
		return $this->rolUser;
	}*/
	
	public function setUser($user){
		$queryUser = $this->connect()->prepare('SELECT * FROM USERS WHERE USER_NAME = :user');
		$queryUser->execute(['user' => $user]);
		
		foreach($queryUser as $currentUser){
			$this->userName = $currentUser['USER_NAME'];
		}
	}
	
	public function getUserName(){
		return $this->userName;
	}
}
?>
