<?php $thisPage="MANAGE";
session_start(); ?>
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
		<title>Manage | The Kamba Foundation</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

		<!-- stylesheet-->
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
					<h1>Manage</h1>
				</div> <!-- row title ends -->
			</div><!--row div ends-->
			<?php 
        		if (isset($_SESSION['logged_user'])) {
            ?>			
				<?php
				require_once 'config.php';
		  		$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
				if ( $mysqli->connect_errno ) {
				echo "Failed to connect to MySQL: " . $mysqli->connect_error;
				}  

				if (isset($_GET['table'])){
					$table = $_GET['table'];
					if ($table == 'optLeadership'){
						$t = "Leadership";
						$idfield = "personID";
					}
					if ($table == 'optMessages'){
						$t = "Messages";
						$idfield = "messageID";
					}
					if ($table == 'optProjects'){
						$t = "Projects";
						$idfield = "projectID";
					}
					if ($table == 'optStats'){
						$t = "Stats";
						$idfield = "statID";
					}
					if ($table == 'optUsers'){
						$t = "Users";
						$idfield = "userID";
					}
					$query = "SELECT * FROM $t";
					$result = $mysqli->query($query);
					$fields = $result->fetch_fields();
					echo "<p>New entry: $t</p>";
					echo "<form method = 'POST'><div class='addform'>";
					foreach($fields as $f){
						//NEED TO HIDE THE ID FIELD.
						if ($f->name == 'hash'){
							echo "<input type='password' id=$f->name name=$f->name>password<br>";
						}	
						else if ($f->name != 'userID' && $f->name != 'projectID' && $f->name != 'personID' && $f->name != 'statID'){
							echo "<input type='text' id=$f->name name=$f->name>$f->name<br>";
						}
					}
					echo "<input type='submit' name='addsubmit' id='addsubmit' value='Add'>";
					echo "</div></form>";

					if (isset($_POST['addsubmit'])){
						//$attributes = array();
						//$values = array();
						foreach($_POST as $key=>$value){
							if ($value != 'Add' && $value != ''){
								//add to an array
								$attributes[]="`$key`";
								//$values[]="'$value'";
								if ($key == 'hash'){
									$value = md5($value);
								}
								$values[]="'" . mysql_real_escape_string($value) . "'";

							}
						}

						$attributes = implode(", ", $attributes);
    					$values = implode(", ", $values);

						$nquery = "INSERT INTO $t ($attributes) VALUES ($values)";
						if (!($mysqli->query($nquery))) {
							echo $mysqli->error;
						}
						else{
							echo "Record added successfully.";
						}
						
						//for debugging
						//echo $attributes;
						//echo $values;
						//foreach ($attributes as $a){
							//echo $a."<br>";
						//}
						//foreach ($values as $v){
							//echo $v."<br>";
						//}
					}
				}
				//if not logged in but access the page directly
            	} else if (!isset($_SESSION['logged_user'])){
            		echo "<p class='success_login'>You have to <a href='index.php'>Log In</a> to access the page</p>";
            	}
			?>
		</div> <!-- container div ends -->
		<?php include ('includes/footer.php'); ?>
	</body>
</html>