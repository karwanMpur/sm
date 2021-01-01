<?php
  session_start();
  if(isset($_SESSION['username'])){
      if($_SESSION['state'] == 1){
          if($_SESSION['type'] == 'admin'){
            header('location:index1.php');
          }
          elseif($_SESSION['type'] == 'Data entry'){

            header('location:order.php');
          }
          elseif($_SESSION['type'] == 'turkey staff'){
            header('location: turkya-staff.php');
          }
          else{
            echo '<script> alert("Tray again ");</script>';
          }
      }
      else{
        echo '<script> alert("Sorry your account is disable");</script>';
      }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <style>
  @font-face {
     font-family: OpenSans;
     src: url(../includes/OpenSans-Regular.ttf);
  }

  * {
     font-family: OpenSans;
  }
  </style>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="../assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">

<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assets/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assets/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assets/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assets/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assets/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assets/css/login-util.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/login-main1.css">
</head>
<body>

  <?php
      if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-warning'role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                  <p>".$_SESSION['error']."</p>
              </div>
          ";
          unset($_SESSION['error']);
      }
  ?>
	<div class="limiter">
		<div class="container-login100" style="background-image: url('../images/25101.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					User Log In
				</span>
				<form action="login.php" method="POST" class="login100-form validate-form p-b-33 p-t-5">

					<div class="wrap-input100 validate-input" >
						<input class="input100" type="text" name="name" placeholder="Email" required autofocus>
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>

					<div class="container-login100-form-btn m-t-32" style="margin-bottom:10%;">
						<button type="submit" name="login" class="login100-form-btn">

							Login
						</button>
					</div>


				</form>
				<center>	<img style="width:200px;hight:200px;margin-top:-15%;" src="../images\bag.png" alt=""> </center>

			</div>


		</div>
	</div>


	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="../assets/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../assets/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->

<!--===============================================================================================-->
	<script src="../assets/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="../assets/vendor/daterangepicker/moment.min.js"></script>
	<script src="../assets/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="../assets/vendor/countdowntime/countdowntime.js"></script>
	<script src="../assets/js/login-main.js"></script>

</body>
</html>
