<?php $thisPage="SEARCH"; 
// SQL goes here
?>
<!DOCTYPE html>
<!--  Kamba Foundation Website 
content and photographs provided by Kamba Foundation Team
designed and developed by Thanatchaporn Apivessa, Samantha Reig, Daniel Stoyell, Harley Mueller
-->
<html lang="">
	<head>
		<title>Search | The Kamba Foundation</title>
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
					<h1>Search Results</h1>
				</div> <!-- row title ends -->
			</div>
			<div class="row">
				<div class="col-xs-12">
					<img src="img/about.jpg" alt="about" class="header">
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<?php
						if(isset($_GET["search"])){
							$search = filter_input(INPUT_GET, "search", FILTER_SANITIZE_STRING);
							$found = false;
							require_once 'includes/config.php';
	
							$data = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 

							$result = $data->query
							("
								SELECT * FROM page_content
							");
							
							while($row = $result->fetch_row()){
								$contents = $row[1];
								$pat = preg_quote($search, '/');
								$pat = "/^.*$pat.*\$/mi";
								$foundProj = false;
								if($row[0] == "projects.php"){
									$proj = $data->query
									("
										SELECT content FROM Projects
									");
									while($p = $proj->fetch_row()){
										$pr = $p[0];
										if(preg_match_all($pat, $pr, $matches)){
											$found = true;
											if(!$foundProj){
												$linkName = strtoupper(substr($row[0],0,1)) . substr($row[0],1,strlen($row[0])-5);
												print("<a href='$row[0]'><h2 class='result'>$linkName</h2></a>");
											}
											$foundProj = true;
											foreach($matches[0] as $match){
												$m = str_ireplace($search, "<span class='highlight'>$search</span>", $match);
												print("<p class='sub_result'>$m</p><br>");
											}
										}
									}
								}
								if(preg_match_all($pat, $contents, $matches)){
									$found = true;
									if($row[0] != "projects.php" || !$foundProj){
										$linkName = strtoupper(substr($row[0],0,1)) . substr($row[0],1,strlen($row[0])-5);
										if($row[0] == "takeaction.php"){
											$linkName = "Take Action";
										}
										print("<a href='$row[0]'><h2 class='result'>$linkName</h2></a>");
									}
									foreach($matches[0] as $match){
										$m = str_ireplace("$search", "<span class='highlight'>$search</span>", $match);
										print("<p class='sub_result'>$m</p><br>");
									}
								}
							}
							if(!$found){
								print("<h2 class='result'>No Results Found</h2>");
							}
						}
						/*//Inspiration from: http://stackoverflow.com/questions/3686177/php-to-search-within-txt-file-and-echo-the-whole-line
						if(isset($_GET["search"])){
							$search = $_GET["search"];
							//Gets a list of all files at same level as search.php
							$files = scandir(".");
							$length = count($files);
							$found = false;
							
							//Skip first two - they are just "." and ".."
							for($i = 2; $i < $length; $i++){
								$file = $files[$i];
								
								if(strpos($file, ".") !== false){
									//Get contents of the file, attempt to strip HTML tags
									$contents = file_get_contents($file);
									$pat = preg_quote($search, '/');
									$pat = "/^.*$pat.*\$/m";
									if(preg_match_all($pat, $contents, $matches)){
										$found = true;
									    print("<a href='$file'><h2 class='result'>$file</h2></a>");
										foreach($matches[0] as $match){
											$match = strip_tags($match);
											print("<p class='sub_result'>$match</p><br>");
										}
									}
								}
							}
							if(!$found){
								print("<h2 class='result'>No Results Found</h2>");
							}
						}*/
					?>
				</div>
			</div>
		</div> <!-- container div ends -->
	<?php include ('includes/footer.php'); ?>
	</body>
</html>