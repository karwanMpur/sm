<?php
	include('../includes/connect.php');
		include('../includes/session.php');
    ?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en" >
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
    <link rel="stylesheet" href="../vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">

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
								        <li class="">
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
								            <a href="Profiles.php" <?php echo @$sta; ?>> <i class="menu-icon fa ti-user"></i>Profiles</a>
								        </li>

								        <li class="">
								            <a href="activeorder.php" > <i class="menu-icon fa ti-clipboard"></i>Active Orders</a>
								        </li>
												<li class="active ">
													 <a href="arrived.php" > <i class="menu-icon fa ti-clipboard"></i>Arrived Orders</a>
											 </li>
								        <li class="menu-item ">
								            <a href="orderlist.php" <?php echo @$sta; ?>> <i class="menu-icon fa ti-timer"></i>Order History</a>

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
								            <a href="account.php" <?php echo @$sta; ?>> <i class="menu-icon fa ti-id-badge"></i>Page Roles</a>

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

        <div class="breadcrumbs" style="zoom:0%">
					<div class="col-sm-5">
							<div class="page-header float-left">
									<div class="page-title">
											<h1>Arrived Order</h1>
									</div>
							</div>
					</div>

					<form action="arrived.php" method="POST" style="margin-right:;" enctype="multipart/form-data">

					     <div class="col-md-3 mb-3" style="margin: 5px;">

					   <div class="input-group mb-3">
					      <h5 style="margin: 5px;border:3px;">Search From :&nbsp;&nbsp;</h5>

					      <select name="colomn"  class="custom-select" id="inputGroupSelect01">
					      <option value="oid" >Order ID</option >
					      <option value="costid" >Customer ID</option >
								<option value="name" >Customer Name</option >
					    	<option value="size" >Size</option >
					    	<option value="color" >Color</option >
					  		<option value="price" >Price</option >
								<option value="link" >Link</option >
								<option value="conf" >Purchased Date</option >
								<option value="conf-tu" >Transit To Erbil</option >

					      </select>
					   </div>
					  </div>


					  <div class="col-md-3 mb-3" style="margin-top: 5px;">
					<div class="input-group mb-3">
					   <div class="input-group-prepend">
					       <label class="input-group-text" for="inputGroupSelect01">Value</label>
					   </div>
					<input type="text" class="form-control datetimepicker" placeholder="Value" name="data">
					</div>
					</div>


					 <button type="submit"  name="filterB" class="btn btn-info textfont" style="background-color:#b03060;margin: 5px;border-radius:5px;">Show</button>
					</form>


        </div>



				<div class="content mt-3" >





					<div class="table-responsive" style="zoom:68%;">
							<?php

						if(isset($_POST['filterB'])){
						  $colomn=$_POST['colomn'];
						  $data_filter=$_POST['data'];

						  $query = "SELECT * FROM ord LEFT JOIN cust ON ord.costid = cust.id where  $colomn LIKE '%$data_filter%' AND (`canceled` IS NULL OR `canceled`='') AND !(`arrive` IS NULL OR `arrive`='')AND (`takeit` IS NULL OR `takeit`='')";
						  	$result = mysqli_query($conn,$query);


						}else {





						$query = "SELECT * FROM ord LEFT JOIN cust ON ord.costid = cust.id where (`canceled` IS NULL OR `canceled`='') AND !(`arrive` IS NULL OR `arrive`='') AND (`takeit` IS NULL OR `takeit`='')  ";
						$result = mysqli_query($conn,$query);
						}
						?>
												<table id="bootstrap-data-table-export" class="table table-striped table-bordered">
													<thead class="table-dark" style="background-color:#b03060;">
															<tr>



																		<th width="5%">ID</th>
																		<th >Cus&nbsp;ID</th>
																		<th >Cus&nbsp;Name</th>
																		<th >Bag&nbsp;ID</th>
																		<th width="6%">Size</th>
																		<th width="6%">Color</th>
																		<th width="6%">Price</th>
																		<th width="8%">Link</th>
																		<th width="5%">Link</th>
																		<th width="8%">Image</th>
																		<th width="7%">Purchase</th>
																		<th width="19%">In-Trs-Erbil</th>
																		<th width="">Arrived</th>
																		<th width="8%">Deliver</th>
																		<th width="8%">Modify</th>
																		<th width="8%">Cancele</th>
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

																	<td><?php echo $row['oid'];?></td>
																	<td><?php echo $row['costid'];?></td>
																		<td><?php echo $row['name'];?></td>
																		<td><?php echo $row['bagid'];?></td>
																	<td><?php echo $row['size'];?></td>
																	<td><?php echo $row['color'];?></td>
																	<td><?php echo $row['price'];?></td>
																	<td><textarea readonly  rows="2" cols="10"> <?php echo $row['link'];?></textarea></td>
																	<td><h6><a href="<?php echo $row['link'];?>" target="_blank">Visit </a></h6></td>
																<td>
																  	<!--<img src="<?php echo "../image/".$row['img'];?>" width="100px" alt='your image' /> -->
											<a target="_blank"  href="<?php echo "../image/".$row['img'];?>"><i class="btn btn-lg btn-info textfont fa fa-eye" style="border-radius:10px;border-style: none;background-color:#b03060;"></i></a>
																    	</td>
																	<td><?php echo $row['conf'];?></td>
																	<td><?php echo $row['conf-tu'];?></td>
																		<td><?php echo $row['arrive'];?></td>

																	<td>
																			<center>



																				<form action="arrivedbag.php" method="POST" class="float-left" style="margin-right:5px;margin-bottom:11%;" enctype="multipart/form-data">
																				<input type="hidden" name="nid" value="<?php echo $row['bagid'];?>">
																					<button style="border-radius:10px;" type="submit" name="updatebtn" class="btn btn-info btn-lg textfont"><i class="ti-shopping-cart-full"></i></button>

																		</form>
																	</center>
																</td>





																<td>
																	<center>
																		<a class="btn btn-success btn-lg" style="margin-bottom:11%;border-radius:10px;" href="#edit<?php echo $row['oid'];?>" data-toggle="modal"><i class="fa fa-edit white"></i></a>
																		<?php
																				include('orderlist/editmodala.php');
																		?>



																		</center>
																	</td>
																	<td>
																					<form action="orderlist/acc_code.php" method="POST" class="float-left" enctype="multipart/form-data">
																		<input type="hidden" name="nid" value="<?php echo $row['oid'];?>">
																		<center>	<button style="border-radius:10px;" type="submit" name="updatebtncanclell" class="btn btn-danger textfont">cancel</button>
																				</center>
																</form>

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
