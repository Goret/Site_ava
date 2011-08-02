<?php
$site->load_news(5);
foreach($site->array_news as $news)
{
	$site->load_comm($news['id']);
}
?>