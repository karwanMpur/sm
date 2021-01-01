<?php
	include('../includes/connect.php');
		include('../includes/session.php');

	if(isset($_POST['login'])){
		$username = $_POST['name'];
		$password = $_POST['pass'];

		$sql = "SELECT * FROM account_tb WHERE username = '$username'";
		$query = $conn->query($sql);

		if($query->num_rows < 1){
			$_SESSION['error'] = 'Cannot find account with the username';
		}
		else{
			$row = $query->fetch_assoc();
			if(password_verify($password, $row['password'])){
				$_SESSION['username'] = $row['username'];
				$_SESSION['state'] = $row['acc_state'];
				$_SESSION['type'] = $row['acc_type'];
				$_SESSION['id'] = $row['acc_id'];
			}
			else{
				$_SESSION['error'] = 'Incorrect password';
			}
		}

	}
	else{
		$_SESSION['error'] = 'Input admin credentials first';
	}

	header('location: index.php');

?>
