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
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="../apple-icon.png">
    <link rel="shortcut icon" href="../favicon.ico">
		<style>
		@font-face {
		   font-family: OpenSans;
		   src: url(../includes/OpenSans-Regular.ttf);
		}

		* {
		   font-family: OpenSans;
		}
		</style>
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
		                <a class="navbar-brand" href=".../"><img src="../images/logo1.png" alt="Logo"></a>

		            </div>

		            <div id="main-menu" class="main-menu collapse navbar-collapse">

		                  <ul class="nav navbar-nav" style="">
		                      <li class="">
		                        <?php if($_SESSION['type'] == 'Data entry'){
		                          $sta="hidden";
		                        } ?>
		                          <a href="index1.php"  <?php echo @$sta; ?> > <i class="menu-icon fa ti-home"></i>Home </a>
		                      </li>
		                      <li class="">
		                          <a href="order.php"> <i class="menu-icon fa fa-laptop"></i>New Order</a>

		                      </li>
		                      <li class=" ">
		                          <a href="profile.php" > <i class="menu-icon ti-pencil-alt"></i>New Profile</a>
		                      </li>
		                      <li class="active ">
		                          <a href="mybag.php" > <i class="menu-icon fa ti-shopping-cart-full"></i>My Bag</a>
		                      </li>

		                      <li class=" ">
		                          <a href="Profiles.php"  <?php echo @$sta; ?>  > <i class="menu-icon fa ti-user"></i>Profiles</a>
		                      </li>

		                      <li class=" ">
		                          <a href="activeorder.php" > <i class="menu-icon fa ti-clipboard"></i>Active Orders</a>
		                      </li>
		                      <li class="menu-item ">
		                         <a href="arrived.php" > <i class="menu-icon fa ti-clipboard"></i>Arrived Orders</a>
		                     </li>
		                      <li class="">
		                          <a href="orderlist.php"  <?php echo @$sta; ?>  > <i class="menu-icon fa ti-timer"></i>Order History</a>

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
		                      <li class=" ">
		                          <a href="account.php"  <?php echo @$sta; ?> > <i class="menu-icon fa ti-id-badge"></i>Page Roles</a>

		                      </li>


		                  </ul>
		            </div><!-- /.navbar-collapse -->
		        </nav>
		    </aside>

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

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>My Bag</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active"></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
						<div class="content mt-3">








							<?php
							$query = "SELECT id,name,insta,facebook,phone1,costid,'conf',iq,bagid  FROM ord LEFT JOIN cust ON ord.costid = cust.id where `conf` IS NULL AND !(`b` IS NULL) AND costid>=100  group BY bagid DESC";


									$result = mysqli_query($conn,$query);


									if(mysqli_num_rows($result) > 0)
									{
											while($row = mysqli_fetch_assoc($result))
													{
							?>



							<div class="col-md-4" style="">
							    <div class="card" style="border-radius:15px;">
							        <div class="card-header" style="border-radius:10px;color:black;background-color:white;">


													<a   style="margin:-20px;border-radius:10px;bordered" class="btn btn" data-toggle="modal" href="#del<?php $bg=$row['bagid']; echo $bg?>" data-toggle=""><i class="fa ti-close white"></i></a>
													<?php
															include('deletemodalonebag.php');
													?>

													<a style="margin-left:1%" class="btn btn" href="bag.php?bagid=<?php echo $row['bagid']; ?>"><i class="fa ti-marker-alt white"></i></a>

													<h3 class="" style="margin-top:-40px;margin-left:100px;">	<?php $ide= $row['costid']; echo $ide;?></h3>


							           <center> <strong class="card-title"> <?php
												 $sname=$row['name'];
												 if ($sname) {
												  echo $sname;
												}else {
												echo "By Admin";
												}
												  ?></strong> </center>
							        </div>
							        <div class="card-body" style="border-left-color: coral;">
												<div style="width:25%;margin-left:5%;">

													<h1><?php
													$iqq=$row['iq'];
 												 if ($iqq) {
 												  echo $iqq;
 												}else {
 												echo "1+";
 												}
 												  ?></h1>
													<h5>Items</h5>

												</div>
												<div class="float-right" style="width:68%;margin-top:-75px;">
												<h6>	<i class="fa ti-instagram white"> <?php echo $row['insta']; ?></i></h6>
												<hr style="margin-top:0px;">
													<h6 style="margin-top:-5px;">	<i class="fa ti-facebook white"> <?php echo $row['facebook']; ?></i></h6>
													<hr style="margin-top:0px;">
												<h6 style="margin-top:-7px;">		<i class="fa fa-phone white">&nbsp;&nbsp; <?php echo $row['phone1']; ?></i></h6>

												</div>
												  </div>
							    </div>
							</div>

						<?php
										}
								}
								else
								{
										echo "no recordes";
								}
						?>

						</div>






    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <script src="../vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../assets/js/main.js"></script>




</body>

</html>
