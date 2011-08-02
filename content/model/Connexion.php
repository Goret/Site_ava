<?php
if(empty($user->sess_user))
{
	$compte = "";
	if (!empty($_POST['connexion']))
	{
		if(!empty($_POST['login']) AND !empty($_POST['password']))
		{
			$login = mysql_real_escape_string($_POST['login']);
			$password = mysql_real_escape_string($_POST['password']);
			$compte = $site->connection($login, $password);
			if ($compte == 'good')
			{
				if (!empty($_POST['souvenir']))
				{
					$_SESSION['cookie'] = true;
				}
			}
		}
		else
		{
			$compte = 'empty';
		}
	}
}
?>