<div id="header">
	<?php require_once ('search-bar.php'); ?>
	<h1 id="logo"><a href="home">Serveur World of Warcraft 3.3.5a</a></h1>
	<div class="header-plate-wrapper">
		<div class="header-plate">
			<ul id="menu">
				<li class="menu-home">
				<?php
				if ($_GET['page'] == 'home')
				{
					echo '<a href="home" class="active"><span>Accueil</span></a>';
				}
				else
				{
					echo '<a href="home"><span>Accueil</span></a>';
				}
				echo '
				</li>
				<li class="menu-game">';
				if ($_GET['page'] == 'Reglement')
				{
					echo '<a href="Reglement" class="active"><span>R&egrave;glement</span></a>';
				}
				else
				{
					echo '<a href="Reglement"><span>R&egrave;glement</span></a>';
				}
				echo '</li>
				<li class="menu-community">';
				if ($_GET['page'] == 'RejoinNous')
				{
					echo '<a href="RejoinNous" class="active"><span>Rejoin-nous</span></a>';
				}
				else
				{
					echo '<a href="RejoinNous"><span>Rejoin-nous</span></a>';
				}
				echo '</li>
				<li class="menu-media">';
				if ($_GET['page'] == 'Rechercher')
				{
					echo '<a href="'.$array_site['armurerie'].'" target="_bank" class="active"><span>Armurerie</span></a>';
				}
				else
				{
					echo '<a href="'.$array_site['armurerie'].'" target="_bank"><span>Armurerie</span></a>';
				}
				?>
				</li>
				<li class="menu-forums">
				<a href="<?php echo ''.$array_site['forum'].''; ?>"><span>Forums</span></a>
				</li>
                <li class="menu-services">
				<?php
				if ($_GET['page'] == 'Boutique')
				{
					echo '<a href="Boutique" class="active"><span>Boutique</span></a>';
				}
				else
				{
					echo '<a href="Boutique"><span>Boutique</span></a>';
				}
				?>
			    </li>
			</ul>
			<?php require_once ('user-plate.php'); ?>
		</div>
	</div>
</div>
