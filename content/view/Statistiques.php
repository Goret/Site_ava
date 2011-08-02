<div class="content-bot">	
	<div id="homepage">
		<div id="left">
			<?php require_once('slideshow.php'); ?>
			<?php require_once('featured-news.php'); ?>
<div id="news-updates">
	<div class="news-article first-child">
		<h3>
			<a>Statistiques</a>
		</h3>
	</div>
	<div class="news-article ">
		<strong><font size="3"><a>Informations sur les Rates</a></font></strong>
		<br /><br />
		<table class="table" width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
		<thead>
			<tr>
				<th><a href="javascript:;" class="sort-link">Quête</a></th>
				<th><a href="javascript:;" class="sort-link numeric">Monstre</a></th>
				<th><a href="javascript:;" class="sort-link numeric">Exploration</a></th>
				<th><a href="javascript:;" class="sort-link numeric">Honneur</a></th>
				<th><a href="javascript:;" class="sort-link numeric">Objet</a></th>
				<th><a href="javascript:;" class="sort-link numeric">Argent</a></th>
			</tr>
		</thead>
		<tbody>
			<tr class="row2">
				<td><?php echo $array_site['quete']; ?></td>
				<td><?php echo $array_site['monstre']; ?></td>
				<td><?php echo $array_site['exploration']; ?></td>
				<td><?php echo $array_site['honneur']; ?></td>
				<td><?php echo $array_site['objet']; ?></td>
				<td><?php echo $array_site['argent']; ?></td>
			</tr>
		</tbody>
		</table>
	</div>
	<div class="news-article ">
		<strong><font size="3"><a>Informations sur les comptes</a></font></strong>
		<br /><br />
		<table class="table" width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
		<thead>
			<tr>
				<th><a href="javascript:;" class="sort-link">Compte créés</a></th>
			</tr>
		</thead>
		<tbody>
			<tr class="row2">
				<td><?php echo $auth->nb_account; ?></td>
			</tr>
		</tbody>
		</table>
	</div>
	<div class="news-article">
		<center><strong><font size="4"><a>Royaume <?php echo $royaume->array_realmlist['name']; ?></a></font></strong></center>
		<br />
		<strong><font size="3"><a>Informations sur les personnages</a></font></strong>
		<br /><br />
		<table class="table" width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
		<thead>
			<tr>
				<th><a href="javascript:;" class="sort-link numeric">Personnage créés</a></th>
			</tr>
		</thead>
		<tbody>
			<tr class="row2">
				<td><?php echo count($royaume->array_players); ?></td>
			</tr>
		</tbody>
		</table>
	</div>
	<div class="news-article">
		<strong><font size="3"><a>Informations sur la population</a></font></strong>
		<p><font color="white">Répartition par factions :</font></p>
		<table class="table" width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
			<thead>
				<tr>
					<th><a href="javascript:;" class="sort-link">Nombre de joueurs Allianceux</a></th>
					<th><a href="javascript:;" class="sort-link numeric">Nombre de joueurs Hordeux</a></th>
				</tr>
			</thead>
			<tbody>
				<tr class="row2">
					<td><font color="#234CA5"><?php echo $royaume->nb_alliance; ?></font></td>
					<td><font color="#DB2218"><?php echo $royaume->nb_horde; ?></font></td>
				</tr>
			</tbody>
		</table>
		<br />
		<p><font color="white">Répartition par races :</font></p>
		<table class="table" width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
			<thead>
				<tr>
					<th><a href="javascript:;" class="sort-link">Humains</a></th>
					<th><a href="javascript:;" class="sort-link numeric">Orcs</a></th>
					<th><a href="javascript:;" class="sort-link numeric">Nains</a></th>
					<th><a href="javascript:;" class="sort-link numeric">Elfes de la nuit</a></th>
					<th><a href="javascript:;" class="sort-link numeric">Morts-vivants</a></th>
				</tr>
			</thead>
			<tbody>
				<tr class="row2">
					<td><?php echo $royaume->humain; ?></td>
					<td><?php echo $royaume->orc; ?></td>
					<td><?php echo $royaume->nain; ?></td>
					<td><?php echo $royaume->elfe_nuit; ?></td>
					<td><?php echo $royaume->mort_vivant; ?></td>
				</tr>
			</tbody>
			<thead>
				<tr>
					<th><a href="javascript:;" class="sort-link">Taurens</a></th>
					<th><a href="javascript:;" class="sort-link numeric">Gnomes</a></th>
					<th><a href="javascript:;" class="sort-link numeric">Trolls</a></th>
					<th><a href="javascript:;" class="sort-link numeric">Elfes de sang</a></th>
					<th><a href="javascript:;" class="sort-link numeric">Draeneïs</a></th>
				</tr>
			</thead>
			<tbody>
				<tr class="row2">
					<td><?php echo $royaume->tauren; ?></td>
					<td><?php echo $royaume->gnome; ?></td>
					<td><?php echo $royaume->troll; ?></td>
					<td><?php echo $royaume->elfe_sang; ?></td>
					<td><?php echo $royaume->draenei; ?></td>
				</tr>
			</tbody>
		</table>
		<br />
		<p><font color="white">Répartition par classes :</font></p>
		<table class="table" width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
			<thead>
				<tr>
					<th><a href="javascript:;" class="sort-link">Guerriers</a></th>
					<th><a href="javascript:;" class="sort-link numeric">Paladins</a></th>
					<th><a href="javascript:;" class="sort-link numeric">Chasseurs</a></th>
					<th><a href="javascript:;" class="sort-link numeric">Voleurs</a></th>
					<th><a href="javascript:;" class="sort-link numeric">Prêtres</a></th>
				</tr>
			</thead>
			<tbody>
				<tr class="row2">
					<td class="color-c1"><?php echo $royaume->guerrier; ?></td>
					<td class="color-c2"><?php echo $royaume->paladin; ?></td>
					<td class="color-c3"><?php echo $royaume->chasseur; ?></td>
					<td class="color-c4"><?php echo $royaume->voleur; ?></td>
					<td class="color-c5"><?php echo $royaume->pretre; ?></td>
				</tr>
			</tbody>
			<thead>
				<tr>
					<th><a href="javascript:;" class="sort-link">Chevaliers de la mort</a></th>
					<th><a href="javascript:;" class="sort-link numeric">Chamans</a></th>
					<th><a href="javascript:;" class="sort-link numeric">Mages</a></th>
					<th><a href="javascript:;" class="sort-link numeric">Démonistes</a></th>
					<th><a href="javascript:;" class="sort-link numeric">Druides</a></th>
				</tr>
			</thead>
			<tbody>
				<tr class="row2">
					<td class="color-c6"><?php echo $royaume->chevalier_mort; ?></td>
					<td class="color-c7"><?php echo $royaume->chaman; ?></td>
					<td class="color-c8"><?php echo $royaume->mage; ?></td>
					<td class="color-c9"><?php echo $royaume->demoniste; ?></td>
					<td class="color-c11"><?php echo $royaume->druide; ?></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
</div>
<?php require_once('right.php'); ?>
</div>
</div>