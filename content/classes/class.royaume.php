<?php
class royaume {

	var $faction;
	var $race;
	var $class;
	var $world;
	var $characters;
	var $array_realmlist;
	var $uptime;
	var $nb_horde;
	var $nb_alliance;
	var $array_online;
	var $top_HF;
	var $top_victoire;
	var $top_honor;
	var $top_arena;
	var $nb_alliance_online;
	var $nb_horde_online;
	var $humain;
	var $nain;
	var $elfe_nuit;
	var $gnome;
	var $draenei;
	var $orc;
	var $mort_vivant;
	var $tauren;
	var $troll;
	var $elfe_sang;
	var $guerrier;
	var $paladin;
	var $chasseur;
	var $voleur;
	var $pretre;
	var $chaman;
	var $mage;
	var $demoniste;
	var $druide;
	var $array_requete;

	function royaume($id, $world, $characters)
	{
		global $sql;
		global $site;
		global $auth;
		$this->world = $world;
		$this->array_players = array();
		$this->array_online = array();
		$this->top_HF = array();
		$this->top_victoire = array();
		$this->top_honor = array();
		$this->top_arena = array();
		$this->array_realmlist = array();
		$this->array_requete = array();
		$this->uptime = 0;
		$this->nb_horde = 0;
		$this->nb_alliance = 0;
		$this->nb_alliance_online = 0;
		$this->nb_horde_online = 0;
		$this->humain = 0;
		$this->nain = 0;
		$this->elfe_nuit = 0;
		$this->gnome = 0;
		$this->draenei = 0;
		$this->orc = 0;
		$this->mort_vivant = 0;
		$this->tauren = 0;
		$this->troll = 0;
		$this->elfe_sang = 0;
		$this->guerrier = 0;
		$this->paladin = 0;
		$this->chasseur = 0;
		$this->voleur = 0;
		$this->pretre = 0;
		$this->chevalier_mort = 0;
		$this->chaman = 0;
		$this->mage = 0;
		$this->demoniste = 0;
		$this->druide = 0;
		$this->characters = $characters;
		$sql->selection_bd($auth->db_auth);
		$sql->requete("SELECT * FROM `realmlist` WHERE `id` = '".$id."'",0);
		$this->array_realmlist = $sql->resultat(0,"array");
		$this->faction = array(1=> "alliance",2=> "horde",3=> "alliance",4=> "alliance",5=> "horde",6=> "horde",7=> "alliance",8=> "horde",10=> "horde",11=> "alliance");
		$this->race = array(1=> "Humain",2=> "Orc",3=> "Nain",4=> "Elfe de la nuit",5=> "Mort-vivant",6=> "Tauren",7=> "Gnome",8=> "Troll",10=> "Elfe de sang",11=> "Draenei");
		$this->class = array(1=> "Guerrier",2=> "Paladin",3=> "Chasseur",4=> "Voleur",5=>" Prêtre",6=> "Chevalier de la mort",7=> "Chaman",8=> "Mage",9=> "Démoniste",11=> "Druide");
		if ($this->is_online())
		{
			$this->load_uptime();
			$this->load_players_online(0);
		}
	}

	function load_uptime()
	{
		global $sql;
		global $auth;
		$sql->selection_bd($auth->db_auth);
		$sql->requete("SELECT * FROM `uptime` WHERE `realmid` = '1' ORDER BY `starttime` DESC LIMIT 1",0);
		$row_uptime = $sql->resultat(0,"array");
		$day = floor($row_uptime['uptime'] / 86400);
		if($day > 0)
			$days = $day.'Jours';
		else
			$days = '';
		$hours = floor(($row_uptime['uptime'] - ($day * 86400)) / 3600);
		if($hours < 10)
			$hours = '0'.$hours;
		$min = floor(($row_uptime['uptime'] - (($hours * 3600) + ($day * 86400))) / 60);
		if ($min < 10)
			$min = "0".$min;
		$sec = $row_uptime['uptime'] - ($day * 86400) - ($hours * 3600) - ($min * 60);
		if ($sec < 10)
			$sec = "0".$sec;
		$totaltime = ''.$days.$hours.'h '.$min.'m et '.$sec.'s';
		$this->uptime = $totaltime;
	}

	function is_online()
	{
		$online = false;
		$sock = @fsockopen($this->array_realmlist['address'], $this->array_realmlist['port'], $num, $error, 1);
		if ($sock)
		{
			$online = true;
		}
		if (!empty($sock))
		{
			fclose($sock);
		}
		return $online;
	}

	function load_players($nb, $stat)
	{
		global $sql;
		$sql->selection_bd($this->characters);
		if ($nb > 0)
		{
			$sql->requete("SELECT race, class, guid, gender, level, name FROM `characters` ORDER BY `name` ASC LIMIT $nb",0);
		}
		else
		{
			$sql->requete("SELECT race, class, guid, gender, level, name FROM `characters` ORDER BY `name` ASC",0);
		}
		while ($player = $sql->resultat(0,"array"))
		{
			$this->array_players[] = $player;
			if ($stat)
			{
				if ($this->faction[$player['race']] == 'Alliance')
				{

					$this->nb_alliance = $this->nb_alliance + 1;
					if ($this->race[$player['race']] == 'Humain')
					{
						$this->humain = $this->humain + 1;
					}
					if ($this->race[$player['race']] == 'Nain')
					{
						$this->nain = $this->nain + 1;
					}
					if ($this->race[$player['race']] == 'Elfe de la nuit')
					{
						$this->elfe_nuit = $this->elfe_nuit + 1;
					}
					if ($this->race[$player['race']] == 'Gnome')
					{
						$this->gnome = $this->gnome + 1;
					}
					if ($this->race[$player['race']] == 'Draenei')
					{
						$this->draenei = $this->draenei + 1;
					}
				}
				if ($this->faction[$player['race']] == 'Horde')
				{
					$this->nb_horde = $this->nb_horde + 1;
					if ($this->race[$player['race']] == 'Orc')
					{
						$this->orc = $this->orc + 1;
					}
					if ($this->race[$player['race']] == 'Mort-vivant')
					{
						$this->mort_vivant = $this->mort_vivant + 1;
					}
					if ($this->race[$player['race']] == 'Tauren')
					{
						$this->tauren = $this->tauren + 1;
					}
					if ($this->race[$player['race']] == 'Troll')
					{
						$this->troll = $this->troll + 1;
					}
					if ($this->race[$player['race']] == 'Elfe de sang')
					{
						$this->elfe_sang = $this->elfe_sang + 1;
					}
				}
				if ($this->class[$player['class']] == 'Guerrier')
				{
					$this->guerrier = $this->guerrier + 1;
				}
				if ($this->class[$player['class']] == 'Paladin')
				{
					$this->paladin = $this->paladin + 1;
				}
				if ($this->class[$player['class']] == 'Chasseur')
				{
					$this->chasseur = $this->chasseur + 1;
				}
				if ($this->class[$player['class']] == 'Voleur')
				{
					$this->voleur = $this->voleur + 1;
				}
				if ($this->class[$player['class']] == 'Prêtre')
				{
					$this->pretre = $this->pretre + 1;
				}
				if ($this->class[$player['class']] == 'Chevalier de la mort')
				{
					$this->chevalier_mort = $this->chevalier_mort + 1;
				}
				if ($this->class[$player['class']] == 'Chaman')
				{
					$this->chaman = $this->chaman + 1;
				}
				if ($this->class[$player['class']] == 'Mage')
				{
					$this->mage = $this->mage + 1;
				}
				if ($this->class[$player['class']] == 'Démoniste')
				{
					$this->demoniste = $this->demoniste + 1;
				}
				if ($this->class[$player['class']] == 'Druide')
				{
					$this->druide = $this->druide + 1;
				}
			}
		}
	}

	function load_players_online($nb)
	{
		global $sql;
		$sql->selection_bd($this->characters);
		if ($nb > 0)
		{
			$sql->requete("SELECT race, class, guid, gender, level, name, zone FROM `characters` WHERE online = 1 ORDER BY `name` ASC LIMIT $nb",0);
		}
		else
		{
			$sql->requete("SELECT race, class, guid, gender, level, name, zone FROM `characters` WHERE online = 1 ORDER BY `name` ASC",0);
		}
		while ($player = $sql->resultat(0,"array"))
		{
			$this->array_online[] = $player;
			if ($this->faction[$player['race']] == 'Alliance')
			{
				$this->nb_alliance_online = $this->nb_alliance + 1;
			}
			if ($this->faction[$player['race']] == 'Horde')
			{
				$this->nb_horde_online = $this->nb_horde + 1;
			}
		}														
	}

	function load_top_HF()
	{
		global $sql;
		$sql->selection_bd($this->characters);
		$sql->requete("SELECT characters.name, characters.class, characters.race, characters.gender, characters.level, sum(points) as pointsHF FROM  character_achievement, characters, armory.armory_achievement where character_achievement.guid = characters.guid and achievement = armory.armory_achievement.id group by character_achievement.guid order by sum(points) desc limit 10",0);
		while ($player = $sql->resultat(0,"array"))
		{
			$this->top_HF[] = $player;
		}
	}
	
	function load_top_victoire()
	{
		global $sql;
		$sql->selection_bd($this->characters);
		$sql->requete("SELECT * FROM `characters` ORDER BY `totalKills` DESC LIMIT 5",0);
		while ($player = $sql->resultat(0,"array"))
		{
			$this->top_victoire[] = $player;
		}
	}

	function load_top_honor()
	{
		global $sql;
		$sql->selection_bd($this->characters);
		$sql->requete("SELECT * FROM `characters` ORDER BY `totalHonorPoints` DESC LIMIT 5",0);
		while ($player = $sql->resultat(0,"array"))
		{
			$this->top_honor[] = $player;
		}
	}

	function load_top_arena()
	{
		global $sql;
		$sql->selection_bd($this->characters);
		$sql->requete("SELECT * FROM `characters` ORDER BY `arenaPoints` DESC LIMIT 5",0);
		while ($player = $sql->resultat(0,"array"))
		{
			$this->top_arena[] = $player;
		}
	}

	function get_character_guid($guid)
	{
		global $sql;
		$sql->selection_bd($this->characters);
		$sql->requete("SELECT * FROM `characters` WHERE `guid` = '".$guid."'",0);
		return $sql->resultat(0,"array");
	}

	function get_character_name($name)
	{
		global $sql;
		$sql->selection_bd($this->characters);
		$sql->requete("SELECT * FROM `characters` WHERE `name` = '".$name."'",0);
		return $sql->resultat(0,"array");
	}

	function get_guild_by_guid($guid)
	{
		global $sql;
		$sql->selection_bd($this->characters);
		$sql->requete("SELECT * FROM `guild_member` WHERE `guid` = '".$guid."'",0);
		$member = $sql->resultat(0,"array");
		$guildid = $member['guildid'];
		$sql->requete("SELECT * FROM `guild` WHERE `guildid` = '".$guildid."'",0);
		return $sql->resultat(0,"array");
	}

	function get_itemcharacter_by_guid($guid)
	{
		global $sql;
		for ($i = 0; $i < 19; $i++)
		{
			$row_item[$i] = array();
			$sql->selection_bd($this->characters);
			$sql->requete("SELECT item FROM `character_inventory` WHERE `slot` = '".$i."' AND `bag` = '0' AND `guid` = '".$guid."' LIMIT 1",0);
			$slot = $sql->resultat(0,"array");
			if ($slot)
			{
				$sql->requete("SELECT * FROM `item_instance` WHERE `guid` = '".$slot['item']."' LIMIT 1",1);
				$row_item[$i] = $sql->resultat(1,"array");
				$sql->selection_bd($this->world);
				$sql->requete("SELECT * FROM `item_template` WHERE `entry` = '".$row_item[$i]['itemEntry']."' LIMIT 1",1);
				$result = $sql->resultat(1,"array");
				$row_item[$i]['Quality'] = 0;
				$row_item[$i]['displayid'] = 0;
				$row_item[$i]['Quality'] = $result['Quality'];
				$row_item[$i]['displayid'] = $result['displayid'];
				
			}
		}
		return $row_item;
	}

	function AcheterObjet($objet, $name)
	{
		global $sql;
		global $site;
		global $user;
		global $soap;
		$sql->selection_bd($site->db_site);
		$points = $user->array_voting_points['points'] - $objet['prix'];
		$sql->requete("UPDATE `voting_points` SET `points` = '".$points."' WHERE `id` = '".$user->sess_id."'",0);
		if ($this->is_online())
		{
			$soap->fetch('.send items '.$name.' "Commande boutique" "Voici les objets commandes. Bon jeu sur '.$site->nom_site.' !" '.$objet['id'].'');
			return 1;
		}
		else
		{
			$sql->selection_bd($this->characters);
			$sql->requete("SELECT * FROM `characters` WHERE `name` = '".$name."'",0);
			$row_characters_name = $sql->resultat(0,"array");
			$sql->requete("SELECT MAX(id) FROM mail",0);
			$row_mail = $sql->resultat(0,"row");

			$nb_mail = ($row_mail[0] + 1);
			$sender = $row_characters_name['guid'];
			$receiver = $row_characters_name['guid'];
			$item_template = $objet['id'];
			$nombre = 1;
			$dateExpiration = time() + (30 * DAY);
			$date = time();

			do
			{
				$unique = false;
				$item_guid = rand(1, 600000);
				$sql->requete("SELECT guid FROM item_instance WHERE guid = '".$item_guid."'",0);

				if($sql->nb_resultat(0) == 0)
				{
					$unique = true;
				}
			} while ($unique == false);

			$sql->requete("INSERT INTO characters.item_instance (guid,itemEntry,owner_guid,count, charges, enchantments,`text`) VALUES ('".$item_guid."','".$item_template."','".$receiver."','".$nombre."', '0 0 0 0 0 ', '0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 ', '')",0);

			$sql->requete("INSERT INTO characters.mail (id,messageType,stationery,mailTemplateId,sender,receiver,subject,body,has_items,expire_time,deliver_time,money,cod,checked) VALUES('".$nb_mail."','0','41','0','".$sender."','".$receiver."','Commande boutique','Voici les objets commandés. Bon jeu sur Infinity Chaos !','1','".$dateExpiration."','".$date."','0','0','16')",0);

			$sql->requete("INSERT INTO characters.mail_items (mail_id,item_guid,receiver) VALUES ('".$nb_mail."','".$item_guid."','".$receiver."')",0);
			return 1;
		}
	}

	function SupprPerso($guid)
	{
		global $sql;
		$sql->selection_bd($this->characters);
		$sql->requete("SELECT * FROM `characters` WHERE `guid` = '".$guid."' LIMIT 1",0);
		
		if($sql->nb_resultat(0) > 0)
		{
			$perso = $sql->resultat(0,"array");
			if ($this->is_online())
			{
				$soap->fetch('.character erase '.$perso['name'].'');
				return 1;
			}
			else
			{
				mysql_query("DELETE FROM `characters` WHERE `guid` = '".$guid."'");
				return 1;
			}
		}
		else
		{
			return 0;
		}
	}

	function load_requetes($nb)
	{
		global $sql;
		$sql->selection_bd($this->characters);
		if ($nb > 0)
		{
			$sql->requete("SELECT * FROM `gm_tickets` LIMIT $nb",0);
		}
		else
		{
			$sql->requete("SELECT * FROM `gm_tickets`",0);
		}
		while ($requete = $sql->resultat(0,"array"))
		{
			$this->array_requete[] = $requete;
		}
	}

	function get_requete_by_id($id)
	{
		global $sql;
		$sql->selection_bd($this->characters);
		$sql->requete("SELECT * FROM `gm_tickets` WHERE `ticketId` = '".$id."'",0);
		if ($val = $sql->nb_resultat(0))
		{
			$requete = $sql->resultat(0,"array");
			return $requete;
		}
		else
			return false;
	}

	function get_characters_by_account($account)
	{
		global $sql;
		$sql->selection_bd($this->characters);
		$array_characters = array();
		$sql->requete("SELECT * FROM `characters` WHERE `account` = '".$account."'",0);
		while ($val = $sql->resultat(0,"array"))
		{
			$array_characters[] = $val;
		}
		return $array_characters;
	}

	function AssignRequete($gm, $id)
	{
		global $sql;
		global $auth;
		global $soap;
		$sql->selection_bd($this->characters);
		$sql->requete("SELECT * FROM `gm_tickets` WHERE `ticketId` = '".$id."' LIMIT 1",0);
		if($sql->nb_resultat(0) > 0)
		{
			if ($this->is_online())
			{
				$sql->selection_bd($auth->db_auth);
				$sql->requete("SELECT * FROM `account` WHERE `id` = '".$gm."' LIMIT 1",0);
				$val = $sql->resultat(0,"array");
				$soap->fetch('.ticket assign '.$id.' '.$val['username'].'');
				return 1;
			}
			else
			{
				$sql->requete("UPDATE `gm_tickets` SET `assignedTo` = '".$gm."' WHERE `ticketId` = '".$id."'",0);
				return 1;
			}
		}
		else
		{
			return 0;
		}
	}

	function UnassignRequete($id)
	{
		global $sql;
		global $soap;
		$sql->selection_bd($this->characters);
		$sql->requete("SELECT * FROM `gm_tickets` WHERE `ticketId` = '".$id."' LIMIT 1",0);
		if($sql->nb_resultat(0) > 0)
		{
			if ($this->is_online())
			{
				$soap->fetch('.ticket unassign '.$id.'');
				return 1;
			}
			else
			{
				$sql->requete("UPDATE `gm_tickets` SET `assignedTo` = 0 WHERE `ticketId` = '".$id."'",0);
				return 1;
			}
		}
		else
		{
			return 0;
		}
	}

	function CloseRequete($id)
	{
		global $sql;
		global $soap;
		global $user;
		$sql->selection_bd($this->characters);
		$sql->requete("SELECT * FROM `gm_tickets` WHERE `ticketId` = '".$id."' AND `closedBy` = 0 LIMIT 1",0);
		if($sql->nb_resultat(0) > 0)
		{
			if ($this->is_online())
			{
				$soap->fetch('.ticket close '.$id.'');
				return 1;
			}
			else
			{
				$sql->requete("UPDATE `gm_tickets` SET `closedBy` = -1 WHERE `ticketId` = '".$id."'",0);
				return 1;
			}
		}
		else
		{
			return 0;
		}
	}

	function DeleteRequete($id)
	{
		global $sql;
		global $soap;
		global $user;
		$sql->selection_bd($this->characters);
		$sql->requete("SELECT * FROM `gm_tickets` WHERE `ticketId` = '".$id."' AND `closedBy` != 0 LIMIT 1",0);
		if($sql->nb_resultat(0) > 0)
		{
			if ($this->is_online())
			{
				$soap->fetch('.ticket delete '.$id.'');
				return 1;
			}
			else
			{
				$sql->requete("DELETE FROM `gm_tickets` WHERE `ticketId` = '".$id."'",0);
				return 1;
			}
		}
		else
		{
			return 0;
		}
	}

	function get_statscharacter_by_guid($guid)
	{
		global $sql;
		$row_stats = array();
		$sql->selection_bd($this->characters);
		$sql->requete("SELECT * FROM `character_stats` WHERE `guid` = '".$guid."' LIMIT 1",0);
		$row_stats = $sql->resultat(0,"array");
		return $row_stats;
	}
}
?>
