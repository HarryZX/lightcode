<?php require("configs/config.php");?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
	<div class="logo">LightCode</div>
	<div class="title">Login</div>
	<form action="" method="POST">
		<label for="user">User</label>
		<input type="text" name="usuario" id="user" placeholder="Dada">
		<br>
		<label for="pass">Password</label>
		<input type="password" name="passwd" id="pass">
		<br>
		<br>
		<input type="submit" value="Login">
	</form>
	<a href="<?php echo SERVERURL; ?>">Volver</a>
</body>
</html>