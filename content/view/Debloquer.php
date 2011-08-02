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
							<a>Débloquer un personnage</a>
						</h3>
					</div>
					<?php
					if (isset($_POST['debloquer']))
					{
						if(!empty($_POST['name']))
						{
							if ($result == 1)
							{
								echo '
								<script language="javascript"> 
									alert("Personnage débloqué avec succès !");
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
								alert("Erreur : Vous n\'avez pas sélectionner de personnage !");
								document.location.href="Debloquer" 
							</script>';
						}
					}
					else
					{
						echo '
						<div class="news-article" align="center">
							<form action="Debloquer" method="post">
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
								<button class="ui-button button1" type="submit" name="debloquer">
									<span>
										<span>Débloquer</span>
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