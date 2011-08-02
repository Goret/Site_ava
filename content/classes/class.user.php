<?php
class user {

	var $sess_id;
	var $sess_user;
	var $last_access;
	var $ipaddr;
	var $level;
	var $array_characters;
	var $cookie;
	var $nb_char;
	var $email;
	var $array_voting;
	var $array_voting_points;
	var $array_user;

	function user($id_sess, $cookie)
	{
		$this->ipaddr = $_SERVER['REMOTE_ADDR'];
		$this->cookie = $cookie;
		$this->array_characters = array();
		$this->array_voting = array();
		$this->array_voting_points = array();
		$this->array_user = array();
		$this->nb_char = 0;
		$this->last_access = time();
		if ($id_sess > 0)
		{
			if ($this->set_id($id_sess))
			{
				$this->load_account();
			}
		}
		else
		{
			if (!empty($_COOKIE["conection1"]) AND !empty($_COOKIE["conection2"]))
			{
				if ($this->load_cookie())
				{
					$this->load_account();
				}
			}
			else
			{
				$this->sess_id = 0;
				$this->sess_user = '';
				$this->level = '';
				$this->email = '';
			}
		}
	}

	function load_account()
	{
		global $sql;
		global $site;
		global $auth;
		/* Sélection de la base de données du site */
		$sql->selection_bd($auth->db_auth);
		$sql->requete("SELECT numchars FROM `realmcharacters` WHERE acctid = '".$this->sess_id."'",0);
		while ($val = $sql->resultat(0,"array"))
		{
			$this->nb_char = $this->nb_char + $val['numchars'];
		}

		if ($this->nb_char > 0)
		{
			$this->load_characters();
		}
		$sql->selection_bd($site->db_site);
		$sql->requete("SELECT * FROM `users` WHERE id = '".$this->sess_id."'",0);
		$this->array_user = $sql->resultat(0,"array");
		$this->sess_user = $this->array_user['login'];
		$this->level = $this->array_user['niveau'];
		$this->email = $this->array_user['mail'];
		$sql->requete("SELECT * FROM `voting` WHERE user_ip = '".$this->ipaddr."'",0);
		$val = $sql->resultat(0,"array");
		if (!$val)
		{
			$sql->requete("INSERT INTO `voting` (`user_ip`) VALUES ('".$this->ipaddr."')",0);
			$sql->requete("SELECT * FROM `voting` WHERE user_ip = '".$this->ipaddr."'",0);
			$val = $sql->resultat(0,"array");
		}
		$this->array_voting = $val;
		$sql->requete("SELECT * FROM `voting_points` WHERE id = '".$this->sess_id."'",0);
		$this->array_voting_points = $sql->resultat(0,"array");
		$sql->requete("UPDATE users SET last_ip = '".$this->ipaddr."' WHERE id = '".$this->sess_id."'",0);

		if ($this->cookie)
		{
			$p = SHA1($this->sess_user);
			SetCookie("conection1", $p, time() + 3600*48);
			SetCookie("conection2", $rmd5, time() + 3600*48);
		}
	}

	function load_characters()
	{
		global $sql;
		global $royaume;
		$i = 0;
		$sql->selection_bd($royaume->characters);
		$sql->requete("SELECT * FROM `characters` WHERE account = '".$this->sess_id."' ORDER BY name",0);
		while ($val = $sql->resultat(0,"array"))
		{
			$this->array_characters[] = $val;
		}
	}

	function set_id($id)
	{
		global $site;
		global $sql;
		$sql->selection_bd($site->db_site);
		$sql->requete("SELECT id FROM `users` WHERE id = '".$id."'",0);
		if ($sql->nb_resultat(0) == 1)
		{
			$this->sess_id = $id;
			$_SESSION['id'] = $id;
			return true;
		}
		return false;
	}

	function set_cookie()
	{
		$this->cookie = true;
	}

	function load_cookie()
	{
		global $site;
		global $sql;

		$p = $_COOKIE["conection1"];
		$rmd5 = $_COOKIE["conection2"];
		$sql->selection_bd($site->db_site);
		$sql->requete("SELECT id FROM `users` WHERE password = $p AND login_crypt = $rmd5",0);
		$val = $sql->resultat(0,"array");
		$id = $user['id'];
		if ($this->set_id($id))
		{
			$this->cookie = true;
			return true;
		}
		return false;
	}

	function show_passed_time()
	{
		if ($this->array_voting['time1'] == 0 && $this->array_voting['time2'] == 0 && $this->array_voting['time3'] == 0)
			return 0;
		else
		{
			$user_time = max($this->array_voting['time1'], $this->array_voting['time2'], $this->array_voting['time3']);
			$today = $this->last_access;
			$passed = $today - $user_time;
			$passed_seconds = $passed %60;
			$passed_minutes_in_seconds = ($passed - $passed_seconds)%3600;
			$passed_minutes = $passed_minutes_in_seconds/60;
			$passed_hours = ($passed - ($passed_seconds + $passed_minutes_in_seconds))/3600;
			$user_passed_time = $passed_hours."h ".$passed_minutes."m et ".$passed_seconds."s";
			return $user_passed_time;
		}
	}

	function vote($site_vote)
	{
		global $sql;
		global $site;
		global $tab_sites;
		$today = date("Ymd");
		if ($today <> $this->array_voting_points['date'])
		{
			$sql->selection_bd($site->db_site);
			$sql->requete("UPDATE `voting_points` SET `date`='$today' WHERE `id` = '".$this->sess_id."'",0);
			$sql->requete("UPDATE `voting` SET `site1`=0, `time1`=0, `site2`=0, `time2`=0, `site3`=0, `time3`=0  WHERE `user_ip` LIKE '".$this->ipaddr."'",0);
		}
		if(array_key_exists($site_vote, $tab_sites))
		{
			if ($site_vote == 1)
			{
				if ($this->array_voting['site1'] < 12)
				{
					if (($this->last_access - $this->array_voting['time1']) >= 7200)
					{
						$sql->selection_bd($site->db_site);
						$sql->requete("UPDATE `voting` SET `site1`=(`site1` + 1), `time1`='".$this->last_access."' WHERE `user_ip` LIKE '".$this->ipaddr."'",0);
						$sql->requete("UPDATE `voting_points` SET `points`=(`points` + 1) WHERE `id` = '".$this->sess_id."'",0);
						return $tab_sites[$site_vote][1];
					}
				}
			}
			if ($site_vote == 2)
			{
				if ($this->array_voting['site2'] < 12)
				{
					if (($this->last_access - $this->array_voting['time2']) >= 7200)
					{
						$sql->selection_bd($site->db_site);
						$sql->requete("UPDATE `voting` SET `site2`=(`site2` + 1), `time2`='".$this->last_access."' WHERE `user_ip` LIKE '".$this->ipaddr."'",0);
						$sql->requete("UPDATE `voting_points` SET `points`=(`points` + 1) WHERE `id` = '".$this->sess_id."'",0);
						return $tab_sites[$site_vote][1];
					}
				}
			}
			if ($site_vote == 3)
			{
				if ($this->array_voting['site3'] < 12)
				{
					if (($this->last_access - $this->array_voting['time3']) >= 7200)
					{
						$sql->selection_bd($site->db_site);
						$sql->requete("UPDATE `voting` SET `site3`=(`site3` + 1), `time3`='".$this->last_access."' WHERE `user_ip` LIKE '".$this->ipaddr."'",0);
						$sql->requete("UPDATE `voting_points` SET `points`=(`points` + 1) WHERE `id` = '".$this->sess_id."'",0);
						return $tab_sites[$site_vote][1];
					}
				}
			}
		}
		return 0;
	}

	function check_vote()
	{
		if ($this->array_voting['site1'] == 12 && $this->array_voting['site2'] == 12 && $this->array_voting['site3'] == 12)
			return -1;
		elseif ($this->array_voting['site1'] < 12 || $this->array_voting['site2'] < 12 || $this->array_voting['site3'] < 12)
		{
			if (($this->last_access - $this->array_voting['time1']) >= 7200 || ($this->last_access - $this->array_voting['time2']) >= 7200 || ($this->last_access - $this->array_voting['time3']) >= 7200)
				return 0;
			else
				return 1;
		}
	}

	function show_time_to_vote()
	{
		$today = $this->last_access;
		$remaining_site1 = 7200 - ($today - $this->array_voting['time1']);
		$remaining_site2 = 7200 - ($today - $this->array_voting['time2']);
		$remaining_site3 = 7200 - ($today - $this->array_voting['time3']);
		$remaining = min($remaining_site1, $remaining_site2, $remaining_site3);
		$remaining_seconds = $remaining%60;
		$remaining_minutes_in_seconds = ($remaining - $remaining_seconds)%3600;
		$remaining_minutes = $remaining_minutes_in_seconds/60;
		$remaining_hours = ($remaining - ($remaining_seconds + $remaining_minutes_in_seconds))/3600;
		$user_remaining_time = $remaining_hours."h ".$remaining_minutes."m et ".$remaining_seconds."s";
		return $user_remaining_time;
	}

	function show_sites_menu($key)
	{
		if ($key == 1)
		{
			if (($this->last_access - $this->array_voting['time1']) >= 7200)
			{
				return true;
			}
		}
		if ($key == 2)
		{
			if (($this->last_access - $this->array_voting['time2']) >= 7200)
			{
				return true;
			}
		}
		if ($key == 3)
		{
			if (($this->last_access - $this->array_voting['time3']) >= 7200)
			{
				return true;
			}
		}
		return false;
	}

	function Change_mdp($old, $new, $new_conf)
	{
		global $sql;
		global $soap;
		global $royaume;
		global $site;
		global $auth;
		$sql->selection_bd($auth->db_auth);
		$sql->requete("SELECT * FROM `account` WHERE `sha_pass_hash` = SHA1(CONCAT(UPPER('".$this->sess_user."'),':',UPPER('".$old."'))) AND `id` = '".$this->sess_id."'",0);
		if ($sql->resultat(0,"array"))
		{
			if($new == $new_conf)
			{
				if ($royaume->is_online())
				{
					$soap->fetch('.account set password '.$this->sess_id.' '.$new.'');
					$sql->selection_bd($site->db_site);
					$sql->requete("UPDATE `users` SET `password` = SHA1(CONCAT(UPPER('".$this->sess_user."'),':',UPPER('".$new."'))) WHERE `id` = '".$this->sess_id."'",0);
					return 1;
				}
				else
				{
					$sql->requete("UPDATE `account` SET `sha_pass_hash` = SHA1(CONCAT(UPPER('".$this->sess_user."'),':',UPPER('".$new."'))) WHERE `id` = '".$this->sess_id."'",0);
					$sql->selection_bd($site->db_site);
					$sql->requete("UPDATE `users` SET `password` = SHA1(CONCAT(UPPER('".$this->sess_user."'),':',UPPER('".$new."'))) WHERE `id` = '".$this->sess_id."'",0);
					return 1;
				}
			}
			else
			{
				return 0;
			}
		}
		else
		{
			return -1;
		}
	}

	function ChangeMail($old, $new, $new_conf)
	{
		global $sql;
		global $auth;
		global $site;
		$sql->selection_bd($auth->db_auth);
		if ($old == $this->email)
		{
			if($new == $new_conf)
			{
				$sql->requete("UPDATE `account` SET `email` = '".$new."' WHERE `id` = '".$this->sess_id."'",0);
				$sql->selection_bd($site->db_site);
				$sql->requete("UPDATE `users` SET `mail` = '".$new."' WHERE `id` = '".$this->sess_id."'",0);
				return 1;
			}
			else
			{
				return 0;
			}
		}
		else
		{
			return -1;
		}
	}

	function Debloquer($name)
	{
		global $sql;
		global $royaume;
		$sql->selection_bd($royaume->characters);
		$sql->requete("SELECT * FROM `characters` WHERE `name` = '".$name."' LIMIT 1",0);
		if ($val = $sql->resultat(0,"array"))
		{
			$sql->requete("SELECT * FROM `character_homebind` WHERE `guid` = '".$val['guid']."'",0);
			$map = $sql->resultat(0,"array");
			$sql->requete("UPDATE `characters` SET `map` = '".$map['mapId']."', `zone` = '".$map['zoneId']."', `position_x` = '".$map['posX']."', `position_y` = '".$map['posY']."', `position_z` = '".$map['posZ']."', `trans_x` = 0, `trans_y` = 0, `trans_z` = 0, `trans_o` = 0, `transguid` = 0  WHERE `guid` = '".$val['guid']."'",0);
			return 1;
		}
		else
			return 0;
	}

	function ChangeRace($name, $points)
	{
		global $sql;
		global $soap;
		global $royaume;
		global $site;
		$sql->selection_bd($royaume->characters);
		$sql->requete("SELECT * FROM `characters` WHERE `name` = '".$name."' LIMIT 1",0);
		if ($val = $sql->resultat(0,"array"))
		{
			$guid = $val['guid'];
			if ($royaume->is_online())
			{
				$soap->fetch('.character changerace '.$name.'');
				$sql->selection_bd($site->db_site);
				$points = ($this->array_voting_points['points'] - $points);
				mysql_query("UPDATE `voting_points` SET `points` = '".$points."' WHERE `id` = '".$this->sess_id."'");
				return 1;
			}
			else
			{
				$sql->requete("UPDATE characters SET at_login = at_login | '128' WHERE guid = '".$guid."'", 0);
				$sql->selection_bd($site->db_site);
				$points = ($this->array_voting_points['points'] - $points);
				mysql_query("UPDATE `voting_points` SET `points` = '".$points."' WHERE `id` = '".$this->sess_id."'");
			}
		}
		else
			return 0;
	}

	function Renommer($name, $points)
	{
		global $sql;
		global $soap;
		global $royaume;
		global $site;
		$sql->selection_bd($royaume->characters);
		$sql->requete("SELECT * FROM `characters` WHERE `name` = '".$name."' LIMIT 1",0);
		if ($val = $sql->resultat(0,"array"))
		{
			$guid = $val['guid'];
			if ($royaume->is_online())
			{
				$soap->fetch('.character rename '.$name.'');
				$sql->selection_bd($site->db_site);
				$points = ($this->array_voting_points['points'] - $points);
				mysql_query("UPDATE `voting_points` SET `points` = '".$points."' WHERE `id` = '".$this->sess_id."'");
				return 1;
			}
			else
			{
				$sql->requete("UPDATE characters SET at_login = at_login | '1' WHERE guid = '".$guid."'", 0);
				$sql->selection_bd($site->db_site);
				$points = ($this->array_voting_points['points'] - $points);
				mysql_query("UPDATE `voting_points` SET `points` = '".$points."' WHERE `id` = '".$this->sess_id."'");
			}
		}
		else
			return 0;
	}
}
?>
