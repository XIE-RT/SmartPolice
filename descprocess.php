<?php 
	
	session_start();

	$mysqli = new mysqli('localhost','root','','policeproj') or die(mysqli_error($mysqli));
	if(isset($_POST['save'])){
		$descr = $_POST['desc'];
		$date1 = $_POST['date'];
		$time1 = $_POST['time'];
		$location = $_POST['location'];
		$id = $_POST['id'];

		$category = $_POST['category'];
		echo $id;
		

		$mysqli->query("INSERT INTO crime_info ( criminal_id,crime_description, date_reported, time_reported, crime_location, crime_category) VALUES('$id' ,'$descr','$date1','$time1','$location','$category')") or
			die($mysqli->error);

			
		

		header("location: viewdesc.php?id=".$id);		
	}
 ?>