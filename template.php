<div class = 'contents'>
	<a id = 'titleLink' href = './' rel = 'internal'>
	<div class = 'titleDiv'>
		<h1 id = 'title'>くどアンテナ</h1>
		<h3 id = 'subTitle'>-2chまとめブログの記事を紹介するアンテナサイト-</h3>
	</div><!--titleDiv-->
	</a>

	<div id = 'left2'><!--中央と左のボックスの集まり-->
		<div id = 'main'>
			<?php include('./displayArticles.php'); ?>
			
		</div><!--main-->
		<div id = 'leftSub'>
			<?php 
			include('./displayCatagory.php');
			include('./displayCaution.php');
			include('./displaySettings.php');
			//include('./leftBanner.php');
			include('./displayMutualLinkSites.php');
			?>			
		</div><!--leftSub-->
	</div><!--left2-->
	<div id = 'rightSub'>
		<div id = 'dpa'>
			<?php include ('./displayPopularArticles.php'); ?>
		</div>
		<?php include ('./displayLinkSites.php'); ?>
		<?php //include ('./rightBanner.php')?>
	</div><!--rightSub-->


	<!--フッター-->
	<footer>
		<aside>
		<br/>
		<div id = "foot">
			<ul>
				<li><p>　</p></li>
				<li><p>　</p></li>
				<li><p>　</p></li>
				<li><p>　</p></li>
				<li><p>　</p></li>
				<li><p>　</p></li>
				<li><p>　</p></li>
				<li><p>　</p></li>
				<li><p>　</p></li>
				<li><p>　</p></li>
				<li><p>　</p></li>
				<li><p>　</p></li>
				<?php
					echo '<li><p><a href = "./" rel = "internal">トップ</a></p></li>';
					echo '<li><p><a href = "./?id=about" rel = "internal">このサイトについて</a></p></li>';
					echo '<li><p><a href = "./?id=form" rel = "internal">お問い合わせ</a></p></li>';
				?>
			</ul>
		</div>
		<br/>
		</aside>
		<h5 id = 'aj'> </h5>
		<hr id = hrStyle/>
		<p id = "copyright">
			<small>Copyright&copy 2013 くどアンテナ. All rights reserved.</small>
		</p>
	</footer>
</div><!--contentsのdiv-->
