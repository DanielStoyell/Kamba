<!DOCTYPE html>
<?php $thisPage="INQUIRY";
session_start() ; ?>
<?php
require_once 'config.php';
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
?>
<!--  Kamba Foundation Admin Website 
content and photographs provided by Kamba Foundation Team
designed and developed by Thanatchaporn Apivessa, Samantha Reig, Daniel Stoyell, Harley Mueller
-->
<html lang="">
	<head>
		<title>Inquiries | The Kamba Foundation</title>
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
					<h1>Inquiries</h1>
				</div> <!-- row title ends -->
			</div>
			<div class="row">
				<div class="col-xs-12">
					<div class="contact">
					<?php 
        				if (isset($_SESSION['logged_user'])) {
           			 ?>
						<form id = "search" method="post"> <!-- search -->
							<input type="submit" name="viewall" value="View All">
							<br><br><br>
								<table>
									<tr id="search">
										<td>Search</td>
										<td><input type="text" name="searchval" placeholder="Search"></td>
										<td><input type="submit" name="submit" id ="search" value="Search"></td>	
									</tr>
								</table>
						</form>

						<?php //php for simple search

						if(isset($_POST['viewall'])){ //if they click "view all"
						echo '
							<table>
							<tr>
								<td>Inquiry Type</td>
								<td>Date</td>
								<td>Name</td>
								<td>Email</td>
								<td>Comment</td>
							</tr>';
	            			$result2 = $mysqli -> query("SELECT * FROM Messages");
							while ($row2 = $result2 -> fetch_row()){
								echo "						
								<tr>
									<td>$row2[5]</td>
									<td>$row2[1]</td>
									<td>$row2[2]</td>
									<td><a href='mailto.php?id=$row2[3]'>$row2[3]</a></td> 
									<td>$row2[4]</td>
								</tr>

								";
							}
							echo '</table>';

						}

						if(isset($_POST['submit'])){
						require_once 'config.php';
			  			$mysqli1 = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
			  			  

						$searchval = htmlentities($_POST['searchval']);

						//prints results of the search
						$result2 = $mysqli1 -> query("SELECT * FROM `Messages` WHERE `email` LIKE '%".$searchval."%' 
							OR `date` LIKE '%".$searchval."%' 
							OR `name` LIKE '%".$searchval."%' 
							OR `Inquiry_Type` LIKE '%".$searchval."%'
							OR `content` LIKE '%".$searchval."%' ");
							echo "<p>Searching for: $searchval</p>";
							echo '<br><br><br>
							<table>
							<tr>
								<td>Inquiry Type</td>
								<td>Date</td>
								<td>Name</td>
								<td>Email</td>
								<td>Comment</td>
							</tr>';
		            		while ($row = $result2 -> fetch_row()){
			               		//echo "<img src='$row[2]' alt='$row[0]' class = 'thumb'>";
			               		echo "						
								<tr>
									<td>$row[5]</td>
									<td>$row[1]</td>
									<td>$row[2]</td>
									<td><a href='mailto.php?id=$row[3]'>$row[3]</a></td> 
									<td>$row[4]</td>
								</tr>

								";
		            		}	
		            		echo '</table>';
	      		     	 } 
						//if not logged in but access the page directly
					} else if (!isset($_SESSION['logged_user'])){
			        		echo "<p class='success_login'>You have to <a href='index.php'>Log In</a> to access the page</p>";
			        }	

						?>		
					</div> <!--contact-->
				</div><!--col-xs-12-->
			</div><!--row-->
		</div> <!-- container div ends -->
		<?php include ('includes/footer.php'); ?>
	</body>
</html>			