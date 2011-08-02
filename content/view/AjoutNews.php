<div class="content-bot">	
	<div id="homepage">
		<div id="left">
			<?php require_once('slideshow.php'); ?>
			<?php require_once('featured-news.php'); ?>
			<?php
			if($user->sess_user)
			{
				if($user->level >= ADMIN)
				{
					?>
					<div id="news-updates">
						<div class="news-article first-child">
							<h3>
								<a>Ajouter une news</a>
							</h3>
						</div>
						<?php
						if (isset($_POST['ajouter']))
						{
							if(!empty($news_titre) && !empty($news_message))
							{
								if ($result == 1)
								{
									echo '
									<script language="javascript"> 
										alert("News ajoutée avec succès !");
										document.location.href="AjoutNews" 
									</script>';
								}
							}
							else
							{
								echo '
								<script language="javascript"> 
									alert("Erreur : Tous les champs ne sont pas remplis !");
									document.location.href="AjoutNews" 
								</script>';
							}
						}
						else
						{
							echo '
							<div class="news-article" align="center">
								<form action="index.php?page=AjoutNews" method="post">
									Titre de la news : <br />
									<input type="text" size="30" name="titre" value=""/>
									<br /><br />
									Message de la news :<br />
									<textarea name="message" cols="30" rows="5"></textarea>
									<br/><br/>
									<button class="ui-button button1" type="submit" name="ajouter">
										<span>
											<span>Ajouter</span>
										</span>
									</button>
								</form>
							</div>';
						}
						?>
					</div>
					<?php
				}
				else
				{
					echo '<font color="red">Vous n\'êtes pas autorisé à accéder à cette page !</font></p>';
				}
			}
			else
			{
				echo '<font color="red">Vous devez être connecté pour accéder à cette page !</font></p>';
			}
			?>
		</div>
		<?php require_once('right.php'); ?>
	</div>
</div>