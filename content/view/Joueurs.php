<div class="content-bot">	
	<div id="homepage">
		<div id="left">
			<?php require_once('slideshow.php'); ?>
			<?php require_once('featured-news.php'); ?>
			<div id="news-updates">
				<div class="news-article first-child">
					<h3>
						<a>Joueurs en ligne</a>
					</h3>
				</div>
				<div class="news-article" align="center">
					<?php
					echo "<p>".$royaume->array_realmlist['name']."</p>";
					?>
					<table class="table" border="0" cellspacing="0" cellpadding="3" width="100%">
						<thead>
							<tr>
								<th><a href="javascript:;" class="sort-link">Nom du joueur</a></th>
								<th class="iconCol"><a href="javascript:;" class="sort-link numeric">Niveau</a></th>
								<th class="iconCol"><a href="javascript:;" class="sort-link numeric">Race</a></th>
								<th class="iconCol"><a href="javascript:;" class="sort-link numeric">Classe</a></th>
								<th class="iconCol"><a href="javascript:;" class="sort-link numeric">Faction</a></th>
								<th class="iconCol"><a href="javascript:;" class="sort-link">Zone</a></th>
							</tr>
						</thead>
						<?php
						if ($royaume->is_online())
						{
							if (!empty($royaume->array_online))
							{
								foreach ($royaume->array_online as $player)
								{
									echo '
									<tbody>
										<tr class="row2">
											<td class="table-link">
												<a href="'.$array_site['armurerie'].'character-sheet.xml?r=Avalon+Server&cn='.$player['name'].'" class="color-c'.$player['class'].'">
												<span class="list-icon border-c'.$player['class'].'"><img src="style/images/2d/avatar/'.$player['race'].'-'.$player['gender'].'.jpg"/></span>
												'.$player['name'].'
												</a>
											</td>
											<td class="iconCol"><font color="darkred">'.$player['level'].'</font></td>
											<td class="iconCol"><img src="style/images/icons/race/'.$player['race'].'-'.$player['gender'].'.gif"/></td>
											<td class="iconCol"><img src="style/images/icons/class/'.$player['class'].'.gif"/></td>
											<td class="iconCol"><img src="style/images/icons/faction/'.$royaume->faction[$player['race']].'.gif"/></td>
											<td class="iconCol">'.$player['zone'].'</td>;
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
											<strong><font color="red">Il n\'y a pas de joueurs en ligne !</font></strong>
										</td>
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
										<strong><font color="red">Le serveur est hors ligne !</font></strong>
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