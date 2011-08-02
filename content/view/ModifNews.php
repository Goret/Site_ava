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
								<a>Modifier une news</a>
							</h3>
						</div>
						<?php
						if (isset($_GET['variable1']))
						{
							if (!empty($news))
							{
								echo '
								<div class="news-article" align="center">
									<form action="ModifNews" method="post">
										Titre de la news : <br />
										<input type="text" size="30" name="titre" value="'.$news['titre'].'"/>
										<br /><br />
										Message de la news :<br />
										<textarea name="message" cols="30" rows="5">'.$news['message'].'</textarea>
										<br/><br/>
										<input type="hidden" name="id" value="'.$id.'"/>
										<button class="ui-button button1" type="submit" name="modifier">
											<span>
												<span>Modifier</span>
											</span>
										</button>
									</form>
								</div>';
							}
							else
							{
								echo '
								<script language="javascript"> 
									alert("Cette news n\'existe pas !");
									document.location.href="ModifNews" 
								</script>';
							}
						}
						elseif (isset($_POST['modifier']))
						{
							if (!empty($_POST['titre']) && !empty($_POST['message']))
							{
								echo '
								<script language="javascript"> 
									alert("News modifiée avec succès !");
									document.location.href="ModifNews" 
								</script>';
							}
							else
							{
								echo '
								<script language="javascript"> 
									alert("Erreur : Tous les champs ne sont pas remplis !");
									document.location.href="ModifNews-'.$id.'" 
								</script>';
							}
						}
						else
						{
							echo '
							<div class="news-article" align="center">
								<table class="table" border="0" cellspacing="0" cellpadding="3" width="100%">
									<thead>
										<tr>
											<th><a href="javascript:;" class="sort-link">Titre de la news</a></th>
											<th class="iconCol"><a href="javascript:;" class="sort-link numeric">Auteur</a></th>
											<th class="iconCol"><a href="javascript:;" class="sort-link numeric">Modifier</a></th>
										</tr>
									</thead>';
									if (!empty($site->array_news))
									{
										foreach($site->array_news as $news)
										{
											echo '
											<tbody>
												<tr class="row2">
													<td><font color="darkgreen">'.$news['titre'].'</font></td>
													<td class="iconCol"><font color="darkred">'.$news['auteur'].'</font></td>
													<td class="iconCol"><a href="ModifNews-'.$news['id'].'"><img src="style/images/icons/admin/modifier.png"/></a></td>
												</tr>
											</tbody>';
										}
									}
									else
									{
										echo '
										<tbody>
											<tr class="row2" align="center">
												<td colspan="3"><strong><font color="red">Il n\'y a pas de news !</font></strong></td>
											</tr>
										</tbody>';
									}
								echo '</table>
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