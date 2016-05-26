<?php $thisPage="";
session_start(); ?>
<?php
require_once 'config.php';
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if (isset($_SESSION['logged_user'])) {
    unset($_SESSION['logged_user']);
}
?>
<!DOCTYPE html>
<!--  Kamba Foundation Admin Website 
content and photographs provided by Kamba Foundation Team
designed and developed by Thanatchaporn Apivessa, Samantha Reig, Daniel Stoyell, Harley Mueller
-->
<html lang="">
	<head>
		<title>Log In | The Kiiti Kamba Foundation</title>
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
					<h1>Admin Log In</h1>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<form class="contact_form" action="login.php" method="post">
						<table>
							<tr class="login">
								<td>
									<label for='name_value' class='label_form'>Username</label>
                        			<br>
                        			<br>
                        			<input type='text' name='username' id='name_value' class='form_item' maxlength='100'>
                    			</td>
                    			<td>
                        			<label for='password_value' class='label_form'>Password</label>
                        			<br>
                        			<br>
                        			<input type='password' name='password' id='password_value' class='form_item' maxlength='100'>
                    			</td>
                    		</tr>
                    	</table>
             			<div id="submit_button">
                    		<input type="submit" name="submit" value="Submit" id="submit">
                    	</div>
					</form>
				</div>
			</div>
		</div> <!-- container div ends -->
	</body>
</html>