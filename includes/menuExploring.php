<?php require("configs/config.php");?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>LightCode</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<div class="menu">
		<div class="logo">LightCode</div>
		<div class="categories">
			<ul class="list">
				<li class="select">Home</li>
				<li class="select">CodeStories</li>
				<li class="select">CodeComics</li>
				<li class="select">ShareCodeSnipets</li>				
			</ul>
		</div>
		<div class="login">
			<a href="<?php echo SERVERURL; ?>Registro/">Register</a>
			<a href="<?php echo SERVERURL; ?>Login/">Login</a>
		</div>
	</div>
