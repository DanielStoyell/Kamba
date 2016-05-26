<nav>
	<div class="container navigation">
		<div class="navbar_header">
			<!-- REQUEST JAVASCRIPT: hamburger menu for mobile-->
			<a class="logo" href="index.php"><img alt="Kamba Foundation" src="img/logo.png" id="logo"></a>
		</div>
	<?php
		echo "
			<div id='nav_bar' class='nav_bar'>
				<div id='navlist'>
					<div class='navoption'";
					if ($thisPage=='HOME') {
				 		echo " id='currentpage'";
					}
					echo "><a class='navlink' href='home.php'>Home</a>
					</div>
					<div class='navoption'";
					if ($thisPage=='ABOUT') {
				 		echo " id='currentpage'";
					}
					echo "><a class='navlink' href='about.php'>About</a>
					</div>
					<div class='navoption'" ;
					if ($thisPage=='PROJECTS') {
				 		echo " id='currentpage'";
					}
					echo "><a class='navlink' href='projects.php'>Projects</a>
					</div>
					<div class='navoption'";
					if ($thisPage=='IMPACT') {
				 		echo " id='currentpage'";
					}
					echo "><a class='navlink' href='impact.php'>Impact</a>
					</div>
					<div class='navoption'";
					if ($thisPage=='CONTACT') {
				 		echo " id='currentpage'";
					}
					echo "><a class='navlink' href='contact.php'>Contact</a>
					</div>
					<div class='navoption1'";
					if ($thisPage=='TAKEACTION'){
					}
					echo "><div class='take-action'>
							<a href='takeaction.php' class='button-action'>Take Action</a>
						</div>
					</div>
				</div> 
			</div>";
		?>
		<div class="navoption_search">
			<img alt="search" src="img/search.png" id="search">
			<form id="search_box" method="get" action="search.php">
				<input type='text' name='search' id='search_input' class="form_item" maxlength="100" size="300">
			</form>
		</div>
	</div>
</nav>