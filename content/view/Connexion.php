<div class="content-bot">	
	<div id="homepage">
		<div id="left">
			<?php require_once('slideshow.php'); ?>
			<?php require_once('featured-news.php'); ?>
			<div id="news-updates">
				<div class="news-article first-child">
					<h3>
						<a>Connexion</a>
					</h3>
				</div>
				<?php
				if($compte != 'good' && empty($user->sess_user))
				{
					if ($compte == 'id_banned')
					{
						echo 'Ce compte a été BAN pour la raison suivante : '.$id_banned['banreason'].'.\n\Dans ces conséquences il vous sera impossible de vous connectez avec ce compte !';
					}
					elseif ($compte == 'ip_banned')
					{
						echo 'Cette adresse IP a été pour la raison suivante : '.$ip_banned['banreason'].'.\n\Dans ces conséquences il vous sera impossible de vous connectez avec cette adresse IP !';
					}
					elseif ($compte == 'wrong_account' || $compte == 'empty' || empty($compte))
					{
						echo '
						<div class="news-article" align="center">
							<font color=\'#FF0000\'>';
							if ($compte == 'wrong_account')
							{
								echo 'Erreur : Le pseudo ou le mot de passe choisis est invalide ...<br />';
							}
							if ($compte == 'empty')
							{
								echo 'Erreur : Tous les champs ne sont pas remplis !<br /><br />';
							}
							?>
							</font>
							<form action="Connexion" method="post">
								Nom de compte :<br /><br /><input type="text" name="login" />
								<br /><br />
								Mot de passe :<br /><br /><input type="password" name="password" />
								<br /><br />
								<input type="submit" value="Connexion" name="connexion" />
								<input type="checkbox" name="souvenir" /><label for="souvenir">Se souvenir de moi.</label>
							</form>
						</div>
						<?php
					}
				}
				else
				{
					$site->redirect('home',0);
				}
				?>
			</div>
		</div>
		<?php require_once('right.php'); ?>
	</div>
</div>