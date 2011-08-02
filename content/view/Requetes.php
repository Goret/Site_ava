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
								<a>Liste des requetes</a>
							</h3>
						</div>
						<?php
						if (isset($_GET['variable1']) AND $_GET['variable1'] == 'modif')
						{
							if (!empty($requete))
							{
								if(!empty($_POST['Assigner']) && !empty($_POST['gmmaster']))
								{
									if ($result == 1)
									{
										echo '
										<script language="javascript"> 
											alert("Requete assignée avec succés !");
											document.location.href="Requetes-modif-'.$id.'" 
										</script>';
									}
								}
								elseif(!empty($_POST['close']))
								{
									if ($result == 1)
									{
										echo '
										<script language="javascript"> 
											alert("Requete fermée avec succés !");
											document.location.href="Requetes-modif-'.$id.'" 
										</script>';
									}
								}
								elseif(!empty($_POST['Desassigner']))
								{
									if ($result == 1)
									{
										echo '
										<script language="javascript"> 
											alert("Requete Désassignée avec succés !");
											document.location.href="Requetes-modif-'.$id.'" 
										</script>';
									}
								}
								else
								{
									if ($requete['closedBy'] == 0)
									{
										$etat = '<font color="green">Ouvert</font>';
									}
									else
									{
										$etat = '<font color="red">Fermé</font>';
									}
									echo '
									<div class="news-article">
										<font size="3"><strong><a>Informations sur la requete</a></strong></font>
										<br />
										<p><font color="white">Nom du personnage :</font> '.$requete['name'].'</p>
										<p><font color="white">Date de création :</font> '.date("d-m-Y H:i",$requete['createTime']).'</p>
										<p><font color="white">Etat :</font> '.$etat.'</p>
									</div>
									<div class="news-article">
										<font size="3"><strong><a>Message de la requete</a></strong></font>
										<br />
										<center><p>'.nl2br(utf8_decode($requete['message'])).'</p></center>
									</div>
									<div class="news-article">
										<font size="3"><strong><a>Gestion de la requete</a></strong></font>
										<br />
										<form action="Requete-modif-'.$id.'" method="post">
											Personne à assigner :<br />';
											if (!empty($gmmasters))
											{
												echo '
												<select name="gmmaster">
													<optgroup label="Liste des gmmasters"></optgroup>';
													foreach($user->gmmasters as $gmmaster)
													{
														echo '<option value='.$gmmaster['id'].'>'.$gmmaster['username'].'</option>';
													}
													echo '
												</select>';
											}
											else
											{
												echo '<strong><font color="red">Il n\'y a pas de gmmaster sur ce royaume!</font></strong>';
											}
											echo '
											<br /><br />
											<button class="ui-button button1" type="submit" name="Assigner">
												<span>
													<span>Assigner</span>
												</span>
											</button>
										</form>
										<br /><br />
										<form action="Comptes-modif-'.$id.'" method="post">
											<button class="ui-button button1" type="submit" name="Desassigner">
												<span>
													<span>Désassigner la requete</span>
												</span>
											</button>
										</form>
										<br />';
										if ($requete['closedBy'] == 0)
										{
											echo '
											<form action="Comptes-modif-'.$id.'" method="post">
												<button class="ui-button button1" type="submit" name="close">
													<span>
														<span>Clore la requete</span>
													</span>
												</button>
											</form>';
										}
										echo '
									</div>';
								}
							}
						}
						else
						{
							echo '
							<div class="news-article" align="center">
								<table class="table" border="0" cellspacing="0" cellpadding="3" width="100%">
									<thead>
										<tr>
											<th><a href="javascript:;" class="sort-link">Nom du personnage</a></th>
											<th class="iconCol"><a href="javascript:;" class="sort-link">Création</a></th>
											<th><a href="javascript:;" class="sort-link">Assigné à</a></th>
											<th><a href="javascript:;" class="sort-link">Etat</a></th>
											<th class="iconCol"><a href="javascript:;" class="sort-link numeric">Modifier</a></th>
											<th class="iconCol"><a href="javascript:;" class="sort-link numeric">Supprimer</a></th>
										</tr>
									</thead>';
									if (!empty($royaume->array_requetes))
									{
										foreach($auth->array_requetes as $requete)
										{
											if ($requete['closedBy'] == 0)
											{
												$etat = '<font color="green">Ouvert</font>';
											}
											else
											{
												$etat = '<font color="red">Fermé</font>';
											}
											echo '
											<tbody>
												<tr class="row2">
													<td><font color="darkgreen">'.$requete['name'].'</font></td>
													<td class="iconCol"><font color="darkred">'.date("d-m-Y H:i",$requete['createTime']).'</font></td>
													<td class="iconCol">'.$etat.'</td>
													<td class="iconCol"><a href="Requetes-modif-'.$requete['ticketId'].'"><img src="style/images/icons/admin/modifier.png"/></a></td>';
													if ($requete['closedBy'] > 0)
													{
														echo '
														<td class="iconCol"><a href="Requetes-suppr-'.$requete['ticketId'].'"><img src="style/images/icons/admin/supprimer.png"/></a></td>
														';
													}
													else
													{
														echo '
														<td class="iconCol">Impossible!</td>
														';
													}
													echo '
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
													<strong><font color="red">Il n\'y a pas de requetes !</font></strong>
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