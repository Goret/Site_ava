<div class="content-bot">	
	<div id="homepage">
		<div id="left">
			<?php require_once('slideshow.php'); ?>
			<?php require_once('featured-news.php'); ?>
<div id="news-updates">
	<div class="news-article first-child">
		<h3>
			<a>Top Joueurs contre Joueurs</a>
		</h3>
	</div>
	<div class="news-article ">
	<center><strong><font size="4"><a>Royaume <?php echo $royaume->array_realmlist['name']; ?></a></font></strong></center>
	<strong><a>Top 10 victoires honorable</a></strong>
	<br /><br />
	<table class="table" cellspacing="0" cellpadding="3" width="100%">
		<thead>
			<tr>
				<th class="iconCol"><a href="javascript:;" class="sort-link numeric">Top</a></th>
				<th><a href="javascript:;" class="sort-link">Nom du joueur</a></th>
				<th class="iconCol"><a href="javascript:;" class="sort-link numeric">Niveau</a></th>
				<th class="iconCol"><a href="javascript:;" class="sort-link numeric">Race</a></th>
				<th class="iconCol"><a href="javascript:;" class="sort-link numeric">Classe</a></th>
				<th class="iconCol"><a href="javascript:;" class="sort-link numeric">Faction</a></th>
				<th><a href="javascript:;" class="sort-link numeric">Victoires honorable</a></th>
			</tr>
		</thead>
		<?php
		if (!empty($royaume->top_victoire))
		{
			foreach($royaume->top_victoire as $key => $player)
			{
				echo '
				<tbody>
					<tr class="row2">
						<td><img src="style/images/icons/top/'.$top[$key].'.png"/></td>
						<td class="table-link">
							<a href="index.php?page=Armurerie&amp;guid='.$player['guid'].'" class="color-c'.$player['class'].'">
							<span class="list-icon border-c'.$player['class'].'"><img src="style/images/2d/avatar/'.$player['race'].'-'.$player['gender'].'.jpg"/></span>
							'.$player['name'].'
							</a>
						</td>
						<td class="iconCol"><font color="darkred">'.$player['level'].'</font></td>
						<td class="iconCol"><img src="style/images/icons/race/'.$player['race'].'-'.$player['gender'].'.gif"/></td>
						<td class="iconCol"><img src="style/images/icons/class/'.$player['class'].'.gif"/></td>
						<td class="iconCol"><img src="style/images/icons/faction/'.$royaume->faction[$player['race']].'.gif"/></td>
						<td><font color="purple">'.$player['totalKills'].'</font></td>
					</tr>
				</tbody>';
			}
		}
		else
		{
			echo '
			<tbody>
				<tr class="row2">
					<td colspan="7" align="center">
						<strong><font color="red">Il n\'y a pas de personnages disposant de plus d\'une victoire honorable !</font></strong>
					</td>
				</tr>
			</tbody>';
		}
		?>
	</table>
	</div>	
	<div class="news-article">
		<strong><a>Top 10 points d'honneur</a></strong>
		<br /><br />
		<table class="table" cellspacing="0" cellpadding="3" width="100%">
		<thead>
			<tr>
				<th class="iconCol"><a href="javascript:;" class="sort-link numeric">Top</a></th>
				<th><a href="javascript:;" class="sort-link">Nom du joueur</a></th>
				<th class="iconCol"><a href="javascript:;" class="sort-link numeric">Niveau</a></th>
				<th class="iconCol"><a href="javascript:;" class="sort-link numeric">Race</a></th>
				<th class="iconCol"><a href="javascript:;" class="sort-link numeric">Classe</a></th>
				<th class="iconCol"><a href="javascript:;" class="sort-link numeric">Faction</a></th>
				<th><a href="javascript:;" class="sort-link numeric">Points d'honneur</a></th>
			</tr>
		</thead>
		<?php
		if (!empty($royaume->top_honor))
		{
			foreach($royaume->top_honor as $key => $player)
			{
				echo '
				<tbody>
					<tr class="row2">
						<td><img src="style/images/icons/top/'.$top[$key].'.png"/></td>
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
						<td><font color="purple">'.$player['totalHonorPoints'].'</font></td>
					</tr>
				</tbody>';
			}
		}
		else
		{
			echo '
			<tbody>
				<tr class="row2">
					<td colspan="7" align="center">
						<strong><font color="red">Il n\'y a pas de personnages disposant de plus d\'un point d\'honneur !</font></strong>
					</td>
				</tr>
			</tbody>';
		}
		?>
		</table>
	</div>
	<div class="news-article">
		<strong><a>Top 10 points d'arène</a></strong>
		<br /><br />
		<table class="table" cellspacing="0" cellpadding="3" width="100%">
			<thead>
				<tr>
					<th class="iconCol"><a href="javascript:;" class="sort-link numeric">Top</a></th>
					<th><a href="javascript:;" class="sort-link">Nom du joueur</a></th>
					<th class="iconCol"><a href="javascript:;" class="sort-link numeric">Niveau</a></th>
					<th class="iconCol"><a href="javascript:;" class="sort-link numeric">Race</a></th>
					<th class="iconCol"><a href="javascript:;" class="sort-link numeric">Classe</a></th>
					<th class="iconCol"><a href="javascript:;" class="sort-link numeric">Faction</a></th>
					<th><a href="javascript:;" class="sort-link numeric">Points d'arène</a></th>
				</tr>
			</thead>
			<?php
			if (!empty($royaume->top_arena))
			{
				foreach($royaume->top_arena as $key => $player)
				{
					echo '
					<tbody>
						<tr class="row2">
							<td><img src="style/images/icons/top/'.$top[$key].'.png"/></td>
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
							<td><font color="purple">'.$player['arenaPoints'].'</font></td>
						</tr>
					</tbody>';
				}
			}
			else
			{
				echo '
				<tbody>
					<tr class="row2">
						<td colspan="7" align="center">
							<strong><font color="red">Il n\'y a pas de personnages disposant de plus d\'un point d\'arène !</font></strong>
						</td>
					</tr>
				</tbody>';
			}
			?>
		</table>
	</div>
</div>
</div>
<?php require_once('right.php'); ?>
</div>
</div>