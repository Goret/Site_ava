<?php
if($user->sess_user)
{
	if(!empty($_GET['variable1']) && $_GET['variable1'] == 'cat') 
	{
		$boutique_cat = $site->get_objets_by_cat($_GET['variable2']);
	}
	if (!empty($_POST['name']))
	{
		$objet = $site->get_objet_by_id($_POST['id']);
		if ($user->array_voting_points['points'] >= $objet['prix'])
		{
			$result = $royaume->AcheterObjet($objet, $_POST['name']);
		}
	}
}
?>