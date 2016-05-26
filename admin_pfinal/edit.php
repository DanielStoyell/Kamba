<?php session_start(); ?>
<?php $thisPage="EDIT";
require_once 'config.php';
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
?>
<!DOCTYPE html>
<!--  Kamba Foundation Admin Website 
content and photographs provided by Kamba Foundation Team
designed and developed by Thanatchaporn Apivessa, Samantha Reig, Daniel Stoyell, Harley Mueller
-->
<html lang="">
	<head>
		<title>Manage | The Kamba Foundation</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

		<!-- stylesheet -->
		<link rel="stylesheet" href="css/bootstrap.css" type="text/css">
		<link rel="stylesheet" href="css/stylesheet.css" type="text/css">

		<!-- fonts -->
		<link href='https://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>

	</head>
	<body>
		<?php include ('includes/navigation.php'); ?>
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<h1>Content Management</h1>
				</div> <!-- row title ends -->
			</div>
			<div class="row">
				<div class="col-xs-12">
					<!-- INTERACTIVITY: dropdown to select the page-->
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 content_edit">
					<!--INTERACTIVITY: DISPLAY SIMPLE TABLE - SEE DETAILS THE SKETCH, THE ADMIN SHOULD BE ABLE TO SEE EVERYTHING AND ABLE TO EDIT THE CONTENT-->
				</div>
			</div>
		</div> <!-- container div ends -->
		<?php include ('includes/footer.php'); ?>
	</body>
</html>