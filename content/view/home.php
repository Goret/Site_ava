<div class="content-bot">	
	<div id="homepage">
		<div id="left">
			<?php require_once('slideshow.php'); ?>
			<?php require_once('featured-news.php'); ?>
			<div id="news-updates">
				<?php
				if (!empty($site->array_news))
				{
					foreach($site->array_news as $key => $news)
					{
						echo '
						<div class="news-article first-child">
							<h3>
								<a href="News-'.$news['id'].'#blog">'.$news['titre'].'</a>
							</h3>
							<div class="by-line">
								Par <a>'.$news['auteur'].'</a>';
								if (!empty($site->array_comm))
								{
									echo '
									|
									<a class="comments-link" href="News-'.$news['id'].'#comments">'.count($site->array_comm).'</a>
									';
								}
							echo '
							</div>
							<div class="article-left" style="background-image: url(\'style/images/logo_news.png\');">
								<a><img src="style/images/thumb-frame.gif"/></a>
							</div>
							<div class="article-right">
								<div class="article-summary">
									<p>'.nl2br($news['message']).'</p>
								</div>
							</div>
							<span class="clear"><!-- --></span>
						</div>';
					}
				}
				else
				{
					echo '
					<div class="news-article first-child" align="center">
						<strong><font color="red">Il n\'y a pas de news !</font></strong>
					</div>';
				}
				?>
			</div>
		</div>
		<?php require_once('right.php'); ?>
	</div>
</div>