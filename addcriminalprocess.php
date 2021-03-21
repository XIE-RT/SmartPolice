<?php 
session_start();

if (isset($_POST['save'])) {
	$mysqli = new mysqli('localhost','root','','policeproj') or die(mysqli_error($mysqli));
	
	$name=$_POST['name'];
	$age=$_POST['age'];
	$color=$_POST['color'];
	$address=$_POST['address'];
	$phone_no=$_POST['phone_no'];
	$path=$_POST['path'];
	$height=$_POST['height'];
	$weight=$_POST['weight'];
	$user_id=$_POST['user_id'];


	
	$mysqli->query("INSERT INTO criminal_details(criminal_name,criminal_image,criminal_height,criminal_weight,criminal_colour,criminal_address,criminal_number,user_id) VALUES('$name','$path',$height,$weight,'$color','$address',$phone_no,$user_id)") or
      die($mysqli->error);
      

    

    $result = $mysqli->query("SELECT * from criminal_details order by criminal_id DESC limit 1") or die($mysqli->error);
    // echo $result;
    $row = $result->fetch_assoc();
    // echo $row;
    $criminal_id= $row['criminal_id'];
    echo $criminal_id;
    $loc = 'location:crimedescription.php?criminal_id='.$criminal_id.'';
    header($loc);

}


 ?>