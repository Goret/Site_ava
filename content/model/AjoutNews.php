<?php
if($user->sess_user)
{
	if($user->level >= ADMIN)
	{
		if (isset($_POST['ajouter']))
		{
			$news_titre = mysql_real_escape_string(htmlentities($_POST['titre']));
			$news_message = htmlspecialchars($_POST['message']);

			if(!empty($news_titre) && !empty($news_message))
			{
				$result = $site->AjoutNews($news_titre, $news_message);
			}
		}
	}
}