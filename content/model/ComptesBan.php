<?php
if($user->sess_user)
{
	if($user->level >= ADMIN)
	{
		$auth->load_banned(true);
	}
}
?>