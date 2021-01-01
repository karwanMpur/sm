<?php
	include('../includes/connect.php');
		include('../includes/session.php');
    ?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Smiley Bag</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
		<style>
		@font-face {
		   font-family: OpenSans;
		   src: url(../includes/OpenSans-Regular.ttf);
		}

		* {
		   font-family: OpenSans;
		}
		</style>
    <link rel="apple-touch-icon" href="../apple-icon.png">
    <link rel="shortcut icon" href="../favicon.ico">

    <link rel="stylesheet" href="../vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../vendors/jqvmap/dist/jqvmap.min.css">


    <link rel="stylesheet" href="../assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body>


    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel" style="background-color:#b03060;">
        <nav class="navbar navbar-expand-sm navbar-default" style="background-color: #b03060;">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i style="color:white;" class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"><img src="../images/logo1.png" alt="Logo"></a>

            </div>

						<div id="main-menu" class="main-menu collapse navbar-collapse">
						    <ul class="nav navbar-nav">
						        <li class="active">
											<?php if($_SESSION['type'] == 'Data entry'){
												$sta="hidden";
											} ?>
						            <a href="index1.php" <?php echo @$sta; ?>> <i class="menu-icon fa ti-home"></i>Home </a>
						        </li>
						        <li class="menu-item">
						            <a href="order.php"> <i class="menu-icon fa fa-laptop"></i>New Order</a>

						        </li>
						        <li class="menu-item ">
						            <a href="profile.php" > <i class="menu-icon ti-pencil-alt"></i>New Profile</a>
						        </li>
						        <li class="menu-item ">
						            <a href="mybag.php" > <i class="menu-icon fa ti-shopping-cart-full"></i>My Bag</a>
						        </li>

						        <li class="menu-item ">
						            <a href="Profiles.php" <?php echo @$sta; ?> > <i class="menu-icon fa ti-user"></i>Profiles</a>
						        </li>

						        <li class="menu-item ">
						            <a href="activeorder.php" > <i class="menu-icon fa ti-clipboard"></i>Active Orders</a>
						        </li>
										<li class="menu-item ">
											 <a href="arrived.php" > <i class="menu-icon fa ti-clipboard"></i>Arrived Orders</a>
									 </li>
						        <li class="menu-item ">
						            <a href="orderlist.php" <?php echo @$sta; ?> > <i class="menu-icon fa ti-timer"></i>Order History</a>

						        </li>
										<li class="">
												<a href="cancele.php" > <i class="menu-icon ti-filter"></i>Cancelled Order</a>

										</li>
									      <li class="">
                          <a href="invoicelist.php" > <i class="menu-icon fa ti-clipboard"></i>Active Invoice</a>

                      </li>
                      <li class="">
                          <a href="comp.php" <?php echo @$sta; ?>> <i class="menu-icon fa ti-timer"></i>Completed Invoice</a>

                      </li>
						        <li class="menu-item ">
						            <a href="account.php" <?php echo @$sta; ?> > <i class="menu-icon fa ti-id-badge"></i>Page Roles</a>

						        </li>
						    

						    </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">



            <div class="col-sm-7">
                <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>

            </div>
            <div class="col-sm-5">
                <div class="user-area dropdown float-right">
                      <a class="nav-link" href="logout.php"><i class="fa fa-power-off"></i> Logout</a>

                    <div class="user-menu dropdown-menu">



                    </div>
                </div>


            </div>



        </header><!-- /header -->
        <!-- Header-->

				<div class="content mt-3 ">


						<div class="col-lg-8" style="margin-top:0px;" >


<?php

if(isset($_POST['filterB'])){
	$colomn=$_POST['colomn'];
	$data_filter=$_POST['data'];
	$from=$_POST['from'];
	$to=$_POST['to'];

	if ($colomn=='link') {
		$query = "SELECT * FROM ord   where $colomn LIKE '%$data_filter%' AND  `conf`>='$from' AND `conf`<='$to'  ";
	 		$result = mysqli_query($conn,$query);
	}
	else {




if ($data_filter) {


 $query = "SELECT * FROM ord LEFT JOIN cust ON ord.costid = cust.id  where $colomn LIKE '%$data_filter%' AND  `conf`>='$from' AND `conf`<='$to' group BY bagid ";
		$result = mysqli_query($conn,$query);

}
else {
	$query = "SELECT * FROM ord   where `conf`>='$from' AND `conf`<='$to' group BY bagid ";
		 $result = mysqli_query($conn,$query);
}
	}


if(mysqli_num_rows($result) > 0)
{	$dtot=0;
	$shtot=0;
	$iqtot=0;
	$lirtot=0;
	$iq=0;
		while($row = mysqli_fetch_assoc($result))
				{
					$total=$row['total'];
					$shtot+=$row['shfee'];
					$iqtot+=$row['iq'];
					$lirtot+=$row['totall'];
					$dtot+=$total;
					$iq=$iq+1;


				}
}
			}
?>
<?php include("report.php"); ?>
				 <div class="card col-md-12 mb-12">

						 <div class="card-header"><center><b>Total Of All</b></center></div>
						 <div class="card-body card-block">

										 <div class="form-group">
											 <div class="row form-group">
													 <div class="col col-md-7"><label for="text-input" class=" form-control-label"><b>Shipping Fee</b> </label></div>
													 <div class="col-12 col-md-5"><input type="text"  name="" value="<?php echo @$shtot; ?>"  placeholder="Text" class="form-control"></div>

											 </div>
										 </div>
										 <div class="form-group">
											 <div class="row form-group">
													 <div class="col col-md-7"><label for="text-input" class=" form-control-label"><b>Lira</b></label></div>
													 <div class="col-12 col-md-5"><input type="text"  name="" value="<?php echo @$lirtot; ?>" placeholder="Text" class="form-control"></div>
											 </div>
										 </div>
										 <div class="form-group">
											 <div class="row form-group">
													 <div class="col col-md-7"><label for="text-input" class=" form-control-label"><b>Dollar</b></label></div>
													 <div class="col-12 col-md-5"><input type="text"  name="" value="<?php echo @$dtot; ?>" placeholder="Text" class="form-control"></div>
											 </div>
										 </div>
										 <div class="form-group">
											 <div class="row form-group">
													 <div class="col col-md-7"><label for="text-input" class=" form-control-label"><b>Item Quantity</b></label></div>
													 <div class="col-12 col-md-5"><input type="text"  name="" value="<?php echo @$iqtot; ?>" placeholder="Text" class="form-control"></div>
											 </div>
										 </div>
										 <div class="form-group">
											 <div class="row form-group">
													 <div class="col col-md-7"><label for="text-input" class=" form-control-label"><b>Bag Quantity</b></label></div>
													 <div class="col-12 col-md-5"><input type="text"  name="" value="<?php echo @$iq; ?>" placeholder="Text" class="form-control"></div>
											 </div>
										 </div>


						 </div>
				 </div>


						</div>

				<div class="col-lg-4 float-right">
					<?php
							$query = "SELECT * FROM d";
							$result = mysqli_query($conn,$query);
							if(mysqli_num_rows($result) > 0)
							{
									while($row = mysqli_fetch_assoc($result))
											{		$convert=$row['dtol'];
													$single=$row['single'];
													$small=$row['small'];
													$medium=$row['medium'];
													$large=$row['large'];
													$farda=$row['farda'];
														$dis=$row['dis'];


																 }
														 }


					?>

						<div class="card ">
								<div class="card-header"><b>System Modify</b></div>
								<div class="card-body card-block">
										<form action="acc_code.php" method="post" class="">
												<div class="form-group">
													<div class="row form-group">
															<div class="col col-md-7" style="margin-top:5px;"><label for="text-input" class=" form-control-label">Turkish Lira = <b>100$</b> </label></div>
															<div class="col-12 col-md-5"><input type="text" id="moniy" name="moniy" value="<?php echo $convert; ?>"  placeholder="Text" class="form-control"></div>

													</div>
												</div>
												<div class="form-group">
													<div class="row form-group">
															<div class="col col-md-7"><label for="text-input" class=" form-control-label">Single Item  </label></div>
															<div class="col-12 col-md-5"><input type="text" id="single" name="single" value="<?php echo $single; ?>" placeholder="Text" class="form-control"></div>
													</div>
												</div>
												<div class="form-group">
													<div class="row form-group">
															<div class="col col-md-7"><label for="text-input" class=" form-control-label">Small &nbsp; &nbsp;  &nbsp; &nbsp;<b>5</b> Item  </label></div>
															<div class="col-12 col-md-5"><input type="text"  name="small" value="<?php echo $small; ?>" placeholder="Text" class="form-control"></div>
													</div>
												</div>
												<div class="form-group">
													<div class="row form-group">
															<div class="col col-md-7"><label for="text-input" class=" form-control-label">Medium <b> 8</b> Item</label></div>
															<div class="col-12 col-md-5"><input type="text"  name="medium" value="<?php echo $medium; ?>" placeholder="Text" class="form-control"></div>
													</div>
												</div>
												<div class="form-group">
													<div class="row form-group">
															<div class="col col-md-7"><label for="text-input" class=" form-control-label">Large &nbsp; &nbsp; &nbsp; <b>12</b> Item</label></div>
															<div class="col-12 col-md-5"><input type="text"  name="large" value="<?php echo $large; ?>" placeholder="Text" class="form-control"></div>
													</div>
												</div>
												<div class="form-group">
													<div class="row form-group">
															<div class="col col-md-7"><label for="text-input" class=" form-control-label">Farda &nbsp; &nbsp; &nbsp;&nbsp;<b>30</b> Item</label></div>
															<div class="col-12 col-md-5"><input type="text"  name="farda" value="<?php echo $farda; ?>" placeholder="Text" class="form-control"></div>
													</div>
												</div>
												<div class="form-group">
													<div class="row form-group">
															<div class="col col-md-7"><label for="text-input" class=" form-control-label">Cancel <b>1</b> Item</label></div>
															<div class="col-12 col-md-5"><input type="text"  name="dis" value="<?php echo $dis; ?>" placeholder="Text" class="form-control"></div>
													</div>
												</div>

												<div class="form-actions form-group">
														<button type="submit" name="modify" style="background-color:#b03060;border-radius:10px;border-style: none;" class="btn btn-primary btn-block">Modify</button>
												</div>
										</form>
								</div>
						</div>
				</div>



</div>

    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <script src="../vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../assets/js/main.js"></script>




</body>

</html>
