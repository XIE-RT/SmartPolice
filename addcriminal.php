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

   <style type="text/css">
    	.main{
    		padding:50px;
    		margin:auto auto;


    }
    h3{
    	text-align: center;
    	padding-bottom: 20px;
    }

    </style>
    <link rel="stylesheet" type="text/css" href="navbar.css">
 	<title>Add criminal record</title>
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

 	<div class="container main ">
  		<h3>Add new criminal record</h3>

 

    <form action='addcriminalprocess.php' method="POST" enctype="multipart/form-data">
    	<input type="hidden" name="user_id" value=" <?php echo($_SESSION['user_id']) ?> ">
  		<div class="form-group">
   			 <label for="exampleFormControlInput1"> Criminal Name</label>
    		 <input type="text" name="name" class="form-control" id="ID" placeholder="Name">
  		</div>
  		<div class="form-row">
	  			<div class="form-group col-md-4">
	    		<label >Age</label>
	    		<input type="text" class="form-control" name="age" placeholder="Age">
	  		</div>
	  		<div class="form-group col-md-4">
	      		<label for="inputState">Skin Color</label>
	      		<select id="inputState" name="color" class="form-control">
	        		<option selected>Choose...</option>
	        		<option name="Light" >Light</option>
	        		<option name="Fair" >Fair</option>
	        		<option name="Medium" >Medium</option>
	        		<option name="Olive" >Olive</option>
	        		<option name="Tan" >Tan</option>
	        		<option name="Brown" >Browm</option>
	        		<option name="Dark Brown" >Dark Brown</option>
	        		<option name="Black" >Black</option>
	      		</select>
	    	</div>
  		</div>
  		<div class="form-row">
  			<div class="form-group col-md-4">
	    		<label >Height</label>
	    		<input type="text" name="height" class="form-control" placeholder="in cm">
	  		</div>
	  		<div class="form-group col-md-4">
	    		<label >Weight</label>
	    		<input type="text" name="weight" class="form-control"  placeholder="in Kgs">
	  		</div>
        <div class="form-group col-md-4">
          <label >Criminal Image</label>
          <input type="text" name="path" class="form-control"  placeholder="Path of the folder">
        </div>
  		</div>
  		
  		
  		<div class="form-group">
    		<label >Address</label>
    		<input type="text" name="address" class="form-control"  placeholder="Address">
  		</div>

  		<div class="form-group">
    		<label >Phone no</label>
    		<input type="text" name="phone_no" class="form-control" id="phone" placeholder="Phone no">
  		</div>

  		<div class="form-group">
    		<button type="submit" class="btn btn-primary" name="save">Save</button>
    	</div>
	</form>

	</div>

 




     <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

 </body>
 </html>