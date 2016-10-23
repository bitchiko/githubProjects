<?php
if(!empty($_GET['comment']) && !empty($_GET['user_id']) && !empty($_GET['question_id'])){
	$comment = addslashes($_GET['comment']);
	$comment = str_replace("<","&#60;",$comment); // < symbol is raplecing with < html symbol; no xss there
	$user_id = addslashes($_GET['user_id']);
	$question_id = addslashes($_GET['question_id']);
	
	require_once("api.php");
	require_once("connect.php");

	$sql = "INSERT INTO `answers`(`user`, `text`, `question_id`) VALUES ('$user_id','$comment','$question_id')";
	$save = new insert($connection, $sql);
}else{
	echo "error";
}
?>