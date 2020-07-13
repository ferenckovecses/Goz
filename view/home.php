				
				<?php
use controller\HomeController;

if(isset($_SESSION['loggedin']))
				{
				}

				else
				{
					header('Location: .\index.php?page=login');
				}

				?>
				
				<h1>Üdvözlünk a Gőz honlapján!</h1>

				<article class="home">

				<?php

				$homecontroller = new HomeController();
				$articles = $homecontroller->getArticle();
				foreach ($articles as $article ) 
				{
					echo'
					<section>
						<h2 class="lead">
							'.$article['title'].'
						</h2>

						<img src="media/article/'.$article['image'].'" alt="'.$article['alt'].'">

						<p>
						'.$article['text'].'
						</p>

						<a href="">Bővebben</a>

						<br></br>
					</section>

					';
				}

				?>

				</article>