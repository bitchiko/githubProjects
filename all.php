<?php
if(!empty($_GET['all'])){
	$all = addslashes($_GET['all']);
	
	require_once("api.php");
	require_once("connect.php");

	$query = "SELECT count(question_id) likkke FROM answers where 1";
	$columnArray =  array("likkke");
	$query = new select($connection, $query, $columnArray); 

	$return2dArray = $query->getData(); 
	echo json_encode($return2dArray);
	// echo $return2dArray[0][0];
}else{
	echo "error";
}
?>