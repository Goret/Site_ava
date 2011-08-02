<?php
if (isset($_GET['variable1']))
{
	$news_id = mysql_real_escape_string($_GET['variable1']);
}
else
{
	$news_id = 0;
}
$news = $site->get_news_by_id($news_id);
$site->load_comm($news['id']);
foreach($site->array_comm as $comm)
{
	$row_characters_guid[] = $royaume->get_character_guid($comm['auteur']);
}
if(isset($_POST['poster']))
{
	$commentaire_message = mysql_real_escape_string(htmlentities($_POST['message']));

	if(!empty($commentaire_message))
	{
		$result = 'good';
		$site->add_comm($news_id, $first_character['guid'], $commentaire_message);
	}
	else
	{
		$result = 'empty';
	}
}
?>