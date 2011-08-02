<?php
if($user->sess_user)
{
	if (isset($_POST['changer']))
	{
		$password1 = mysql_real_escape_string(htmlentities($_POST['password1']));
		$password2 = mysql_real_escape_string(htmlentities($_POST['password2']));
		$password3 = mysql_real_escape_string(htmlentities($_POST['password3']));

		if(!empty($password1) && !empty($password2) && !empty($password3))
		{
			$result = $user->Change_mdp($password1, $password2, $password3);
		}
	}
}
?>