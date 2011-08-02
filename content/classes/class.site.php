<?php
class site {

	var $array_news;
	var $db_site;
	var $array_royaume;
	var $array_comm;
	var $array_users;
	var $array_vote;
	var $array_vote_user;
	var $categorie;
	var $array_boutique;
	var $level;

	function site($nom_site, $db_site)
	{
		global $auth;

		$this->array_news = array();
		$this->array_royaume = array();
		$this->array_users = array();
		$this->array_comm = array();
		$this->array_vote = array();
		$this->array_voting = array();
		$this->array_vote_user = array();
		$this->array_boutique = array();
		$this->db_site = $db_site;
		$this->nom_site = $nom_site;
		$this->load_vote(3);
		$this->level = array(0=> "Joueur",1=> "Modérateur",2=> "Maître de jeu",3=> "Administrateur");
		$this->categorie = array("Armes" => 1,"Armures"=> 2,"Bijoux"=> 3,"Boucliers"=> 4,"Compagnons"=> 5,"Compos"=> 6,"Monnaies"=> 7,"Héritage"=> 8,"Monture"=> 9,"Sacs"=> 10);
	}

	function load_users()
	{
		global $sql;
		/* Sélection de la base de données du site */
		$sql->selection_bd($this->db_site);
		$sql->requete("SELECT * FROM `users`",0);
		while ($val = $sql->resultat(0,"array"))
		{
			$this->array_users[] = $val;
		}
	}

	function load_news($nb)
	{
		global $sql;
		/* Sélection de la base de données du site */
		$sql->selection_bd($this->db_site);
		if ($nb > 0)
		{
			$sql->requete("SELECT * FROM `news` ORDER BY `id` DESC LIMIT $nb",0);
		}
		else
		{
			$sql->requete("SELECT * FROM `news` ORDER BY `id` DESC",0);
		}
		while ($val = $sql->resultat(0,"array"))
		{
			$this->array_news[] = $val;
		}
	}

	function get_news_by_id($id)
	{
		global $sql;
		/* Sélection de la base de données du site */
		$sql->selection_bd($this->db_site);
		$sql->requete("SELECT * FROM `news` WHERE id = $id",0);
		$val = $sql->resultat(0,"array");
		return $val;
	}

	function load_comm($id)
	{
		global $sql;
		/* Sélection de la base de données du site */
		$sql->selection_bd($this->db_site);
		$sql->requete("SELECT * FROM `commentaires` WHERE news = $id ORDER BY 'id'",0);
		while ($val = $sql->resultat(0,"array"))
		{
			$this->array_comm[] = $val;
		}
	}

	function load_vote($nb)
	{
		global $sql;
		/* Sélection de la base de données du site */
		$sql->selection_bd($this->db_site);
		if ($nb > 0)
		{
			$sql->requete("SELECT * FROM `voting_points` ORDER BY points DESC LIMIT $nb",0);
		}
		else
		{
			$sql->requete("SELECT * FROM `voting_points` ORDER BY points DESC",0);
		}
		while ($row = $sql->resultat(0,"array"))
		{
			$sql->requete("SELECT login FROM `users` WHERE id = '".$row['id']."'",1);
			$row_user = $sql->resultat(1,"array");
			$this->array_vote_user[] = $row_user['login'];
			$this->array_vote[] = $row;
		}
	}

	function load_voting()
	{
		global $sql;
		/* Sélection de la base de données du site */
		$sql->selection_bd($this->db_site);
		$sql->requete("SELECT * FROM `voting`",0);
		while ($row = $sql->resultat(0,"array"))
		{
			$this->array_voting[] = $row;
		}
	}

	function sha_password($user,$pass)
	{
		$user = strtoupper($user);
		$pass = strtoupper($pass);
		return SHA1($user.':'.$pass);
	}

	function redirect($url,$time)
	{
		echo"<meta http-equiv=\"refresh\" content=\"$time;URL=$url\">";
	}

	function connection($login, $password)
	{
		global $sql;
		global $user;
		global $auth;
		$compte = "";
		$login = strtolower($login);
		$password = $this->sha_password($login, $password);

		$sql->selection_bd($this->db_site);
		$sql->requete("SELECT id, login, password FROM users WHERE login = '".$login."'",0);
		$ligne = $sql->resultat(0,'array');
		$loginsql = $ligne['login'];
		$passsql = $ligne['password'];
		$id = $ligne['id'];
		if($login == $loginsql)
		{
			if($password == $passsql)
			{
				$ip_banned = $auth->get_banned_by_ip($user->ipaddr);
				if ($ip_banned)
				{
					$compte = 'ip_banned';
				}
				$id_banned = $auth->get_banned_by_id($id);
				if ($id_banned)
				{
					$compte = 'id_banned';
				}
				if (empty($compte))
				{
					$date = time();
					$compte = 'good';
					$user->set_id($id);
					$sql->requete("INSERT INTO user_sess values ('', '".$login."', '".$user->ipaddr."', '".$date."')",0);
					$resid = mysql_insert_id();
					$resid = $resid - 20;
					$sql->requete("DELETE FROM user_sess WHERE `id` < '$resid'",0);
					$sql->requete("UPDATE users SET last_login = '".$date."' WHERE id = '".$id."'",0);
				}
			}
			else
			{
				$compte = 'wrong_account';
			}
		}
		else
		{
			$compte = 'wrong_account';
		}
		return $compte;
	}

	function checkmdp($password)
	{
		if(strlen($password) < PASSWORD_LENGHT)
			return 'tooshort';
		else
			return 'ok';
	}

	function checkpseudo($login)
	{
		global $sql;
		$sql->selection_bd($this->db_site);
		if(strlen($login) < USER_LENGHT)
			return 'tooshort';

		$sql->requete("SELECT login FROM users",0);
		while ($ligne = $sql->resultat(0,'array'))
		{
			$loginsql = $ligne['login'];
			if($login == $loginsql)
			{
				return 'login_exist';
			}
		}
	}

	function checkmail($mail)
	{
		global $sql;
		$sql->selection_bd($this->db_site);
		// doit avoir la forme d'un mail !
		if(!preg_match("/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+[a-zA-Z]{2,4}$/", $mail))
		{
			return 'format';
		}

		$sql->requete("SELECT mail FROM users",0);
		while ($ligne = $sql->resultat(0,'array'))
		{
			$mailsql = $ligne['mail'];
			if($mail == $mailsql)
			{
				return 'email_exist';
			}
		}
	}

	function sqlDetect($string)
    {
        if (preg_match('#INSERT|SELECT|UNION|FROM|WHERE|DELETE#', $string))
        {
            return true;
        }
		return false;
    }

	function inscription($login, $password, $passwordRepeat, $email, $emailRepeat)
	{
		global $sql;
		global $user;
		global $auth;
		$pass_result = $this->checkmdp($password);
		if ($pass_result == 'tooshort')
		{
			$inscription[] = 'pass_tooshort';
		}
		// mot de passe et confirmation différent
		if ($password != $passwordRepeat)
		{
			$inscription[] = 'pass_conf';
		}

		$mail_result = $this->checkmail($email);
		// doit avoir la forme d'un mail !
		if ($mail_result == 'format')
		{
			$inscription[] = 'email_format';
		}
		elseif ($mail_result == 'email_exist')
		{
			$inscription[] = 'email_exist';
		}
		// Mail et confirmation différent
		if ($email != $emailRepeat)
		{
			$inscription[] = 'email_conf';
		}

		$pseudo_result = $this->checkpseudo($login);
		if ($pseudo_result == 'tooshort')
		{
			$inscription[] = 'login_tooshort';
		}
		elseif ($pseudo_result == 'exist')
		{
			$inscription[] = 'login_exist';
		}

		if (empty($array_inscription))
		{
			$login = strtolower($login);
			$password_crypt = $this->sha_password($login, $password);
			$login_crypt = SHA1($login);
			$date = time();
			$sql->selection_bd($auth->db_auth);
			$sql->requete("INSERT INTO account (username,sha_pass_hash,email) VALUES ('$login','$password_crypt','$email')",0);
			$resid = mysql_insert_id();
			$sql->selection_bd($this->db_site);
			$sql->requete("INSERT INTO users values ('$resid','$login','$login_crypt','$password_crypt','$email','".$user->ipaddr."',$date,'','0','".$user->ipaddr."')",0);
			$sql->requete("INSERT INTO `voting_points` (`id`) VALUES ('".$resid."')",0);
			$sql->requete("SELECT * FROM `voting` WHERE user_ip = '".$user->ipaddr."'",0);
			if ($sql->nb_resultat(0) == 0)
			{
				$sql->requete("INSERT INTO `voting` (`user_ip`) VALUES ('".$user->ipaddr."')",0);
			}
		}
		if (!empty($inscription))
		{
			return $inscription;
		}
		else
		{
			return true;
		}
	}

	function add_comm($news_id, $guid, $message)
	{
		global $sql;
		$sql->selection_bd($this->db_site);
		$sql->requete("INSERT INTO `commentaires` (`id`, `news`, `auteur`, `message`) VALUES ('', '".$news_id."', '".$guid."', '".$message."')",0);
	}

	function get_icon_by_item($row_item)
	{
		global $sql;
		$sql->selection_bd($this->db_site);
		foreach($row_item as $item)
		{
			if (!empty($item['displayid']))
			{
				$sql->requete("SELECT * FROM `armory_icons` WHERE `displayid` = '".$item['displayid']."' LIMIT 1",1);
				$row_icon[] = $sql->resultat(1,"array");
			}
			else
			{
				$row_icon[] = array();
			}
		}
		return $row_icon;
	}

	function ModifNews($news_id, $news_titre, $news_message)
	{
		global $sql;
		$sql->selection_bd($this->db_site);
		$sql->requete("UPDATE `news` SET `titre` = '".$news_titre."', `message` = '".$news_message."' WHERE `id` = '".$news_id."'",0);
	}

	function remove_news_by_id($id)
	{
		global $sql;
		$sql->selection_bd($this->db_site);
		$sql->requete("DELETE FROM `news` WHERE `id` = '".$id."'",0);
		$sql->requete("DELETE FROM `commentaires` WHERE `news` = '".$id."'",0);
	}

	function AjoutObjet($pts, $id, $nom, $cat)
	{
		global $sql;
		$sql->selection_bd($this->db_site);
		$cat = $this->categorie[$_POST['cat']];

		$sql->requete('SELECT * FROM boutique WHERE id=\''.$id.'\'',0);
		$nbr_req_ft = $sql->nb_resultat(0);

		if($nbr_req_ft != 0)
		{
			return 0;
		}
		else
		{
			$sql->requete("INSERT INTO `boutique` (`id`, `prix`, `nom`, `cat`) VALUES ('".$id."', '".$pts."', '".$nom."', '".$cat."')",0);
			return 1;
		}
	}

	function load_boutique($nb)
	{
		global $sql;
		/* Sélection de la base de données du site */
		$sql->selection_bd($this->db_site);
		if ($nb > 0)
		{
			$sql->requete("SELECT * FROM `boutique` LIMIT $nb",0);
		}
		else
		{
			$sql->requete("SELECT * FROM `boutique`",0);
		}
		while ($row = $sql->resultat(0,"array"))
		{
			$this->array_boutique[] = $row;
		}
	}

	function SupprObjet($id)
	{
		global $sql;
		/* Sélection de la base de données du site */
		$sql->selection_bd($this->db_site);
		$sql->requete("DELETE FROM `boutique` WHERE `id` = ".$id."",0);
	}

	function get_objets_by_cat($cat)
	{
		global $sql;
		$objets = array();
		/* Sélection de la base de données du site */
		$sql->selection_bd($this->db_site);
		$sql->requete("SELECT * FROM `boutique` WHERE `cat` = '".$cat."'",0);
		while ($row = $sql->resultat(0,"array"))
		{
			$objets[] = $row;
		}
		return $objets;
	}

	function get_objet_by_id($id)
	{
		global $sql;
		/* Sélection de la base de données du site */
		$sql->selection_bd($this->db_site);
		$sql->requete("SELECT * FROM boutique WHERE id = '".$id."' LIMIT 1",0);
		$row = $sql->resultat(0,"array");
		return $row;
	}

	function get_voting_by_id($id)
	{
		global $sql;
		$sql->selection_bd($this->db_site);
		$sql->requete("SELECT * FROM `voting_points` WHERE id = '".$id."'",0);
		if ($val = $sql->nb_resultat(0))
		{
			$voting = $sql->resultat(0,"array");
			return $voting;
		}
		return false;
	}

	function AjoutPoints($id, $a_points)
	{
		global $sql;
		$sql->selection_bd($this->db_site);
		$sql->requete("SELECT * FROM `voting_points` WHERE id = '".$id."'",0);
		$voting = $sql->resultat(0,"array");
		$ajout_points = ($voting['points'] + $a_points);
		$sql->requete("UPDATE `voting_points` SET `points` = '".$ajout_points."' WHERE `id` = '".$id."'",0);
		return 1;
	}

	function SupprPoints($id, $s_points)
	{
		global $sql;
		$sql->selection_bd($this->db_site);
		$sql->requete("SELECT * FROM `voting_points` WHERE id = '".$id."'",0);
		$voting = $sql->resultat(0,"array");
		$suppr_points = ($voting['points'] - $s_points);
		if ($suppr_points < 0)
		{
			$suppr_points = 0;
		}
		$sql->requete("UPDATE `voting_points` SET `points` = '".$suppr_points."' WHERE `id` = '".$id."'",0);
		return 1;
	}

	function SupprUser($id)
	{
		global $sql;
		global $auth;
		$sql->selection_bd($this->db_site);
		$sql->requete("DELETE FROM `users` WHERE `id` = '".$id."'",0);
		$result = $auth->SupprUser($id);
		return $result;
	}

	function ChangeMdp($id, $login, $password)
	{
		global $sql;
		$sql->selection_bd($site->db_site);
		$sql->requete("UPDATE `users` SET `password` = SHA1(CONCAT(UPPER('".$login."'),':',UPPER('".$password."'))) WHERE `id` = '".$id."'",0);
	}

	function ChangeMail($id, $mail)
	{
		global $sql;
		$sql->selection_bd($site->db_site);
		$sql->requete("UPDATE `users` SET `mail` = '".$mail."' WHERE `id` = '".$id."'",0);
	}

	function get_voting_points_by_id($id)
	{
		global $sql;
		$sql->selection_bd($this->db_site);
		$sql->requete("SELECT * FROM `voting_points` WHERE id = '".$id."'",0);
		$voting = $sql->resultat(0,"array");
		return $voting;
	}

	function get_user_by_id($id)
	{
		global $sql;
		$sql->selection_bd($this->db_site);
		$sql->requete("SELECT * FROM `users` WHERE id = '".$id."'",0);
		$user = $sql->resultat(0,"array");
		return $user;
	}

	function get_user_by_username($username)
	{
		global $sql;
		$sql->selection_bd($this->db_site);
		$sql->requete("SELECT * FROM `users` WHERE login = '".$username."'",0);
		$user = $sql->resultat(0,"array");
		return $user;
	}

	function ChangeLevel($id, $niveau)
	{
		global $sql;
		global $auth;
		$sql->selection_bd($this->db_site);
		$sql->requete("UPDATE users SET `niveau` = '".$niveau."' WHERE id = '".$id."'",0);
		$result = $auth->ChangeLevel($id, $niveau);
		return $result;
	}

	function AjoutNews($news_titre, $news_message)
	{
		global $sql;
		global $user;
		$sql->selection_bd($this->db_site);
		$date = date("Y-m-d H:i:s");
		$sql->requete("INSERT INTO `news` (`id`, `titre`, `message`, `auteur`, `date`) VALUES ('', '".$news_titre."', '".$news_message."', '".$user->sess_user."', '".$date."')",0);
		return 1;
	}
}
?>
