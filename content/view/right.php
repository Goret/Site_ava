<div id="right" class="ajax-update">
	<?php
	echo '
	<div class="sidebar-module" id="sidebar-sotd">
		<div>
			<div class="sidebar-title">
				<h3 class="title-sotd">
					<a>Royaume '.$royaume->array_realmlist['name'].'</a>
				</h3>
			</div>
			<div class="sidebar-content">
				<p><font color="white">Realmlist :</font> set realmlist '.$royaume->array_realmlist['address'].'</p>
				<p><font color="white">Statut :</font> ';
				if ($royaume->is_online())
				{
					echo '<strong><font color="green">En ligne</font></strong></p>
					<p><font color="white">En ligne depuis :</font> '.$royaume->uptime.'</p>

					<p style="text-align: center;">
						<font color="white">Alliance :</font> '.$royaume->nb_alliance_online.' <font color="white">Horde :</font> '.$royaume->nb_horde_online.' <font color="white">Total :</font> '.count($royaume->array_online).' 
					</p>';
				}
				else
				{
					echo '<strong><font color="red">Hors-ligne</font></strong>';
				}
				?>
			</div>
		</div>
	</div>
	    <div class="sidebar-module" id="sidebar-sotd">
            <div>
                 <div class="sidebar-title">
                     <h3 class="title-sotd">
                         <a>Support</a>
                     </h3>
                 </div>
                 <div class="sidebar-content">
                    <p>~ <a href="https://bitbucket.org/Avalonserver/avalon/issues" target="_blank">Bug Tracker (Rapportez vos bugs)</a><br/></p>
                 </div>
            </div>
        </div>
	<div class="sidebar-module" id="sidebar-sotd">
		<div>
			<div class="sidebar-title">
				<h3 class="title-sotd">
					<a>Top voteurs</a>
				</h3>
			</div>
			<div class="sidebar-content">
			<table class="table" border="0" cellspacing="0" cellpadding="3" width="100%">
				<thead>
					<tr>
						<th class="iconCol"><a href="javascript:;" class="sort-link">Top</a></th>
						<th><a href="javascript:;" class="sort-link numeric">Joueur</a></th>
						<th class="iconCol"><a href="javascript:;" class="sort-link numeric">Points</a></th>
					</tr>
				</thead>
				<?php
				if (!empty($site->array_vote))
				{
					foreach($site->array_vote as $key => $vote)
					{
						if ($key < 3)
						{
							echo '
							<tbody>
							<tr class="row2">
								<td class="iconCol"><img src="style/images/icons/top/'.$top[$key].'.png"/></td>
								<td>'.$site->array_vote_user[$key].'</td>
								<td class="iconCol">'.$vote['points'].'</td>
							</tr>
							</tbody>';
						}
					}
				}
				else
				{
					echo '
					<tbody>
						<tr class="row2" align="center">
							<td colspan="3"><strong><font color="red">Il n\'y a pas de voteurs !</font></strong></td>
						</tr>
					</tbody>';
				}
				?>
			</table>
			</div>
		</div>
		<br/>
        <div class="sidebar-module" id="sidebar-sotd">
                <div>
                        <div class="sidebar-title">
                                <h3 class="title-sotd">
                                        <a href="/wow/fr/media/screenshots/screenshot-of-the-day/cataclysm">Cliché du jour</a>
                                </h3>
                        </div>
                        <div class="sidebar-content">
                                <div class="sotd" style="background-image: url('style/images/module screenshot.jpg');">
                                        <a href="#" class="image"> </a>
                                        <div class="caption">
                                                <a href="#" class="view">Tous les clichés</a>
                                                <a href="#" class="submit">Envoyer un cliché</a>
                        <span class="clear"><!-- --></span>
                                        </div>
                                </div>
                        </div>
                </div>
        </div>
        <div class="sidebar-module" id="sidebar-sotd">
                <div>
                        <div class="sidebar-title">
                                <h3 class="title-sotd">
                                        <a>Média</a>
                                </h3>
                        </div>
                        <div class="sidebar-content">
                                <p><iframe src="http://player.vimeo.com/video/20224448?title=0&amp;byline=0&amp;portrait=0" width="305" height="300" frameborder="0"></iframe></p>
                        </div>
                </div>
        </div>
		<!--<div class="sidebar-module" id="sidebar-sotd">
			<div>
				<div class="sidebar-title">
					<h3 class="title-sotd">
						<a>Support</a>
					</h3>
				</div>
				<div class="sidebar-content">
					<p>~ <a href="tracker">Bug Tracker (Rapportez vos bugs)</a><br/>~ <a href="?page=Rechercher">Bug Tracker (Rapportez vos bugs)</a></p>
				</div>
			</div>
		</div>-->
	</div>
</div>
<span class="clear"><!-- --></span>
