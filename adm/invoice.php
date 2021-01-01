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
				page {
  background: white;
  display: block;
  margin: 0 auto;
  margin-bottom: 0.5cm;
  box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
}
page[size="A4"] {
  width: 21cm;
  height: 29.7cm;
}
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
			 if(isset($_POST['save']))
			   {
					// error_reporting(0);
					$personal=$_POST['id'] ;
			     $id=$_POST['bid'];
					 $grandtotall=$_POST['grandtotall'];
					  $totall=$_POST['totallf'];
						$rem=$_POST['remf'];
					 $payy=$_POST['paidf'];
						$ship=$_POST['shipf'];
						$remi=$_POST['remi'];
					 	$iq=$_POST['iq'];
						 $iqall=$_POST['iqall'];
						 	 if ($iq==$iqall) {
						 	$complett="1";
						 }
						 else {
						 	$complett=NULL;
						 }
				 	 	$cargo=$_POST['cargof'];
						 $leratotal=$_POST['totallir'];
						 $sql = "UPDATE `ord` SET `total`='$grandtotall',`paid`='$totall',`iqcomp`='$iqall',`comp`='$complett' WHERE bagid ='$id' ";
						 $result = mysqli_query($conn, $sql);
						 if($result){
						 }


				 }







			           $query = "SELECT * FROM cust where `id`=$personal";
			             $result = mysqli_query($conn,$query);


	         					if(mysqli_num_rows($result) > 0)
			             {
			                 while($row = mysqli_fetch_assoc($result))
			                     {
			                       $name= $row['name'];

			                       $address= $row['address'];
			                     }
												 }





			 ?>




			 <script type="text/javascript">



			  $(document).ready(function(){
			    var pers = "<?php echo $personal; ?>";
			  var name = "<?php echo 	$name; ?>";
			  var addres = "<?php echo 	$address; ?>";

			    document.getElementById('txt_id').value = pers;
			    document.getElementById('na').value = name;

			    document.getElementById('ad').innerHTML = addres ;




			  });


			 </script>
		



</head>

<body>


<page size="A4">


      <!-- Left Panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->


    <div id="right-panel" class="right-panel">


      <!-- Header-->


      <div class="breadcrumbs">

<div style="background-color:transparent;" id="countryList"></div>
      </div>

			<div class="col-md-12" style="">
					<div class="card" style="border-radius:10px;">

							<div class="card-body" style="">
								<div class="col-sm-6" style="margin-bottom:15px;border:5px;">

						<center>	<a>	<img onclick="window.print()" src="../images/bag.png" width="120px;" alt=""></a> </center>





    
							<h3 style="text-align: center;margin-left:0px;" > <b><input name="na" id="na" style="margin-top:5px;margin-left: 0%;width: 100%;" type="text" ></b></h3>
						
								<h3><b>Customer ID  &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input  name="txt_id" id="txt_id" style="width:20.5%;text-align:right;" type="text" ></b></h3>
									<h3 style="margin-top:0px;"><b>Invoice ID &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp; <?php echo $id ?></b></h3>
										<h3 style="margin-top:3px;"><b>Date   &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo date("d/m/Y"); ?></b></h4>
								</div>

								<div class="float-right col-sm-6" style="margin-top:3%;">
								   
								<center><h1>	<b> INVOICE  </b></h1></center>
								<br>
								<h3 style=""><b> Grand Total :</b><b style="float:right;"> <?php echo $grandtotall; ?> $</b> </h3>
								<h3 style="">Amount Paid : <b style="float:right;"><?php echo $rem; ?> $</b></h3>

									<h3 style="">Total Paid : <b style="float:right;"><?php echo $payy; ?> $</b> </h3>
									<h3 style="">Remaining : <b style="float:right;"><?php echo $remi; ?> $</b>	</h3>
									<h3 style="">ShippingFee :<b style="float:right;"> <?php echo $ship; ?> $</b> </h3>
								<h3 style="">Received Items: <b style="float:right;"><?php echo $iq." of ".$iqall;?></b> </h3>



								</div>

									</div>

					</div>
			</div>



<center>




</center>

      <div class="content col-sm-12 "  style="border-radius:10px;">

				<div class="table-responsive" style="text-align:center;border-radius:10px;">


				              <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
				                <thead class="table" style="">
				                    <tr>


				                      <th width="20%">Order ID</th>
				                     <th width="10%">Color</th>
				                     <th width="10%">Size</th>
				                     <th width="7%"><i class="fa fa-try"></i> Price</th>


				                     <th width="5%"> Date </th>
														 <th width="5%"> Status </th>
				                        <!-- <th class="text-right">Action</th> -->
				                    </tr>
				                </thead>
				                <tbody>

				        <?php
								$today=date("d/m/Y");
				        $query = "SELECT * FROM ord where `bagid`=$id  ";
				        $result = mysqli_query($conn,$query);
				            if(mysqli_num_rows($result) > 0)
				            {

				                while($row = mysqli_fetch_assoc($result))
				                    {


				        ?>
				                    <tr <?php ?>>

				                        <td><?php echo $row['oid'];?></td>
				                        <td><?php echo $row['color'];?></td>
				                        <td><?php echo $row['size'];?></td>
				                        <td><?php echo $row['price'];?></td>
																 <td><?php echo $row['takeit'];?></td>






																	<td>
																		<?php

																		if ($row['canceled']) {
																				$ca="canceled";
																				echo $ca;

																		}
																		if (($row['takeit']==null or $row['takeit']=='' )AND ($row['canceled']==null or $row['canceled']=='' )) {
																				$d="Pending ";
																				echo $d;

																		}
																		if ($row['takeit']==$today) {
																				$d1="<b>Received</b>";
																				echo $d1;

																		}
																		if ($row['takeit']!==$today AND !($row['takeit']==null or $row['takeit']=='' )) {
																				$d2="Received";
																				echo $d2;

																		}
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

<h3><b>Terms & Conditions</b></h3>
<h5>All paid fees to Smiley Bag are deemed fully earned upon receipt and are nonrefundable.</h5>



				<br />









				</div>










  			<br />
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




  		    <script src="../vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
  		    <script src="../vendors/jszip/dist/jszip.min.js"></script>
  		    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
  		    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>
  		    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
  		    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
  		    <script src="../vendors/datatables.net-buttons/js/buttons.colVis.min.js"></script>
  		    <script src="../assets/js/init-scripts/data-table/datatables-init.js"></script>





</page>


</body>

</html>
