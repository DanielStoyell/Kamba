<?php $thisPage="CONTACT"; 
// SQL goes here
?>
<!DOCTYPE html>
<!--  Kamba Foundation Website 
content and photographs provided by Kamba Foundation Team
designed and developed by Thanatchaporn Apivessa, Samantha Reig, Daniel Stoyell, Harley Mueller
-->
<html lang="">
	<head>
		<title>Contact | The Kamba Foundation</title>
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
			if(!empty($_POST["submit"])){
				$submitted = "true";
				if($_POST["inquiry_type"] == "Choose one..." || empty($_POST["name"]) || empty($_POST["email"]) || empty($_POST["comment"])){
					$valid = "false";
				}
				else{
					$valid = "true";
					
					require_once 'includes/config.php';
	
					$data = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
					$type = $_POST["inquiry_type"];
					$name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
					$email = $_POST["email"];
					$email = filter_var($email, FILTER_SANITIZE_EMAIL);
					$comment = filter_input(INPUT_POST, "comment", FILTER_SANITIZE_STRING);

					$result = $data->query
					("
						INSERT INTO Messages 
							(date, name, Email, content, Inquiry_type)
						VALUES
							(CURDATE(), '$name', '$email', '$comment', '$type')
					");
				}
				
			}
			else{
				$submitted = "false";
				$valid = "false";
			}
		?>
		<script>
			$(document).ready(function(){
				<?php
					print("var submitted = $submitted; var valid = $valid;");
				?>
				if(submitted){
					if(valid){
						$('.contact_form').hide();
						$('#posFormFeedback').show();
						$('#negFormFeedback').hide();
					}
					else{
						$('.contact_form').hide();
						$('#posFormFeedback').hide();
						$('#negFormFeedback').show();
					}
				}
				else{
					$('#posFormFeedback').hide();
					$('#negFormFeedback').hide();
					$('.contact_form').show();
				}
			});
		</script>
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<h1>Contact</h1>
				</div> <!-- row title ends -->
			</div>
			<div class="row">
				<div class="col-xs-12">
					<!--Mind: Need to change the picture once available-->
					<img src="img/contact.jpg" alt="contact" class="header">
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<!--Sam: can you write up a few sentences for this? the content can be like "contact us to  blablabla"-->
					<p class="main">Reach out to us to learn more about our roles in helping people out of poverty through education.</p>
					<br>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<div id="posFormFeedback">
					    <img src="img/check.png" alt="#" class="feedbackImg" />
					    <p class="feedbackMsg">Your form has been submitted successfully</p>
						<div class="go_back">
							<input type="submit" name="back" value="Go Back" class="back">
						</div>
					</div>
					<div id="negFormFeedback">
					    <img src="img/xIcon.png" alt="#" class="feedbackImg" />
					    <p class="feedbackMsg">Please fill in all the required fields&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
						<div class="go_back">
							<input type="submit" name="back" value="Go Back" class="back">
						</div>
					</div> 
					<form class="contact_form" method="post" action="#" onsubmit="if(!formSuccess()){event.preventDefault();}">
						<div class="inquiry_form">
							<label for="inquiry_type_form_item" class="label_form">Inquiry Type</label>
							<br>
							<br>
							<select name="inquiry_type" id="inquiry_type_form_item" class="form_item" onchange="">
								<option selected value="Choose one..." id="inquiry_type_0">Choose one...</option>
								<option value="Projects" id="inquiry_type_1">Projects</option>
								<option value="Partners" id="inquiry_type_2">Partners</option>
								<option value="Donation" id="inquiry_type_3">Donation</option>
								<option value="General Inquiries" id="inquiry_type_4">General Inquiries</option>
							</select>
						</div>
						<div class="name_form">
							<label for='name_value' class='label_form'>Name</label>
                        	<br>
                        	<br>
                        	<input type='text' name='name' id='name_value' class='form_item' maxlength='100'>
						</div>
						<div class="email_form">
							<label for='email_value' class='label_form'>Email</label>
                        	<br>
                        	<br>
                        	<input type='text' name='email' id='email_value' class='form_item' maxlength='100'>
                        </div>
                        <br>
                        <br>
                        <br>
                    	<div class="comment_form">
                        	<label for='comment' class='label_form'>Comment</label>
                        	<br>
                        	<br>
                        	<textarea type='text' name='comment' id='comment' class='form_item' cols="20" rows="5"></textarea>
                        </div>
                    	<div id="submit_button">
                    		<input type="submit" name="submit" value="Submit" id="submit">
                    	</div>	
					</form>
				</div>
			</div>
		</div> <!-- container div ends -->
		<?php include ('includes/footer.php'); ?>
	</body>
</html>