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
    <title>Smiley Bag </title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="../apple-icon.png">
    <link rel="shortcut icon" href="../favicon.ico">

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


		     <script src="jquery-3.3.1.js" type="text/javascript"></script>



		 <!-- jQuery library autocompllement -->
		 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

		 <!-- jQuery UI library -->
		 <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
		 <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

      <!-- ajax links-->

				<style>
				@font-face {
				   font-family: OpenSans;
				   src: url(../includes/OpenSans-Regular.ttf);
				}

				* {
				   font-family: OpenSans;

				}

				input {
					border:none;

				}
				</style>
				<style media="screen">

.clear{
	clear:both;
	margin-top: 20px;
}

#searchResult{
	list-style: none;
	padding: 0px;
	width: 200px;
	position: absolute;
	margin: 0;
}

#searchResult li{
	background: lavender;
	padding: 4px;
	margin-bottom: 1px;
}

#searchResult li:nth-child(even){
	background: cadetblue;
	color: white;
}

#searchResult li:hover{
	cursor: pointer;
}


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
		<script src= "https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
	     </script>

			 <?php
			 if(isset($_POST['updatebtn']))
			   {
					// error_reporting(0);
			     $id=$_POST['nid'];
				 }else {
				 	// code...
				 	$id=$_GET['bagid'];}

					$qu = "SELECT * FROM d where `id`=1";
					$re = mysqli_query($conn,$qu);



					if(mysqli_num_rows($re) > 0)
					{
							while($ro = mysqli_fetch_assoc($re))
									{
									$dis=	$ro['dis'];

									}
									}


			     $query = "SELECT * FROM ord where `bagid`=$id ORDER BY bagid DESC";
			     $result = mysqli_query($conn,$query);



			     if(mysqli_num_rows($result) > 0)
			     {
						 			$tott=0;
						 				$iq=0;
										$iqs=0;
			         while($row = mysqli_fetch_assoc($result))
			             {
										 $shipp=$row['shfee'];
										 $paiy=$row['paid'];
			               $personal= $row['costid'];
 									 	 $cargoo=$row['cargo'];
										 $convert=$row['dprice'];
										 $total=$row['total'];
										 $invoice_paid=$row['invoice_paid'];

										 if ($row['canceled']) {
											  $shipp=$shipp-$dis;
										 continue;

										 }
										 if (!$row['takeit']) {
											 $iqs=$iqs+1;
										continue;
										}
										 else {
											 $tot=$row['price'];
											 $tott+=$tot;
											 $iq=$iq+1;
											  $iqs=$iqs+1;
										 }



			             }
								 }



								 $query = "SELECT * FROM ord where `bagid`=$id ORDER BY bagid DESC";
								 $result = mysqli_query($conn,$query);


								 if(mysqli_num_rows($result) > 0)
								 {
												$tott1=0;
													$iqq=0;
										 while($row = mysqli_fetch_assoc($result))
												 {


													 if ($row['canceled']) {
														  $shipp=$shipp-$dis;
													 continue;
													 }

													 else {
														 $tot1=$row['price'];
														 $tott1+=$tot1;
														 $iqq=$iqq+1;
 												 				}


												 }
											 }

											 									  $today = date("d/m/Y");
																						$tr=0;
											 								 $quew = "SELECT * FROM ord where `bagid`=$id AND `takeit`='$today'";
											 								 $resultw = mysqli_query($conn,$quew);


											 								 if(mysqli_num_rows($resultw) > 0)
											 								 {
											 												$tr=0;

											 										 while($row = mysqli_fetch_assoc($resultw))
											 												 {

											 														 $tr1=$row['price'];
											 														 $tr+=$tr1;

											 												 }
											 											 }




			           $query = "SELECT * FROM cust where `id`=$personal";
			             $result = mysqli_query($conn,$query);


	         					if(mysqli_num_rows($result) > 0)
			             {
			                 while($row = mysqli_fetch_assoc($result))
			                     {
			                       $name= $row['name'];
			                       $insta= $row['insta'];
			                       $facebook= $row['facebook'];
			                       $p1= $row['phone1'];
			                       $p2= $row['phone2'];
			                       $address= $row['address'];
														 $note=$row['note'];
			                     }
												 }





			 ?>




			 <script type="text/javascript">



			  $(document).ready(function(){
			    var pers = "<?php echo $personal; ?>";
			  var name = "<?php echo 	$name; ?>";
			  var insta = "<?php echo 	$insta; ?>";
			  var facebook = "<?php echo 	$facebook; ?>";
			  var phone1 = "<?php echo 	$p1; ?>";
			  var phone2 = "<?php echo 	$p2; ?>";
			  var addres = "<?php echo 	$address; ?>";
						var note = "<?php echo 	$note; ?>";
				 var invoice_paid = "<?php echo 	$invoice_paid; ?>";
			    document.getElementById('txt_id').value = pers;
			    document.getElementById('na').value = name;
			    document.getElementById('in').value = insta;
			    document.getElementById('fa').value = facebook;
			    document.getElementById('ad').innerHTML = addres ;
			    document.getElementById('p1').value = phone1;
			    document.getElementById('p2').value = phone2;
					document.getElementById('note').value = note;



			  });


			 </script>



</head>

<body>


      <!-- Left Panel -->

  		    <aside id="left-panel" class="left-panel" style="background-color:#b03060;">
  		        <nav class="navbar navbar-expand-sm navbar-default" style="background-color:#b03060;">

  		            <div class="navbar-header">
  		                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
  		                    <i style="color:white;" class="fa fa-bars"></i>
  		                </button>
  		                <a class="navbar-brand" href="./"><img src="../images/logo1.png" alt="Logo"></a>

  		            </div>

  								<div id="main-menu" class="main-menu collapse navbar-collapse">
  								    <ul class="nav navbar-nav" style="margin-left:-7.8%;">
  								        <li class="">
														<?php if($_SESSION['type'] == 'Data entry'){
															$sta="hidden";
														} ?>
															<a href="index1.php" <?php echo @$sta; ?>> <i class="menu-icon fa ti-home"></i>Home </a>
													</li>
  								        <li class="">
  								            <a href="order.php"> <i class="menu-icon fa fa-laptop"></i>New Order</a>

  								        </li>
  								        <li class=" ">
  								            <a href="profile.php" > <i class="menu-icon ti-pencil-alt"></i>New Profile</a>
  								        </li>
  								        <li class=" ">
  								            <a href="mybag.php" > <i class="menu-icon fa ti-shopping-cart-full"></i>My Bag</a>
  								        </li>

  								        <li class=" ">
  								            <a href="Profiles.php" <?php echo @$sta; ?> > <i class="menu-icon fa ti-user"></i>Profiles</a>
  								        </li>

  								        <li class=" ">
  								            <a href="activeorder.php" > <i class="menu-icon fa ti-clipboard"></i>Active Orders</a>
  								        </li>
													<li class=" ">
														 <a href="arrived.php" > <i class="menu-icon fa ti-clipboard"></i>Arrived Orders</a>
												 </li>
  								        <li class=" ">
  								            <a href="orderlist.php" <?php echo @$sta; ?> > <i class="menu-icon fa ti-timer"></i>Order History</a>

  								        </li>
													<li class="">
													    <a href="cancele.php" > <i class="menu-icon ti-filter"></i>Cancelled Order</a>

													</li>
													<li class="active">
												    
                          <a href="invoicelist.php" > <i class="menu-icon fa ti-clipboard"></i>Active Invoice</a>

                      </li>
                      <li class="">
                          <a href="comp.php" <?php echo @$sta; ?>> <i class="menu-icon fa ti-timer"></i>Completed Invoice</a>

                      </li>
  								        <li class=" ">
  								            <a href="account.php" <?php echo @$sta; ?>> <i class="menu-icon fa ti-id-badge"></i>Page Roles</a>

  								        </li>
  								      

  								    </ul>
  		            </div><!-- /.navbar-collapse -->
  		        </nav>
  		    </aside><!-- /#left-panel -->


      <!-- Left Panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->


    <div id="right-panel" class="right-panel">

      <!-- Header-->
      <header id="header" class="header">

          <div class="header-menu">

              <div class="col-sm-7">
                  <a id="menuToggle" class="menutoggle pull-left"><i style="color:white;"  class="fa fa fa-tasks"></i></a>

              </div>

              <div class="col-sm-5">
								<style media="screen">



											.btn-circle {
											    	background-color:#b03060;
											border-style: none;
											width: 30px;
											height: 30px;
											text-align: center;
											padding: 6px 0;
											font-size: 12px;
											line-height: 1.428571429;
											border-radius: 15px;
											}
											.btn-circle.btn-lg {
											    	background-color:#b03060;
											border-style: none;
											width: 50px;
											height: 50px;
											padding: 10px 16px;
											font-size: 18px;
											line-height: 1.33;
											border-radius: 25px;
											}
											.btn-circle.btn-xl {
											    	background-color:#b03060;
											border-style: none;
											width: 70px;
											height: 70px;
											padding: 10px 16px;
											font-size: 24px;
											line-height: 1.33;
											border-radius: 35px;
											}

              </style>
                  <div class="user-area dropdown float-right">
                        <a class="nav-link" href=""><i class="fa "></i> Logout</a>

                      <div class="user-menu dropdown-menu">



                      </div>
                  </div>


              </div>
          </div>

      </header><!-- /header -->
      <!-- Header-->



      <div class="breadcrumbs">

<div style="background-color:transparent;" id="countryList"></div>
      </div>

			<div class="col-md-9" style="">
					<div class="card" style="border-radius:10px;background-color:">

							<div class="card-body" style="">
								<div class="col-sm-2" style="margin-bottom:15px;">

									<button type="button" style="" onclick="chang()" class="btn btn-info btn-circle btn-xl"><i class="glyphicon glyphicon-ok"></i></button>
								<center>	<h4 style="margin-left:20%;">  <b><input name="" id="txt_i" style="width:83%; ;" type="text" ><?php echo $id;?></b></h4> </center>

									<script type="text/javascript">
									function chang() {
										var tel = "<?php echo $convert ?>";
									var k ="<?php echo $tott ?>"
									var k1 ="<?php echo $tott1 ?>"
									var k2 ="<?php echo $tr ?>"


									k=parseInt(k,10);

									var paid = document.getElementById('paid').value;

										var cargoo = document.getElementById('car').value;



															var item = document.getElementById('itemmm').value;
													var ship=0;
																	ship="<?php echo $shipp; ?>";
																	ship=parseInt(ship,10);
																	document.getElementById('shipp').value=ship;

										k=parseInt(k,10);
											k1=parseInt(k1,10);
											k2=parseInt(k2,10);

										cargoo=parseInt(cargoo,10);
										var carr=cargoo;
										cargoo += k;
											carr=parseInt(carr,10);
										k1+=parseInt(carr,10);



										final_price=cargoo/(tel /100) +ship;


										final_price1=k1/(tel /100) +ship;


											final_price1=final_price1.toFixed(2);
											final_price=final_price.toFixed(2);
										var te=final_price-paid;
											var tee=final_price1-paid;
											var remq=final_price1-final_price;
											remq=remq.toFixed(2);
										document.getElementById('cargof').value=carr;
										document.getElementById('cargoff').value=carr;
										document.getElementById('shipf').value=ship;
										document.getElementById('shipff').value=ship;
										document.getElementById('paidf').value=paid;
										document.getElementById('paids').value=paid;
										document.getElementById('paidff').value=paid;
										document.getElementById('rem').value=te.toFixed(2);
										document.getElementById('remf').value=tee.toFixed(2);
										document.getElementById('remff').value=te.toFixed(2);
									 document.getElementById('totall').value=final_price;
							  	 document.getElementById('totallf').value=final_price1;
								  document.getElementById('totallff').value=final_price;
									document.getElementById('tottr').value=final_price1;
										document.getElementById('grandtotall').value=final_price1;
									document.getElementById('reminvoice').value=remq;
								  document.getElementById('remi').value=remq;
									}
									</script>
								</div>
								<div class="col-sm-4" style="margin-bottom:2%;">
									<h3 style=""> <i class="fa fa-key white"></i> <b>&nbsp; <input name="txt_id" id="txt_id" style="width:83%; ;" type="text" ></b></h3>
									<ul id="searchResult"></ul>

									<div class="clear"></div>
									<h3 style="" > <i class="fa fa-user white"></i>	<strong> &nbsp; <input name="na" id="na" style="width: 84%;margin-top:5px; ;" type="text" ></strong></h3>

									<h4 style="margin-top:6px;margin-left:10%;" id="ad">Erbil</h4>

								</div>
								<div class="float-right col-sm-6">
								<h5 style="">| <i class="fa ti-instagram white"></i>&nbsp; &nbsp; <input id="in" style=" " type="text" name="" value=""></h5>
								<hr style="">
									<h5 style="">| <i class="fa ti-facebook white"></i>&nbsp; &nbsp;	<input id="fa" style="  " type="text" name="" value=""></h5>
									<hr style="">
								<h5 style="">| &nbsp; 	<input id="p1" style="width:24%;" type="text" name="" value=""> &nbsp;|<input id="p2" style="width:25%;" type="text" name="" value="" readonly> | <input id="note" style="width:38%;" type="text" name="" value="" readonly></h5>

								</div>
									</div>
					</div>
			</div>



<center>
	<div class="col-sm-1" >



		    	<form action="onebag/acc_code.php" method="POST" enctype="multipart/form-data">
																<input type="hidden" name="id" id="fff" value="<?php echo $personal; ?>">
 													 			<input type="hidden" name="bid"  value="<?php echo $id; ?>">
 													 		<input type="hidden" id="totallf" name="totallf" value="">
 													 		<input type="hidden" id="remf" name="remf" value="">
 													 		<input type="hidden" id="paidf" name="paidf" value="">
 													 		<input type="hidden" id="shipf" name="shipf" value="">
 													 		<input type="hidden"  name="iq"   value="<?php echo $iqs; ?>">
 													 		<input type="hidden" id="cargof" name="cargof" value="<?php echo $cargoo; ?>">
 													 	 <button name="inoicesave" type="submit" class="btn "><a class="btn btn-primary" style="background-color:#d0266d;border-radius:10px;border-style: none;color:white;margin-top:-3%;" onclick="chang()" ><img width="68%" src="../images/inn.png" alt=""><h4>&nbsp;&nbsp;&nbsp;&nbsp;Select  All&nbsp;&nbsp;&nbsp;&nbsp;</h4></a></button>
 													 		</form>
		



</div>
			<div class="col-sm-1" style="margin-left:3%;">

				<form action="invoice.php" target="_blank" method="POST" enctype="multipart/form-data">
				<input type="hidden" name="id" id="idd" value="<?php echo $personal; ?>">
					<input type="hidden" name="bid"  value="<?php echo $id; ?>">
					<input type="hidden" id="grandtotall" name="grandtotall" value="">
				<input type="hidden" id="totallff" name="totallf" value="">
				<input type="hidden" id="remff" name="remf" value="">
				<input type="hidden" id="paidff" name="paidf" value="">
				<input type="hidden" id="shipff" name="shipf" value="">
				<input type="hidden" id="remi" name="remi" value="">
				<input type="hidden"  name="iq"   value="<?php echo $iq; ?>">
				<input type="hidden"  name="iqall"  value="<?php echo $iqq; ?>">
				<input type="hidden" id="cargoff" name="cargof" value="<?php echo $cargoo; ?>">
				<input type="hidden" name="totallir" value="<?php echo $tott; ?>">


				<button type="submit" style="background-color:#d0266d;border-radius:10px;border-style: none;" onclick="chang()" name="save" id="save" class="btn btn-primary"><img width="68%" src="../images/pr.png" alt=""><h4> &nbsp; &nbsp; &nbsp; &nbsp;Print &nbsp; &nbsp; &nbsp; &nbsp;</h4></button>

					</form>
		</div>



</center>

      <div class="content col-sm-9" style="">

				<div class="table-responsive">


				              <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
				                <thead class="table" style="">
				                    <tr>


				                      <th width="20%">Order ID</th>
				                     <th width="10%">Color</th>
				                     <th width="10%">Size</th>
				                     <th width="7%">Price</th>
				                      <th width="10%">img</th>
															<th width="10%">Note</th>
				                     <th width="5%">Invoice</th>
				                     <th width="5%">Modify</th>
				                        <!-- <th class="text-right">Action</th> -->
				                    </tr>
				                </thead>
				                <tbody>

				        <?php
				        $query = "SELECT * FROM ord where `bagid`=$id ";
				        $result = mysqli_query($conn,$query);
				            if(mysqli_num_rows($result) > 0)
				            {
				                while($row = mysqli_fetch_assoc($result))
				                    {
															if ($row['canceled']) {
															$style =" style='background-color:#ec5f8f;'";
															}
				        ?>
				                    <tr <?php echo @$style; ?>>

				                        <td><?php echo $row['oid'];?></td>
				                        <td><?php echo $row['color'];?></td>
				                        <td><?php echo $row['size'];?></td>
				                        <td><?php echo $row['price'];?></td>
				                        <td><?php echo "<img src='../image/".$row['img']."' />"?></td>
																<td><textarea  rows="1" readonly cols="15"><?php echo $row['notes'];?> </textarea></td>





																	<td>
																		<?php

																		if ($row['canceled']) {
																				$ca="canceled";
																				echo $ca;

																		}
																			else {


																		?>

																		<form style="border-radius:5px;margin-left:20%;" action="orderlist/acc_code.php" method="POST" class="float-left" enctype="multipart/form-data">
																		<input type="hidden" name="nid" value="<?php echo $row['oid'];?>">
																			<input type="hidden" name="bag" value="<?php echo $row['bagid'];?>">
																			<?php
																			$st="danger";

																			if ($row['takeit']) {

																			$st="success";
																			$stt="ti-check";
																		}
																		else {
																			// code...

																		$stt="ti-layout-width-full";
																	}

																			 ?>
																			<button style="border-radius:5px;" type="submit" name="updatebtninvoice" class="btn btn-<?php echo $st;?> textfont"><i class="<?php echo $stt; ?>"></i></button>

																</form>
																		<?php

																			$st="info";

																	}

																		?>
																</td>
																<?php  $style= " ";?>


																				                        <td>


																				                            <a class="btn btn-success" style="border-radius:5px;margin-left:20%;" href="#edit<?php echo $row['oid'];?>" data-toggle="modal"><i class="fa fa-edit white"></i></a>
																																		<?php

																																				include('onebag/editmodalon.php');
																																		?>
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





				<br />









				</div>










  			<br />
      </div>
			<div class="col-md-3"  style="" >

									<div class="card" style="border-radius:10px;margin-bottom: 0px;margin-bottom:2%;background-color:#f1f2f7;">

											 <center> <strong class="card-title">Grand Total</strong><br>
											<i class="fa fa-dollar"></i> <input  type="text" style=" border-radius:10px;width:65%;text-align:center;margin-bottom:4%;margin-top:5px" name="" id="tottr" value="" readonly></input>
												</center>
										</div>



										<input  type="hidden" style=" border-radius:10px;width:65%;text-align:center; ;margin-top:5px" name="totall" id="totall" value="" readonly></input>


									<div class="card" style="border-radius:10px;margin-bottom: 0px;margin-bottom:2%;">
											<div class="card-header" style="border-top-radius:10px;;color:black;">



												<div class="row form-group" style="border-radius:10px;margin-bottom: 0px;margin-bottom:2%;">
														<div class="col col-md-4"><label for="text-input" class=" form-control-label">	<i class="fa fa-dollar">&nbsp;Remaining</i></label></div>
														<div class="col-12 col-md-8"><h2><input type="text" style="border-radius:10px;text-align:center;"  name="reminvoice" id="reminvoice" value=""  class="form-control form-control-lg col-sm-6 float-right"></div></h2>
												</div>
												<input type="hidden"   name="paidd" id="paid" value="<?php echo $paiy; ?>"  class="form-control form-control-lg col-sm-6 float-right">
												<div class="row form-group" style="border-radius:10px;margin-bottom: 0px;margin-bottom:2%;">
														<div class="col col-md-4"><label for="text-input" class=" form-control-label">	<i  class="fa fa-dollar">&nbsp;Selected</i></label></div>
														<div class="col-12 col-md-8"><h2><input type="text" style="border-radius:10px;text-align:center;" id="rem" name="remmaing" readonly value="" class="form-control form-control-lg col-sm-6 float-right"></div></h2>
												</div>

												<div class="row form-group" style="border-radius:10px;margin-bottom: 0px;margin-bottom:2%;">
														<div class="col col-md-4"><label for="text-input" class=" form-control-label">	<i  class="fa fa-dollar">&nbsp;Paid</i></label></div>
														<div class="col-12 col-md-8"><h2><input type="text" style="border-radius:10px;text-align:center;" id="paids" name="remmaing" readonly value="" class="form-control form-control-lg col-sm-6 float-right"></div></h2>
												</div>
											</div>


									</div>
									<div class="card" style="border-radius:10px;margin-bottom: 0px;margin-bottom:2%;">
											<div class="card-header" style="border-top-radius:10px;color:black;">
												<div class="row form-group">
														<div class="col col-md-3"><label for="text-input" class=" form-control-label"><i class="fa fa-dollar">&nbsp;ShippingFee</i></label></div>
														<div class="col-12 col-md-9"><h2><input type="text" style="border-radius:10px;text-align:center;" id="shipp" name="shippingfee" readonly value="" class="form-control form-control-lg col-sm-6 float-right"></div></h2>
												</div>


												<div class="row form-group">
														<div class="col col-md-3"><label for="text-input" class=" form-control-label"><i  class="fa "> &nbsp;Quantity</i></label></div>
														<div class="col-12 col-md-9"><h2><input type="text" style="border-radius:10px;text-align:center;"  id="itemmm" name="itemmm" value="<?php echo $iq." / ".$iqq; ?>" readonly class="form-control form-control-lg col-sm-6 float-right"></div></h2>
												</div>






											</div>


									</div>
									<div class="card" style="border-radius:10px;margin-bottom: 0px;margin-bottom:2%;">
											<div class="card-header" style="border-top-radius:10px;;color:black;">
												<div class="row form-group">
														<div class="col col-md-4"><label for="text-input" class=" form-control-label"><i class="fa fa-try">&nbsp;CargoFee</i></label></div>
														<div class="col-12 col-md-8"><h2><input type="text" readonly style="border-radius:10px;text-align:center;"  name="cargofee" id="car" value="<?php echo $cargoo; ?>" class="form-control form-control-lg col-sm-6 float-right"></div></h2>
												</div>
												<div class="row form-group">
														<div class="col col-md-4"><label for="text-input" class=" form-control-label"><i style="margin-top:10px;" class="fa fa-try"> Total</i></label></div>
														<div class="col-12 col-md-8"><h2><input type="text" style="border-radius:10px;text-align:center;"   name="totaltil"  readonly value="<?php echo $tott; ?>" readonly class="form-control form-control-lg col-sm-6 float-right"></div></h2>

												</div>





											</div>
												<div class="card-header" >
											<div class="row form-group" style="border-radius:10px;margin-bottom: 0px;margin-bottom:2%;">
													<div class="col col-md-4"><label for="text-input" class=" form-control-label"><i style="margin-top:10px;" class="fa fa-dollar"> 100 </i></label></div>
													<div class="col-12 col-md-8"><h2><input type="text" style="border-radius:10px;text-align:center;"   name="totaltil"  readonly value="<?php echo $convert; ?>" readonly class="form-control form-control-lg col-sm-6 float-right"></div></h2>
											</div>

	</div>
									</div>







      </div>
      <div id="action_alert" title="Action">

      </div>


      </div> <!-- .content -->
  </div><!-- /#right-panel -->

  <!-- Right Panel -->

      <!-- Right Panel -->
  		    <script src="../vendors/jquery/dist/jquery.min.js"></script>
  		    <script src="../vendors/popper.js/dist/umd/popper.min.js"></script>
  		    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
  		    <script src="../assets/js/main.js"></script>











</body>

</html>
