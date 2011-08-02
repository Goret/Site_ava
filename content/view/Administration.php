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
								<a>Administration</a>
							</h3>
						</div>
						<div class="news-article">
							<font size="3"><strong><a>Gestion des news</a></strong></font>
							<br />
							<li><a href="AjoutNews"><font color="white">Ajouter une news</font></a></li>
							<li><a href="ModifNews"><font color="white">Modifier une news</font></a></li>
							<li><a href="SupprNews"><font color="white">Supprimer une news</font></a></li>
						</div>
						<div class="news-article">
							<font size="3"><strong><a>Gestion de la boutique</a></strong></font>
							<br />
							<li><a href="AjoutObjet"><font color="white">Ajouter un objet</font></a> </li>
							<li><a href="SupprObjet"><font color="white">Supprimer un objet</font></a></li>
						</div>
						<div class="news-article">
							<font size="3"><strong><a>Gestion des comptes</a></strong></font>
							<br />
							<li><a href="Comptes"><font color="white">Liste des comptes</font></a></li>
							<li><a href="ComptesBan"><font color="white">Liste des comptes Ban</font></a></li>
						</div>
						<div class="news-article">
							<font size="3"><strong><a>Gestion des requêtes MJ</a></strong></font>
							<br />
							<li><a href="Requetes"><font color="white">Liste des requêtes</font></a></li>
						</div>
						<div class="news-article">
							<font size="3"><strong><a>Gestion des logs</a></strong></font>
							<br />
							<li><a href="LogServeur"><font color="white">Log serveur</font></a></li>
							<li><a href="LogErreurs"><font color="white">Log d'erreurs</font></a></li>
						</div>
					</div>
					<?php
				}
				else
				{
					echo '<font color="red">Vous n\'&ecirc;tes pas autoris&eacute; &agrave; acc&eacute;der &agrave; cette page !</font></p>';
				}
			}
			else
			{
				echo '<font color="red">Vous devez &ecirc;tre connect&eacute; pour acc&eacute;der &agrave; cette page !</font></p>';
			}
			?>
		</div>
		<?php require_once('right.php'); ?>
	</div>
</div>
