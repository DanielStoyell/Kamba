<?php $thisPage="ABOUT"; 
// SQL goes here
?>
<!DOCTYPE html>
<!--  Kamba Foundation Website 
content and photographs provided by Kamba Foundation Team
designed and developed by Thanatchaporn Apivessa, Samantha Reig, Daniel Stoyell, Harley Mueller
-->
<html lang="">
	<head>
		<title>About | The Kamba Foundation</title>
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
					<h1>About</h1>
				</div> <!-- row title ends -->
			</div>
			<div class="row">
				<div class="col-xs-12">
					<img src="img/about.jpg" alt="about" class="header">
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<h2>Founding History</h2>
					<p class="main">The Kamba Foundation is a non-profit organization that was started in memory of Benson and Esther Kiiti Kamba.  Benson and Esther were both business and community leaders in Makueni and Machakos Counties.  They had exemplary vision for education as a key component of empowerment. Their lives reflected a commitment, passion, and service in providing educational opportunities for their own family. Friends, and community members. They often challenged, encouraged, and financially supported many young people in Makueni and Machakos Counties to pursue their educational endeavors to the highest level possible.  Mr. Kiiti Kamba also served on numerous boards for educational institutions in Makueni and Machakos Counties.</p>
					<br>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<!--need to hide this when mobile-->
					<div class="col-xs-12 col-md-4 vertical_image">
						<img src="img/about1.jpg" alt="about" class="vertical_image">
					</div>
					<div class="col-xs-12 col-md-8 vision_about">
						<h2>Vision</h2>
						<p class="main">The Kamba Foundation envisions a critical mass of empowered young people from Makueni and Machakos Counties participating to enhance the holistic development of Kenya, other parts of Africa, and other parts of the world.</p>
					</div>
					<div class="col-xs-12 col-md-8 mission_about">
						<h2>Mission</h2>
						<p class="main">The mission of the Kamba Foundation is to contribute to poverty reduction in Kenya by building on effective partnerships to facilitate educational opportunities, mentoring and capacity for the families. Communities, and institutions in Makueni and Machakos Counties.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<div class="band">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<h2>Our People</h2>	
					<div class="grid_boxes">
						<!--leadership content-->
						<?php
							require_once 'includes/config.php';
					
							$data = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 

							$result = $data->query
							("
								SELECT * FROM Leadership
							");
							
							while($row = $result->fetch_row()){
								print("
									<ul>
										<li class='people_list'><p class='main'> • $row[1] $row[2] $row[3], 
											$row[4]
										</p></li>
									</ul>			
								");
							}
						?>		
					</div>
				</div>
			</div>
		</div> <!-- container div ends -->
	<?php include ('includes/footer.php'); ?>
	</body>
</html>