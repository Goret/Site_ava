<?php
/* Identifiants MySQL */
$array_db 		= array(
"host"			=> "localhost",			// Hôte MySQL
"user"			=> "root",			    	// Nom d'utilisateur MySQL
"pass"			=> "",		        	// Mot de passe de l'utilisateur MySQL
);

$array_auth 		= array(
"db_auth"			=> "tc2_auth_dev",          // Base de données d'authentification
);

/* Identifiants SOAP */
$array_soap 		= array(
"soap_user"			=> "soap",			// Utilisateur SOAP
"soap_pass"			=> "soap",			// Mot de passe Utilisateur SOAP
"soap_port"			=> "7878",			// Port SOAP
"addr"			=> "127.0.0.1",			// Hôte SOAP
);

/* Informations site */
$array_site = array(
"db_site"		=> "trinityweb",						// Base de données du site
"nom"		=> "Avalon - Serveur WoW TLK 3.3.5",				// Titre du site
"mail_support"		=> "",						// Adresse mail de l'administrateur
"forum" => "http://wow.avalonserver.org/forum/", // Adresse du forum
"armurerie" => "http://wow.avalonserver.org/armurerie/", //Adresse de l'armurerie
"lien" => "",									// Lien du site

/*rate*/
"quete"   => "X 4",	
"monstre"	   => "X 2",					
"exploration"	   => "X 2",						
"honneur"	   => "X 2",
"objet"	   => "X 2",
"argent"	   => "X 4",					

"slide1_titre"		=> " ",
"slide1_desc"		=> "",
"slide2_titre"		=> " ",
"slide2_desc"		=> "",
"slide3_titre"		=> " ",
"slide3_desc"		=> "",
"slide4_titre"		=> " ",
"slide4_desc"		=> "",
"slide5_titre"		=> " ",
"slide5_desc"		=> "",
"slide6_titre"		=> "",
"slide6_desc"		=> "",
"log_server"        => "",
"log_dberrors"        => "",
);

/* Informations royaume 1 */
$array_royaume1 = array(
"id" => 1,
"characters" => "char_core",				// Base de données characters
"world" => "tc2_world",							// Base de données world
);

/* Informations sites de vote */
$tab_sites = array(
1	=> array("Gowonda","http://www.gowonda.com/vote.php?server_id=2068"),
2	=> array("RPG Paradize","http://www.rpg-paradize.com/?page=vote&vote=15176"),
/*3	=> array("Top Wow","http://www.topwow.fr"),*/
);

$array_points = array(
"change_race" => 350,
"renommer" => 150,
);

/* Definition de quelques variables */
define('INSCRIT','1');
define('MODO','2');
define('ADMIN','3');
define('ERR_NOT_CO','Vous ne pouvez pas accéder à cette page si vous n\'êtes pas connecté');
define('ERR_NOT_LVL','Vous n\'avez pas les permissions nécéssaire pour accéder à cette page');
define('ERR_IS_CO','Vous ne pouvez pas accéder à cette page si vous êtes déjà connecté');
define('PASSWORD_LENGHT','2');
define('USER_LENGHT','3');

ini_set('session.use_only_cookies', '1');		// Utilise les cookies pour stocker les identifiants de sessions
?>
 
