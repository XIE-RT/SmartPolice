<?php 
session_start();
$criminal_id=$_GET['id'];


    $mysqli = new mysqli('localhost', 'root', '', 'policeproj') or die(mysqli_error($mysqli));
    $detail = $mysqli->query("SELECT * from criminal_details where criminal_id=$criminal_id") or die(mysqli_error($mysqli));

    $result = $mysqli->query("SELECT * from crime_info where criminal_id=$criminal_id") or die(mysqli_error($mysqli));
    $row1=$detail->fetch_assoc();
    $name=$row1['criminal_name'];
    
    $loc = 'location:crimedescription.php?criminal_id='.$criminal_id.'';

 ?>


 <!DOCTYPE html>
 <html>
 <head>

 	    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Chango&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="navbar.css">
 	<title></title>
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
   

<div class="container">
<hr>
<h1 class="display-3">Criminal History</h1>
<br>
<br>
<h2 class="display-4 pl-2 pb-4"><?php echo $name; ?> </h2>
<div class="row justify-content-center">
    <table class="table">
        <thead>
            <tr>
                <th>Date</th>
                <th>Time</th>
                <th>Address</th>
                <th>Category</th>
                <th>Description</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>

<?php
    while($row = $result->fetch_assoc()):
?>
    <tr>
        <td><?php echo $row['date_reported']; ?></td>
        <td><?php echo $row['time_reported']; ?></td>
        <td><?php echo $row['crime_location']; ?></td>
        <td><?php echo $row['crime_category']; ?></td>
        <td><?php echo $row['crime_description']; ?></td>
        
        
        <td>
        	<a href="" class="btn btn-info mb-1">Edit</a>
            
            
        </td>
    </tr>
    <?php endwhile; ?>
    </table>
    <a href="crimedescription.php?criminal_id=<?php echo $criminal_id; ?>"class="btn btn-success mb-1">Add new crime</a>
    </div>

</div>




 
 </body>
 </html>