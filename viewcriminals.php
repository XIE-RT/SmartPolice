<?php
    $mysqli = new mysqli('localhost', 'root', '', 'policeproj') or die(mysqli_error($mysqli));
    $result = $mysqli->query("SELECT * from criminal_details order by criminal_id DESC") or die(mysqli_error($mysqli));
?>

<?php
session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <style type="text/css">
      
     
    </style>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Chango&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="navbar.css">
    <title>List of criminals</title>
  </head>
  <body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php">Smart Police</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item">
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


   <div class="container">
<hr>
<h1 class="display-3 pl-0 ml-0">Recently added criminals</h1>
<br>
<div class="row justify-content-center">
    <table class="table">
        <thead>
            <tr>
                <th>Criminal id</th>
                <th>Name</th>
                <th>Phone no</th>
                <th>Address</th>
                <th>Added by</th>
                <th>Police station</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>

<?php
    while($row = $result->fetch_assoc()):
?>
    <tr>
        <td><?php echo $row['criminal_id']; ?></td>
        <td><?php echo $row['criminal_name']; ?></td>
        <td><?php echo $row['criminal_number']; ?></td>
        <td><?php echo $row['criminal_address']; ?></td>
        <?php 
            $user_id=$row['user_id'];
            $result1 = $mysqli->query("SELECT * from user where user_id=$user_id") or die(mysqli_error($mysqli));
            $row1 = $result1->fetch_assoc();
            $stn_id = $row1['stn_id'];
            $result2 = $mysqli->query("SELECT * from police_stn where stn_id=$stn_id") or die(mysqli_error($mysqli));
            $row2=$result2->fetch_assoc();
         ?>
         <td><?php echo $row1['user_name']; ?></td>
         <td><?php echo $row2['stn_name']; ?></td>
        
        
        <td>
            <a href="viewdesc.php?id=<?php echo $row['criminal_id']; ?>"class="btn btn-warning mb-1">History</a>
            <a href="menu.php?edit=<?php echo $row['sn']; ?>"class="btn btn-info mb-1">Edit</a>
            
        </td>
    </tr>
    <?php endwhile; ?>
    </table>
    </div>
</div>
</div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>