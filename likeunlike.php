<?php
if(!empty($_GET['answer_id'])){
	$condition = addslashes($_GET['condition']);
	$answer_id = addslashes($_GET['answer_id']);
	
	require_once("api.php");
	require_once("connect.php");

	$sql = "INSERT INTO `like_dislike`(`like_ans`, `dislike_ans`, `answer_id`) VALUES ('$condition','0','$answer_id')";

	$save = new insert($connection, $sql);
}else{
	echo "error";
}
?>