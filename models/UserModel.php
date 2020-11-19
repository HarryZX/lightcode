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
		$queryUser = $this->connect()->prepare('SELECT * FROM usuarios WHERE nombre = :user AND credencial = :pass');
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

	public function registerUser($name,$pass,$phone,$email,$birth,$imge,$rolUsr){
		// ENCRIPTAMOS LA CONTRASEÑA ANTES DE GUARDARLA
		$encPass = md5($pass);
		// INSERTAMOS LOS DATOS DEL USUARIO A REGISTRAR
		$queryInsert = $this->connect()->prepare("INSERT INTO usuarios 
															(nombre, credencial, telefono, 
															 correo, fechaNacimiento, imagen, idRol) 
														VALUES (:uName, :uPass, :uPhone, 
																:uMail, :uBirth, :uImge, :uIdRol)
												");

		$queryInsert->execute(['uName' => $name, 'uPass' => $encPass, 
								'uPhone' => $phone, 'uMail' => $email, 
								'uBirth' => $birth, 'uImge' => $imge, 
								'uIdRol' => $rolUsr
							]);

		// COMPROBAMOS QUE LOS DATOS SE HAN REGISTRADO Y DEVOLVEMOS UNA RESPUESTA AL USUARIO
		echo $queryInsert ? "Registrado" : "Error al registrar";

		// LIMPIAMOS LA MEMORIA
		$queryInsert->closeCursor();
	}
	
	public function setUser($user){
		$queryUser = $this->connect()->prepare('SELECT * FROM usuarios WHERE nombre = :user');
		$queryUser->execute(['user' => $user]);
		
		foreach($queryUser as $currentUser){
			$this->userName = $currentUser['nombre'];
		}
	}
	
	public function getUserName(){
		return $this->userName;
	}
}
?>
