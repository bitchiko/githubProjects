<?php
if(!empty($_GET['question_id'])){
	$question_id = addslashes($_GET['question_id']);
	
	require_once("api.php");
	require_once("connect.php");

	$query = "SELECT (answers.text) answer, (answers.id) id FROM questions INNER JOIN answers ON questions.id = answers.question_id where questions.id='$question_id'";
	$columnArray =  array("answer","id");
	$query = new select($connection, $query, $columnArray); 

	$return2dArray = $query->getData(); 
	echo json_encode($return2dArray);
	// echo $return2dArray[0][0];
}else{
	echo "error";
}
?>