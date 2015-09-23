<?php require "../includes/helpers.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tom Millard - Web Developer</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- The style sheet can be found here '/styles/main.css' -->
	<style>
		<?php echo file_get_contents("styles/main.min.css"); ?>
	</style>

	<meta name="description" content="A full stack developer, shell script lover and a UX enthusiast.">

	<meta property="og:title" content="Tom Millard - Web Developer">
	<meta property="og:type" content="company">
	<meta property="og:url" content="http://tom-millard.com">
	<meta property="og:image" content="http://tom-millard.com/og.png">
	<meta property="og:description" content="A full stack developer, shell script lover and a UX enthusiast.">

	<meta name="twitter:card" content="summary" />
	<meta name="twitter:site" content="@millard_" />
	<meta name="twitter:title" content="Tom Millard - Web Developer" />
	<meta name="twitter:description" content="A full stack developer, shell script lover and a UX enthusiast." />
	<meta name="twitter:image" content="http://tom-millard.com/og.png" />
	<meta name="twitter:url" content="http://tom-millard.com" />

	<link rel="author" href="https://plus.google.com/117590259982603939704" />

</head>
<body>
	<!-- Standard HTML5 Website -->
	<nav class="header bar" data="standard-sticky-header">
		<img src="<?php echo getBase64Image("../app/images/logo.png"); ?>" alt="Tom Millard" style='position: absolute;left: 5px;top: 5px;height : 45px;'>
		<div>
			<ul class="inline-list text--right">
				<li>
					<a href="https://github.com/Tom-Millard/tom-millard.com" class="btn btn--roller" target="_blank" title='Github'>
						<div class="btn--roller__container">
						  <div class="btn--roller__item">
						  	<i class="icon-github-circled btn--roller__icon"></i>
						  </div>
						  <div class="btn--roller__item">
						  	<i class="icon-github-circled btn--roller__icon"></i>
						  </div>
						</div>
					</a>
				</li>
				<li>
					<a href="https://twitter.com/millard_" class="btn btn--roller" target="_blank" titla='Twitter'>
						<div class="btn--roller__container">
						  <div class="btn--roller__item">
						  	<i class="icon-twitter btn--roller__icon"></i>
						  </div>
						  <div class="btn--roller__item">
						  	<i class="icon-twitter btn--roller__icon"></i>
						  </div>
						</div>
					</a>
				</li>
				<li>
					<a href="http://blog.tom-millard.com" class="btn btn--roller">
						<div class="btn--roller__container">
						  <div class="btn--roller__item text">
						  	Blog
						  </div>
						  <div class="btn--roller__item text">
						  	Blog
						  </div>
						</div>
					</a>
				</li>
			</ul>
		</div>
	</nav>
	<section class="full" data="standard-100%-silly-intro-page">
		<div class="cover"></div>
		<div class="container--small">
			<div class="container--intro">
				<div class="coffee-consumed" id="js-coffee-counter" style="opacity : 0;">
					<p>
						<span class="coffee-consumed__counter js-coffee-counter" id="js-coffee-counter__value">0</span> Coffee's Drunk
					</p>
				</div>
				<img src="<?php echo getBase64Image("../app/images/me.png"); ?>" alt="Thats me By Andrew Foster" class="respond-image main-image" style='float : right;margin-left:15px;' id="js-coffee-counter__trigger">				
				<h1 class="h1--intro">
					EAT<br />SLEEP<br />CODE<br />REPEAT
				</h1>
				<span class="strap">I am <strong class="red">Tom</strong>.<br /> I build websites.</span>
			</div>
		</div>
	</section>
	<section class="block block--dark block__noMargins" id="the-latest">
		<div class="container">
			<h1 class="italic strikeThrough h2 w80 margin-center">
				<span class="dark--bg">.the-latest</span>
				<hr />
			</h1>
			<ul class="feed" id="news-feed">
				<?php foreach(json_decode( file_get_contents("http://feed.tom-millard.com/blog.php") ) as $entry ) : ?>
					<li>
						<a href="<?php echo $entry->l ?>" title="<?php echo $entry->t ?>" target="_blank">
							<?php echo $entry->t ?> <i class='icon-link-ext'></i>
						</a>
					</li>
				<?php endforeach; ?>
			</ul>
			<div class="container">
				<a href="https://twitter.com/millard_" target="_blank">
					<h2 class="strikeThrough w80 margin-center display--block">
							<span>
							  	<shape-circle>
							  		<i class="icon-twitter"></i>
								</shape-circle>
							</span>
						<hr style="top : 30%;" />
					</h2>
				</a>
				<p>
					&#8220;<?php echo (string) json_decode( file_get_contents("http://feed.tom-millard.com/twitter.php") )[0]->t; ?>&#8221;
				</p>
			</div>
			<div class="container sub-footer">
				<p class="small">Illustrations By <a href="http://www.andrewfosterdesign.com/" target="_blank" title="Andrew Foster Design">Andrew Foster</a></p>
			</div>
		</div>
	</section>
	<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<script src="/scripts/main.js"></script>
	<script>
  		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-48660129-2', 'tom-millard.com');
		ga('send', 'pageview');
	</script>
</body>
</html>