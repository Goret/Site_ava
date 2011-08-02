<div class="content-bot">	
	<div id="homepage">
		<div id="left">
			<?php require_once('slideshow.php'); ?>
			<?php require_once('featured-news.php'); ?>
			<div id="news-updates">
				<div class="news-article first-child">
					<h3>
						<a>Personnages</a>
					</h3>
				</div>
				<div class="news-article" align="center">
					<?php
					echo "<p>".$royaume->array_realmlist['name']."</p>";
					?>
					<table class="table" border="0" cellspacing="0" cellpadding="3" width="100%">
					<thead>
						<tr>
							<th><a href="javascript:;" class="sort-link">Nom du personnage</a></th>
							<th class="iconCol"><a href="javascript:;" class="sort-link numeric">Niveau</a></th>
							<th class="iconCol"><a href="javascript:;" class="sort-link numeric">Race</a></th>
							<th class="iconCol"><a href="javascript:;" class="sort-link numeric">Classe</a></th>
							<th class="iconCol"><a href="javascript:;" class="sort-link numeric">Faction</a></th>
						</tr>
					</thead>
					<?php
					if (!empty($royaume->array_players))
					{
						foreach ($royaume->array_players as $players)
						{
							echo '
							<tbody>
								<tr class="row2">
									<td class="table-link">
										<a href="Armurerie-'.$players['guid'].'" class="color-c'.$players['class'].'">
											<span class="list-icon border-c'.$players['class'].'"><img src="style/images/2d/avatar/'.$players['race'].'-'.$players['gender'].'.jpg"/></span>
											'.$players['name'].'
										</a>
									</td>
									<td class="iconCol"><font color="darkred">'.$players['level'].'</font></td>
									<td class="iconCol"><img src="style/images/icons/race/'.$players['race'].'-'.$players['gender'].'.gif"/></td>
									<td class="iconCol"><img src="style/images/icons/class/'.$players['class'].'.gif"/></td>
									<td class="iconCol"><img src="style/images/icons/faction/'.$royaume->faction[$players['race']].'.gif"/></td>
								</tr>
							</tbody>';
						}
					}
					else
					{
						echo '
						<tbody>
							<tr class="row2" align="center">
								<td colspan="5">
									<strong><font color="red">Il n\'y a pas de personnages !</font></strong>
								</td>
							</tr>
						</tbody>';
					}
					?>
					</table>
					<br />
				</div>
			</div>	
		</div>
		<?php require_once('right.php'); ?>
	</div>
</div>