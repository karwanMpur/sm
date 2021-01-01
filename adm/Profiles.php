<?php
	include('../includes/connect.php');
		include('../includes/session.php');
    ?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en" style="">
<!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Smiley Bag</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="../apple-icon.png">
    <link rel="shortcut icon" href="../favicon.ico">


    <link rel="stylesheet" href="../vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">

    <link rel="stylesheet" href="../assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

	<style>
	@font-face {
	   font-family: OpenSans;
	   src: url(../includes/OpenSans-Regular.ttf);
	}

	* {
	   font-family: OpenSans;
	}
	</style>

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
								        <li >
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

								        <li class="active">
								            <a href="Profiles.php" <?php echo @$sta; ?>> <i class="menu-icon fa ti-user"></i>Profiles</a>
								        </li>

								        <li class="menu-item ">
								            <a href="activeorder.php" > <i class="menu-icon fa ti-clipboard"></i>Active Orders</a>
								        </li>
												<li class="menu-item ">
													 <a href="arrived.php" > <i class="menu-icon fa ti-clipboard"></i>Arrived Orders</a>
											 </li>

								        <li class="menu-item ">
								            <a href="orderlist.php" <?php echo @$sta; ?> > <i class="menu-icon fa ti-timer"></i>Order History </a>

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
								            <a href="account.php" <?php echo @$sta; ?>> <i class="menu-icon fa ti-id-badge"></i>Page Roles  </a>

								        </li>


								    </ul>
		            </div><!-- /.navbar-collapse -->
		        </nav>
		    </aside><!-- /#left-panel -->


    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel ">

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
                        <h1>Customer Profiles</h1>
                    </div>
                </div>
            </div>

        </div>

				<div class="content mt-3" style="zoom:85%">
					<div class="table-responsive">
									<?php
											$query = "SELECT * FROM cust ORDER BY id DESC";
											$result = mysqli_query($conn,$query);

									?>
												<table id="bootstrap-data-table-export" class="table table-striped table-bordered">
													<thead class="table-dark" style="background-color:#b03060;">
															<tr>


																		<th >ID</th>
																		<th>Name</th>
																		<th>Instagram</th>
																		<th>Facebook</th>
																		<th>City</th>
																		<th>Address</th>
																		<th>Phone&nbsp;1</th>
																		<th>Phone&nbsp;2</th>
																			<th>Note</th>
																			<th>profile</th>
																		<th>Modify </th>
																		<th>Delete</th>
																	<!-- <th class="text-right">Action</th> -->
															</tr>
													</thead>
													<tbody>
									<?php
											if(mysqli_num_rows($result) > 0)
											{
													while($row = mysqli_fetch_assoc($result))
															{
									?>
															<tr>

																	<td><?php echo $row['id'];?></td>
																	<td><?php echo $row['name'];?></td>
																	<td><?php echo $row['insta'];?></td>
																	<td><?php echo $row['facebook'];?></td>
																	<td><?php echo $row['city'];?></td>
																	<td>	<textarea name="name" rows="1" cols="12"><?php echo $row['address'];?></textarea></td>
																	<td><?php echo $row['phone1'];?></td>
																	<td><?php echo $row['phone2'];?></td>

																	<td><?php echo $row['note'];?></td>
																	<td>

																			<a class="btn btn-info" style="border-radius:5px;"  target="_blank" href="profiles/profile.php?id=<?php echo $row['id']; ?>"><i class="fa ti-user"></i></a>
																	</td>
																	<td>

																		<center>
																			<a class="btn btn-success" style="border-radius:5px;" href="#edit<?php echo $row['id'];?>" data-toggle="modal"><i class="fa fa-edit white"></i></a>
																			<?php
																					include('profiles/editmodal.php');
																			?>
																		</center>
																		</td><td>
																			<center>
																				<a class="btn btn-danger" style="border-radius:5px;"  href="#del<?php echo $row['id'];?>" data-toggle="modal"><i class="fa fa-trash white"></i></a>
																			<?php
																					include('profiles/deletemodal.php');
																			?>
																		</center>
																	</td>
															</tr>
									<?php
													}
											}
											else
											{
													echo "no recordes";
											}
									?>
													</tbody>
											</table>

					</div>



				</div> <!-- .content -->




    </div><!-- /#right-panel -->

    <!-- Right Panel -->
		    <script src="../vendors/jquery/dist/jquery.min.js"></script>
		    <script src="../vendors/popper.js/dist/umd/popper.min.js"></script>
		    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
		    <script src="../assets/js/main.js"></script>


		    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
		    <script src="../vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
		    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
		    <script src="../vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
		    <script src="../vendors/jszip/dist/jszip.min.js"></script>
		    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
		    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>
		    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
		    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
		    <script src="../vendors/datatables.net-buttons/js/buttons.colVis.min.js"></script>
		    <script src="../assets/js/init-scripts/data-table/datatables-init.js"></script>


</body>

</html>
