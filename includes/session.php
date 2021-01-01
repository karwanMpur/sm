<?php
	session_start();
	include('connect.php');

	if(!isset($_SESSION['username'])){
		header('location: ../adm/index.php');
	}

	$sql = "SELECT * FROM account_tb WHERE username = '".$_SESSION['username']."'";
	$query = $conn->query($sql);
	$user = $query->fetch_assoc()


?>
