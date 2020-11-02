<?php
include_once '../model/UserModel.php';

// ACCEDEMOS A LA FUNCIÓN PARA INSERTAR PRODUCTOS DE LA CLASE USER
$usuarioInst = new UserModel();

// COMPROBAMOS QUE VIENEN LOS DATOS CORRECTOS POR EL MÉTODO POST
if ($_POST) {
	# DEFINIMOS EL ÁREA PARA SUBIR LAS IMÁGENES DEL USUARIO
	$dirFile = "userImages/";

	# RECIBIMOS EL ARCHIVO A SUBIR Y ALMACENAMOS LA RUTA DE ESE ARCHIVO
	$file = $dirFile . basename($_FILES["image"]["name"]);

	# OBTENEMOS EL TIPO DEL ARCHIVO
	$typeFile = strtolower(pathinfo($file,PATHINFO_EXTENSION));

	# VALIDAMOS QUE SEA UNA IMÁGEN
	$isImage = getimagesize($_FILES["image"]["tmp_name"]);

	// HACEMOS UNA VALIDACIÓN PARA GUARDAR ARCHIVOS DE UN PESO ESPECÍFICO
	if ($isImage != false) {
		# VALIDAMOS EL TAMAÑO DEL ARCHIVO
		$size = $_FILES["image"]["size"];
		if ($size > 500000) {
			echo "El archivo tiene que ser menor a 500kb";
		}else{
			# VALIDAMOS EL TIPO DE IMAGEN
			if ($typeFile == "jpg" || $typeFile == "jpeg" || $typeFile == "png") {
				// SE VALIDÓ EL ARCHIVO CORRECTAMENTE
				if (move_uploaded_file($_FILES["image"]["tmp_name"], $file)) {
					# RECIBIMOS TODOS LOS DATOS DEL USUARIO
					$uName = $_POST['usuario'];
					$uPass = $_POST['passwd'];
					$uPhone = $_POST['phone'];
					$uEmail = $_POST['email'];
					$uBirth = $_POST['datebirth'];
					$uPhoto = $file;
					$uRol = $_POST['rol'];

					# INSERTAMOS LOS DATOS OBTENIDOS
					$usuarioInst->registerUser($uName,$uPass,$uPhone,$uEmail,$uBirth,$uPhoto,$uRol);
					echo "¡Te has registrado con éxito!";
				}
			}else{
				echo "Solo se admiten archivos jpg/jpeg o png";
			}
		}
	}else{
		echo "El archivo no es una imagen";
	}
}else{
	echo "No se han recibido datos";
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>¡Registro exitoso!</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<h1>¡REGISTRADO CON ÉXITO!</h1>
	<a href="myroom.php">Ir a mi espacio personal</a>
</body>
</html>