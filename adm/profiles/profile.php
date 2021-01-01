<?php
	include('../../includes/connect.php');
		include('../../includes/session.php');
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
    <link rel="stylesheet" href="../../vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../../vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../../vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../../vendors/jqvmap/dist/jqvmap.min.css">


    <link rel="stylesheet" href="../../assets/css/style.css">

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
		                <a class="navbar-brand" href=".../"><img src="../../images/logo1.png" alt="Logo"></a>

		            </div>

		            <div id="main-menu" class="main-menu collapse navbar-collapse">

		                  <ul class="nav navbar-nav" style="">
		                      <li class="">
		                        <?php if($_SESSION['type'] == 'Data entry'){
		                          $sta="hidden";
		                        } ?>
		                          <a href="../index1.php"  <?php echo @$sta; ?> > <i class="menu-icon fa ti-home"></i>Home </a>
		                      </li>
		                      <li class="">
		                          <a href="../order.php"> <i class="menu-icon fa fa-laptop"></i>New Order</a>

		                      </li>
		                      <li class="active">
		                          <a href="../profile.php" > <i class="menu-icon ti-pencil-alt"></i>New Profile</a>
		                      </li>
		                      <li class=" ">
		                          <a href="../mybag.php" > <i class="menu-icon fa ti-shopping-cart-full"></i>My Bag</a>
		                      </li>

		                      <li class=" ">
		                          <a href="../Profiles.php"  <?php echo @$sta; ?>  > <i class="menu-icon fa ti-user"></i>Profiles</a>
		                      </li>

		                      <li class=" ">
		                          <a href="../activeorder.php" > <i class="menu-icon fa ti-clipboard"></i>Active Orders</a>
		                      </li>
		                      <li class="menu-item ">
		                         <a href="../arrived.php" > <i class="menu-icon fa ti-clipboard"></i>Arrived Orders</a>
		                     </li>
		                      <li class="">
		                          <a href="../orderlist.php"  <?php echo @$sta; ?>  > <i class="menu-icon fa ti-timer"></i>Order History</a>

		                      </li>
		                      <li class="">
		                          <a href="../cancele.php" > <i class="menu-icon ti-filter"></i>Cancelled Order</a>

		                      </li>
		                       <li class="">
		                          <a href="../invoicelist.php" > <i class="menu-icon fa ti-clipboard"></i>Active Invoice</a>

		                      </li>
		                      <li class="">
		                          <a href="../comp.php" <?php echo @$sta; ?>> <i class="menu-icon fa ti-timer"></i>Completed Invoice</a>

		                      </li>
		                      <li class=" ">
		                          <a href="../account.php"  <?php echo @$sta; ?> > <i class="menu-icon fa ti-id-badge"></i>Page Roles</a>

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
                        <h1>profile</h1>
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
							if(isset($_GET['id']))
								{
									  $id=$_GET['id'];
									}


								$query = "SELECT * FROM cust where id='$id' ORDER BY id DESC ";

									$result = mysqli_query($conn,$query);


									if(mysqli_num_rows($result) > 0)
									{
											while($row = mysqli_fetch_assoc($result))
													{
							?>



							                    <div class="col-md-10" style="margin-left:12.5%">
							                        <section class="card">
							                            <div class="twt-feed blue-bg" style="background-color:#b03060;">
																						<div class="corner-ribon black-ribon">

																									<a class=""  href="#del" data-toggle="modal"> <i class="fa ti-settings"></i></a>
																						</div>
							                                <div class="fa fa- wtt-mark"></div>

							                                <div class="media" style="background-color:#b03060;">
							                                    <a href="#">
							                                     <a class=""  href="#add" data-toggle="modal">   <img class="align-self-center rounded-circle mr-3" style="width:135px; height:135px;" alt="" src="../../images/bank.png"> </a>
							                                    </a>
							                                    <div class="media-body">
							                                        <h2 class="text-white display-6"><?php echo $row['name']; ?></h2>
																											<br>
							                                        <p class="text-light"><?php echo $row['id']; ?></p>
																											<p class="text-light"><?php echo $row['phone1']; ?></p>
							                                    </div>
							                                </div>



							                            </div>
							                            <div class="weather-category twt-category">
							                                <ul>
							                                    <li class="active">
							                                        <h3><i class="fa fa-instagram"></i></h3>
																													<br>
							                                     <h4><b>    <?php echo $row['insta']; ?></b></h4>
							                                    </li>
																									<li class="active">
							                                        <h3><i class="fa fa-facebook"></i></h3>
																												<br>
							                                        <h4><b> <?php echo $row['facebook']; ?></b></h4>
							                                    </li>
							                                    <li class="active">
							                                        <h3>balance</h3>
																												<br>
							                                        <h4><b style="color:red;"><?php echo $row['balance']; ?></b></h4>
							                                    </li>
							                                </ul>
							                            </div>
							                            <div class="twt-write col-sm-12">
							                                <textarea readonly placeholder="Address: <?php echo $row['address']; ?>" rows="1" class="form-control t-text-area"></textarea>
							                            </div>
																					<br>
							                            <footer class="twt-footer">
																						<h4><b style="color:">customer activity</b></h4>
																						 <textarea readonly placeholder="<?php echo $row['log']; ?>"  class="form-control t-text-area"></textarea>

							                            </footer>
							                        </section>
							                    </div>

																	            <div id="del"  class="modal fade" id="smallmodal" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
																								<div class="modal-dialog modal-lg-8" role="document">
																							    <div class="modal-content">
																							      <div class="modal-header">
																							        <h5 class="modal-title" id="exampleModalLabel">page Modify</h5>
																							        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
																							          <span aria-hidden="true">&times;</span>
																							        </button>
																							      </div>
																							     <form action="acc_code.php" method="POST" enctype="multipart/form-data">
																							     <input type="hidden" name="nid" value="<?php echo $row['id'];?>">
																							     <div class="card-body card-block">

																							             <div class="form-group">
																							                 <div class="input-group">
																																 	<?php

																																	$type= $row['type'];

																																	if ($type>0) {
																																	$input_value="checked";

																																	}
																																	else {


																																		$input_value="";

																																			}
																																	?>

																																	 <label  class="switch switch-default switch-info-outline-alt switch-pill mr-2"><input name="check"  type="checkbox" class="switch-input"  <?php echo $input_value; ?> size="lg"> <span  class="switch-label"></span> <span class="switch-handle"></span></label>


																							                 </div>
																							             </div>

																															             <div class="form-group">
																															                 <div class="input-group">
																							                     <div class="input-group-addon">special price</div>
																							                     <input type="phone"  value="<?php echo $row['sshipping']?>" name="price" class="form-control">

																							                 </div>
																							             </div>

																							     </div>
																							      <div class="modal-footer">
																							        <button type="button" style="border-radius:5px;" class="btn btn-secondary textfont" data-dismiss="modal">Cancel</button>
																							        <button type="submit" style="border-radius:5px;" name="uodateprice" class="btn btn-info textfont">Save</button>
																							      </div>
																							    </form>

																							    </div>
																							  </div>
																	            </div>

																							<div id="add"  class="modal fade" id="smallmodal" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
																							 <div class="modal-dialog modal-lg-8" role="document">
																								 <div class="modal-content">
																									 <div class="modal-header">
																										 <h5 class="modal-title" id="exampleModalLabel">Balance</h5>
																										 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
																											 <span aria-hidden="true">&times;</span>
																										 </button>
																									 </div>
																									<form action="acc_code.php" method="POST" enctype="multipart/form-data">
																									<input type="hidden" name="nid" value="<?php echo $row['id'];?>">
																									<input type="hidden" name="balance" value="<?php echo $row['balance'];?>">
																									<div class="card-body card-block">


																																					<div class="form-group">
																																							<div class="input-group">
																																	<div class="input-group-addon">Add Balance</div>
																																	<input type="number"  value="" name="balanceadd" class="form-control">

																															</div>
																													</div>

																									</div>
																									 <div class="modal-footer">
																										 <button type="button" style="border-radius:5px;" class="btn btn-secondary textfont" data-dismiss="modal">Cancel</button>
																										 <button type="submit" style="border-radius:5px;" name="updatebalance" class="btn btn-info textfont">Save</button>
																									 </div>
																								 </form>

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

    <script src="../../vendors/jquery/dist/jquery.min.js"></script>
    <script src="../../vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="../../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/main.js"></script>




</body>

</html>
