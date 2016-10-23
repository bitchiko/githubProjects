<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form>
	<textarea name="text" style="width: 700px;height: 400px;"></textarea>
	<input type="submit">
</form>
<?php
if(!empty($_GET['text'])){
	$text = addslashes($_GET['text']);
	$text = str_replace("<","&#60;",$text); // < symbol is raplecing with < html symbol; no xss there
	
	require_once("api.php");
	require_once("connect.php");

	$sql = "INSERT INTO `questions`(`text`) VALUES ('$text')";
	$save = new insert($connection, $sql);
}else{
	echo "error";
}
?>
</body>
</html>