<?php
session_start();

$stream_opts = [
    "ssl" => [
        "verify_peer"=>false,
        "verify_peer_name"=>false,
    ]
];  

$arrContextOptions=array(
    "ssl"=>array(
        "verify_peer"=>false,
        "verify_peer_name"=>false,
    ),
);  
if(isset($_POST['submit'])){
	
	$path = $_FILES['imgfile']['tmp_name'];
	echo $path;
	$final_path='FaceDataset/f/'.$_FILES['imgfile']['name'];
	$f='f/'.$_FILES['imgfile']['name'];
	copy($path, $final_path);
	echo $final_path;

	$predict_link="https://localhost/policeproj/FaceDataset/predict.py?path=".$f;
	echo $predict_link;
	$predict_data=file_get_contents($predict_link,false, stream_context_create($stream_opts)); 
	echo $predict_data;
	$predict_data = str_replace('_', ' ', $predict_data);
	$predict_data=ucwords($predict_data);
	$_SESSION['predict']=$predict_data;
	$_SESSION['path']=$f;
	header('location:frs.php');

}
?>