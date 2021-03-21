<?php 
session_start();
if(!isset($_SESSION['user_email']) && !$_SESSION['user_ranking']=='Admin'){
  header('location:login/userlogin.php');
}


  $id="";
  $update = false;
  $name="";
  $district="";
  $phone="";
  $mysqli = new mysqli('localhost','root','','policeproj') or die(mysqli_error($mysqli));
  if(isset($_POST['save'])){
    $id=$_POST['id'];
    $name = $_POST['name'];
    $district = $_POST['district'];
    $phone = $_POST['phone'];

    $mysqli->query("INSERT INTO police_stn (stn_id,stn_name,stn_district,stn_number) VALUES($id,'$name','$district',$phone)") or
      die($mysqli->error);
    
    header("location: addpolicestn.php");   
  }



  if(isset($_GET['delete'])){
      session_start();
      $id = $_GET['delete'];
      $mysqli->query("DELETE FROM police_stn WHERE stn_id=$id") or die(mysqli_error($mysqli));
      $_SESSION['message']="Item deleted successfully";
      $_SESSION['msg_type']="danger";
      
      header("location: addpolicestn.php");
  }

if(isset($_POST['update'])){
    session_start();
    $id = $_POST['id'];
    $name = $_POST['name'];
    $district = $_POST['district'];
    $phone = $_POST['phone'];

    
    $mysqli->query("UPDATE police_stn SET stn_name='$name', stn_district='$district', stn_number='$phone' WHERE sn='$id'") or die(mysqli_error($mysqli));
    $_SESSION['message']="Item Updated successfully";
    $_SESSION['msg_type']="secondary";
    
    header('location: addpolicestn.php');
    $update = false;
}




 ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style type="text/css">
    	.main{
    		padding:50px;
    		margin:20px;

    }
    h3{
    	text-align: center;
    	padding-bottom: 20px;
    }

    </style>
    <link rel="stylesheet" type="text/css" href="navbar.css">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Department</title>
  </head>
  <body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">Smart Police</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
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
  		<h3>Add new Department form</h3>

 

    <form action='addpolicestn.php' method="POST">
      <div class="form-group">
        <label >Station Code</label>
        <input type="text" class="form-control" name="id" placeholder="Station Code" value="<?php echo $id; ?>">
      </div>
  		<div class="form-group">
    		<label >Station name</label>
    		<input type="text" class="form-control" name="name" placeholder="Station name" value="<?php echo $name; ?>">
  		</div>
  		<div class="form-group">
    		<label >District</label>
    		<input type="text" class="form-control" name="district" placeholder="District">
  		</div>
  		<div class="form-group">
    		<label >Phone no</label>
    		<input type="text" class="form-control" name="phone" placeholder="Phone no">
  		</div>

  		<div class="form-group">
    		<button type="submit" class="btn btn-primary" name="save">Save</button>
    	</div>
	</form>

	</div>


  <br><br>

  <?php
      $mysqli = new mysqli('localhost', 'root', '', 'policeproj') or die(mysqli_error($mysqli));
      $result = $mysqli->query("SELECT * from police_stn") or die(mysqli_error($mysqli));
  ?>
  <div class="container">
  <hr>
  <h1>Existing Stations</h1>
  <br>
  <div class="row justify-content-center">
      <table class="table">
          <thead>
              <tr>
                  <th>Station Code</th>
                  <th>Station Name</th>
                  <th>District</th>
                  <th>Phone Number</th>
                  <th colspan="2">Action</th>
              </tr>
          </thead>

  <?php
      while($row = $result->fetch_assoc()):
  ?>
    <tr>
        <td><?php echo $row['stn_id']; ?></td>
        <td><?php echo $row['stn_name']; ?></td>
        <td><?php echo $row['stn_district']; ?></td>
        <td><?php echo $row['stn_number']; ?></td>
        <td>
            <a href="addpolicestn.php?edit=<?php echo $row['stn_id']; ?>"class="btn btn-info mb-1">Edit</a>
            <a href="addpolicestn.php?delete=<?php echo $row['stn_id']; ?>"class="btn btn-danger mb-1">Delete</a>
        </td>
    </tr>
    <?php endwhile; ?>
    </table>
    </div>





    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>