<?php $thisPage="IMPACT"; 
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
		<title>Impact | The Kamba Foundation</title>
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
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<h1>Impact</h1>
				</div> <!-- row title ends -->
			</div>
			<div class="row">
				<div class="col-xs-12">
					<img src="img/impact.jpg" alt="impact" class="header">
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<h2>Beneficiaries</h2>
					<p class="main">The foundation targets young people in Makueni and Machakos Counties with a special focus on the disadvantaged. For the last few years, students from these areas have been recognized, nationally, for their academic achievements. Many of the students come from disadvantaged families who are not able to support these children to pursue higher education.</p>
					<br>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<div class="impact_statistics_diagram">
						<div class="row">
						 	<div class="col-xs-12 col-md-4">
						 		<img src="img/impact_stats.png" alt="#" class='impact_pie'>
						 	</div>
						 	<div class="col-xs-12 col-md-8">
								<div class="statistics_impact"><span class="number"><?php print("$sponsored") ?></span> <br> students<br> sponsored
								</div>
								<div class="statistics_impact"><span class="number"><?php print("$scholars") ?></span> <br> scholarship<br> recipients
								</div>
								<div class="statistics_impact"><span class="number"><?php print("$completed") ?></span> <br> students completed<br> secondary education
								</div> 
						 	</div>
						</div>	
					</div>
				</div>
			</div>
		</div> <!-- container div ends -->
		<?php include ('includes/footer.php'); ?>
	</body>
</html>