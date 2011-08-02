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
								<a>Liste des comptes BAN</a>
							</h3>
						</div>
						<div class="news-article" align="center">
							<table class="table" border="0" cellspacing="0" cellpadding="3" width="100%">
								<thead>
									<tr>
										<th><a href="javascript:;" class="sort-link">Nom du compte</a></th>
										<th><a href="javascript:;" class="sort-link numeric">BAN le</a></th>
										<th><a href="javascript:;" class="sort-link numeric">Expire le</a></th>
										<th><a href="javascript:;" class="sort-link numeric">BAN par</a></th>
									</tr>
								</thead>
								<?php
								if (!empty($auth->array_banned))
								{
									foreach($auth->array_banned as $banned)
									{
										echo '
										<tbody>
											<tr class="row2">
												<td><font color="#D400FF">'.$banned['name'].'</font></td>
												<td><font color="#FE0000">'.$banned['bandate'].'</font></td>
												<td><font color="#419F2E">'.$banned['unbandate'].'</font></td>
												<td><font color="#01B0F0">'.$banned['bannedby'].'</font></td>
											</tr>
										</tbody>';
									}
								}
								else
								{
									echo '
									<tbody>
										<tr class="row2" align="center">
											<td colspan="4">
												<strong><font color="red">Il n\'y a pas de comptes BAN !</font></strong>
											</td>
										</tr>
									</tbody>';
								}
								?>	
							</table>
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