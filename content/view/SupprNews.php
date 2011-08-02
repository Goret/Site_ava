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
								<a>Supprimer une news</a>
							</h3>
						</div>
						<?php
						if (isset($_GET['variable1']))
						{
							echo '
							<script language="javascript"> 
								alert("News supprimée avec succès !");
								document.location.href="SupprNews" 
							</script>';
						}
						else
						{
							echo '
							<div class="news-article" align="center">
								<table class="table" border="0" cellspacing="0" cellpadding="3" width="100%">
									<thead>
										<tr>
											<th><a href="javascript:;" class="sort-link">Titre de la news</a></th>
											<th class="iconCol"><a href="javascript:;" class="sort-link numeric">Auteur</a></th>
											<th class="iconCol"><a href="javascript:;" class="sort-link numeric">Supprimer</a></th>
										</tr>
									</thead>';
									if (!empty($site->array_news))
									{
										foreach($site->array_news as $news)
										{
											echo '
											<tbody>
												<tr class="row2">
													<td><font color="darkgreen">'.$news['titre'].'</font></td>
													<td class="iconCol"><font color="darkred">'.$news['auteur'].'</font></td>
													<td class="iconCol"><a href="SupprNews-'.$news['id'].'"><img src="style/images/icons/admin/supprimer.png"/></a></td>
												</tr>
											</tbody>';
										}
									}
									else
									{
										echo '
										<tbody>
											<tr class="row2" align="center">
												<td colspan="3"><strong><font color="red">Il n\'y a pas de news !</font></strong></td>
											</tr>
										</tbody>';
									}
								echo '</table>
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