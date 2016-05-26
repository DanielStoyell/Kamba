<?php $thisPage="HOME"; 
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
		<title>Home | The Kamba Foundation</title>
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
		<div id="playWrapper"><div id="player"></div></div>
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<h1 id="title_home">The Kamba Foundation</h1>
					<p class="tagline_index">Ending Poverty through Education</p>
				</div> <!-- row title ends -->
			</div>
			<div class="row">
				<div class="col-xs-12">
					<!--INTERACTIVITY: VIDEO FILE WITH THIS THUMBNAIL (0:30) WHEN THE USER CLICKS, MAKE IT FULL SCREEN)-->
					<script src="https://www.youtube.com/iframe_api"></script>
					<img src="img/videothumbnail.png" alt="video" class="video_thumbnail">
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<h2>What we do</h2>
					<div id="slider">
						<ul class="slides">
							<li class="slide"><a href="projects.php" class="onImg">Scholarship</a><img class="slideImg" src="img/scholarship.jpg" alt="Scholarship"></li>
							<li class="slide"><a href="projects.php" class="onImg">Mentorship</a><img class="slideImg" src="img/mentorship.jpg" alt="Mentorship"></li>
							<li class="slide"><a href="projects.php" class="onImg">Development</a><img class="slideImg" src="img/Development.jpg" alt="Development"></li>
							<!-- Mind: Change the picture once available-->
							<li class="slide"><a href="projects.php" class="onImg">Library</a><img class="slideImg" src="img/scholarship.jpg" alt="Library"></li>
							<li class="slide"><a href="projects.php" class="onImg">Scholarship</a><img class="slideImg" src="img/scholarship.jpg" alt="Scholarship"></li>
							<li class="slide"><a href="projects.php" class="onImg">Mentorship</a><img class="slideImg" src="img/mentorship.jpg" alt="Mentorship"></li>
							<li class="slide"><a href="projects.php" class="onImg">Development</a><img class="slideImg" src="img/Development.jpg" alt="Development"></li>
							<li class="slide"><a href="projects.php" class="onImg">Library</a><img class="slideImg" src="img/scholarship.jpg" alt="Library"></li>
						</ul>
					</div> <!-- end slider div -->
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<h2>Impact</h2>
					<!--REQUEST PHP and SQL: create a database to store stats so it's easy for Kamba to update?-->
					<div class="impact_stats">
						<div class="statistics"><span class="number"><?php print("$sponsored") ?></span> <br> students<br> sponsored
						</div>
						<div class="statistics hide_stats"><span class="number"><?php print("$scholars") ?></span> <br> scholars<br> recipients
						</div>
						<div class="statistics"><span class="number"><?php print("$completed") ?></span> <br> students completed<br> secondary education
						</div>
					</div>
					<br>
					<br>
					<a href="impact.php" class="read_more">read more</a>
					<br>
					<br>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<h2>Founding History</h2>
					<p class="main">The Kamba Foundation is a non-profit organization that was started in memory of Benson and Esther Kiiti Kamba.  Benson and Esther were both business and community leaders in Makueni and Machakos Counties.  They had exemplary vision for education as a key component of empowerment. Their lives reflected a commitment, passion, and service in providing educational opportunities for their own family...</p>    
					<br>
					<br>
					<a href="about.php" class="read_more">read more</a>
					<br>
				</div>
			</div>
		</div> <!-- container div ends -->
		<?php include ('includes/footer.php'); ?>
	</body>
</html>