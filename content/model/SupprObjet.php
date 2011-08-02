<?php
if($user->sess_user)
{
	if($user->level >= ADMIN)
	{
		if (isset($_GET['variable1']))
		{
			$id = mysql_real_escape_string($_GET['id']);
			$site->SupprObjet($id);
		}
		else
		{
			$site->load_boutique(0);
		}
	}
}
?>