<?php
use controller\dtoController;

//Ha a form el lett küldve
if( isset($_POST['sendReg']))
	{	
		//Ha a jelszavak megegyezőek
		if($_POST['Psw1']==$_POST['Psw2'])
		{
			//Létrehozzuk a kontrollert
			$registrationcontroller = new controller\RegistrationController($_POST['username'],$_POST['Psw1'],$_POST['email'],$_POST['nem'],$_POST['nev']);	
			$result = $registrationcontroller->Registration();	
			
			if($result == 0)
			{
				echo '<p class="error">Sikertelen regisztráció!</p>';
			}

			elseif($result == 1)
			{
				echo '<p class="success">Sikeres regisztráció!</p>';
			}

			elseif($result == 2)
			{
				echo '<p class="error">A felhasználónév már használatban van!</p>'; 
			}
			elseif($result == 3)
			{
				header('Location: .\index.php?page=databasemaker');
			}
			elseif($result == 4)
			{
				echo '<p class="error">Hiba: A jelszónak és a felhasználónak is 5 karakternél hosszabbnak kell lennie!</p>';
			}
			else
			{
				echo '<p class="error">Ismeretlen hiba történt!</p>';
			}
		}

		else
		{
			echo '<p class="error">A jelszavak nem egyeznek!</p>';
		}


	}

?>
					
					
					
					<h1>Regisztráció</h1>
					<p>Fontos: A felhasználónév és jelszó minimum 6 karakter kell hogy legyen!</p>
					<section>
						<form method="post" action="">
							<label for="inputName">Felhasználónév</label>
							<input type="text" name="username" id="inputName" maxlength="100" placeholder="Pl: elonmuskatli92" required>

							<label for="inputName">E-mail cím</label>
							<input type="email" name="email" id="inputName" maxlength="255" placeholder="valami@leginkábbmásvalami.harmadikcucc" required>

							<label for="inputName">Valódi név (opcionális)</label>
							<input type="text" name="nev" id="inputName" placeholder="A személyiden lévő név" maxlength="100">

							<label for="inputName">Nem</label>
									<select name="nem" id="inputName" required>';
									<?php
									require_once 'controller/dtoController.php';
									$genders = dtoController::getGenders();
									foreach ($genders as $option ) 
									{
										echo "<option value=".$option.">".$option."</option>";
									}
									unset($genders);
									?>
									</select>

							<label for="inputName">Jelszó </label>
							<input type="password" name="Psw1" id="inputName" maxlength="100" required>

							<label for="inputName">Jelszó újra</label>
							<input type="password" name="Psw2" id="inputName" maxlength="100" required>

							<input type="submit" name="sendReg" value="Regisztrálás">
						</form>
						
					</section>
