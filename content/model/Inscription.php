<?php
if(empty($user->sess_user))
{
	if (!empty($_POST['inscription']))
	{
		$ip_banned = false;
		$login = mysql_real_escape_string($_POST['username']);
		$password = mysql_real_escape_string($_POST['password']);
		$passwordRepeat = mysql_real_escape_string($_POST['passwordRepeat']);
		$email = mysql_real_escape_string($_POST['email']);
		$emailRepeat = mysql_real_escape_string($_POST['emailRepeat']);
		$banned = $auth->get_banned_by_ip($user->ipaddr);
		if (!$banned )
		{
			$array_inscription = $site->inscription($login, $password, $passwordRepeat, $email, $emailRepeat);
		}
		else
		{
			$ip_banned = true;
		}
	}
}
?>