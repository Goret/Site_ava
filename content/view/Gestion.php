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
							<a>Gestion de compte</a>
						</h3>
					</div>
					<div class="news-article">
						<font size="3"><strong><a>Informations de compte</a></strong></font>
						<br />
						<p><font color="white">Nom de compte :</font> <?php echo $user->sess_user; ?></p>
						<p><font color="white">Adresse email :</font> <?php echo $user->email; ?></p>
						<p><font color="white">Points de vote :</font> <?php echo $user->array_voting_points['points']; ?></p>
						<?php
						echo '
						<p><font color="white">Date d\'inscription :</font> '.date("d-m-Y H\hi",$user->array_user['subscription_date']).'</p>
						<p><font color="white">Derniere connexion au site :</font> '.$last_login.'</p>
						<p><font color="white">Derniere connexion au serveur :</font> '.$account_auth['last_login'].'</p>
						<p class="color-exp'.$account_auth['expansion'].'"><font color="white">Extension :</font> '.$auth->expansion[$account_auth['expansion']].'</p>
						<p><font color="white">Niveau du compte :</font> <font color="darkred">'.$site->level[$user->array_user['niveau']].'</font></p>
						';
						?>
					</div>	
					<div class="news-article">
						<font size="3"><strong><a>Outils de compte</a></strong></font>
						<br />
						<p>
							<li><a href="ChangeMdp"><font color="white">Changement de mot de passe</font></a></li>
							<li><a href="ChangeMail"><font color="white">Changement d'adresse mail</font></a></li>
						</p>
					</div>
					<div class="news-article ">
						<font size="3"><strong><a>Outils de personnage</a></strong></font>
						<br />
						<p>
							<li><a href="Debloquer"><font color="white">Débloquer un personnage</font></a></li>
							<li><a href="ChangeRace"><font color="white">Changement de race</font></a></li>
							<li><a href="Renommer"><font color="white">Renommer un personnage</font></a></li>
						</p>
					</div>	
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