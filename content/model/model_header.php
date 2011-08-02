<?php
// right
$top = array(0=> "1",1=> "2",2=> "3");
if(!empty($user->sess_user))
{
	// user-plate
	if (!empty($user->nb_char))
	{
		$first_character = $user->array_characters[0];

		$pinned = array(0=> "pinned",1=> "",2=> "",3 => "",4=> "");
	}

	// service
	$passed_time = $user->show_passed_time();
	$check_vote = $user->check_vote();
	if ($check_vote == 1)
	{
		$user_remaining_time = $user->show_time_to_vote();
	}
	if(!empty($_POST['site_vote']))
	{
		$array_vote = $user->vote(intval($_POST['site_vote']));
	}
}
?>
