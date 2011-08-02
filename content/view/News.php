<?php
if ($news_id > 0)
{
echo '
<div class="content-trail">
	<ol class="ui-breadcrumb">
		<li><a href="home" rel="np">Accueil</a></li>
		<li class="last"><a href="News-'.$news_id.'" rel="np">'.$news['titre'].'</a></li>
	</ol>
</div>
<div class="content-bot">	
<div id="blog-wrapper">
<div id="left">
	<div id="blog-container">';
	require_once('featured-news.php');
	echo'
		<div id="blog">
			<h3 class="blog-title">'.$news['titre'].'</h3>
			<div class="byline">
				<div class="blog-info">
					par <a>'.$news['auteur'].'</a> |
				</div>
				<a class="comments-link" href="#comments">'.count($site->array_comm).'</a>
				<span class="clear"><!-- --></span>
			</div>
			<div class="header-image">
			</div>
			<div class="detail"><p>'.nl2br($news['message']).'</p></div>
		</div>
		<span id="comments"></span>
		<div id="page-comments">
			<div class="page-comment-interior">
				<h3>Commentaires ('.count($site->array_comm).')</h3>
				<div class="comments-container">';
					if($user->sess_user)
					{
						if($user->nb_char)
						{
							echo '
							<form action="News-'.$news_id.'" method="post">
							<div class="new-post">
								<div class="comment">
									<div class="portrait-c ajax-update">
										<div class="avatar-interior">
											<a><img height="64" src="style/images/2d/avatar/'.$first_character['race'].'-'.$first_character['gender'].'.jpg"/></a>
										</div>
									</div>
									<div class="comment-interior">
										<div class="character-info user ajax-update">
											<div class="user-name">
												<span class="char-name-code" style="display: none">'.$first_character['name'].'</span>
												<div id="context-2" class="ui-context character-select">
													<div class="context">
														<a href="javascript:;" class="close" onclick="return CharSelect.close(this);"></a>
														<div class="context-user">
															<strong>'.$first_character['name'].'</strong>
															<br />
															<span>'.$royaume->array_realmlist['name'].'</span>
														</div>
														<div class="context-links">
															<a href="index.php?page=Armurerie&amp;guid='.$first_character['guid'].'" title="Fiche" rel="np" class="icon-profile link-first">Fiche</a>
															<a title="Voir mes messages" rel="np"class="icon-posts"></a>
															<a title="Voir les enchères" rel="np" class="icon-auctions"></a>
															<a title="Voir les évènements" rel="np" class="icon-events link-last"></a>
														</div>
													</div>
												</div>
												<a href="index.php?page=Armurerie&amp;guid='.$first_character['guid'].'" class="context-link" rel="np">'.$first_character['name'].'</a>
											</div>
										</div>
										<div class="content">
											<div class="comment-ta">
												<textarea cols="78" rows="3" name="message"></textarea>
											</div>
											<div class="action">
												<div class="submit">
													<button class="ui-button button1 comment-submit" type="submit" name="poster">
														<span>
															<span>Poster</span>
														</span>
													</button>
												</div>
												<span class="clear"><!-- --></span>
											</div>
										</div>
									</div>
								</div>
							</div>
							</form>';
						}
						else
						{
							echo '
							<div align="center">
								<strong><font color="red">Il vous faut au moins un personnage pour poster un commentaire !</font></strong>
							</div><br />';
						}
					}
					else
					{
						echo '
						<div align="center">
							<strong><font color="red">Vous devez &ecirc;tre connect&eacute; pour poster un commentaire !</font></strong>
						</div><br />';
					}
					foreach($site->array_comm as $key => $comm)
					{
						echo '
						<div style="z-index: '.$key.';" class="comment">
							<div class="avatar portrait-b">
								<a><img height="64" src="http://eu.battle.net/wow/static/images/2d/avatar/'.$row_characters_guid[$key]['race'].'-'.$row_characters_guid[$key]['gender'].'.jpg"/></a>
							</div>
							<div class="comment-interior">
								<div class="character-info user">
									<div class="user-name">
										<span class="char-name-code" style="display: none">'.$row_characters_guid[$key]['name'].'</span>
										<div id="context-1" class="ui-context">
											<div class="context">
												<a href="javascript:;" class="close" onclick="return CharSelect.close(this);"></a>
												<div class="context-user">
													<strong>'.$row_characters_guid[$key]['name'].'</strong>
													<br />
													<span>'.$royaume->array_realmlist['name'].'</span>
												</div>
												<div class="context-links">
													<a href="index.php?page=Armurerie&amp;guid='.$row_characters_guid[$key]['guid'].'" title="Fiche" rel="np" class="icon-profile link-first">Fiche</a>
													<a title="Voir les messages" rel="np" class="icon-posts"></a>
													<a title="Ignorer" rel="np" class="icon-ignore link-last" onclick="Cms.ignore(7500754, false); return false;"></a>
												</div>
											</div>
										</div>
										<br />
										<a href="index.php?page=Armurerie&amp;guid='.$row_characters_guid[$key]['guid'].'" class="context-link" rel="np">'.$row_characters_guid[$key]['name'].'</a>
									</div>
								</div>
								<div class="content" >'.$comm['message'].'</div>
								<div class="comment-actions"><a class="reply-link"></a></div>
							</div>
						</div>';
					}
					echo '
					<div class="page-nav-container">
						<div class="page-nav-int">
							<div class="pageNav">
								<span class="active">1</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>';
require_once('right.php');
echo '</div>
</div>';
}
if(!empty($result))
{
	if ($result == 'good')
	{
		echo '
		<script language="javascript"> 
			alert("Commentaire ajouté avec succès !");
			document.location.href="News-'.$news_id.'" 
		</script>';
	}
	elseif ($result == 'empty')
	{
		echo '
		<script language="javascript"> 
			alert("Erreur : Votre commentaire est vide !");
			document.location.href="News-'.$news_id.'#comments" 
		</script>';
	}
}
?>
