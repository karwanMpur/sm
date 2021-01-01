<?php
	include('includes/connect.php');
		include('includes/cust-session.php');

	if(isset($_POST['login'])){
		$username = $_POST['username'];
		$pass = $_POST['pass'];


		$sql = "SELECT * FROM cust WHERE phone1 = '$username' AND id='$pass'";
		$query = $conn->query($sql);

		if($query->num_rows < 1){
			$_SESSION['error'] = 'Cannot find account with the Phone Number Or Your Password Not Correct !';
		}
		else{
			$row = $query->fetch_assoc();
				$_SESSION['username'] = $row['phone1'];
				$_SESSION['id'] = $row['id'];

		}

	}
	else{
		$_SESSION['error'] = 'Input admin credentials first';
	}

	header('location:index.php');

?>
