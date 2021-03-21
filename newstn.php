<?php 
	
	session_start();
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



 ?>