<?php
if(!empty($row_characters_guid))
{
	echo '
	<style type="text/css">
	#content .content-top { background: url("style/images/character/summary/backgrounds/race/'.$row_characters_guid['race'].'.jpg") left top no-repeat; }
	.profile-wrapper { background-image: url("style/images/2d/profilemain/race/'.$row_characters_guid['race'].'-'.$row_characters_guid['gender'].'.jpg"); }
	</style>
	<div class="content-trail">
		<ol class="ui-breadcrumb">
			<li>
				<a href="home" rel="np">Accueil</a>
			</li>
			<li class="last">
				<a href="Armurerie-'.$guid.'" rel="np">'.$row_characters_guid['name'].' du royaume '.$royaume->array_realmlist['name'].'</a>
			</li>
		</ol>
	</div>
	<div class="content-bot">
	<div id="profile-wrapper" class="profile-wrapper profile-wrapper-'.$royaume->faction[$row_characters_guid['race']].' profile-wrapper-light">
		<div class="profile-sidebar-anchor">
			<div class="profile-sidebar-outer">
				<div class="profile-sidebar-inner">
					<div class="profile-sidebar-contents">
						<div class="profile-info-anchor">
							<div class="profile-info">
								<div class="name"><a rel="np">'.$row_characters_guid['name'].'</a></div>
								<div class="title-guild">
									<div class="title">&#160;</div>';
									if(!empty($row_guild_guildid))
									{
										echo '
										<div class="guild">
											<a>'.$row_guild_guildid['name'].'</a>
										</div>';
									}
									else
									{
										echo '
										<div class="guild">
											<a></a>
										</div>';
									}
									echo '
								</div>
								<span class="clear"><!-- --></span>
								<div class="under-name color-c'.$row_characters_guid['class'].'">
									<a class="race">'.$royaume->race[$row_characters_guid['race']].'</a> <a class="class">'.$royaume->class[$row_characters_guid['class']].'</a> de niveau <span class="level"><strong>'.$row_characters_guid['level'].'</strong></span><span class="comma">,</span>
									<span class="realm tip" id="profile-info-realm">'.$royaume->array_realmlist['name'].'</span>
								</div>
							</div>
						</div>
						<ul class="profile-sidebar-menu" id="profile-sidebar-menu">
							<li class="active">
								<a class="" rel="np"><span class="arrow"><span class="icon">Sommaire</span></span></a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="profile-contents">
			<div class="summary-top">
				<div class="summary-top-right">
					<ul class="profile-view-options" id="profile-view-options-summary"></ul>
					<div class="summary-averageilvl">
						<div class="rest"></div>
						<div id="summary-averageilvl-best" class="best tip" data-id="averageilvl"></div>
					</div>
				</div>
				<div class="summary-top-inventory">
					<div id="summary-inventory" class="summary-inventory summary-inventory-simple">';
						if(!empty($row_item[0]))
						{
							echo '
							<div class="slot slot-1 item-quality-'.$row_item[0]['Quality'].'" style=" left: 0px; top: 0px;">
								<div class="slot-inner">
									<div class="slot-contents">
										<a href="http://fr.wowhead.com/item='.$row_item[0]['itemEntry'].'" class="item"><img src="http://eu.battle.net/wow-assets/static/images/icons/56/'.$row_icon[0]['icon'].'.jpg" alt="" /><span class="frame"></span></a>
									</div>
								</div>
							</div>';
						}
						else
						{
							echo '	
							<div class="slot slot-1" style=" left: 0px; top: 0px;">
								<div class="slot-inner">
									<div class="slot-contents">
										<a href="javascript:;" class="empty"><span class="frame"></span></a>
									</div>
								</div>
							</div>';
						}
						if(!empty($row_item[1]))
						{
							echo '
							<div class="slot slot-2 item-quality-'.$row_item[1]['Quality'].'" style=" left: 0px; top: 58px;">
								<div class="slot-inner">
									<div class="slot-contents">
										<a href="http://fr.wowhead.com/item='.$row_item[1]['itemEntry'].'" class="item"><img src="http://eu.battle.net/wow-assets/static/images/icons/56/'.$row_icon[1]['icon'].'.jpg" alt="" /><span class="frame"></span></a>
									</div>
								</div>
							</div>';
						}
						else
						{
							echo '	
							<div class="slot slot-2" style=" left: 0px; top: 58px;">
								<div class="slot-inner">
									<div class="slot-contents">
										<a href="javascript:;" class="empty"><span class="frame"></span></a>
									</div>
								</div>
							</div>';
						}
						if(!empty($row_item[2]))
						{
							echo '
							<div class="slot slot-3 item-quality-'.$row_item[2]['Quality'].'" style=" left: 0px; top: 116px;">
								<div class="slot-inner">
									<div class="slot-contents">
										<a href="http://fr.wowhead.com/item='.$row_item[2]['itemEntry'].'" class="item"><img src="http://eu.battle.net/wow-assets/static/images/icons/56/'.$row_icon[2]['icon'].'.jpg" alt="" /><span class="frame"></span></a>
									</div>
								</div>
							</div>';
						}
						else
						{
							echo '	
							<div class="slot slot-3" style=" left: 0px; top: 116px;">
								<div class="slot-inner">
									<div class="slot-contents">
										<a href="javascript:;" class="empty"><span class="frame"></span></a>
									</div>
								</div>
							</div>';
						}
						if(!empty($row_item[14]))
						{
							echo '
							<div class="slot slot-16 item-quality-'.$row_item[14]['Quality'].'" style=" left: 0px; top: 174px;">
								<div class="slot-inner">
									<div class="slot-contents">
										<a href="http://fr.wowhead.com/item='.$row_item[14]['itemEntry'].'" class="item"><img src="http://eu.battle.net/wow-assets/static/images/icons/56/'.$row_icon[14]['icon'].'.jpg" alt="" /><span class="frame"></span></a>
									</div>
								</div>
							</div>';
						}
						else
						{
							echo '	
							<div class="slot slot-16" style=" left: 0px; top: 174px;">
								<div class="slot-inner">
									<div class="slot-contents">
										<a href="javascript:;" class="empty"><span class="frame"></span></a>
									</div>
								</div>
							</div>';
						}
						if(!empty($row_item[4]))
						{
							echo '
							<div class="slot slot-5 item-quality-'.$row_item[4]['Quality'].'" style=" left: 0px; top: 232px;">
								<div class="slot-inner">
									<div class="slot-contents">
										<a href="http://fr.wowhead.com/item='.$row_item[4]['itemEntry'].'" class="item"><img src="http://eu.battle.net/wow-assets/static/images/icons/56/'.$row_icon[4]['icon'].'.jpg" alt="" /><span class="frame"></span></a>
									</div>
								</div>
							</div>';
						}
						else
						{
							echo '	
							<div class="slot slot-5" style=" left: 0px; top: 232px;">
								<div class="slot-inner">
									<div class="slot-contents">
										<a href="javascript:;" class="empty"><span class="frame"></span></a>
									</div>
								</div>
							</div>';
						}
						if(!empty($row_item[3]))
						{
							echo '
							<div class="slot slot-4 item-quality-'.$row_item[3]['Quality'].'" style=" left: 0px; top: 290px;">
								<div class="slot-inner">
									<div class="slot-contents">
										<a href="http://fr.wowhead.com/item='.$row_item[3]['itemEntry'].'" class="item"><img src="http://eu.battle.net/wow-assets/static/images/icons/56/'.$row_icon[3]['icon'].'.jpg" alt="" /><span class="frame"></span></a>
									</div>
								</div>
							</div>';
						}
						else
						{
							echo '	
							<div class="slot slot-4" style=" left: 0px; top: 290px;">
								<div class="slot-inner">
									<div class="slot-contents">
										<a href="javascript:;" class="empty"><span class="frame"></span></a>
									</div>
								</div>
							</div>';
						}
						if(!empty($row_item[18]))
						{
							echo '
							<div class="slot slot-19 item-quality-'.$row_item[18]['Quality'].'" style=" left: 0px; top: 348px;">
								<div class="slot-inner">
									<div class="slot-contents">
										<a href="http://fr.wowhead.com/item='.$row_item[18]['itemEntry'].'" class="item"><img src="http://eu.battle.net/wow-assets/static/images/icons/56/'.$row_icon[18]['icon'].'.jpg" alt="" /><span class="frame"></span></a>
									</div>
								</div>
							</div>';
						}
						else
						{
							echo '	
							<div class="slot slot-19" style=" left: 0px; top: 348px;">
								<div class="slot-inner">
									<div class="slot-contents">
										<a href="javascript:;" class="empty"><span class="frame"></span></a>
									</div>
								</div>
							</div>';
						}
						if(!empty($row_item[8]))
						{
							echo '
							<div class="slot slot-9 item-quality-'.$row_item[8]['Quality'].'" style=" left: 0px; top: 406px;">
								<div class="slot-inner">
									<div class="slot-contents">
										<a href="http://fr.wowhead.com/item='.$row_item[8]['itemEntry'].'" class="item"><img src="http://eu.battle.net/wow-assets/static/images/icons/56/'.$row_icon[8]['icon'].'.jpg" alt="" /><span class="frame"></span></a>
									</div>
								</div>
							</div>';
						}
						else
						{
							echo '	
							<div class="slot slot-9" style=" left: 0px; top: 406px;">
								<div class="slot-inner">
									<div class="slot-contents">
										<a href="javascript:;" class="empty"><span class="frame"></span></a>
									</div>
								</div>
							</div>';
						}
						if(!empty($row_item[9]))
						{
							echo '
							<div class="slot slot-10 slot-align-right item-quality-'.$row_item[9]['Quality'].'" style=" right: 0px; top: 0px;">
								<div class="slot-inner">
									<div class="slot-contents">
										<a href="http://fr.wowhead.com/item='.$row_item[9]['itemEntry'].'" class="item"><img src="http://eu.battle.net/wow-assets/static/images/icons/56/'.$row_icon[9]['icon'].'.jpg" alt="" /><span class="frame"></span></a>
									</div>
								</div>
							</div>';
						}
						else
						{
							echo '	
							<div class="slot slot-10 slot-align-right" style=" right: 0px; top: 0px;">
								<div class="slot-inner">
									<div class="slot-contents">
										<a href="javascript:;" class="empty"><span class="frame"></span></a>
									</div>
								</div>
							</div>';
						}
						if(!empty($row_item[5]))
						{
							echo '
							<div class="slot slot-6 slot-align-right item-quality-'.$row_item[5]['Quality'].'" style=" right: 0px; top: 58px;">
								<div class="slot-inner">
									<div class="slot-contents">
										<a href="http://fr.wowhead.com/item='.$row_item[5]['itemEntry'].'" class="item"><img src="http://eu.battle.net/wow-assets/static/images/icons/56/'.$row_icon[5]['icon'].'.jpg" alt="" /><span class="frame"></span></a>
									</div>
								</div>
							</div>';
						}
						else
						{
							echo '	
							<div class="slot slot-6 slot-align-right" style=" right: 0px; top: 58px;">
								<div class="slot-inner">
									<div class="slot-contents">
										<a href="javascript:;" class="empty"><span class="frame"></span></a>
									</div>
								</div>
							</div>';
						}
						if(!empty($row_item[6]))
						{
							echo '
							<div class="slot slot-7 slot-align-right item-quality-'.$row_item[6]['Quality'].'" style=" right: 0px; top: 116px;">
								<div class="slot-inner">
									<div class="slot-contents">
										<a href="http://fr.wowhead.com/item='.$row_item[6]['itemEntry'].'" class="item"><img src="http://eu.battle.net/wow-assets/static/images/icons/56/'.$row_icon[6]['icon'].'.jpg" alt="" /><span class="frame"></span></a>
									</div>
								</div>
							</div>';
						}
						else
						{
							echo '	
							<div class="slot slot-7 slot-align-right" style=" right: 0px; top: 116px;">
								<div class="slot-inner">
									<div class="slot-contents">
										<a href="javascript:;" class="empty"><span class="frame"></span></a>
									</div>
								</div>
							</div>';
						}
						if(!empty($row_item[7]))
						{
							echo '
							<div class="slot slot-8 slot-align-right item-quality-'.$row_item[7]['Quality'].'" style=" right: 0px; top: 174px;">
								<div class="slot-inner">
									<div class="slot-contents">
										<a href="http://fr.wowhead.com/item='.$row_item[7]['itemEntry'].'" class="item"><img src="http://eu.battle.net/wow-assets/static/images/icons/56/'.$row_icon[7]['icon'].'.jpg" alt="" /><span class="frame"></span></a>
									</div>
								</div>
							</div>';
						}
						else
						{
							echo '	
							<div class="slot slot-8 slot-align-right" style=" right: 0px; top: 174px;">
								<div class="slot-inner">
									<div class="slot-contents">
										<a href="javascript:;" class="empty"><span class="frame"></span></a>
									</div>
								</div>
							</div>';
						}
						if(!empty($row_item[10]))
						{
							echo '
							<div class="slot slot-11 slot-align-right item-quality-'.$row_item[10]['Quality'].'" style=" right: 0px; top: 232px;">
								<div class="slot-inner">
									<div class="slot-contents">
										<a href="http://fr.wowhead.com/item='.$row_item[10]['itemEntry'].'" class="item"><img src="http://eu.battle.net/wow-assets/static/images/icons/56/'.$row_icon[10]['icon'].'.jpg" alt="" /><span class="frame"></span></a>
									</div>
								</div>
							</div>';
						}
						else
						{
							echo '	
							<div class="slot slot-11 slot-align-right" style=" right: 0px; top: 232px;">
								<div class="slot-inner">
									<div class="slot-contents">
										<a href="javascript:;" class="empty"><span class="frame"></span></a>
									</div>
								</div>
							</div>';
						}
						if(!empty($row_item[11]))
						{
							echo '
							<div class="slot slot-11 slot-align-right item-quality-'.$$row_item[11]['Quality'].'" style=" right: 0px; top: 290px;">
								<div class="slot-inner">
									<div class="slot-contents">
										<a href="http://fr.wowhead.com/item='.$$row_item[11]['itemEntry'].'" class="item"><img src="http://eu.battle.net/wow-assets/static/images/icons/56/'.$row_icon[11]['icon'].'.jpg" alt="" /><span class="frame"></span></a>
									</div>
								</div>
							</div>';
						}
						else
						{
							echo '	
							<div class="slot slot-11 slot-align-right" style=" right: 0px; top: 290px;">
								<div class="slot-inner">
									<div class="slot-contents">
										<a href="javascript:;" class="empty"><span class="frame"></span></a>
									</div>
								</div>
							</div>';
						}
						if(!empty($row_item[12]))
						{
							echo '
							<div class="slot slot-12 slot-align-right item-quality-'.$row_item[12]['Quality'].'" style=" right: 0px; top: 348px;">
								<div class="slot-inner">
									<div class="slot-contents">
										<a href="http://fr.wowhead.com/item='.$row_item[12]['itemEntry'].'" class="item"><img src="http://eu.battle.net/wow-assets/static/images/icons/56/'.$row_icon[12]['icon'].'.jpg" alt="" /><span class="frame"></span></a>
									</div>
								</div>
							</div>';
						}
						else
						{
							echo '	
							<div class="slot slot-12 slot-align-right" style=" right: 0px; top: 348px;">
								<div class="slot-inner">
									<div class="slot-contents">
										<a href="javascript:;" class="empty"><span class="frame"></span></a>
									</div>
								</div>
							</div>';
						}
						if(!empty($row_item[13]))
						{
							echo '
							<div class="slot slot-12 slot-align-right item-quality-'.$row_item[13]['Quality'].'" style=" right: 0px; top: 406px;">
								<div class="slot-inner">
									<div class="slot-contents">
										<a href="http://fr.wowhead.com/item='.$row_item[13]['itemEntry'].'" class="item"><img src="http://eu.battle.net/wow-assets/static/images/icons/56/'.$row_icon[13]['icon'].'.jpg" alt="" /><span class="frame"></span></a>
									</div>
								</div>
							</div>';
						}
						else
						{
							echo '	
							<div class="slot slot-12 slot-align-right" style=" right: 0px; top: 406px;">
								<div class="slot-inner">
									<div class="slot-contents">
										<a href="javascript:;" class="empty"><span class="frame"></span></a>
									</div>
								</div>
							</div>';
						}
						if(!empty($row_item[15]))
						{
							echo '
							<div class="slot slot-21 slot-align-right item-quality-'.$row_item[15]['Quality'].'" style=" left: 241px; bottom: 0px;">
								<div class="slot-inner">
									<div class="slot-contents">
										<a href="http://fr.wowhead.com/item='.$row_item[15]['itemEntry'].'" class="item"><img src="http://eu.battle.net/wow-assets/static/images/icons/56/'.$row_icon[15]['icon'].'.jpg" alt="" /><span class="frame"></span></a>
									</div>
								</div>
							</div>';
						}
						else
						{
							echo '	
							<div class="slot slot-21 slot-align-right" style=" left: 241px; bottom: 0px;">
								<div class="slot-inner">
									<div class="slot-contents">
										<a href="javascript:;" class="empty"><span class="frame"></span></a>
									</div>
								</div>
							</div>';
						}
						if(!empty($row_item[16]))
						{
							echo '
							<div class="slot slot-22 item-quality-'.$row_item[16]['Quality'].'" style=" left: 306px; bottom: 0px;">
								<div class="slot-inner">
									<div class="slot-contents">
										<a href="http://fr.wowhead.com/item='.$row_item[16]['itemEntry'].'" class="item"><img src="http://eu.battle.net/wow-assets/static/images/icons/56/'.$row_icon[16]['icon'].'.jpg" alt="" /><span class="frame"></span></a>
									</div>
								</div>
							</div>';
						}
						else
						{
							echo '	
							<div class="slot slot-22" style=" left: 306px; bottom: 0px;">
								<div class="slot-inner">
									<div class="slot-contents">
										<a href="javascript:;" class="empty"><span class="frame"></span></a>
									</div>
								</div>
							</div>';
						}
						if(!empty($row_item[17]))
						{
							echo '
							<div class="slot slot-15 item-quality-'.$row_item[17]['Quality'].'" style=" left: 371px; bottom: 0px;">
								<div class="slot-inner">
									<div class="slot-contents">
										<a href="http://fr.wowhead.com/item='.$row_item[17]['itemEntry'].'" class="item"><img src="http://eu.battle.net/wow-assets/static/images/icons/56/'.$row_icon[17]['icon'].'.jpg" alt="" /><span class="frame"></span></a>
									</div>
								</div>
							</div>';
						}
						else
						{
							echo '	
							<div class="slot slot-15" style=" left: 371px; bottom: 0px;">
								<div class="slot-inner">
									<div class="slot-contents">
										<a href="javascript:;" class="empty"><span class="frame"></span></a>
									</div>
								</div>
							</div>';
						}
						echo '	
					</div>
				</div>
			</div>
			<div class="summary-bottom">
				<div class="profile-recentactivity">
					<h3 class="category ">Terminee a 60%</h3>
					<div class="profile-box-simple">
						<ul class="activity-feed">
						</ul>
						<span class="clear"><!-- --></span>
					</div>
				</div>
				<div class="summary-bottom-left">
					<div class="summary-talents" id="summary-talents">
						<ul>
							<li class="summary-talents-0">
								<a>
									<span class="inner">
										<span class="icon">
											<img src="http://eu.battle.net/wow-assets/static/images/icons/36/inv_misc_questionmark.jpg" alt="" />
											<span class="frame"></span>
										</span>
										<span class="name-build">
											<span class="name">Talents</span>
											<span class="build">0<ins>/</ins>0<ins>/</ins>0</span>
										</span>
									</span>
								</a>
							</li>
							<li class="summary-talents-0">
								<a class="active">
									<span class="inner">
										<span class="checkmark"></span>
										<span class="icon">
											<img src="http://eu.battle.net/wow-assets/static/images/icons/36/inv_misc_questionmark.jpg" alt="" />
											<span class="frame"></span>
										</span>
										<span class="name-build">
											<span class="name">Talents</span>
											<span class="build">0<ins>/</ins>0<ins>/</ins>0</span>
										</span>
									</span>
								</a>
							</li>
						</ul>
					</div>
					<div class="summary-health-resource">
						<ul>
							<li class="health" id="summary-health"><span class="name">Sant&eacute;</span><span class="value">'.$row_characters_guid['health'].'/'.$row_stats['maxhealth'].'</span></li>';
							if($row_characters_guid['class'] == 1)
							{
								echo '<li class="resource-1" id="summary-power"><span class="name">Rage</span><span class="value">'.$row_characters_guid['power2'].'/'.$row_stats['maxpower2'].'</span></li>';
							}
							if($row_characters_guid['class'] == 3)
							{
								echo '<li class="resource-1" id="summary-power"><span class="name">Rage</span><span class="value">'.$row_characters_guid['power3'].'/'.$row_stats['maxpower3'].'</span></li>';
							}
							elseif($row_characters_guid['class'] == 4)
							{
								echo '<li class="resource-3" id="summary-power"><span class="name">&Eacute;nergie</span><span class="value">'.$row_characters_guid['power4'].'/'.$row_stats['maxpower4'].'</span></li>';
							}
							elseif($row_characters_guid['class'] == 6)
							{
								echo '<li class="resource-6" id="summary-power"><span class="name">Runique</span><span class="value">'.$row_characters_guid['power7'].'/'.$row_stats['maxpower7'].'</span></li>';
							}
							elseif(($row_characters_guid['class'] == 2) ||($row_characters_guid['class'] == 5) || ($row_characters_guid['class'] == 7) || ($row_characters_guid['class'] == 8) || ($row_characters_guid['class'] == 9) || ($row_characters_guid['class'] == 11))
							{
								echo '<li class="resource-0" id="summary-power"><span class="name">Mana</span><span class="value">'.$row_characters_guid['power1'].'/'.$row_stats['maxpower1'].'</span></li>';
							}
							echo '
						</ul>
					</div>
					<div class="summary-stats-profs-bgs">
						<div class="summary-stats" id="summary-stats">
							<div id="summary-stats-simple" class="summary-stats-simple">
								<div class="summary-stats-simple-base">
									<div class="summary-stats-column">
										<h4>Base</h4>
										<ul>
											<li data-id="strength" class="">
												<span class="name">Force</span>
												<span class="value">'.$row_stats['strength'].'</span>
												<span class="clear"><!-- --></span>
											</li>
											<li data-id="agility" class="">
												<span class="name">Agilit&eacute;</span>
												<span class="value">'.$row_stats['agility'].'</span>
												<span class="clear"><!-- --></span>
											</li>
											<li data-id="stamina" class="">
												<span class="name">Endurance</span>
												<span class="value">'.$row_stats['stamina'].'</span>
												<span class="clear"><!-- --></span>
											</li>
											<li data-id="intellect" class="">
												<span class="name">Intelligence</span>
												<span class="value">'.$row_stats['intellect'].'</span>
												<span class="clear"><!-- --></span>
											</li>
											<li data-id="spirit" class="">
												<span class="name">Esprit</span>
												<span class="value">'.$row_stats['spirit'].'</span>
												<span class="clear"><!-- --></span>
											</li>
										</ul>
									</div>
									<br />
								</div>
								<div class="summary-stats-simple-other">
									<a id="summary-stats-simple-arrow" class="summary-stats-simple-arrow" href="javascript:;"></a>
									<div class="summary-stats-column">
										<h4>D&eacute;fense</h4>
										<ul>
											<li data-id="armor" class="">
												<span class="name">Armure</span>
												<span class="value color-q2">'.$row_stats['armor'].'</span>
												<span class="clear"><!-- --></span>
											</li>
											<li data-id="dodge" class="">
												<span class="name">Esquive</span>
												<span class="value">'.$row_stats['dodgePct'].' %</span>
												<span class="clear"><!-- --></span>
											</li>
											<li data-id="parry" class="">
												<span class="name">Parade</span>
												<span class="value">'.$row_stats['parryPct'].' %</span>
												<span class="clear"><!-- --></span>
											</li>
											<li data-id="block" class="">
												<span class="name">Blocage</span>
												<span class="value">'.$row_stats['blockPct'].' %</span>
												<span class="clear"><!-- --></span>
											</li>
											<li data-id="resilience" class="">
												<span class="name">R&eacute;silience</span>
												<span class="value">'.$row_stats['resilience'].'</span>
												<span class="clear"><!-- --></span>
											</li>
										</ul>
									</div>
								</div>
								<div class="summary-stats-end"></div>
							</div>
						</div>
						<div class="summary-stats-bottom">
							<div class="summary-battlegrounds">
								<ul>
									<li class="kills">
										<span class="name">Victoires honorables</span>
										<span class="value">'.$row_characters_guid['totalKills'].'</span>	
										<span class="clear"><!-- --></span>
									</li>
								</ul>
							</div>
							<span class="clear"><!-- --></span>
						</div>
					</div>
				</div>
				<span class="clear"><!-- --></span>
				<span class="clear"><!-- --></span>
			</div>
		</div>
		<span class="clear"><!-- --></span>
	</div>
	</div>
</div>';
}
else
{
	$site->redirect('home',0);
}
?>
