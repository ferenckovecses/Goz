<!DOCTYPE html>
<html lang="hu">
	<head>
		<meta charset="UTF-8">
		<title>Gőz - Gamer Áruház</title>
		<link href="res/reset.css" rel="stylesheet" type="text/css">
		<link href="res/style.css" rel="stylesheet" type="text/css">
	</head>
	<body>



		<header>
			<div class = "header" id="header">
				<center>
					<a href="">
					<img border="0" alt="logo" src="media/logo.png" width="50" height="50" border="0"></a>
				</center>
			</div>
			<div class="himgcont">
					<img class="headerImage" src="media/header.png" alt="">
			</div>

			<nav>
				<ul class="centerBox">
					<?php
					if(isset($_SESSION['loggedin']))
					{
						echo'
						<li><a href="index.php?page=logout">Kijelentkezés</a></li>
						';
					}

					else
					{
						echo'
						<li><a href="index.php">Bejelentkezés</a></li>
						<li><a href="index.php?page=registration">Regisztráció</a></li>
						';
					}
					
					?>
				</ul>
			</nav>

		</header>

		<?php
			include 'include/header.js';
		?>

		<div id="page">
			<div class="centerBox">
				<main id="content">