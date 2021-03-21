<?php 
	
	session_start();

	$mysqli = new mysqli('localhost','root','','policeproj') or die(mysqli_error($mysqli));
	if(isset($_POST['Register'])){
		$name = $_POST['name'];
		$email = $_POST['email'];
		$phone_no = $_POST['phone_no'];
		$password = $_POST['password'];
		$address = $_POST['address'];

		$dept_id = $_POST['station_name'];
		$ranking = $_POST['ranking'];

		$mysqli->query("INSERT INTO user (user_name, user_email, user_number,user_password,user_address, user_ranking, stn_id) VALUES('$name','$email','$phone_no','$password','$address','$ranking', '$dept_id')") or
			die($mysqli->error);
		

		header("location: userlogin.php");		
	}
 ?>