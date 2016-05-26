<nav>
	<div class="container navigation">
		<div class="navbar_header">
			<a class="logo" href="index.php"><img alt="Kamba Foundation" src="img/logo.png" id="logo"></a>
			<?php
			echo "
			<div id='nav_bar' class='nav_bar'>
				<div id='navlist'>
					<div class='navoption'";
					if ($thisPage=='HOME') {
				 		echo " id='currentpage'";
					}
					echo "><a class='navlink' href='login.php'>Home</a>
					</div>
					<div class='navoption'";
					if ($thisPage=='INQUIRY') {
				 		echo " id='currentpage'";
					}
					echo "><a class='navlink' href='inquiry.php'>Inquiries</a>
					</div>
					<div class='navoption'" ;
					if ($thisPage=='MANAGE') {
				 		echo " id='currentpage'";
					}
					echo "><a class='navlink' href='editing.php'>Manage</a>
					</div>
				</div> 
			</div>";
		?>
		</div>
	</div>
</nav>