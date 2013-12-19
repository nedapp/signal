<?php
/*
Template Name: Player page
*/

get_header("head"); ?>

<body class="player-body">
	<div class="player">
		<div class="content">
			<div class="header">
				<div class="icon icon-radio"></div>
				<div class="icon icon-comments"></div>
			</div>
			<div class="song"></div>
			<div class="share">
				<div class="button like"></div>
				<div class="button facebook"></div>
				<div class="button twitter"></div>
			</div>
			<div class="program">
				<div class="icon icon-mic"></div>
				<div class="icon icon-download"></div>
				<span class="status">On air</span>
				<div class="show">
					<span class="speaker">Vladimir Vucinic</span>&nbsp;-&nbsp;
					<span class="name">Jutarnji program</span>
				</div>
			</div>
			<div class="banner"></div>
		</div>
		<div class="content feeds">
			<div class="header">
				<span class="chat">Caskajte</span>
				<div class="icon twitter active"></div>
				<div class="icon facebook"></div>
			</div>
			<div class="feeds-container twitter">
				<a class="twitter-timeline"  href="https://twitter.com/RadioSignal"  data-widget-id="413767629279465473">Tweets by @RadioSignal</a>
				<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
			</div>
			<div class="feeds-container facebook">
				<div class="fb-comments" data-href="http://example.com/comments" data-width="400px" data-numposts="3" data-colorscheme="light" mobile="false"></div>
				<div id="fb-root"></div>
				<script>(function(d, s, id) {
						var js, fjs = d.getElementsByTagName(s)[0];
						if (d.getElementById(id)) return;
						js = d.createElement(s); js.id = id;
						js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=159602787400180";
						fjs.parentNode.insertBefore(js, fjs);
					}(document, 'script', 'facebook-jssdk'));
				</script>
			</div>
			<div class="banner"></div>
		</div>
	</div>
	<!-- FACEBOOK -->


</body>