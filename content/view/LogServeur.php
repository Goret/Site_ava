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
								<a>Log serveur</a>
							</h3>
						</div>
						<div class="news-article ">
							<?php
							if (!empty($log_server))
							{
								if ($total > 0)
								{
									echo '<textarea cols="70" rows="25" readonly="readonly">';
									for($i = 0; $i < $total; $i++) 
									{
										echo ''.$log_server[$i].'';
									}
									echo '</textarea>';
								}
							}
							else
							{
								echo '
								<div align="center">
									<strong><font color="red">Le log est vide !</font></strong>
								</div>';		
							}
							?>
						</div>
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