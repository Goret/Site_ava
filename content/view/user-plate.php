<?php
if(!empty($user->sess_user))
{
	if (!empty($user->nb_char))
	{
		echo '
		<div id="user-plate" class="user-plate plate-'.$royaume->faction[$first_character['race']].' ajax-update" style="background: url(style/images/2d/card/'.$first_character['race'].'-'.$first_character['gender'].'.png) 0 100% no-repeat;">
			<div class="card-overlay"></div>
				<a href="" rel="np" class="profile-link"><span class="hover"></span></a>
					<div class="user-meta">
						<div class="player-name">'.$user->sess_user.'</div>
							<div class="character">
								<a class="character-name context-link" rel="np" href="#">'.$first_character['name'].'</a>
									<div id="context-1" class="ui-context character-select">
										<div class="context">
											<a href="javascript:;" class="close" onclick="return CharSelect.close(this);"></a>
												<div class="context-user">
													<strong>'.$first_character['name'].'</strong>
													<br />
													<span>'.$royaume->array_realmlist['name'].'</span>
												</div>
												<div class="context-links">
													<a href="'.$array_site['armurerie'].'character-sheet.xml?r=Avalon+Server&cn='.$first_character['name'].'" title="Fiche" rel="np" class="icon-profile link-first">Fiche</a>
													<a title="Voir mes messages" rel="np" class="icon-posts"></a>
													<a title="Voir les enchères" rel="np" class="icon-auctions"></a>
													<a title="Voir les évènements" rel="np" class="icon-events link-last"></a>
												</div>
										</div>
										<div class="character-list">
											<div class="primary chars-pane">
												<div class="char-wrapper">';
													foreach($user->array_characters as $key => $char)
													{
														if ($key < 5)
														{
															echo '
															<a href="" class="char '.$pinned[$key].'" rel="np">
																<span class="pin"></span>
																<span class="name">'.$char['name'].'</span>
																<span class="class color-c'.$char['class'].'">'.$char['level'].' '.$royaume->race[$char['race']].' '.$royaume->class[$char['class']].'</span>
																<span class="realm">'.$royaume->array_realmlist['name'].'</span>
															</a>';
														}
														else
															break;
													}
												echo '</div>
												<a href="Persos" class="manage-chars">
													<span class="plus"></span>
													Gérer les personnages<br />
													<span>Visualisez tous vos personnages en cliquant ici</span>
												</a>
											</div>
										</div>
									</div>
							</div>
					</div>
		</div>';
	}
	else
	{
		echo '
		<div id="user-plate" class="user-plate plate ajax-update" style="background: url(style/images/2d/card/0-0.png) 0 100% no-repeat;">
			<div class="card-overlay"></div>
				<a href="" rel="np" class="profile-link"><span class="hover"></span></a>
					<div class="user-meta">
						<div class="player-name">'.$user->sess_user.'</div>
					</div>
		</div>';
	}
}
else
{
	echo '
	<div class="user-plate ajax-update">
		<div class="user-meta meta-login">
			<a href="Connexion"><strong>Connectez-vous</strong></a> avec votre compte.
		</div>
	</div>';
}
?>
