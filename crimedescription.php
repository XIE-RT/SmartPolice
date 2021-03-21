<?php 
session_start();
$criminal_id= $_GET['criminal_id'];
?>
<!doctype html>
<html lang="en">
  <head>
  	 <style type="text/css">
    	.main{
        padding:20px;
        padding-right: 200px;
        padding-left: 200px;
        margin:30px;

    }
    h3{
      text-align: center;
      padding-bottom: 20px;
    }
    </style>
    <link rel="stylesheet" type="text/css" href="navbar.css">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Crime details</title>
  </head>
  <body>
    
 
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php">Smart Police</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item ">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
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

		<div class="container main">
  		<h3>Crime details</h3>

 

    <form action='descprocess.php' method='post' >
    	<div class="form-group col-md-6">
	    		
	    		 <input type='hidden' class="form-control" name='id' value="<?php echo $criminal_id ?>">
	  	</div>
  		<div class="form-group">
   			 <label for="exampleFormControlInput1"> Crime Description</label>
    		
    		 <input type='text' class="form-control" name='desc' placeholder="Description"  required>
  		</div>
  		<div class='form-row'>
			<div class="form-group col-md-6" >
    			<label >Date of ocurrence</label>
    			<input type='text'id="date" class="form-control" name='date' placeholder="Date" required>
  			</div>

  			<div class="form-group col-md-6">
    			<label >Time</label>
    			<input type='text'   class="form-control" name='time' placeholder="Time"  required>
  			</div>
		</div>
  		
  		<div class="form-group">
    		<label >Location</label>
    		<input type='text' class="form-control"  name='location' id="location" placeholder="location"  required>
  		</div>

  		
  		<div class='form-row'>
			

	  		<div class="form-group col-md-6">
	   			 <label for="exampleFormControlInput1">criminal category</label>
	    		
	    
	        <select name="category" class="custom-select" required>
	            <option disabled selected>-- Select Crime --</option>
		    
		    	
		  		  <option value="Chain-snatching">Chain-snatching</option>
            <option value="Murder">Murder</option>
            <option value="white collar">white collar</option>
            <option value="Robbery">Robbery</option>
            <option value="Threat">Threat</option>
		 
           
	        </select>    
	         


   
	    	</div>
	    </div>	
  		

  		<div class="form-group">
    		<button type="submit" class="btn btn-primary" name="save">Save</button>
    	</div>
	</form>

	</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>