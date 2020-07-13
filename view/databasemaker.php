<?php
use controller\DatabasemakerController;

if(isset($_POST['letrehozas']) && $_POST['secretpassword'] == 12345 )
{
    $dbmakercontroller = new DatabasemakerController();
    $result = $dbmakercontroller->createFullDatabase("UT2BZ6");

    if($result == 3)
    {
        header('Location: .\index.php');
    }

    elseif($result == 0)
    {
        echo '<p class="error">Az adatbázis létrehozása sikertelen!</p>';
    }

    elseif($result == 1)
    {
        echo '<p class="error">A Users tábla létrehozása sikertelen!</p>';
    }

    elseif($result == 2)
    {
        echo '<p class="error">Az admin beszúrása sikertelen!</p>';
    }
}

elseif(isset($_POST['letrehozas']) && $_POST['secretpassword'] != 12345)
{
    echo '<p class="error">Hibás titkos jelszó!</p>';
}
    

?>


<section>
	<h1>Tesztfunkckiók</h1>
</section>
<section>
	<form method="post" action="">
		<h1>Adatbázis létrehozása</h1>
		<h4>Adatbázis létrehozása tesztelési és fejlesztési célokból.</h4>
        <br>
        <form method="post" action="">

            <label for="inputName">Titkos jelszó (Nem 12345!!!) </label>
            <input type="password" name="secretpassword" id="inputName" maxlength="100" required>
            
            <input type="submit" name="letrehozas" value="Létrehozás">
        </form>
	</form>
</section>