<!DOCTYPE html>

<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8" />

	<!-- Set the viewport width to device width for mobile -->
	<meta name="viewport" content="width=device-width" />

	<title>Simple Responsive Tumblr Blog Application</title>
  
	<!-- Included CSS Files -->
	<link rel="stylesheet" href="stylesheets/foundation.css">
	<link rel="stylesheet" href="stylesheets/app.css">

	<!--[if lt IE 9]>
		<link rel="stylesheet" href="stylesheets/ie.css">
	<![endif]-->
	
	<script src="javascripts/modernizr.foundation.js"></script>

	<!-- IE Fix for HTML5 Tags -->
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

</head>
<body>

	<!-- container -->
	<div class="container">

		<div class="row">
			<div class="twelve columns">
				<h4>Simple Tumblr Blog Application</h4>
				<p>You don't need to worry about building a backend to your website. You don't need a database. Only thing you need is a Tumblr Blog. Embed your Tumblr blog articles into your website.</p>
				<p>This is version 0.1</p>
				<p>What is in it?</p>
				<ul>
					<li>Foundation Framework from ZURB</li>
					<li>Tumblr Blog</li>
					<li>PHP</li>
				</ul>
				<p>What you need to do?</p>
					<ul>
						<li>Create a Tumblr account</li>
						<li>Create your first Tumblr blog</li>
						<li>Edit the HTML (modify this "http://maksat.tumblr.com/api/read?type=post&start=0&num=50")</li>
						<li>That is it. This will give you a quick start. You can work on this simple app.</li>
					</ul>
				<hr />
			</div>
		</div>

<?php
		$tumblr_api = "http://maksat.tumblr.com/api/read?type=post&start=0&num=50";
		$tumblr_xml = simplexml_load_file($tumblr_api);
	
		foreach($tumblr_xml->posts->post as $blog)
		{
			$title = $blog->{'regular-title'};
			$post = $blog->{'regular-body'};
			$link = $blog['url'];
			$date = $blog['date'];
			$id = $blog['id'];
		
			$post_snippet = substr($post,0,300);
		
			$exploded = explode(" ", $title);
			$modTitle = implode("_", $exploded);
			
			echo "<div class='row'>";
			echo "<div class='twelve columns'>";
			echo "<h4>".$title."</h4>";
			echo "<p><em>".$date."</em></p>";
			echo "<p>".$post_snippet."</p>";
			echo "<span><a class='nice small radius blue button' href='#'>read more</a></span>";
			echo "</div>";
			echo "</div>";
		}
	}
?>

	</div>
	<!-- container -->




	<!-- Included JS Files -->
	<script src="javascripts/jquery.min.js"></script>
	<script src="javascripts/foundation.js"></script>
	<script src="javascripts/app.js"></script>

</body>
</html>
