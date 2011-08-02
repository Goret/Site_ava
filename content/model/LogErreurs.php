<?php
if($user->sess_user)
{
	if($user->level >= ADMIN)
	{
		if (file_exists($array_site['log_dberrors']))
		{
			$log_dberrors = file($array_site['log_dberrors']);
			if (!empty($log_dberrors))
			{
				$total = count($log_dberrors);
			}
		}
	}
}
?>