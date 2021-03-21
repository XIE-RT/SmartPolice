<?php
session_start();
//redirecting to login page 
header('location:validatelogin.php');

$con=mysqli_connect('localhost','root');
if($con){
  echo  'connection successful';

}
else{
  echo"not";
}
//database select
mysqli_select_db($con,'policeproj');

//accessing varibales

$email=$_POST['email'];

$pass=$_POST['password'];   


//should not enter same username n password
$q="select * from user where user_email='$email' && user_password='$pass'";

//to run query ....result value will be 1(for matching) or 0
$result=mysqli_query($con, $q);
$row= mysqli_fetch_assoc($result);
//to find the which row is having that duplicate value(number of that row)
$num=mysqli_num_rows($result);
 
 if($num==1){
  //session variable is used for reusablity
  $_SESSION['user_id']=$row['user_id'];	
  $_SESSION['user_name']=$row['user_name'];
  $_SESSION['user_email']=$row['user_email'];
  $_SESSION['user_ranking']=$row['user_ranking'];
  header('location:http://localhost/policeproj/index.php');

 }
 else{

  header('location:userlogin.php');
 }


 if (isset($_GET['logout'])) {
 	// session_start();
 	unset($_GET['logout']);
 	unset($_SESSION['user_id']);
 	unset($_SESSION['user_name']);
 	unset($_SESSION['user_email']);
 	unset($_SESSION['user_ranking']);
	session_destroy();
	header('location:userlogin.php');
 }

?>