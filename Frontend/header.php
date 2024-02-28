<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="JS/header.js"></script>

<header>
	<nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark">

		<a class="navbar-brand d-inline" href="index.php" style="width:300px" >
		
			<img src="https://thundiii.de/Schoolulu/Logo2.png" width="220px" height="70" alt="">
		</a>

		<button class="navbar-toggler" type="button" onClick="buttonClick()" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarToggler">
			
			
		<div class="mx-auto">
					
				<div class="navbar-nav">
					<a class="nav-item nav-link" href="index.php">Startseite</a>
					<a class="nav-item nav-link" href="schools.php">Schulen</a>
					<a class="nav-item nav-link">|</a>
					<a class="nav-item nav-link" href="createSchool.php">Schule einreichen</a>
					
				</div>
			</div>
			
			<div class="d-flex flex-row-reverse" id="flexiMexi" style="width:300px;">
				<div class="navbar-nav">
<?php
			if(!isset($_SESSION)) 
			{ 
				session_start(); 
			} 

				if(isset($_SESSION['name'])) {

					echo('<a class="nav-item nav-link" href="mine.php" ><i class="far fa-user"></i> ' . $_SESSION['name'] . '</a>
					<a class="nav-item nav-link" href="logout.php"><i class="fas fa-door-open"></i> Logout</a>');
					
				} else {
					echo('<a class="nav-item nav-link" href="login.php"><i class="far fa-user"></i> Login</a>
					<a class="nav-item nav-link" href="register.php"><i class="far fa-user"></i> Registrieren</a>');
				}

?>
				</div>
			</div>
		
		</div>
		
	</nav>
</header>