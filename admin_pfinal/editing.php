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
					<h1>Manage</h1>
				</div> <!-- row title ends -->
			</div>
			<?php 
        		if (isset($_SESSION['logged_user'])) {
            ?>
				<?php
					require_once 'config.php';
				  	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
					if ( $mysqli->connect_errno ) {
						echo "Failed to connect to MySQL: " . $mysqli->connect_error;
						}  

            			$result2 = $mysqli -> query("SELECT * FROM Messages");
            			echo '
						<div class="editsections">
							<h3>Choose a section to manage:</h3>
  							<div id="edit_options" class="edit_options">
  								<form id="editoptionsform">
									<select id="section" name="section">
										<!--<option value="optImages">Images</option>-->
										<option value="optLeadership">Leadership</option>
								 		<option value="optProjects">Projects</option>
								 		<option value="optStats">Stats</option>
								 		<option value="optUsers">Users</option>
							 		</select>
							 		<button class="editgo">GO</button>
							 	</form>'
								;
							 		
						 		if (isset($_POST["editgo"])){
							 		$section = filter_input(INPUT_POST, "section", FILTER_SANITIZE_STRING);
							 		echo $section;
						 			$section_q = "";
						 		}
						 		echo "
							</div>
						</div>
						";

						//this is what we do if we're picking which one to edit, or if we want to add one.
						if (isset($_GET["section"])){
							$the_section = $_GET["section"];
							
							if ($the_section == 'optLeadership'){
								$edit_q = "SELECT * from Leadership";
							}
							if ($the_section == 'optProjects'){
								$edit_q = "SELECT * FROM Projects";
							}
							if ($the_section == 'optStats'){
								$edit_q = "SELECT * FROM Stats";
							}
							if ($the_section == 'optUsers'){
								$edit_q = "SELECT * FROM Users";	
							}
							echo "<a href='new.php?table=$the_section' class='main'>Create a new entry</a>";
							echo "<div id='editval'><table>";
							$result = $mysqli->query($edit_q);
							$fields = $result->fetch_fields();
							while ($row = $result->fetch_row()){
								echo "
								<tr>";
								for ($i=1; $i<$mysqli->field_count; $i++){
									$val = $row[$i];
									//don't show passwords
									if ($fields[$i]->name != 'hash'){
										echo "<td><p>" . $val . "</p></td>";
									}
								}
								echo "
								<td>
									<p>
										<a href='editing?table=$the_section&entry=$row[0]' id='update'>UPDATE</a>
									</p>
								</td>
								<td>
									<p>
										<a href='editing?table=$the_section&entry=$row[0]&delete=yes' id='delete'>DELETE</a>
									</p>
								</td>
								</tr>";
							}
							echo '</table></div>';
						}


						//this is what happens when you want to delete
						if (isset($_GET["delete"])){
							$id=$_GET['entry'];
							$table=$_GET['table'];
							if ($table == 'optLeadership'){
								$t = "Leadership";
								$idname = "personID";
							}
							if ($table == 'optProjects'){
								$t = "Projects";
								$idname = "projectID";
							}
							if ($table == 'optStats'){
								$t = "Stats";
								$idname = "statID";
								
							}
							if ($table == 'optUsers'){
								$t = "Users";
								$idname = "userID";								
							}
							$del_q = "SELECT * FROM $t WHERE $idname = $id";
							$dquery = $mysqli->query($del_q);
							$fields = $dquery->fetch_fields();
							echo"
							<p>PERMANENTLY delete this record?</p>";
							echo "<table>";
							echo "<tr>";
							for($f=1; $f<$mysqli->field_count; $f++){
								$name = $fields[$f]->name;
								//don't show password field
								if ($name != 'hash'){
									echo "<td><p>$name</p></td>";
								}
							}
							echo "</tr>";
							while ($row = $dquery->fetch_row()){
								echo "<form method = 'POST'><tr>";
								for ($i=1; $i<$mysqli->field_count; $i++){
									$val = $row[$i];
									//don't show password
									if ($fields[$i]->name != 'hash'){
										echo "<td><p>" . $val . "</p></td>";
									}
								}
								echo "</tr></table>
								<input type='submit' name='delsubmit' id='delsubmit' value='Delete'></form>";
							}
							if (isset($_POST['delsubmit'])){
								$deleteit = "DELETE FROM $t WHERE $idname = $id";
								if (!($mysqli->query($deleteit))){
									echo $mysqli->error;
								}
								else{
									echo "Record deleted.";
								}
							}
						}


						//and this is what happens when you're editing a specific record 
						if (isset($_GET["entry"]) && (!(isset($_GET['delete'])))) {

							$id = $_GET["entry"];
							$table = $_GET["table"];
							if ($table == 'optLeadership'){
								$t = "Leadership";
								$idfield = "personID";
								$q = "SELECT * from Leadership WHERE personID = $id";
							}
							if ($table == 'optProjects'){
								$t = "Projects";
								$idfield = "projectID";
								$q = "SELECT * FROM Projects WHERE projectID = $id";
							}
							if ($table == 'optStats'){
								$t = "Stats";
								$idfield = "statID";
								$q = "SELECT * FROM Stats WHERE statID = $id";
							}
							if ($table == 'optUsers'){
								$t = "Users";
								$idfield = "userID";
								$q = "SELECT * FROM Users WHERE userID = $id";
							}
							
							$result = $mysqli->query($q);
							$fields = $result->fetch_fields();
							
							#echo $fields;
							echo "<table>";
							echo "<tr>";
							for($f=1; $f<$mysqli->field_count; $f++){
								$name = $fields[$f]->name;
								if ($name !='hash'){
									echo "<td><p>$name</p></td>";
								}
								else{
									echo "<td><p>password</p></td>";
								}
							}
							echo "</tr>";
							while ($row = $result->fetch_row()){
								echo "<form method = 'POST'><tr>";
								for ($i=1; $i<$mysqli->field_count; $i++){
									$val = $row[$i];
									//don't show password
									if ($fields[$i]->name != 'hash'){	
										echo "<td><p><input type='textarea' name=$i placeholder='" . $val . "'></p></td>";
									}
									else{
										echo "<td><p><input type='textarea' name=$i placeholder='*******'></p></td>";
									}
								}
								echo "</tr></table>
								<input type='submit' name='edsubmit' id='edsubmit' value='Save'>
								</form>";
							}

							if (isset($_POST['edsubmit'])){
								foreach ($_POST as $key => $value){
									if ($key != 'edsubmit'){
										$updating = $fields[$key]->name;
										if ($value != '' && $value != 'Save'){
											$mquery = "UPDATE $t SET $updating='$value' WHERE $idfield=$id";
											if (!($mysqli->query($mquery))) {
												echo $mysqli->error;
											}
											//timestamp for Projects updates automatically
										}
									}
										//echo "Field ".htmlspecialchars($key)." is ".htmlspecialchars($value)."<br>";
								}
								
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