<!--
	Looks like you found the code for this site, amazing. Its a bit of a tip in here, hopefully will clean it up soon :(
-->
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
		<div>
			<ul class="inline-list text--right">
				<li>
					<a href="https://github.com/Tom-Millard/tom-millard.com" class="btn btn--roller" target="_blank">
						<div class="roller">
						  <i class="fa fa-lg fa-github rollItem"></i>
						  <i class="fa fa-lg fa-github rollItem"></i>
						</div>
					</a>
				</li>
				<li>
					<a href="https://twitter.com/millard_" class="btn btn--roller" target="_blank">
						<div class="roller">
						  <i class="fa fa-lg fa-twitter rollItem"></i>
						  <i class="fa fa-lg fa-twitter rollItem"></i>
						</div>
					</a>
				</li>
				<li>
					<a href="http://blog.tom-millard.com" class="btn btn--roller">
						<div class="roller">
						  <span class="rollItem text">Blog</span>
						  <span class="rollItem text">Blog</span>
						</div>
					</a>
				</li>
				<li>
					<a href="" class="btn btn--roller btn--highlight js-email-address">
						<div class="roller">
						  <span class="rollItem text">Hire Me</span>
						  <span class="rollItem text">Hire Me</span>
						</div>
					</a>
				</li>
			</ul>
		</div>
	</nav>
	<section class="full" data="standard-100%-silly-intro-page">
		<div class="cover"></div>
		<div class="container">
			<div class="row">
				<div class="row__col row__col50 container--intro">
					<h1 class="h1--intro">
						EAT<br />SLEEP<br />CODE<br />REPEAT
					</h1>
					<span class="strap">I am <strong class="red">Tom</strong>.<br /> I build websites.</span>
					<a href="#what-i-do" class="btn-animate btn__spacing js-scrollTo btn--highlight">
						<cube>
							<side class="front side">Find out more.</side>
							<side class="bottom side"><i class="fa fa-chevron-down"></i></side>
						</cube>
					</a>
				</div>
				<div class="row__col row__col50 me-block">
					<img src="/images/me.png" alt="Thats me By Andrew Foster" class="respond-image">
				</div>
			</div>
		</div>
	</section>
	<section class="block block--blue" id="what-i-do">
		<div class="container">
			<h1>.What-I-do</h1>
			<p>
				I build websites with a strong emphasis on <strong>usability</strong>. I produce light-weight solutions enabling your client to access information fast, through the delights of responsive design.
			</p>
			<p>
				For a detailed list of skills and tech, please visit my <a href="http://cv.tom-millard.com" title="CV" target="_blank">CV</a>.
			</p>
		</div>
	</section>
	<section class="block" id="how-i-do-it">
		<div class="container">
			<h1>.How-I-do-it</h1>
			<div class="flow">
				<div class="col">
					<div class="flow-block">
						<i class="fa fa-users fa-lg"></i>
						<span class="display-block">Discuss</span>
					</div>
				</div>
				<div class="col arrow"><i class="fa fa-arrows-h"></i></div>
				<div class="col">
					<div class="flow-block">
						<i class="fa fa-pencil fa-lg"></i>
						<span class="display-block">Prototype</span>
					</div>
				</div>
				<div class="col arrow"><i class="fa fa-arrows-h"></i></div>
				<div class="col">
					<div class="flow-block">
						<i class="fa fa-refresh fa-lg"></i>
						<span class="display-block">Feedback</span>
					</div>
				</div>
				<div class="col arrow"><i class="fa fa-arrows-h"></i></div>
				<div class="col">
					<div class="flow-block">
						<i class="fa fa-wrench fa-lg"></i>
						<span class="display-block">Build</span>
					</div>
				</div>
				<div class="col arrow"><i class="fa fa-arrows-h"></i></div>
				<div class="col">
					<div class="flow-block">
						<i class="fa fa-rocket fa-lg"></i>
						<span class="display-block">Release</span>
					</div>
				</div>
			</div>
			<p>
				As a full stack developer, shell script lover and a UX enthusiast, I can utilise a wide range of skills depending on your digital projects.
			</p>
			<p>
				I work straight into the browser. This allows you to see exactly how the finished site would work cross-browser and cross device, enabling you to watch your website develop in the environment it was built to work in. 			</p>
		</div>
	</section>
	<section class="block block--dark block__noMargins" id="contact-me">
		<div class="container">
			<h1>.Contact-Me</h1>
			<a href="" class="btn-animate btn__lrg js-email-address">
				<cube>
				  <side class="front side">Let's Talk</side>
				  <side class="bottom side"><i class="fa fa-envelope-o fa-lg"></i></side>
				</cube>
			</a>
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
							<?php echo $entry->t ?> <i class="fa fa-external-link"></i>
						</a>
					</li>
				<?php endforeach; ?>
			</ul>
			<div class="container">
				<a href="https://twitter.com/millard_" target="_blank">
					<h2 class="strikeThrough w80 margin-center display--block">
							<span class="fa-stack">
							  <i class="fa fa-circle fa-stack-2x dark--bg"></i>
							  <i class="fa fa-twitter fa-stack-1x dark"></i>
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