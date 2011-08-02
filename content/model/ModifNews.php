<?php
if($user->sess_user)
{
	if($user->level >= ADMIN)
	{
		if (isset($_GET['variable1']))
		{
			$id = mysql_real_escape_string($_GET['variable1']);
			$news = $site->get_news_by_id($id);
		}
		elseif (isset($_POST['modifier']))
		{
			if (!empty($_POST['titre']) && !empty($_POST['message']))
			{
				$news_id = mysql_real_escape_string($_POST['id']);
				$news_titre = mysql_real_escape_string(htmlentities($_POST['titre']));
				$news_message = htmlspecialchars($_POST['message']);
				$site->ModifNews($news_id, $news_titre, $news_message);
			}
		}
		else
		{
			$site->load_news(0);
		}
	}
}
?>