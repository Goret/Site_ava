<?php
if($user->sess_user)
{
	if($user->level >= ADMIN)
	{
		if(isset($_POST['cat']))
		{
			if(!empty($_POST['pts']) AND !empty($_POST['id']) AND !empty($_POST['nom']))
			{
				$result = $site->AjoutObjet($_POST['pts'], $_POST['id'], $_POST['nom'], $_POST['cat']);
			}
		}
	}
}
?>