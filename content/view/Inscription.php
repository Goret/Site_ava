<div class="content-bot">	
	<div id="homepage">
		<div id="left">
			<?php require_once('slideshow.php'); ?>
			<?php require_once('featured-news.php'); ?>
			<div id="news-updates">
				<div class="news-article first-child">
					<h3>
						<a>Inscription</a>
					</h3>
				</div>
				<div class="news-article ">
				<?php
				if(empty($user->sess_user))
				{
					if (!empty($_POST['inscription']))
					{
						if (!$banned && $array_inscription == true)
						{
							echo '<p class="info"><br /><br /><br />Votre enregistrement &agrave; &eacute;t&eacute; effectu&eacute; avec succ&egrave;s !<br /><a href="Accueil">Retour &agrave; l\'accueil</a></p>';
						}
						elseif ($banned)
						{
							echo"
							Cette adresse IP a été pour la raison suivante : '".$banned['banreason']."'.\n\Dans ces conséquences il vous sera impossible de vous inscrire avec cette adresse IP !
							";
						}
						else
						{
							$errorMsg .= '<font color=\'#FF0000\'>';
							foreach ($array_inscription as $result)
							{
								if ($result == 'login_tooshort')
								{
									$errorMsg .= ' - Le nom d\'utilisateur choisi est trop court.<br />';
								}
								if ($result == 'login_exist')
								{
									$errorMsg .= ' - Ce nom d\'utilisateur est d&eacute;j&agrave; pris.<br />';
								}
								if ($result == 'pass_tooshort')
								{
									$errorMsg .= ' - Le mot de passe choisi est trop court.<br />';
								}
								if ($result == 'pass_conf')
								{
									$errorMsg .= ' - Les mots de passe ne sont pas identiques.<br />'; 
								}
								if ($result == 'email_format')
								{
									$errorMsg .= ' - L\'email n\'est pas correct.<br />';
								}
								if ($result == 'email_exist')
								{
									$errorMsg .= ' - L\'email est d&eacute;j&agrave; utilis&eacute;.<br />';
								}
								if ($result == 'email_conf')
								{
									$errorMsg .= ' - Les emails ne sont pas identiques.<br />';
								}
							}
							$errorMsg .= '</font>';
							echo '<p class="info">Des erreurs ont &eacute;t&eacute; trouv&eacute;e durant l\'enregistrement :<br /><br />',$errorMsg,'<br /><a href="index.php?page=Inscription">R&eacute;essayer</a></p>';
						}
					}
					else
					{
						echo '
						<form action="" method="post">
						<table width="430" border="0" cellspacing="0" cellpadding="2" align="center">
						<tr>
							<p style="text-align: left;">Pour vous inscrire et nous rejoindre sur notre serveur de jeu, il vous suffit simplement de remplir les champs ci-dessous !<br />Les identifiants que vous choisirez lors de votre inscription seront ceux que vous utiliserez pour vous connecter &agrave; notre serveur une fois votre jeu lanc&eacute; !</p>    
						</tr>
						<tr>
							<td align="right" class="TextSmall"><br />Nom de compte :&nbsp;</td>
							<td><br /><input name="username" type="text" size="25" maxlength="60" id="txtNomCompte" value="" autocomplete="off" /></td>
						</tr>
						<tr>
							<td align="right" class="TextSmall"><br />Adresse e-mail :&nbsp;</td>
							<td><br /><input name="email" type="text" size="25" maxlength="60" id="txtEmail" value="" autocomplete="off" /></td>
						</tr>
						<tr>
							<td align="right" class="TextSmall"><br />Validation de l\'adresse e-mail :&nbsp;</td>
							<td><br /><input name="emailRepeat" type="text" size="25" maxlength="60" id="txtEmail" value="" autocomplete="off" /></td>
						</tr>
						<tr>
							<td align="right" class="TextSmall"><br />Mot de passe :&nbsp;</td>
							<td><br /><input name="password" type="password" size="25" maxlength="60" id="txtPass" value="" autocomplete="off" /></td>
						</tr>
						<tr>
							<td align="right" class="TextSmall"><br />Validation du mot de passe :&nbsp;</td>
							<td><br /><input name="passwordRepeat" type="password" size="25" maxlength="60" id="txtValPass" value="" autocomplete="off"/></td>
						</tr>
						<tr>
							<td colspan="2" align="right">
							<br />
							<input type="submit" name="inscription" id="inscription" value="Créer le compte" /></td>
						</tr>
						</table>
						</form>';
					}
				}
				else
				{
					$site->redirect('home',0);
				}
				?>
				</div>	
			</div>
		</div>
		<?php require_once('right.php'); ?>
	</div>
</div>