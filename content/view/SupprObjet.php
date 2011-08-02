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
								<a>Supprimer un objet de la boutique</a>
							</h3>
						</div>
						<?php
						if (isset($_GET['variable1'])) 
						{	
							echo '
							<script language="javascript"> 
								alert("Objet supprim� de la boutique avec succ�s !");
								document.location.href="SupprObjet" 
							</script>'; 
						}
						else
						{
							echo '
							<div class="news-article" align="center">
								<table class="table" border="0" cellspacing="0" cellpadding="3" width="100%">
									<thead>
										<tr>
											<th><a href="javascript:;" class="sort-link">Nom de l\'objet</a></th>
											<th class="iconCol"><a href="javascript:;" class="sort-link numeric">Supprimer</a></th>
										</tr>
									</thead>';
									if (!empty($site->array_boutique))
									{
										foreach($site->array_boutique as $objet)
										{
											echo '
											<tbody>
												<tr class="row2">
													<td><a href="http://fr.wowhead.com/?item='.$objet['id'].'"><font color="darkgreen">'.$objet['nom'].'</font></a></td>
													<td class="iconCol"><a href="SupprObjet-'.$objet['id'].'"><img src="style/images/icons/admin/supprimer.png"/></a></td>
												</tr>
											</tbody>';
										}
									}
									else
									{
										echo '
										<tbody>
											<tr class="row2" align="center">
												<td colspan="2">
													<strong><font color="red">Il n\'y a pas d\'objets en vente dans la boutique !</font></strong>
												</td>
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
					echo '<font color="red">Vous n\'�tes pas autoris� � acc�der � cette page !</font></p>';
				}
			}
			else
			{
				echo '<font color="red">Vous devez �tre connect� pour acc�der � cette page !</font></p>';
			}
			?>		
		</div>
		<?php require_once('right.php'); ?>
	</div>
</div>