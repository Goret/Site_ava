<?php
if(!empty($user->sess_user))
{
	$_SESSION = array();
	if ($user->cookie)
	{
		setcookie("conection1", "", time() - 3600);
		setcookie("conection2", "", time() - 3600);
	}
	session_destroy();
}
?>
