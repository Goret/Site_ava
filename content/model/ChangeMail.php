<?php
if($user->sess_user)
{
	if (isset($_POST['changer']))
	{	
		$mail1 = mysql_real_escape_string(htmlentities($_POST['mail1']));
		$mail2 = mysql_real_escape_string(htmlentities($_POST['mail2']));
		$mail3 = mysql_real_escape_string(htmlentities($_POST['mail3']));

		if(!empty($mail1) && !empty($mail2) && !empty($mail3))
		{
			$result = $user->ChangeMail($mail1, $mail2, $mail3);
		}
	}
}
?>