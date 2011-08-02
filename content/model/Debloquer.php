<?php
if($user->sess_user)
{
	if (isset($_POST['debloquer']))
	{
		if(!empty($_POST['name']))
		{
			$name = mysql_real_escape_string(htmlentities($_POST['name']));
			$reuslt = $user->Debloquer($name);
		}
	}
}
?>