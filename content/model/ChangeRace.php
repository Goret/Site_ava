<?php
if($user->sess_user)
{
	if (isset($_POST['Changer']))
	{
		if(!empty($_POST['name']))
		{
			if ($user->array_voting_points['points'] >= $array_points['change_race'])
			{
				$name = mysql_real_escape_string(htmlentities($_POST['name']));
				$reuslt = $user->ChangeRace($name, $array_points['change_race']);
			}
		}
	}
}
?>