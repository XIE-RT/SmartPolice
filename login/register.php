<?php 
  session_start();

?>
<!doctype html>
<html lang="en">
  <head>
  	 <style type="text/css">
    	.main{
    		padding:50px;
    		padding-right: 200px;
    		padding-left: 200px;
    		margin:30px;

    }
    h3{
    	text-align: center;
    	padding-bottom: 20px;
    }

    </style>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Register</title>
  </head>
  <body>
    
  		

		<div class="container main">
  		<h3 class="display-3" style="float: left;">Create an account</h3>

      <br><br><br><br><br>

    <form action='regprocess.php' class="px-3" method='post' >
  		<div class="form-group">
   			 <label for="exampleFormControlInput1"> Name</label>
    		
    		 <input type='text' class="form-control" name='name' placeholder="Name" pattern="[a-zA-Z-' ]*" title="Name should only contain alphabet" required>
  		</div>
  		<div class='form-row'>
			<div class="form-group col-md-6" >
    			<label >Email</label>
    			<input type='email'id="email" class="form-control" name='email' placeholder="Email" required>
  			</div>

  			<div class="form-group col-md-6">
    			<label > Phone no</label>
    			<input type='tel'   class="form-control" name='phone_no' placeholder="Phone no"  required>
  			</div>
		</div>
  		
  		<div class="form-group">
    		<label >Password</label>
    		<input type='password' class="form-control"  name='password' id="pass1" placeholder="Password"  required>
  		</div>

  		<div class="form-group">
   			 <label for="exampleFormControlInput1"> Address</label>
    		
    		 <input type='text' class="form-control" name='address' placeholder="Address" required>
  		</div>
  		<div class='form-row'>
			<div class="form-group col-md-6">
	   			 <label for="exampleFormControlInput1"> Ranking</label>
	    		
	    		 <input type='text' class="form-control" name='ranking' placeholder="Ranking" required>
	  		</div>

	  		<div class="form-group col-md-6">
	   			 <label for="exampleFormControlInput1">Police Station name</label>
	    		
	    
	        <select name="station_name" class="custom-select" required>
	            <option disabled selected>-- Select City --</option>
		    		<?php
		    	$mysqli = new mysqli('localhost', 'root', '', 'policeproj') or die(mysqli_error($mysqli));
		    	$result = $mysqli->query("SELECT * FROM police_stn") or die(mysqli_error($mysqli));
		  	
		  			while($row=$result->fetch_assoc()):?>
		  		<option value='<?php echo $row['stn_id']?>'><?php echo $row['stn_name'];?></option>
		  		<?php endwhile;?>
           
	        </select>    
	         


   
	    	</div>
	    </div>	
  		

  		<div class="form-group">
    		<button type="submit" class="btn btn-primary" name="Register">Register</button>
    	</div>
	</form>
<a style="margin-top: 20px;" class="px-3" href="userlogin.php">Already have an account? Go to login</a>  
	</div>



	<!-- pattern="(?=.\d)(?=.[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>