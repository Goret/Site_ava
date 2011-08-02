<div class="content-bot">	
	<div id="homepage">
		<div id="left">
			<?php require_once('slideshow.php'); ?>
			<?php require_once('featured-news.php'); ?>
			<?php
			if($user->sess_user)
			{
				?>
				<div id="news-updates">
					<div class="news-article first-child">
						<h3>
							<a>Changement d'adresse mail</a>
						</h3>
					</div>
					<?php
					if (isset($_POST['changer']))
					{
						if(!empty($mail1) && !empty($mail2) && !empty($mail3))
						{
							if ($result == 1)
							{
								echo '
								<script language="javascript"> 
									alert("Adresse mail changée avec succès !");
									document.location.href="Gestion" 
								</script>';
							}
							elseif ($result == 0)
							{
								echo '
								<script language="javascript"> 
									alert("Erreur : Les deux adresses mail ne sont pas identique !");
									document.location.href="ChangeMail" 
								</script>';
							}
							elseif ($result == -1)
							{
								echo '
								<script language="javascript"> 
									alert("Erreur : Votre ancienne adresse mail est mauvaise !");
									document.location.href="ChangeMail" 
								</script>';
							}
						}
						else
						{
							echo '
							<script language="javascript"> 
								alert("Erreur : Tous les champs ne sont pas remplis !");
								document.location.href="ChangeMail" 
							</script>';
						}
					}
					else
					{
						echo '
						<div class="news-article" align="center">
							<form action="index.php?page=ChangeMail" method="post">
								Ancienne adresse mail :<br />
								<input type="text" name="mail1">
								<br /><br />
								Nouvelle adresse mail :<br />
								<input type="text" name="mail2">
								<br /><br />
								Confirmation :<br />
								<input type="text" name="mail3">
								<br /><br />
								<button class="ui-button button1" type="submit" name="changer">
									<span>
										<span>Changer</span>
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
				echo '<font color="red">Vous devez être connecté pour accéder à cette page !</font></p>';
			}
			?>
		</div>
		<?php require_once('right.php'); ?>
	</div>
</div>