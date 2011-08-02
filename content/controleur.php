<?php
if (session_id() == "")
{
	session_start();
}
if (!empty($_SESSION['id']))
{
	$id_sess = $_SESSION['id'];
}
else
{
	$id_sess = 0;
}
if (!empty($_SESSION['cookie']))
{
	$cookie = $_SESSION['cookie'];
}
else
{
	$cookie = false;
}

require_once "configuration.php";									// Fichier de configuration

require_once "classes/class.mysql.php";								// Classe mysql
require_once "classes/class.user.php";   							// Classe user
require_once "classes/class.site.php";    							// Classe user
require_once "classes/class.royaume.php";    						// Classe user
require_once "classes/class.auth.php";    					   		// Classe auth
require_once "classes/class.soap.php";    					   		// Classe soap

require_once "pages.php";    					   					// Liste des pages du site

// Création de l'objet mysql
$sql = new mysql($array_db['host'], $array_db['user'], $array_db['pass']);
// Création de l'objet auth
$auth = new auth($array_auth['db_auth']);
// Création de l'objet site
$site = new site($array_site['nom'], $array_site['db_site']);
// Création de l'objet royaume
$royaume = new royaume($array_royaume1['id'], $array_royaume1['world'], $array_royaume1['characters']);
// Création de l'objet user
$user = new user($id_sess, $cookie);
// Création de l'objet soap
if ($royaume->is_online())
{
	$soap = new TCSoap(array('soap_user' => $array_soap['soap_user'], 'soap_pass' => $array_soap['soap_pass'], 'soap_port' => $array_soap['soap_port'],'addr' => $array_soap['addr']));
}
function format_post($post)
{
    return htmlentities($post, ENT_QUOTES, 'UTF-8');
}

if(count($_POST) < 100)
{
	array_map('format_post', $_POST);
}

$injection_detect = false;
foreach($_POST as $result)
{
	if ($site->sqlDetect($result))
	{
		$injection_detect = true;
	}
}
if ($injection_detect == true)
{
	$site->redirect('index.php?page=home',0);
}

require_once 'model/model_header.php';

if (!empty($model))
{
	require_once $model;													// Appel du modele de la page
}

$sql->deconnexion();														// Déconnexion de la base de données

ob_start();
require_once "view/view.php";												// Appel de la vue de la page
ob_end_flush();
?>