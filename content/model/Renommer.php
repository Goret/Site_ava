<?php
if($user->sess_user)
{
	if (isset($_POST['Renommer']))
	{
		if(!empty($_POST['name']))
		{
			if ($user->array_voting_points['points'] >= $array_points['renommer'])
			{
				$name = mysql_real_escape_string(htmlentities($_POST['name']));
				$reuslt = $user->Renommer($name, $array_points['renommer']);
			}
		}
	}
}
?>