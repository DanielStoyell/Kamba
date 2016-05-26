<?php $thisPage="TAKEACTION";
	require_once 'includes/config.php';
	
	$data = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 

	$result = $data->query
	("
		SELECT * FROM Stats WHERE category = 'total_students_sponsored'
	");
	
	$row = $result->fetch_row();
	$sponsored = $row[1];
	
	$result = $data->query
	("
		SELECT * FROM Stats WHERE category = 'scholarship'
	");
	
	$row = $result->fetch_row();
	$scholars = $row[1];
	
	$result = $data->query
	("
		SELECT * FROM Stats WHERE category = 'students_sec'
	");
	
	$row = $result->fetch_row();
	$completed = $row[1];
?>
<!DOCTYPE html>
<!--  Kamba Foundation Website 
content and photographs provided by Kamba Foundation Team
designed and developed by Thanatchaporn Apivessa, Samantha Reig, Daniel Stoyell, Harley Mueller
-->
<html lang="">
	<head>
		<title>Take Action | The Kamba Foundation</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

		<!-- stylesheet -->
		<link rel="stylesheet" href="css/bootstrap.css" type="text/css">
		<link rel="stylesheet" href="css/stylesheet.css" type="text/css">

		<!-- fonts -->
		<link href='https://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>

		<!--javascript-->
		<script src="js/jquery-2.1.4.min.js"></script>
        <script src="js/main.js"></script>
	</head>
	<body>
	<?php include ('includes/navigation.php'); ?>
		<div id='donate'>
			<div class='content'>
				<img src='img/close.jpg' alt='close' class='close'>
				<p class="main">
					This information is currently unavailable. For now, please see our contact form, but check back with more direct info soon.
				</p>
			</div>
		</div>

		<!-- Load Facebook SDK for JavaScript -->
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<h1>Take Action</h1>
				</div> <!-- row title ends -->
			</div>
			<div class="row">
				<div class="col-xs-12">
					<img src="img/takeaction.jpg" alt="takeaction" class="header">
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<h2>Donate to Support Education</h2>
					<p class="main">Be a part of the movement</p>
					<br><br><br><br>
					<div class="impact_stats">
						<div class="statistics"><span class="number"><?php print("$sponsored") ?></span> <br> students<br> sponsored
						</div>
						<div class="statistics hide_stats"><span class="number"><?php print("$scholars") ?></span> <br> scholarship<br> recipients
						</div>
						<div class="statistics"><span class="number"><?php print("$completed") ?></span> <br> students completed<br> secondary education
						</div>
					</div>
					<br><br>
					<!--CONTENT and INTERACTIVITY: Address to mail-->
					<a href="#" class="donate_now">Donate Now</a>
					<br>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<h2>Share to Support Education</h2>
					<p class="main">Like what you see? Share it with your friends to help us support students and reduce poverty.</p>
					<br><br>
					<!--icon-->
					<div class="fb-share-button" data-href="http://www.kambafoundation.com" data-layout="button" data-mobile-iframe="true"></div>
					<a href="https://twitter.com/share" class="twitter-share-button" data-url="http://www.kambafoundation.com" data-size="large">Tweet</a> <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
					<a href="mailto:?subject=The%20Kamba%20Foundation"><img src="img/mail.svg" alt="email" id="emailShare"></a>
					<br>
				</div>
			</div>
		</div> <!-- container div ends -->
		<?php include ('includes/footer.php'); ?>
	</body>
</html>