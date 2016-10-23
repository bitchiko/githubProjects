<?php
if(!empty($_GET['answer_id'])){
	$answer_id = addslashes($_GET['answer_id']);
	
	require_once("api.php");
	require_once("connect.php");

	$query = "SELECT count(like_ans) likkke FROM like_dislike where like_ans = 0 and answer_id = '$answer_id' ";
	$columnArray =  array("likkke");
	$query = new select($connection, $query, $columnArray); 

	$return2dArray = $query->getData(); 
	echo json_encode($return2dArray);
	// echo $return2dArray[0][0];
}else{
	echo "error";
}
?>