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
							<a>Renommer un personnage</a>
						</h3>
						<p>Il vous faut un minimum de <font color="green"><?php echo $array_points['renommer']; ?></font> points de vote pour renommer un personnage.</p>
					</div>
					<?php
					if (isset($_POST['renommer']))
					{
						if(!empty($_POST['name']))
						{
							if ($user->array_voting_points['points'] >= $array_points['renommer'])
							{
								if ($result == 1)
								{
									echo '
									<script language="javascript">
										alert("Le changement de nom sera disponible à la prochaine connexion !");
										document.location.href="Gestion"
									</script>';
								}
								elseif ($result == 0)
								{
									echo '
									<script language="javascript">
										alert("Ce personnage n\'existe pas !");
										document.location.href="Gestion"
									</script>';
								}
							}
							else
							{
								echo '
								<script language="javascript">
									alert("Erreur : Vous n\'avez pas asser de points pour renommer votre personnage !");
									document.location.href="Gestion"
								</script>';
							}
						}
						else
						{
							echo '
							<script language="javascript">
								alert("Erreur : Vous n\'avez pas sélectionner de personnage !");
								document.location.href="Renommer"
							</script>';
						}
					}
					else
					{
						echo '
						<div class="news-article" align="center">
							<form action="Renommer" method="post">
								Personnage à débloquer :<br />';
								if ($user->nb_char > 0)
								{
									echo '
									<select name="name">
										<optgroup label="Mes personnages"></optgroup>';
										foreach($user->array_characters as $char)
										{
											echo '<option>'.$char['name'].'</option>';
										}
										echo '
									</select>';
								}
								else
								{
									echo '<strong><font color="red">Vous n\'avez pas de personnages !</font></strong>';
								}
								echo '
								<br /><br />
								<button class="ui-button button1" type="submit" name="Renommer">
									<span>
										<span>Renommer</span>
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