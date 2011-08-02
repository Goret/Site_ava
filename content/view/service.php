<?php
if(!empty($user->sess_user))
{
	echo '
	<div id="service">
		<ul class="service-bar">
			<li class="service-cell service-home">
				<a href="home" tabindex="50" accesskey="1">&nbsp;</a>
			</li>
			<li class="service-cell service-welcome">
				Bienvenue, '.$user->sess_user.' | <a href="Deconnexion">déconnexion</a>
			</li>';
			if($user->level >= ADMIN)
			{
				echo '
				<li class="service-cell service-account">
					<a href="Administration" class="service-link" tabindex="50" accesskey="3">Administration</a>
				</li>';
			}
			echo '
			<li class="service-cell service-account">
				<a href="Gestion" class="service-link" tabindex="50" accesskey="3">Compte</a>
			</li>
			<li class="service-cell service-account">
				<a href="FAQ" class="service-link" tabindex="50" accesskey="3">Assistance</a>
			</li>
			<li class="service-cell service-explore">
				<a href="#explore" tabindex="50" accesskey="5" class="dropdown" id="explore-link" onclick="return false" style="cursor: progress" rel="javascript">Votez</a>
				<div class="explore-menu" id="explore-menu" style="display:none;">
					<div class="explore-primary">';

						if($passed_time == '0')
						{
							echo '<center><font color="red"><strong>Vous n\'avez pas encore voter !</strong></font></center>';
						}
						else
						{
							echo '<center><font color="red"><strong>Votre dernier vote a été effectué il y a '.$passed_time.'.</strong></font></center>';
						}
						if(!empty($array_vote))
						{
							echo "<script language='javascript'>setTimeout(window.open(\"".$array_vote."\", \"_self\", \"\"),0);</script>";
						}
						if ($check_vote == 0)
						{
							echo '
							<br />
							<center>
							<form action="home" method="post">
								<select name="site_vote" onchange="this.form.submit();">
									<option value="0"></option>';
									foreach($tab_sites as $key => $value)
									{
										if ($user->show_sites_menu($key))
										{
											echo "<option value='".$key."'>".$value[0]."</option>";
										}
									}
								echo '
								</select>
							</form>
							</center>';
						}
						elseif ($check_vote == 1)
							echo '<center><font color="red"><strong>Vous pourrez recommencer à voter dans '.$user_remaining_time.'';
						elseif ($check_vote == -1)
							echo '<center><font color="red"><strong>Vous avez atteint la limite de votes pour aujourd\'hui !</strong></font></center>';
					echo '
					</div>
				</div>
			</li>
		</ul>';
	echo '</div>';
}
else
{
	echo '
	<div id="service">
		<ul class="service-bar">
			<li class="service-cell service-home">
				<a href="home" tabindex="50" accesskey="1">&nbsp;</a>
			</li>
			<li class="service-cell service-welcome">
				<a href="Connexion">Connectez-vous</a> ou <a href="Inscription">créez un compte</a>
			</li>
			<li class="service-cell service-account">
				<a href="Gestion" class="service-link" tabindex="50" accesskey="3">Compte</a>
			</li>
			<li class="service-cell service-account">
				<a href="FAQ" class="service-link" tabindex="50" accesskey="3">Assistance</a>
			</li>
			<li class="service-cell service-explore">
				<a href="#explore" tabindex="50" accesskey="5" class="dropdown" id="explore-link" onclick="return false" style="cursor: progress" rel="javascript">Votez</a>
				<div class="explore-menu" id="explore-menu" style="display:none;">
					<div class="explore-primary">
						<center><font color="red"><strong>Vous devez être connecté pour voter !</strong></font></center>
					</div>
				</div>
			</li>
		</ul>';
	echo '</div>';
}
?>
