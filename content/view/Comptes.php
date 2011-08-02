<div class="content-bot">	
	<div id="homepage">
		<div id="left">
			<?php require_once('slideshow.php'); ?>
			<?php require_once('featured-news.php'); ?>
			<?php
			if($user->sess_user)
			{
				if($user->level >= ADMIN)
				{
					?>
					<div id="news-updates">
						<div class="news-article first-child">
							<h3>
								<a>Liste des comptes</a>
							</h3>
						</div>
						<?php
						if (isset($_GET['variable1']) AND $_GET['variable1'] == 'modif')
						{
							echo '
							<div class="news-article">	
								<form action="Comptes" method="post">
									<div id="search-again">
										Chercher un compte - <a href="Comptes">Retour à la liste complète des comptes</a>
										<div class="search-input">
											<div align="center">
												<input id="search-again-field" type="text" name="username" value=""/>
												<button class="ui-button button1" type="submit" name="chercher">
													<span>
														<span>Chercher</span>
													</span>
												</button>
											</div>
										</div>
									</div>
								</form>
							</div>';
							if (!empty($account_site))
							{
								if(isset($_POST['modif_password']))
								{
									if(!empty($_POST['password']) )
									{
										if ($result == 1)
										{
											echo '
											<script language="javascript"> 
												alert("Mot de passe changé avec succès !");
												document.location.href="Comptes-modif-'.$id.'" 
											</script>';
										}
									}
								}
								elseif(isset($_POST['modif_mail']))
								{
									if(!empty($_POST['mail']) )
									{
										if ($result == 1)
										{
											echo '
											<script language="javascript"> 
												alert("Adresse mail changée avec succès !");
												document.location.href="Comptes-modif-'.$id.'" 
											</script>';
										}
									}
								}
								elseif(isset($_POST['ajout_points']))
								{
									if(!empty($_POST['a_points']))
									{
										if ($result == 1)
										{
											echo '
											<script language="javascript"> 
												alert("Points ajoutés avec succès !");
												document.location.href="Comptes-modif-'.$id.'" 
											</script>';
										}
									}
								}
								elseif(isset($_POST['suppr_points']))
								{
									if(!empty($_POST['s_points']))
									{
										if ($result == 1)
										{
											echo '
											<script language="javascript"> 
												alert("Points enlevés avec succès !");
												document.location.href="Comptes-modif-'.$id.'" 
											</script>';
										}
									}
								}
								elseif(isset($_POST['change_level']))
								{
									if(!empty($_POST['niveau']))
									{
										if ($result == 1)
										{
											echo '
											<script language="javascript"> 
												alert("Niveau changé avec succès !");
												document.location.href="Comptes-modif-'.$id.'" 
											</script>';
										}
									}
								}
								elseif(isset($_GET['suppr_perso']))
								{
									if ($result == 0)
									{
										echo '
										<script language="javascript"> 
											alert("Ce personnage n\'appartient pas à ce compte !");
											document.location.href="Comptes-modif-'.$id.'" 
										</script>';
									}
									elseif ($result == 1)
									{
										echo '
										<script language="javascript"> 
											alert("Personnage supprimé de ce compte avec succès !");
											document.location.href="Comptes-modif-'.$id.'" 
										</script>';
									}
								}
								else
								{
									echo '
									<div class="news-article">
										<font size="3"><strong><a>Informations sur le compte</a></strong></font>
										<br />
										<p><font color="white">Nom de compte :</font> '.$account_site['login'].'</p>
										<p><font color="white">Adresse email :</font> '.$account_site['mail'].'</p>
										<p><font color="white">Points de vote :</font> '.$voting_points_id['points'].'</p>
										<p><font color="white">Date d\'inscription :</font> '.date("d-m-Y H\hi",$account_site['subscription_date']).'</p>
										<p><font color="white">Derniere connexion au site :</font> '.$account_site['last_login'].'</p>
										<p><font color="white">Derniere connexion au serveur :</font> '.$account_auth['last_login'].'</p>
										<p class="color-exp'.$account_auth['expansion'].'"><font color="white">Extension :</font> '.$auth->expansion[$account_auth['expansion']].'</p>
										<p><font color="white">Niveau du compte :</font> <font color="darkred">'.$site->level[$account_site['niveau']].'</font></p>
										<form action="Comptes-modif-'.$id.'" method="post">
											<select name="niveau">
												<optgroup label="Selectionner un niveau"></optgroup>
												<option value=3>Administrateur</option>
												<option value=2>Maître de jeu</option>
												<option value=1>Modérateur</option>
												<option value=0>Joueur</option>
											</select>
											<br /><br />
											<button class="ui-button button1" type="submit" name="change_level">
												<span>
													<span>Assigner</span>
												</span>
											</button>
										</form>
									</div>
									<div class="news-article">
										<font size="3"><strong><a>Gestion de compte</a></strong></font>
										<br />
										<form action="Comptes-modif-'.$id.'" method="post">
											<p><font color="white">Nouveau mot de passe :</font> <input type="password" name="password"> <button class="ui-button button1" type="submit" name="modif_password"><span><span>Changer</span></span></button></p>
											<p><font color="white">Nouvelle adresse mail :</font> <input type="text" name="mail"> <button class="ui-button button1" type="submit" name="modif_mail"><span><span>Changer</span></span></button></p>
										</form>
									</div>
									<div class="news-article">
										<font size="3"><strong><a>Gestion des points de vote</a></strong></font>
										<br />
										<form action="Comptes-modif-'.$id.'" method="post">
											<p><font color="white">Ajouter des points :</font> <input type="text" name="a_points"> <button class="ui-button button1" type="submit" name="ajout_points"><span><span>Ajouter</span></span></button></p>
											<p><font color="white">Enlever des points :</font> <input type="text" name="s_points"> <button class="ui-button button1" type="submit" name="suppr_points"><span><span>Enlever</span></span></button></p>
										</form>
									</div>
									<div class="news-article">
										<font size="3"><strong><a>Gestion des personnages</a></strong></font>
										<br /><br />
										<table class="table" border="0" cellspacing="0" cellpadding="3" width="100%">
											<thead>
												<tr>
													<th><a href="javascript:;" class="sort-link">Nom du personnage</a></th>
													<th class="iconCol"><a href="javascript:;" class="sort-link numeric">Niveau</a></th>
													<th class="iconCol"><a href="javascript:;" class="sort-link numeric">Race</a></th>
													<th class="iconCol"><a href="javascript:;" class="sort-link numeric">Classe</a></th>
													<th class="iconCol"><a href="javascript:;" class="sort-link numeric">Faction</a></th>
													<th class="iconCol"><a href="javascript:;" class="sort-link numeric">Supprimer</a></th>
												</tr>
											</thead>';
											if (!empty($characters_by_account))
											{
												foreach($characters_by_account as $character_by_account)
												{
													echo '
													<tbody>
														<tr class="row2">
															<td class="table-link">
																<a href="'.$array_site['armurerie'].'character-sheet.xml?r=Avalon+Server&cn='.$character_by_account['name'].'" class="color-c'.$character_by_account['class'].'">
																	<span class="list-icon border-c'.$character_by_account['class'].'"><img src="style/images/2d/avatar/'.$character_by_account['race'].'-'.$character_by_account['gender'].'.jpg"/></span>
																	'.$character_by_account['name'].'
																</a>
															</td>
															<td class="iconCol"><font color="darkred">'.$character_by_account['level'].'</font></td>
															<td class="iconCol"><img src="style/images/icons/race/'.$character_by_account['race'].'-'.$character_by_account['gender'].'.gif"/></td>
															<td class="iconCol"><img src="style/images/icons/class/'.$character_by_account['class'].'.gif"/></td>
															<td class="iconCol"><img src="style/images/icons/faction/'.$royaume->faction[$character_by_account['race']].'.gif"/></td>
															<td class="iconCol"><a href="Comptes-modif-'.$id.'-'.$character_by_account['guid'].'"><img src="style/images/icons/admin/supprimer.png"/></a></td>
														</tr>
													</tbody>';
												}
											}
											else
											{
												echo '
												<tbody>
													<tr class="row2" align="center">
														<td colspan="6">
															<strong><font color="red">Ce compte n\'a pas de personnages !</font></strong>
														</td>
													</tr>
												</tbody>';
											}
											echo '
										</table>
									</div>';
								}
							}
						}
						elseif (isset($_GET['variable1']) AND $_GET['variable1'] == 'suppr')
						{
							if ($result == 1)
							{
								echo '
								<script language="javascript"> 
									alert("Compte supprimé avec succès !");
									document.location.href="Comptes" 
								</script>';
							}
						}
						elseif (isset($_POST['chercher']))
						{
							echo '
							<div class="news-article">	
								<form action="Comptes" method="post">
									<div id="search-again">
										Chercher un compte - <a href="Comptes">Retour à la liste complète des comptes</a>
										<div class="search-input">
											<div align="center">
												<input id="search-again-field" type="text" name="username" value=""/>
												<button class="ui-button button1" type="submit" name="chercher">
													<span>
														<span>Chercher</span>
													</span>
												</button>
											</div>
										</div>
									</div>
								</form>
							</div>';
							if (!empty($_POST['username']))
							{
								if (!empty($account_username) > 0)
								{
									echo '
									<div class="news-article" align="center">
										<table class="table" border="0" cellspacing="0" cellpadding="3" width="100%">
											<thead>
												<tr>
													<th><a href="javascript:;" class="sort-link">Nom du compte</a></th>
													<th class="iconCol"><a href="javascript:;" class="sort-link numeric">Niveau</a></th>
													<th class="iconCol"><a href="javascript:;" class="sort-link numeric">Modifier</a></th>
													<th class="iconCol"><a href="javascript:;" class="sort-link numeric">Supprimer</a></th>
												</tr>
											</thead>';
											foreach($account_username as $account)
											{
												echo '
												<tbody>
													<tr class="row2">
														<td><font color="darkgreen">'.$account['login'].'</font></td>
														<td class="iconCol"><font color="darkred">'.$site->level[$account['niveau']].'</font></td>
														<td class="iconCol"><a href="Comptes-modif-'.$account['id'].'"><img src="style/images/icons/admin/modifier.png"/></a></td>
														<td class="iconCol"><a href="Comptes-suppr-'.$account['id'].'"><img src="style/images/icons/admin/supprimer.png"/></a></td>
													</tr>
												</tbody>';
											}
											echo
										'</table>
									</div>';
								}
								else
								{
									echo '
									<script language="javascript"> 
										alert("Erreur : Ce compte n\'existe pas !");
										document.location.href="Comptes" 
										</script>';
								}
							}
							else
							{
								echo '
								<script language="javascript"> 
									alert("Erreur : Tous les champs ne sont pas remplis !");
									document.location.href="Comptes" 
								</script>';
							}
						}
						else
						{
							echo '
							<div class="news-article">	
								<form action="Comptes" method="post">
									<div id="search-again">
										Chercher un compte
										<div class="search-input">
											<div align="center">
												<input id="search-again-field" type="text" name="username" value=""/>
												<button class="ui-button button1" type="submit" name="chercher">
													<span>
														<span>Chercher</span>
													</span>
												</button>
											</div>
										</div>
									</div>
								</form>
							</div>
							<div class="news-article" align="center">
								<table class="table" border="0" cellspacing="0" cellpadding="3" width="100%">
									<thead>
										<tr>
											<th><a href="javascript:;" class="sort-link">Nom du compte</a></th>
											<th class="iconCol"><a href="javascript:;" class="sort-link numeric">Niveau</a></th>
											<th class="iconCol"><a href="javascript:;" class="sort-link numeric">Modifier</a></th>
											<th class="iconCol"><a href="javascript:;" class="sort-link numeric">Supprimer</a></th>
										</tr>
									</thead>';
									if (!empty($site->array_users) > 0)
									{
										foreach($site->array_users as $account)
										{
											echo '
											<tbody>
												<tr class="row2">
													<td><font color="darkgreen">'.$account['login'].'</font></td>
													<td class="iconCol"><font color="darkred">'.$site->level[$account['niveau']].'</font></td>
													<td class="iconCol"><a href="Comptes-modif-'.$account['id'].'"><img src="style/images/icons/admin/modifier.png"/></a></td>
													<td class="iconCol"><a href="Comptes-suppr-'.$account['id'].'"><img src="style/images/icons/admin/supprimer.png"/></a></td>
												</tr>
											</tbody>';
										}
									}
									else
									{
										echo '
										<tbody>
											<tr class="row2" align="center">
												<td colspan="4">
													<strong><font color="red">Il n\'y a pas de comptes !</font></strong>
												</td>
											</tr>
										</tbody>';
									}
									echo '
								</table>
							</div>';
						}
						?>
					</div>
					<?php
				}
				else
				{
					echo '<font color="red">Vous n\'êtes pas autorisé à accéder à cette page !</font></p>';
				}
			}
			else
			{
				echo '<font color="red">Vous devez être connecté pour accéder à cette page !</font></p>';
			}
			?>		
		</div>
		<?php require_once('right.php'); ?>
	</div>
</div>