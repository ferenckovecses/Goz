<?php
//Ha el lett küldve a form, akkor hozza létre a login controllert
if(isset($_POST['login'])&& isset($_POST['username']) && isset($_POST['password']))
{
	$psw = md5($_POST['password']);
	echo $psw;
	$logincontroller = new controller\LoginController($_POST['username'],$psw);
	$result = $logincontroller->login();

	//Ha a modelltől visszaküldött userId valós, akkor...
	if($result>0)
	{
		unset($logincontroller);
		$_SESSION['loggedin'] = $result;
		header('Location: .\index.php?page=home');
	}

	//Egyébként pedig...
	elseif($result == 0)
	{
		echo '<p class="error">Sikertelen bejelentkezés!</p>';
	}
	//Ha pedig a model nem tudta elérni az adatbázist
	else
	{
		header('Location: .\index.php?page=databasemaker');
	}
}
	
?>



					<section>
						<h1>Bejelentkezés</h1>

						<p>Az oldal tartalmának eléréséhez be kell jelentkezned!</p>
						<form method="post" action="">
							<label for="inputName">Felhasználónév</label>
							<input type="text" name="username" id="inputName" maxlength="100" required>
							<label for="inputName">Jelszó</label>
							<input type="password" name="password" id="inputName" maxlength="100" required>
							<input type="submit" name="login" value="Bejelentkezés">
						</form>
						<h1>Még nincs fiókod?</h1>
						<p>Hozz létre egyet "ingyen"!</p>
						<form method="post" action="?page=registration">
							<input type="submit" name="reg" value="Regisztrálok!">
						</form>
					</section>


