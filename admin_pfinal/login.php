<?php $thisPage="HOME";
session_start() ; ?>
<?php
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
		<title>Log In | The Kamba Foundation</title>
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
					<h1>Admin Log In</h1>
				</div> <!-- row title ends -->
			</div>
			<div class="row">
				<div class="col-xs-12">
					<br>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<div class="contact">
						<?php
        				if (isset($_POST['submit'])) {
            				$username = filter_input(INPUT_POST,'username', FILTER_SANITIZE_STRING);
            				$password = filter_input(INPUT_POST,'password', FILTER_SANITIZE_STRING); 
            				$password_hash = md5($password);
                			if (isset($username) && isset($password_hash)){
                    			$result = $mysqli -> query("SELECT * FROM Users WHERE Users.username='$username'");
                    			$row = $result->fetch_row();
                    			//if username and password match that of in the sql
                    			if ($password_hash == $row[2]){
                        			$_SESSION['logged_user'] = $username;
                        			echo "<p class='success_login'>You have successfully logged in!</p>";
                        		//username and passowrd don't match 
                    			} else if ($password_hash != $row[2]) {
                        			echo "<p class='fail_login'>Please make sure you enter a correct username and password!</p>";
                    			}   
                    		} else {
                    			echo "<p class='fail_login'>Please make sure you enter all the fields</p>";
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