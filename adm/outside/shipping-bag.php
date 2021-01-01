<?php
	include('../../includes/connect.php');
		include('../../includes/session.php');
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

    <link rel="apple-touch-icon" href="../../apple-icon.png">
    <link rel="shortcut icon" href="../../favicon.ico">

		<style>
		@font-face {
		   font-family: OpenSans;
		   src: url(../../includes/OpenSans-Regular.ttf);
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
    <link rel="stylesheet" href="../../vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">

    <link rel="stylesheet" href="../../assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>
<body>


  <!-- Left Panel -->

  <aside id="left-panel" class="left-panel" style="background-color:#b03060;">
      <nav class="navbar navbar-expand-sm navbar-default" style="background-color: #b03060;">

          <div class="navbar-header" >
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                  <i style="color:white;" class="fa fa-bars"></i>
              </button>
              <a class="navbar-brand" href="./"><img src="../../images/logo1.png" alt="Logo"></a>
              <a class="navbar-brand hidden" href="./"><img src="../../images/logo2.png" alt="Logo"></a>
          </div>

          <div id="main-menu" class="main-menu collapse navbar-collapse">
              <ul class="nav navbar-nav">
								<li class="">
									 <a href="home.php"> <i class="menu-icon  ti-filter"></i>home</a>
									 <hr style="margin-top:-2%;margin-bottom:2%;">
										 </li>
                <li class="">
                    <a href="turkya-staff.php"> <i class="menu-icon  ti-home"></i>Ürünler</a>
										  <hr style="margin-top:-2%;margin-bottom:2%;">
                </li>
                <li class="active">
                    <a href="turkya-staffbag.php"> <i class="menu-icon ti-briefcase"></i>Çantalar</a>
										  <hr style="margin-top:-2%;margin-bottom:2%;">
                </li>
                  <li class="">
                      <a href="turkya-staffundo.php"> <i class="menu-icon  ti-back-left"></i>Geri Çeviren Ürünler</a>
											  <hr style="margin-top:-2%;margin-bottom:2%;">
                  </li>
                                         <li class="">
                 <a href="canceletur.php"> <i class="menu-icon  ti-filter"></i>İptal Edilen Ürünler</a>
                   <hr style="margin-top:-2%;margin-bottom:2%;">
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



            <div class="col-sm-1">
                <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>

            </div>
            <div class="col-sm-6">
              <a href="turkya-staffbag.php"><button style="border-radius:10px;" type="button"  name="" class="btn btn-info textfont"><i class="ti-shopping-cart-full"></i>Göster</button>

          </a>	  </div>
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
					<div class="col-sm-5">
							<div class="page-header float-left">
									<div class="page-title">
											<h1>Çantalar</h1>
									</div>
							</div>
					</div>




        </div>



				<div class="content mt-3">





					<div class="table-responsive" style="zoom:76%;">
						<?php





						  $i=$_SESSION['username'];

					$query = "SELECT * FROM ord where `conf`>0 AND !(  `conf-tu` IS NULL or `conf-tu`='') AND(  `canceled` IS NULL or `canceled`='') AND(  `arrive` IS NULL or `arrive`='') AND send='$i' group BY bagid DESC" ;
						$result = mysqli_query($conn,$query);

						?>
												<table id="bootstrap-data-table-export" class="table table-striped table-bordered" style="zoom:90%">
													<thead class="table-dark" style="background-color:#b03060;">
															<tr>



																		<th width="1%">#</th>

																			<th width="1%"><center>Çanta&nbsp;No</center></th>
																		<th ><center>Müşteri &nbsp;No</center></th>
																		<th width="13%">purchase date</th>
                                    <th><center>Adet</center></th>
																		<th width="50%"><center>Images</center></th>
																		<th>
																			chech
																		</th>
																		<th ><center>Çanta</center></th>

																	<!-- <th class="text-right">Action</th> -->
															</tr>
													</thead>
													<tbody>

									<?php
                  $count=1;
											if(mysqli_num_rows($result) > 0)
											{
													while($row = mysqli_fetch_assoc($result))
															{
									?>
															<tr>
																<td><?php  echo $count;$count=$count+1;?></td>
																	<td><h4><?php $sd= $row['bagid'];  echo $sd;?></h4></td>



																	<td><h4><center><?php echo $row['costid'];?></h4></center></td>
																	<td><h4><center><?php echo $row['conf'];?></h4></center></td>
                                    <td><h4><center><?php echo $row['iq'];?></h4></center></td>

																<td>	<?php
                                $query1 = "SELECT * FROM ord where `bagid`=$sd AND(  `canceled` IS NULL or `canceled`='')AND !(  `conf-tu` IS NULL or `conf-tu`='') AND(  `arrive` IS NULL or `arrive`='')   LIMIT 4  " ;
                                  $result1 = mysqli_query($conn,$query1);
                                  if(mysqli_num_rows($result1) > 0)
                                  {
                                      while($roww = mysqli_fetch_assoc($result1))
                                          {

                                 ?>


                                  <img style="border-radius:10px;margin-left:3%;" src="<?php echo "../../image/".$roww['img'];?>" width="135px" height="210px;" alt='your image' />

                                <?php }} ?>
																	  </td>
																		<td>
																			<input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
																		</td>
                                    <td>
																		<center>
																		<form action="bagtur.php" method="POST" class="float-left" style="margin-right:25px;margin-bottom:11%;" enctype="multipart/form-data">
																		<input type="hidden" name="nid" value="<?php echo $row['bagid'];?>">
																			<button style="border-radius:10px;margin:10%;" type="submit" name="updatebtn" class="btn btn-info textfont"><h2><i class="ti-shopping-cart-full"></i>Göster</h2></button>

																</form>
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
		    <script src="../../vendors/jquery/dist/jquery.min.js"></script>
		    <script src="../../vendors/popper.js/dist/umd/popper.min.js"></script>
		    <script src="../../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
		    <script src="../../assets/js/main.js"></script>

		    <script src="../../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
		    <script src="../../vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
		    <script src="../../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
		    <script src="../../vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
		    <script src="../../vendors/jszip/dist/jszip.min.js"></script>
		    <script src="../../vendors/pdfmake/build/pdfmake.min.js"></script>
		    <script src="../../vendors/pdfmake/build/vfs_fonts.js"></script>
		    <script src="../../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
		    <script src="../../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
		    <script src="../../vendors/datatables.net-buttons/js/buttons.colVis.min.js"></script>
		    <script src="../../assets/js/init-scripts/data-table/datatables-init.js"></script>


</body>

</html>
