<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr-fr">
<head>
<title><?php echo $site->nom_site; ?></title>

<link rel="shortcut icon" href="style/images/favicons/wow-icon.png" type="image/x-icon"/>

<link rel="stylesheet" type="text/css" media="all" href="style/css/common.css" />
<!--[if IE]><link rel="stylesheet" type="text/css" media="all" href="http://eu.battle.net/wow/static/local-common/css/common-ie.css" /><![endif]-->
<!--[if IE 6]><link rel="stylesheet" type="text/css" media="all" href="http://eu.battle.net/wow/static/local-common/css/common-ie6.css" /><![endif]-->
<!--[if IE 7]><link rel="stylesheet" type="text/css" media="all" href="http://eu.battle.net/wow/static/local-common/css/common-ie7.css" /><![endif]-->


<link rel="stylesheet" type="text/css" media="all" href="style/css/wow.css" />
<!--[if IE]><link rel="stylesheet" type="text/css" media="all" href="http://eu.battle.net/wow/static/css/wow-ie.css" /><![endif]-->
<!--[if IE 6]><link rel="stylesheet" type="text/css" media="all" href="http://eu.battle.net/wow/static/css/wow-ie6.css" /><![endif]-->
<!--[if IE 7]><link rel="stylesheet" type="text/css" media="all" href="http://eu.battle.net/wow/static/css/wow-ie7.css" /><![endif]-->

<link rel="stylesheet" type="text/css" media="all" href="style/css/cms/homepage.css" />
<link rel="stylesheet" type="text/css" media="all" href="style/css/cms/blog.css" />
<link rel="stylesheet" type="text/css" media="all" href="style/css/cms/comments.css" />
<link rel="stylesheet" type="text/css" media="all" href="style/css/cms/cms-common.css" />

<link rel="stylesheet" type="text/css" media="all" href="style/css/cms.css" />
<!--[if IE 6]><link rel="stylesheet" type="text/css" media="all" href="http://eu.battle.net/wow/static/css/cms-ie6.css" /><![endif]-->

<link rel="stylesheet" type="text/css" media="all" href="style/css/locale/fr-fr.css" />

<link rel="stylesheet" type="text/css" media="all" href="style/css/profile.css" />
<!--[if IE]><link rel="stylesheet" type="text/css" media="all" href="http://eu.battle.net/wow/static/css/profile-ie.css" /><![endif]-->
<!--[if IE 6]><link rel="stylesheet" type="text/css" media="all" href="http://eu.battle.net/wow/static/css/profile-ie6.css" /><![endif]-->

<link rel="stylesheet" type="text/css" media="all" href="style/css/character/summary.css" />
<!--[if IE]><link rel="stylesheet" type="text/css" media="all" href="http://eu.battle.net/wow/static/css/character/summary-ie.css" /><![endif]-->
<!--[if IE 6]><link rel="stylesheet" type="text/css" media="all" href="http://eu.battle.net/wow/static/css/character/summary-ie6.css" /><![endif]-->

<link rel="stylesheet" type="text/css" media="all" href="style/css/cms/search.css" />
<link rel="stylesheet" type="text/css" media="all" href="style/css/search.css" />

<link type='text/css' rel="stylesheet" href="style/css/hp_carousel_1.css" />

<script type="text/javascript" src="style/js/third-party/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="style/js/core.js"></script>
<script type="text/javascript" src="style/js/tooltip.js"></script>

<script type="text/javascript" src="style/js/menu.js"></script>
<script type="text/javascript" src="style/js/wow.js"></script>
<script type="text/javascript" src="style/js/noel.js"></script>

<script type="text/javascript" src="http://static.wowhead.com/widgets/power.js"></script>
<script language="javascript">
var state = 'none';
function showhide(layer_ref)
{
	if (state == 'block') {
	state = 'none';
	}
	else {
		state = 'block';
	}
	if (document.all) {
		eval( "document.all." + layer_ref + ".style.display = state");
	}
	if (document.layers) {
		document.layers[layer_ref].display = state;
	}
	if (document.getElementById &&!document.all) {
		hza = document.getElementById(layer_ref);
		hza.style.display = state;
	}
}
</script>
</head>
<body class="fr-fr homepage">
<div id="wrapper">
	<?php require_once('menu.php'); ?>
	<div id="content">
		<div class="content-top">
			<?php
			require_once $view_left;
			?>
		</div>
	</div>
	<?php require_once('footer.php'); ?>
	<?php require_once('service.php'); ?>
	<?php require_once('warnings-wrapper.php'); ?>
</div>
</body>