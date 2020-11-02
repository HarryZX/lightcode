<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Registrar</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<div class="logo">LightCode</div>

	<div class="title">Register</div>

	<form action="view/exitoRegistro.php" method="POST" enctype="multipart/form-data">
		<label for="user">User Name</label>
		<input type="text" name="usuario" id="user" placeholder="Dada">
		<br>
		<label for="passOne">Introduce the password</label>
		<input type="password" name="passwd" id="passOne">
		<br>
		<label for="passTwo">Introduce password again</label>
		<input type="password" id="passTwo">
		<br>
		<label for="phon">Phone</label>
		<input type="text" name="phone" id="phon">
		<br>
		<label for="eml">Email</label>
		<input type="text" name="email" id="eml">
		<br>
		<label for="dt">Date of birth</label>
		<input type="date" name="datebirth" id="dt">
		<br>
		<label for="imge">User Image</label>
		<br>
		<input type="file" name="image" id="imge">
		<br>
		<input type="hidden" name="rol" value="3">
		<br>
		<input type="submit" value="Registrar">
	</form>
</body>
</html>