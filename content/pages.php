<?php
$view_right = 'right.php';

if(empty($_GET['page']))
{
	$_GET['page'] = "home";
	$model = 'model/home.php';
	$view_left = 'home.php';
}
else
{
	switch($_GET['page'])
	{
		case "home":
			$model = 'model/home.php';
			$view_left = 'home.php';
			break;
		case "Inscription":
			$model = 'model/Inscription.php';
			$view_left = 'Inscription.php';
			break;
		case "Connexion":
			$model = 'model/Connexion.php';
			$view_left = 'Connexion.php';
			break;
		case "Deconnexion":
			$model = 'model/Deconnexion.php';
			$view_left = 'Deconnexion.php';
			break;
		case "Joueurs":
			$model = 'model/Joueurs.php';
			$view_left = 'Joueurs.php';
			break;
		case "Personnages":
			$model = 'model/HautFait.php';
			$view_left = 'HautFait.php';
			break;
		case "Reglement":
			$view_left = 'Reglement.php';
			break;
		case "RejoinNous":
			$view_left = 'RejoinNous.php';
			break;
		case "Statistiques":
			$model = 'model/Statistiques.php';
			$view_left = 'Statistiques.php';
			break;
		case "TopJcJ":
			$model = 'model/TopJcJ.php';
			$view_left = 'TopJcJ.php';
			break;
		case "News":
			$model = 'model/News.php';
			$view_left = 'News.php';
			break;
		case "Rechercher":
			$model = 'model/Rechercher.php';
			$view_left = 'Rechercher.php';
			break;
		case "Armurerie":
			$model = 'model/Armurerie.php';
			$view_left = 'Armurerie.php';
			break;
		case "FAQ":
			$view_left = 'FAQ.php';
			break;
		case "Gestion":
			$model = 'model/Gestion.php';
			$view_left = 'Gestion.php';
			break;
		case "Administration":
			$view_left = 'Administration.php';
			break;
		case "ChangeMdp":
			$model = 'model/ChangeMdp.php';
			$view_left = 'ChangeMdp.php';
			break;
		case "ChangeMail":
			$model = 'model/ChangeMail.php';
			$view_left = 'ChangeMail.php';
			break;
		case "Debloquer":
			$model = 'model/Debloquer.php';
			$view_left = 'Debloquer.php';
			break;
		case "ChangeRace":
			$model = 'model/ChangeRace.php';
			$view_left = 'ChangeRace.php';
			break;
		case "Renommer":
			$model = 'model/Renommer.php';
			$view_left = 'Renommer.php';
			break;
		case "AjoutNews":
			$model = 'model/AjoutNews.php';
			$view_left = 'AjoutNews.php';
			break;
		case "ModifNews":
			$model = 'model/ModifNews.php';
			$view_left = 'ModifNews.php';
			break;
		case "SupprNews":
			$model = 'model/SupprNews.php';
			$view_left = 'SupprNews.php';
			break;
		case "AjoutObjet":
			$model = 'model/AjoutObjet.php';
			$view_left = 'AjoutObjet.php';
			break;
		case "SupprObjet":
			$model = 'model/SupprObjet.php';
			$view_left = 'SupprObjet.php';
			break;
		case "Boutique":
			$model = 'model/Boutique.php';
			$view_left = 'Boutique.php';
			break;
		case "Comptes":
			$model = 'model/Comptes.php';
			$view_left = 'Comptes.php';
			break;
		case "ComptesBan":
			$model = 'model/ComptesBan.php';
			$view_left = 'ComptesBan.php';
			break;
		case "LogServeur":
			$model = 'model/LogServeur.php';
			$view_left = 'LogServeur.php';
			break;
		case "LogErreurs":
			$model = 'model/LogErreurs.php';
			$view_left = 'LogErreurs.php';
			break;
		case "Requetes":
			$model = 'model/Requetes.php';
			$view_left = 'Requetes.php';
			break;
		case "erreur":
			$model = 'model/erreur.php';
			$view_left = 'erreur.php';
			break;
		default:
		    $model = 'model/home.php';
			$view_left = 'home.php';
			break;
	}
}
?>