<?php 
session_start();
if(!isset($_SESSION['user_email'])){
	header('location:login/userlogin.php');
}
 ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


	<title>Home Page</title>

	<style type="text/css">
		.navbar{
			background-color: transparent;
		}

		.jumbotron{
			background-image: url('https://cdn.wallpapersafari.com/81/33/d1XCaG.jpg');
		}


		.op-bg{
			height: 100vh;
			padding-top: 50px;
		}
		.op{
			margin: auto;width: 50%;
			padding: 30px; 
			text-align: center; 
			vertical-align: middle;
		}
		.op-buttons{

			height: 70px; 
			font-size: 2em; 
			font-weight: 300; 
			border-radius: 50px;
		}


	</style>
	<link rel="stylesheet" type="text/css" href="navbar.css">
	<style type="text/css">
		.navbar-dark .navbar-nav .nav-link{
			color: white;
		}


	</style>
</head>





<body>
<nav class="navbar navbar-expand-lg navbar-dark  fixed-top" style="background-color: transparent; font-size: 1.3em; color: white;">
  <a class="navbar-brand" href="#">Smart Police</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="frs.php">FRS</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="viewcriminals.php">View Records</a>
      </li>
    </ul>
    <ul class="navbar-nav  mt-2 mr-3 mt-lg-0">
	    <li class="nav-item">
	        <a class="nav-link" href="login/validatelogin.php?logout='logout'">Logout</a>
	    </li>
    </ul>
  </div>
</nav>
<div class="jumbotron" style="height: 300px; margin-bottom: 0px;">
	
</div>

<div class="op-bg" style="">
	<div class="op">
		<div style="margin: auto;">
			<a href="addcriminal.php" class="op-buttons btn btn-outline-primary btn-block">Add Criminal Records </a>	
		</div>
	</div>
	<div class="op">
		<div style="margin: auto;">
			<a href="frs.php" class="op-buttons btn btn-outline-warning btn-block">Facial Recogntion system</a>	
		</div>
	</div>
	<div class="op">
		<div style="margin: auto;">
			<a href="viewcriminals.php" class="op-buttons btn btn-outline-secondary btn-block">View Criminal Records</a>	
		</div>
	</div>

	<?php 
	if($_SESSION['user_ranking']=='Admin'):
	 ?>
	<div class="op">
		<div style="margin: auto;">
			<a href="addpolicestn.php" class="op-buttons btn btn-outline-info btn-block">Add new Police Station</a>	
		</div>
	</div>

	<?php 
	endif
	 ?> 



</div>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>