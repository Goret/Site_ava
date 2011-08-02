<?php
if($user->sess_user)
{
	if($user->level >= ADMIN)
	{
		if (file_exists($array_site['log_server']))
		{
			$log_server = file($array_site['log_server']);
			if (!empty($log_server))
			{
				$total = count($log_server);
			}
		}
	}
}
?>