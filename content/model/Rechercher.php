<?php
if (isset($_POST['rechercher']))
{
	if (!empty($_POST['name']))
	{
		$name = mysql_real_escape_string(htmlentities($_POST['name']));
		$row_characters_name = $royaume->get_character_name($name);
		$row_guild_guildid = $royaume->get_guild_by_guid($row_characters_name['guid']);
	}
}