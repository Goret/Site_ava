<?php
if($user->sess_user)
{
	$account_auth = $auth->get_account_by_id($user->sess_id);
	if ($user->array_user['last_login'] == 0)
	{
		$last_login = "0000-00-00 00:00:00";
	}
	else
	{
		$last_login = date("d-m-Y H\hi",$user->array_user['last_login']);
	}
}
?>