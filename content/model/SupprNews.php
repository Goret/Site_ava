<?php
if($user->sess_user)
{
	if($user->level >= ADMIN)
	{
		if (isset($_GET['variable1']))
		{
			$id = mysql_real_escape_string($_GET['variable1']);
			$site->remove_news_by_id($id);
		}
		else
		{
			$site->load_news(0);
		}
	}
}
?>