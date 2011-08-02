<?php
class auth {

	var $db_auth;
	var $nb_account;
	var $array_banned;
	var $array_ip_banned;
	var $array_account_access;
	var $expansion;
	var $array_account;

	function auth($db_auth)
	{
		$this->nb_account = 0;
		$this->array_banned = array();
		$this->array_ip_banned = array();
		$this->array_account_access = array();
		$this->array_account = array();
		$this->db_auth = $db_auth;
		$this->expansion = array(0=> "Classique",1=> "The Burning Crusade",2=> "Wrath of the Lich King",3=> "Cataclysm");
	}

	function load_auth()
	{
		global $sql;
		$sql->selection_bd($this->db_auth);
		$sql->requete("SELECT * FROM `account`",0);
		$this->nb_account = $sql->nb_resultat(0);
		while ($val = $sql->resultat(0,"array"))
		{
			$sql->requete("SELECT * FROM `account_access` WHERE id = '".$val['id']."' AND realmID = 1",1);
			$access = $sql->resultat(1,"array");
			if (empty($access['gmlevel']))
			{
				$val['gmlevel'] = 0;
			}
			else
			{
				$val['gmlevel'] = $access['gmlevel'];
			}
			$this->array_account[] = $val;
		}
	}

	function load_banned($view)
	{
		global $sql;
		$sql->selection_bd($this->db_auth);
		$sql->requete("SELECT * FROM `account_banned` WHERE active = 1",0);
		while ($val = $sql->resultat(0,"array"))
		{
			if (!$view)
			{
				$this->array_banned[] = $val;
			}
			else
			{
				$sql->requete("SELECT * FROM `account` WHERE `id` = '".$val['id']."' LIMIT 1",1);
				$user = $sql->resultat(1,"array");
				$val['name'] = $user['username'];
				$val['bandate'] = date("H:i:s d.m.Y", $val['bandate']);
				$val['unbandate'] = date("H:i:s d.m.Y", $val['unbandate']);
				$this->array_banned[] = $val;
			}
		}
	}

	function load_ip_banned()
	{
		global $sql;
		$sql->selection_bd($this->db_auth);
		$sql->requete("SELECT * FROM `ip_banned`",0);
		while ($val = $sql->resultat(0,"array"))
		{
			$this->array_ip_banned[] = $val;
		}
	}

	function load_account_access()
	{
		global $sql;
		$sql->selection_bd($this->db_auth);
		$sql->requete("SELECT * FROM `account_access`",0);
		while ($val = $sql->resultat(0,"array"))
		{
			$this->array_account_access[] = $val;
		}
	}

	function get_banned_by_id($id)
	{
		global $sql;
		$sql->selection_bd($this->db_auth);
		$sql->requete("SELECT * FROM `account_banned` WHERE id = '".$id."'",0);
		if ($val = $sql->nb_resultat(0))
		{
			$banned = $sql->resultat(0,"array");
			return $banned;
		}
		return false;
	}

	function get_banned_by_ip($ip)
	{
		global $sql;
		$sql->selection_bd($this->db_auth);
		$sql->requete("SELECT * FROM `ip_banned` WHERE ip = '".$ip."'",0);
		if ($val = $sql->nb_resultat(0))
		{
			$banned = $sql->resultat(0,"array");
			return $banned;
		}
		return false;
	}

	function get_account_by_id($id)
	{
		global $sql;
		$sql->selection_bd($this->db_auth);
		$sql->requete("SELECT * FROM `account` WHERE id = '".$id."'",0);
		if ($val = $sql->nb_resultat(0))
		{
			$account = $sql->resultat(0,"array");
			return $account;
		}
		else
			return false;
	}

	
	function ChangeMdp($id, $login, $password)
	{
		global $sql;
		global $soap;
		global $royaume;
		global $site;
		$site->ChangeMdp($id, $login, $password);
		if ($royaume->is_online())
		{
			$soap->fetch('.account set password '.$id.' '.$password.'');
			return 1;
		}
		else
		{
			$sql->selection_bd($this->db_auth);
			$sql->requete("UPDATE `account` SET `sha_pass_hash` = SHA1(CONCAT(UPPER('".$login."'),':',UPPER('".$password."'))) WHERE `id` = '".$id."'",0);
			return 1;
		}
	}

	function ChangeMail($id, $mail)
	{
		global $sql;
		global $site;
		$site->ChangeMail($id, $mail);
		$sql->selection_bd($this->db_auth);
		$sql->requete("UPDATE `account` SET `email` = '".$mail."' WHERE `id` = '".$id."'",0);
		return 1;
	}

	function SupprUser($id)
	{
		global $sql;
		global $royaume;
		global $soap;
		if ($royaume->is_online())
		{
			$soap->fetch('.account delete '.$id.'');
			return 1;
		}
		else
		{
			$sql->selection_bd($this->db_auth);
			$sql->requete("DELETE FROM `account` WHERE `id` = '".$id."'",0);
			return 1;
		}
		return false;
	}

	function get_account_by_username($username)
	{
		global $sql;
		$sql->selection_bd($this->db_auth);
		$sql->requete("SELECT * FROM `account` WHERE username = '".$username."'",0);
		while ($val = $sql->resultat(0,"array"))
		{
			$account_username[] = $val;
		}
		return $account_username;
	}

	function get_gmmasters_by_id($royaume)
	{
		global $sql;
		$array_gmmaster = array();
		$sql->selection_bd($this->db_auth);
		$sql->requete("SELECT * FROM `account_access` WHERE RealmID = '".$royaume."'",0);
		while ($val = $sql->resultat(0,"array"))
		{
			$sql->requete("SELECT username FROM `account` WHERE id = '".$val['id']."'",1);
			$gmamster = $sql->resultat(1,"array");
			$val['username'] = $gmamster['username'];
			$array_gmmaster[] = $val;
		}
		return $array_gmmaster;
	}

	function ChangeLevel($id, $niveau)
	{
		global $sql;
		global $royaume;
		global $soap;
		$sql->selection_bd($this->db_auth);
		if ($royaume->is_online())
		{
			
			$sql->requete("SELECT username FROM `account` WHERE id = '".$id."'",0);
			$val = $sql->resultat(0,"array");
			$soap->fetch('.account set gmlevel '.$val['username'].' '.$niveau.' 1');
			return 1;
		}
		else
		{
			$sql->requete("SELECT * FROM `account_access` WHERE id = '".$id."' AND RealmID = 1",0);
			if ($sql->nb_resultat(0) > 0)
			{
				$sql->requete("UPDATE account_access SET `niveau` = '".$niveau."' WHERE id = '".$id."' AND RealmID = 1",0);
			}
			else
			{
				$sql->requete("INSERT INTO account_access values ('".$id."', '".$niveau."', '1')",0);
			}
			return 1;
		}
		return false;
	}
}
?>
