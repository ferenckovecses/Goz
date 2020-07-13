</main>

<?php
if( isset($_SESSION['loggedin']) )
{
echo'

		<aside>

			<section>
				<h3>Új magazin!</h3>
				<center>
					<p>Vásárold meg a legújabb Gőz magazint, hogy megismerd 2019 legjobb címeit! Ajándék játék aktiváló kód jár hozzá!</p>
					<a href="index.php"><img src="media/GozMagazinCover.png" alt="Legújabb magazin"></a>
				</center>
			</section>

			<section>
				<h3>Partnerünk</h3>
				<center>
					<a href="http://aterixcloud.hu" target="_blank"><img src="media/Asterix.png" alt="Sponzor"></a>
				</center>
			</section>

		</aside>
	</div>
</div>
';
}	
?>
		<footer>
			<div class="centerBox">
				<div class="left">
					<h4>Oldalunk célja:</h4>
					<p>Oldalunk legfőbb célja 3 kredit megszerzése egy nem kimondottan borzalmas érdemjegy társaságában.</p>
					<p>Az oldal ismerőssége csupán a véletlen műve, bárki bármi mást mond hazudik.</p>
				</div>
				<div class="right">
					<h4>Oldaltérkép</h4>
					<ul>
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
				</div>
			</div>
		</footer>
		

	</body>
</html>
