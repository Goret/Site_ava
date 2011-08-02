<?php
$guid = mysql_real_escape_string($_GET['variable1']);
if ($guid > 0)
{
	$row_characters_guid = $royaume->get_character_guid($guid);

	if(!empty($row_characters_guid))
	{
		$row_guild_guildid = $royaume->get_guild_by_guid($guid);
		$row_item = $royaume->get_itemcharacter_by_guid($guid);
		$row_stats = $royaume->get_statscharacter_by_guid($guid);
		$row_icon = $site->get_icon_by_item($row_item);
	}
}
?>
