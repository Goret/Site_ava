<div class="content-bot">	
	<div id="homepage">
		<div id="left">
			<?php require_once('slideshow.php'); ?>
			<?php require_once('featured-news.php'); ?>
			<?php
			if($user->sess_user)
			{
				?>
				<div id="news-updates">
					<div class="news-article first-child">
						<h3>
							<a>Boutique</a>
						</h3>
					</div>
					<div class="news-article" align="center">
						<p>Vous avez actuellement <?php echo $user->array_voting_points['points']; ?> point(s) !</p>
						<form action="index.php?page=Boutique#selection" method="post">
						<table class="table" border="0" cellspacing="0" cellpadding="3" width="100%">
							<tr class="row2">
								<td class="iconCol"><a href="Boutique-cat-1" class="sort-link"><input type="image" src="style/images/boutique/1.png"/><center>Armes</center></a></td>
								<td class="iconCol"><a href="Boutique-cat-2" class="sort-link"><input type="image" src="style/images/boutique/2.png"/><center>Armures</center></a></td>
								<td class="iconCol"><a href="Boutique-cat-3" class="sort-link"><input type="image" src="style/images/boutique/3.png"/><center>Bijoux</center></a></td>
								<td class="iconCol"><a href="Boutique-cat-4" class="sort-link"><input type="image" src="style/images/boutique/4.png"/><center>Boucliers</center></a></td>
								<td class="iconCol"><a href="Boutique-cat-5" class="sort-link"><input type="image" src="style/images/boutique/5.png"/><center>Compagnons</center></a></td>
							</tr>
							<tr class="row2">
								<td class="iconCol"><a href="Boutique-cat-6" class="sort-link"><input type="image" src="style/images/boutique/6.png"/><center>Compos</center></a></td>
								<td class="iconCol"><a href="Boutique-cat-7" class="sort-link"><input type="image" src="style/images/boutique/7.png"/><center>Monnaies</center></a></td>
								<td class="iconCol"><a href="Boutique-cat-8" class="sort-link"><input type="image" src="style/images/boutique/8.png"/><center>Héritage</center></a></td>
								<td class="iconCol"><a href="Boutique-cat-9" class="sort-link"><input type="image" src="style/images/boutique/9.png"/><center>Montures</center></a></td>
								<td class="iconCol"><a href="Boutique-cat-10" class="sort-link"><input type="image" src="style/images/boutique/10.png"/><center>Sacs</center></a></td>
							</tr>
						</table>
					</div>
					<div id="submit">
						<?php
						if (!empty($_POST['name']))
						{
							if ($user->array_voting_points['points'] >= $objet['prix'])
							{
								if ($result == 1)
								{
									echo '
									<script language="javascript"> 
										alert("Merci de votre achat ! La récompense vous a été envoyé dans votre boîte aux lettres.");
										document.location.href="Boutique";
									</script>';
								}
							}
							else
							{
								echo '
								<script language="javascript"> 
									alert("Vous n\'avez pas asser de points pour acheter cette récompense !");
									document.location.href="Boutique" 
								</script>';
							}
						}
						elseif (!empty($_GET['variable1']) && $_GET['variable1'] != 'cat')
						{
							$id = strip_tags($_GET['variable1']);
							if ($user->nb_char > 0)
							{
								echo '
								<div class="news-article">
									<table class="table" border="0" cellspacing="0" cellpadding="3" width="30%">
										Choisissez le personnage qui recevra la récompense :
										<tr>
											<form action="Boutique#submit" method="post">
												<td>
													<select name="name">
														<optgroup label="Mes personnages">';
														foreach($user->array_characters as $char)
														{
															echo '</optgroup>';
															echo '<option>'.$char['name'].'</option>';
														}
														echo '
													</select>
												</td>
												<td><input type="hidden" name="id" value="'.$id.'"/></td>
												<td><input type="image" src="style/images/icons/admin/acheter.png"/></td>
											</form>
										</tr>
									</table>
								</div>';
							}
							else
							{
								echo '
								<div class="news-article" align="center">
									<strong><font color="red">Aucuns personnages !</font></strong>
								</div>';
							}
						}
						elseif(!empty($_GET['variable1']) && $_GET['variable1'] == 'cat')
						{
							echo '
							<div class="news-article" align="center">
								<table class="table" border="0" cellspacing="0" cellpadding="3" width="100%">
									<thead>
										<tr>
											<th><a href="javascript:;" class="sort-link">Nom de l\'objet</a></th>
											<th><a href="javascript:;" class="sort-link numeric">Prix</a></th>
											<th class="iconCol"><a href="javascript:;" class="sort-link numeric">Acheter</a></th>
										</tr>
									</thead>';
									if (!empty($boutique_cat))
									{
										foreach($boutique_cat as $objet)
										{																			
											echo '
											<tbody>
												<tr class="row2">
													<td><a href="http://fr.wowhead.com/item='.$objet['id'].'"><font color="darkgreen"><b>'.utf8_decode($objet['nom']).'</font></a></td>
													<td><font color="darkred">'.$objet['prix'].' points</font></td>
													<td class="iconCol"><a href="Boutique-'.$objet['id'].'#submit"><img src="style/images/icons/admin/acheter.png"/></a></td>
												</tr>
											</tbody>';
										}
									}
									else
									{
										echo '
										<tbody>
											<tr class="row2" align="center">
												<td colspan="3">
													<strong><font color="red">Il n\'y a pas d\'objets en vente dans cette catégorie !</font></strong>
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
				</div>
				<?php
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