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
								<a>Ajouter un objet dans la boutique</a>
							</h3>
						</div>
						<div class="news-article ">
							<form action="#submit" method="post">
								<label>ID de l'objet : </label><input type="text" name="id" id="id" size="4"/><br/>
								<label>Nombre de points pour l'achat : </label><input tyep="text" name="pts" id="nom" /><br/>
								<label>Nom de l'objet : </label><input tyep="text" name="nom" id="nom" /><br/>
								<label for="cat">Catégorie : </label>
								<select name="cat" id="cat">
									<option value="Armes">Armes</option>
									<option value="Armures">Armures</option>
									<option value="Bijoux">Bijoux</option>
									<option value="Boucliers">Boucliers</option>
									<option value="Compagnons">Compagnons</option>
									<option value="Compos">Compos</option>
									<option value="Héritage">Héritage</option>
									<option value="Monture">Monture</option>
									<option value="Sacs">Sacs</option>
								</select><br/>
								<input type="submit" value="Ajouter" name="connexion" />
							</form>
							<?php
							if(isset($_POST['cat']))
							{
								if(empty($_POST['pts']) OR empty($_POST['id']) OR empty($_POST['nom']))
								{
									echo'<p><strong style="color: red;">Veuillez remplir tous les champs !</strong></p>';
								}
								else
								{
									if ($result == 1)
									{
										echo '
										<script language="javascript"> 
											alert("Objet ajouté avec succès !");
											document.location.href="AjoutObjet" 
										</script>';
									}
									elseif ($result == 0)
									{
										echo '<p><strong style="color: red;">Objet deja enregistre !</strong></p>';
									}
								}
							}
							?>
						</div>											
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