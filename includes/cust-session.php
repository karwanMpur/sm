<?php
	session_start();
	include('connect.php');

	if(!isset($_SESSION['username'])){
		header('location: ../login.php');
	}

	$sql = "SELECT * FROM cust WHERE phone1 = '".$_SESSION['username']."'";
	$query = $conn->query($sql);
	$user = $query->fetch_assoc()


?>
