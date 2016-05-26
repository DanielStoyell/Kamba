<?php $thisPage="PROJECTS"; 
// SQL goes here
?>
<!DOCTYPE html>
<!--  Kamba Foundation Website 
content and photographs provided by Kamba Foundation Team
designed and developed by Thanatchaporn Apivessa, Samantha Reig, Daniel Stoyell, Harley Mueller
-->
<html lang="">
	<head>
		<title>Projects | The Kamba Foundation</title>
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
		
		<?php
			require_once 'includes/config.php';
	
			$data = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 

			$result = $data->query
			("
				SELECT * FROM Projects
			");
			
			while($row = $result->fetch_row()){
				print("
					<div class='expand' id='p$row[0]'>
						<div class='content'>
							<img src='img/close.jpg' alt='close' class='close'>
							<table class='project_expand'>
								<tr>
									<td>
										<img src='$row[4]' alt='$row[1]' class='image_project'>
									</td>
									<td>
										<p class='project_name'>$row[1]</p>
										<p class='project_content'>
											 $row[3]
										</p>
									</td>
								</tr>
							</table>
						</div>
					</div>
				");
			}
		?>
		
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<h1>Projects</h1>
				</div> <!-- row title ends -->
			</div>
			<div class="row">
				<div class="col-xs-12">
					<!--Mind: Need to change the picture once available-->
					<img src="img/future.jpg" alt="future" class="header">
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<h2>Guiding Principles</h2>
					<p class="main">The Kiiti Kamba Foundation is guided by principles of faith, integrity, and accountability..</p>
					<br>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<h2>Our Approach</h2>
					<p class="main">The foundation uses a variety of approaches to accomplish its mission. The following initiatives help promote a participatory approach to learning:</p>
					<br>
					<div class="project_cards">
						<?php
							$result = $data->query
							("
								SELECT * FROM Projects
							");
						
							while($row = $result->fetch_row()){
								$subtext = substr($row[3], 0, 85) . "... ";
								$id = str_replace(' ', '', $row[1]);
								print("
									<div class='card'>
										<img src='$row[4]' alt='#row[1]' class='photo_card'>
										<h3>$row[1]</h3>
										<p class='photo_text'>$subtext<span class='read_more_project' id='$id'>read more</span></p>
									</div>
								");
							}
						?>
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
					<h2>Our Partners</h2>	
					<p class="main">Here are schools we partnered with to send the students under our support to:</p>
					<div class="partner_bars">	
						<div class="row partner_bar">
							<p class="photo_text1">Primary Schools</p>
							<img src="img/arrow.png" alt="arrow" class="arrow_down1">
							<img src="img/arrow_up.png" alt="arrow" class="arrow_up1">
							<div id="partner_list1">
								<div class="partner_column_1">
									<p class="partners">
										- Kathonzweni Small School<br>
										- Unoa Primary School<br>
										- Thika Primary School for the Blind (Salvation Army School for the Blind)<br>
									</p>
								</div>
								<div class="partner_column_2">
									<p class="partners">
									</p>
								</div>
							</div>
						</div>
						<div class="row partner_bar">
							<p class="photo_text2">Secondary Schools</p>
							<img src="img/arrow.png" alt="arrow" class="arrow_down2">
							<img src="img/arrow_up.png" alt="arrow" class="arrow_up2">
							<div id="partner_list2">
								<div class="partner_column_1">
									<p class="partners">
										- Alliance High School<br>
										- Good Shepherd Girls School<br>
										- Grass Valley Girls Secondary School<br>
										- Ikuu Boys High School<br>
										- Joytown Secondary School<br>
										- Kako Secondary School<br>
										- Kalamba Secondary School<br>
										- Kangaru Girls High School<br>
										- Kenyatta High School - Taita<br>
										- Kilungu High School<br>
										- Kitonyoni Secondary School<br>
										- Kitui High School<br>
										- Kyambuko High School<br>
										- Loreto High School - Limuru<br>
										- Machakos Girls High School<br>
										- Makueni Boys High School<br>
										- Makueni Girls High School<br>
										- MaryHill Girls High School<br>
										- Matiliku Boys High School<br>
										- Matungulu Girls High School<br>
										- Mbooni Boys High School<br>
										- Mbooni Girls Secondary School<br>
									</p>
								</div>
								<div class="partner_column_2">
									<p class="partners">
										- Moi Girls - Isinya<br>
										- Moi Girls High School - Eldoret<br>
										- Mukaa Boys High School<br>
										- Mumbuni Boys High School<br>
										- Mumbuni Girls High School<br>
										- Muthale Girls Secondary School<br>
										- Muthetheni Girls Secondary School<br>
										- Mwaani Boys High School<br>
										- Nairobi School<br>
										- Nakuru Girls High School<br>
										- Nthangu Mixed Secondary School<br>
										- Our Lady of the Assumption Tawa Secondary<br>
										- Pangani Girls High School<br>
										- Precious Blood-Kilungu<br>
										- S.A. Kieni Girls Secondary School<br>
										- St. Barnabas Secondary School - Thwake<br>
										- SR. Damiana Memorial School<br>
										- St. Joseph’s Girls High School - Kibwezi<br>
										- St. Patrick’s High School<br>
										- Thika High School for the Blind (Salvation Army School for the Blind)<br>
										- Ukia Girls Secondary School<br>
										- Utangwa Secondary School<br>
									</p>
								</div>
							</div>
						</div>
						<div class="row partner_bar">
							<p class="photo_text3">University and College</p>
							<img src="img/arrow.png" alt="arrow" class="arrow_down3">
							<img src="img/arrow_up.png" alt="arrow" class="arrow_up3">
							<div id="partner_list3">
								<div class="partner_column_1">
									<p class="partners">
										- Egerton University<br>
										- Kenyatta Universities<br>
										- Machakos University College<br>
										- Maseno University<br>
										- Masinde Muliro University<br>
										- Moi Forces Academy - Lanet<br>
									</p>
								</div>
								<div class="partner_column_2">
									<p class="partners">
									</p>
								</div>
							</div>
						</div>
						<div class="row partner_bar">
							<p class="photo_text4">Other Foundations</p>
							<img src="img/arrow.png" alt="arrow" class="arrow_down4">
							<img src="img/arrow_up.png" alt="arrow" class="arrow_up4">
							<div id="partner_list4">
								<div class="partner_column_1">
									<p class="partners">
										- The Gale Foundation<br>
										- The Kamba Foundation<br>
									</p>
								</div>
								<div class="partner_column_2">
									<p class="partners">
									</p>
								</div>
							</div>
						</div>
						<div class="row partner_bar">
							<p class="photo_text5">International</p>
							<img src="img/arrow.png" alt="arrow" class="arrow_down5">
							<img src="img/arrow_up.png" alt="arrow" class="arrow_up5">
							<div id="partner_list5">
								<div class="partner_column_1">
									<p class="partners">
										- Trinity Episcopal Church (Virginia, U.S.)
										</p>
								</div>
								<div class="partner_column_2">
									<p class="partners">
									</p>
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