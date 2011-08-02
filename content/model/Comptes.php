<?php
if($user->sess_user)
{
	if($user->level >= ADMIN)
	{
		if (isset($_GET['variable1']) AND $_GET['variable1'] == 'modif')
		{
			$id = mysql_real_escape_string($_GET['variable2']);
			$account_site = $site->get_user_by_id($id);
			$account_auth = $auth->get_account_by_id($id);
			if ($account_site['last_login'] == 0)
			{
				$account_site['last_login'] = "0000-00-00 00:00:00";
			}
			else
			{
				$account_site['last_login'] = date("d-m-Y H\hi",$account_site['last_login']);
			}
			$voting_points_id = $site->get_voting_points_by_id($id);
			if (!empty($account_site))
			{
				if(isset($_POST['modif_password']))
				{
					if(!empty($_POST['password']) )
					{
						$login = mysql_real_escape_string(htmlentities($account_id['username']));
						$password = mysql_real_escape_string(htmlentities($_POST['password']));
						$result = $auth->ChangeMdp($id, $login, $password);
					}
				}
				elseif(isset($_POST['modif_mail']))
				{
					if(!empty($_POST['mail']) )
					{
						$mail = mysql_real_escape_string(htmlentities($_POST['mail']));
						$result = $auth->ChangeMail($id, $mail);
					}
				}
				elseif(isset($_POST['ajout_points']))
				{
					if(!empty($_POST['a_points']))
					{
						$a_points = mysql_real_escape_string($_POST['a_points']);
						$result = $site->AjoutPoints($id, $a_points);
					}
				}
				elseif(isset($_POST['suppr_points']))
				{
					if(!empty($_POST['s_points']))
					{
						$s_points = mysql_real_escape_string($_POST['s_points']);
						$result = $site->SupprPoints($id, $s_points);
					}
				}
				elseif(isset($_POST['change_level']))
				{
					if(!empty($_POST['niveau']))
					{
						$niveau = mysql_real_escape_string($_POST['niveau']);
						$result = $site->ChangeLevel($id, $niveau);
					}
				}
				elseif(isset($_GET['variable3']))
				{
					$guid = mysql_real_escape_string($_GET['variable3']);
					$result = $royaume->SupprPerso($guid);
				
				}
				else
				{
					$characters_by_account = $royaume->get_characters_by_account($id);
				}
			}
		}
		elseif (isset($_GET['variable1']) AND $_GET['variable1'] == 'suppr')
		{
			$id = mysql_real_escape_string($_GET['variable2']);
			$result = $site->SupprUser($id);
		}
		elseif (isset($_POST['chercher']))
		{
			if (!empty($_POST['username']))
			{
				$username = mysql_real_escape_string(htmlentities($_POST['username']));
				$account_username = $site->get_user_by_username($username);
			}
		}
		else
		{
			$site->load_users();
		}
	}
}
?>