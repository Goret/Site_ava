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
							<a>Changement de mot de passe</a>
						</h3>
					</div>
					<?php
					if (isset($_POST['changer']))
					{
						if(!empty($password1) && !empty($password2) && !empty($password3))
						{
							if ($result == 1)
							{
								echo '
								<script language="javascript"> 
									alert("Mot de passe changé avec succès !");
									document.location.href="Gestion" 
								</script>';
							}
							elseif ($result == 0)
							{
								echo '
								<script language="javascript"> 
									alert("Erreur : Les deux mots de passe ne sont pas identique !");
									document.location.href="ChangeMdp" 
								</script>';
							}
							elseif ($result == -1)
							{
								echo '
								<script language="javascript"> 
									alert("Erreur : Votre ancien mot de passe est mauvais !");
									document.location.href="ChangeMdp" 
								</script>';
							}
						}
						else
						{
							echo '
							<script language="javascript"> 
								alert("Erreur : Tous les champs ne sont pas remplis !");
								document.location.href="ChangeMdp" 
							</script>';
						}
					}
					else
					{
						echo '
						<div class="news-article" align="center">
							<form action="ChangeMdp" method="post">
								Ancien mot de passe :<br />
								<input type="password" name="password1">
								<br /><br />
								Nouveau mot de passe :<br />
								<input type="password" name="password2">
								<br /><br />
								Confirmation :<br />
								<input type="password" name="password3">
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