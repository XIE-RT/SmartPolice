<?php
session_start();
$mysqli = new mysqli('localhost', 'root', '', 'policeproj') or die(mysqli_error($mysqli));
if(!isset($_SESSION['user_email'])){
  header('location:login/userlogin.php');
}

if (isset($_SESSION['predict'])) {
  $name=rtrim($_SESSION['predict']);
  
  $result = $mysqli->query("SELECT * from criminal_details where criminal_name='$name'") or die(mysqli_error($mysqli));

}



?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <style type="text/css">
    .op-bg{
      width: 50%;
      margin: 100px auto;

    }
    .custom-file{
      font-size: 2em;
    }
  </style>
  <link rel="stylesheet" type="text/css" href="navbar.css">
	<title>Face Recognition system</title>
</head>
<body onload="">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Smart Police</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">FRS</a>
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




<div class="op-bg" >

  <form class="op op-buttons" action="frsprocess.php" method="post" enctype="multipart/form-data">
    <div class="custom-file">
      <label class="custom-file-label" for="customFile">Choose file to upload</label>
      <input class="custom-file-input" type="file" id="customFile" name="imgfile"
            accept=".jpg, .jpeg, .png">
    </div>
    <div>
      <button name="submit" class="btn btn-outline-info btn-lg btn-block my-5" value="submit">Submit</button>
    </div>
  </form>

  <div style="text-align: center; ">
    <?php 
    if (isset($_SESSION['predict'])):
      ?>

      
      <img src=" FaceDataset/<?php echo $_SESSION['path']; ?>" height="300" weight="300">


      <h1 style="margin-top: 20px; font-weight: 300"><?php echo $_SESSION['predict']; ?></h1>


<div class="row justify-content-center">

    <table class="table">
        <thead>
            <tr>
                <th>Criminal id</th>
                <th>Name</th>
              
                <th>Phone no</th>
                <th>Address</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>

<?php
    $row = $result->fetch_assoc();
   
?>
    <tr>
        <td><?php echo $row['criminal_id']; ?></td>
        <td><?php echo $row['criminal_name']; ?></td>
        <td><?php echo $row['criminal_number']; ?></td>
        <td><?php echo $row['criminal_address']; ?></td>
       
        
        <td>
            <a href="viewdesc.php?id=<?php echo $row['criminal_id']; ?>"class="btn btn-info mb-1">History</a>
            
        </td>
    </tr>
    
    </table>
    </div>


    <?php 
    endif; ?>
 


  </div>
  
</div>
<?php 
      unset($_SESSION['predict']);
      unset($_SESSION['path']);
 ?>
  
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


<script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>  
</body>
</html>

