<!DOCTYPE html>
<html lang="">

<?php $thisPage="INQUIRY";
session_start(); ?>
<?php
require_once 'config.php';
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
?>
<!--  Kamba Foundation Admin Website 
content and photographs provided by Kamba Foundation Team
designed and developed by Thanatchaporn Apivessa, Samantha Reig, Daniel Stoyell, Harley Mueller
-->
	<head>
		<title>Inquiry | The Kamba Foundation</title>
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
					<h1>Inquiry</h1>
				</div> <!-- row title ends -->
			</div>
			<div class="row">
				<div class="col-xs-12">
					<div class="contact">
			<?php 
        		if (isset($_SESSION['logged_user'])) {
           	?>
			<?php 
						if (isset( $_GET['id'] ) ){ 
							$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);

							echo "
								<form method='post'>


								<label>Email</label><br>
								<input type='text' name='email' value = $id><br>

								<label>Subject (required) </label><br>
								<input type='text' name='subject'/><br>

								<label>Message (required)</label><br>
								<textarea name='message' rows='10' cols='50'></textarea><br>

								<input id='submit' type='submit'><br>

								</form>

									";
							
								//<input type='reset' value='Clear'>


								/*php code for sending the email using text user inputs*/
								if (isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['message'])){
									$contact_email = $_POST['email'];
									$subject = htmlentities($_POST['subject']);
									$message = htmlentities($_POST['message']);
									$sent = mail($contact_email, $subject, $message);

									if ($sent == true){
										echo "Email was sent.";
									} elseif ($sent == false) {
										echo "Email was not sent..";
									}
								} 
							}
						//if not logged in but access the page directly
				        } else if (!isset($_SESSION['logged_user'])){
				        	echo "<p class='success_login'>You have to <a href='index.php'>Log In</a> to access the page</p>";
				        }
				   		?>
					</div>
				</div>
			</div>
		</div> <!-- container div ends -->
		<?php include ('includes/footer.php'); ?>
	</body>
</html>