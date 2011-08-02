<?php
if($user->sess_user)
{
	if($user->level >= ADMIN)
	{
		if (isset($_GET['variable1']) AND $_GET['variable1'] == 'modif')
		{
			$id = mysql_real_escape_string($_GET['variable2']);
			$requete = $royaume->get_requete_by_id($id);
			$gmmasters = $auth->get_gmmasters_by_id(1);
			if (!empty($requete))
			{
				if(!empty($_POST['Assigner']) && !empty($_POST['gmmaster']))
				{
					$gm = mysql_real_escape_string($_POST['gmmaster']);
					$result = $royaume->AssignRequete($gm, $id);
				}
				elseif(!empty($_POST['close']))
				{
					$result = $royaume->CloseRequete($id);
				}
				elseif(!empty($_POST['Desassigner']))
				{
					$result = $royaume->UnassignRequete($id);
				}
			}
		}
		elseif (isset($_GET['variable1']) AND $_GET['variable1'] == 'suppr')
		{
			$id = mysql_real_escape_string($_GET['variable2']);
			$result = $royaume->DeleteRequete($id);
		}
		else
		{
			$royaume->load_requetes(0);
		}
	}
}
?>