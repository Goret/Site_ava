<div class="content-trail">
	<ol class="ui-breadcrumb">
		<li>
			<a href="home" rel="np">Accueil</a>
		</li>
		<li class="last">
			<a href="Rechercher" rel="np">Rechercher</a>
		</li>
	</ol>
</div>
<div class="content-bot">
<?php
if (isset($_POST['rechercher']))
{
	echo '
	<div id="search-results">
		<form action="Rechercher#search-results" method="post">
		<div id="search-again">
			Rechercher
			<div class="search-input">
				<input id="search-again-field" type="text" name="name" value=""/>
				<button class="ui-button button1" type="submit" name="rechercher">
					<span>
						<span>Rechercher</span>
					</span>
				</button>
			</div>
		</div>
		</form>
		<div id="results-interior" class="search">
			<table class="table" border="0" cellspacing="0" cellpadding="3" width="100%">
				<thead>
					<tr>
						<th><a href="javascript:;" class="sort-link"><span class="arrow">Nom</span></a></th>
						<th class="iconCol"><a href="javascript:;" class="sort-link numeric"><span class="arrow">Niveau</span></a></th>
						<th class="iconCol"><a href="javascript:;" class="sort-link numeric"><span class="arrow">Race</span></a></th>
						<th class="iconCol"><a href="javascript:;" class="sort-link numeric"><span class="arrow">Classe</span></a></th>
						<th class="iconCol"><a href="javascript:;" class="sort-link numeric"><span class="arrow">Faction</span></a></th>
						<th><a href="javascript:;" class="sort-link"><span class="arrow">Guilde</span></a></th>
						<th><a href="javascript:;" class="sort-link"><span class="arrow">Royaume</span></a></th>
					</tr>
				</thead>';
				if (!empty($_POST['name']))
				{
					if (!empty($row_characters_name))
					{
						echo '
						<tbody>
							<tr class="row2">
								<td class="table-link">
									<a href="Armurerie-'.$row_characters_name['guid'].'" class="color-c'.$row_characters_name['class'].'">
										<span class="list-icon border-c'.$row_characters_name['class'].'"><img src="http://eu.battle.net/wow/static/images/2d/avatar/'.$row_characters_name['race'].'-'.$row_characters_name['gender'].'.jpg"/></span>
										'.$row_characters_name['name'].'
									</a>
								</td>
								<td class="iconCol">'.$row_characters_name['level'].'</td>
								<td class="iconCol"><img src="style/images/icons/race/'.$row_characters_name['race'].'-'.$row_characters_name['gender'].'.gif" /></td>
								<td class="iconCol"><img src="style/images/icons/class/'.$row_characters_name['class'].'.gif" /></td>
								<td class="iconCol"><img src="style/images/icons/faction/'.$royaume->faction[$row_characters_name['race']].'.gif" /></td>
								<td>'.$row_guild_guildid['name'].'</td>
								<td>'.$royaume->array_realmlist['name'].'</td>
							</tr>
						</tbody>';
					}
					else
					{
						echo '
						<tr>
							<td colspan="8" align="center">
								<strong><font color="red">Votre recherche n\'a donné aucun résultat pour le nom "'.$name.'" !</font></strong>
							</td>
						</tr>';
					}
				}
				?>
			</table>
		</div>
	</div>
	</div>
	<?php
}
else
{
	echo '
	<div id="search-results">
		<form action="Rechercher#search-results" method="post">
		<div id="search-again">
			Rechercher
			<div class="search-input">
				<input id="search-again-field" type="text" name="name" value=""/>
				<button class="ui-button button1" type="submit" name="rechercher">
					<span>
						<span>Rechercher</span>
					</span>
				</button>
			</div>
		</div>
		</form>
	</div>';
}
?>
</div>