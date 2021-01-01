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
		<script type="text/javascript">


				$(document).ready(function(){

						$("#txt_id").keyup(function(){
								var search = $(this).val();

								if(search != ""){

										$.ajax({
												url: 'serch/sid.php',
												type: 'post',
												data: {search:search, type:1},
												dataType: 'json',
												success:function(response){

														var len = response.length;
														$("#searchResult").empty();
														for( var i = 0; i<len; i++){
																var id = response[i]['id'];


																$("#searchResult").append("<li value='"+id+"'>"+id+"</li>");

														}

														// binding click event to li
														$("#searchResult li").bind("click",function(){
																setText(this);
														});


												}
										});
								}

						});


				});


				function setText(element){

						var value = $(element).text();
						var userid = $(element).val();

						$("#txt_id").val(value);
						$("#searchResult").empty();

						// Request User Details
						$.ajax({
								url: 'serch/sid.php',
								type: 'post',
								data: {userid:userid, type:2},
								dataType: 'json',
								success: function(response){

										var len = response.length;
										$("#userDetail").empty();
										if(len > 0){
												var id = response[0]['id'];
													var name = response[0]['name'];
														var insta = response[0]['insta'];
															var facebook = response[0]['facebook'];
															var address = response[0]['address'];
												var phone1 = response[0]['phone1'];
												var phone2 = response[0]['phone2'];

												 document.getElementById('na').value = name;
												 document.getElementById('in').value = insta;
												 document.getElementById('fa').value = facebook;
												 document.getElementById('ad').innerHTML = address ;
												 document.getElementById('p1').value = phone1;
												 document.getElementById('p2').value = phone2;
										}
								}

						});
				}

		</script>

		<script type="text/javascript">
		        $(document).ready(function() {
		            $("#but_upload").click(function() {
		                var fd = new FormData();
		                var files = $('#file')[0].files[0];
		                fd.append('file', files);

		                $.ajax({
		                    url: 'upload.php',
		                    type: 'post',
		                    data: fd,
		                    contentType: false,
		                    processData: false,
		                    success: function(response){
		                        if(response != 0){
		                           alert('file uploaded');
		                        }
		                        else{
		                            alert('file not uploaded');
		                        }
		                    },
		                });
		            });
		        });
		    </script>

		<script type="text/javascript">
        $(document).ready(function(){

            $("#na").keyup(function(){
                var search = $(this).val();

                if(search != ""){

                    $.ajax({
                        url: 'serch/sn.php',
                        type: 'post',
                        data: {search:search, type:1},
                        dataType: 'json',
                        success:function(response){

                            var len = response.length;
                            $("#searchResult").empty();
                            for( var i = 0; i<len; i++){
                                var id = response[i]['id'];
                                var name = response[i]['name'];

                                $("#searchResult").append("<li value='"+id+"'>"+name+"</li>");

                            }

                            // binding click event to li
                            $("#searchResult li").bind("click",function(){
                                setText(this);
                            });


                        }
                    });
                }

            });


        });


        function setText(element){

            var value = $(element).text();
            var userid = $(element).val();

            $("#na").val(value);
            $("#searchResult").empty();

            // Request User Details
            $.ajax({
                url: 'serch/sn.php',
                type: 'post',
                data: {userid:userid, type:2},
                dataType: 'json',
                success: function(response){

                    var len = response.length;
                    $("#userDetail").empty();
                    if(len > 0){
											var id = response[0]['id'];
											var name = response[0]['name'];
											var insta = response[0]['insta'];
											var facebook = response[0]['facebook'];
											var address = response[0]['address'];
											var phone1 = response[0]['phone1'];
											var phone2 = response[0]['phone2'];

                       	document.getElementById('txt_id').value = id;
													document.getElementById('na').value = name;
												document.getElementById('in').value = insta;
												document.getElementById('fa').value = facebook;
												document.getElementById('ad').innerHTML = address ;
												document.getElementById('p1').value = phone1;
												document.getElementById('p2').value = phone2;
                    }
                }

            });
        }

    </script>

		<script type="text/javascript">
				$(document).ready(function(){

						$("#fa").keyup(function(){
								var search = $(this).val();

								if(search != ""){

										$.ajax({
												url: 'serch/sf.php',
												type: 'post',
												data: {search:search, type:1},
												dataType: 'json',
												success:function(response){

														var len = response.length;
														$("#searchResult").empty();
														for( var i = 0; i<len; i++){
																var id = response[i]['id'];
																var facebook = response[i]['facebook'];

																$("#searchResult").append("<li value='"+id+"'>"+facebook+"</li>");

														}

														// binding click event to li
														$("#searchResult li").bind("click",function(){
																setText(this);
														});


												}
										});
								}

						});


				});


				function setText(element){

						var value = $(element).text();
						var userid = $(element).val();

						$("#fa").val(value);
						$("#searchResult").empty();

						// Request User Details
						$.ajax({
								url: 'serch/sf.php',
								type: 'post',
								data: {userid:userid, type:2},
								dataType: 'json',
								success: function(response){

										var len = response.length;
										$("#userDetail").empty();
										if(len > 0){
											var id = response[0]['id'];
											var name = response[0]['name'];
											var insta = response[0]['insta'];
											var facebook = response[0]['facebook'];
											var address = response[0]['address'];
											var phone1 = response[0]['phone1'];
											var phone2 = response[0]['phone2'];

												document.getElementById('txt_id').value = id;
													document.getElementById('na').value = name;
												document.getElementById('in').value = insta;
												document.getElementById('fa').value = facebook;
												document.getElementById('ad').innerHTML = address ;
												document.getElementById('p1').value = phone1;
												document.getElementById('p2').value = phone2;
										}
								}

						});
				}

		</script>
		<script type="text/javascript">
				$(document).ready(function(){

						$("#p1").keyup(function(){
								var search = $(this).val();

								if(search != ""){

										$.ajax({
												url: 'serch/sp1.php',
												type: 'post',
												data: {search:search, type:1},
												dataType: 'json',
												success:function(response){

														var len = response.length;
														$("#searchResult").empty();
														for( var i = 0; i<len; i++){
																var id = response[i]['id'];
																var phone1 = response[i]['phone1'];

																$("#searchResult").append("<li value='"+id+"'>"+phone1+"</li>");

														}

														// binding click event to li
														$("#searchResult li").bind("click",function(){
																setText(this);
														});


												}
										});
								}

						});


				});


				function setText(element){

						var value = $(element).text();
						var userid = $(element).val();

						$("#na").val(value);
						$("#searchResult").empty();

						// Request User Details
						$.ajax({
								url: 'serch/sf.php',
								type: 'post',
								data: {userid:userid, type:2},
								dataType: 'json',
								success: function(response){

										var len = response.length;
										$("#userDetail").empty();
										if(len > 0){
											var id = response[0]['id'];
											var name = response[0]['name'];
											var insta = response[0]['insta'];
											var facebook = response[0]['facebook'];
											var address = response[0]['address'];
											var phone1 = response[0]['phone1'];
											var phone2 = response[0]['phone2'];
											var note = response[0]['note'];
												document.getElementById('txt_id').value = id;
													document.getElementById('na').value = name;
												document.getElementById('in').value = insta;
												document.getElementById('fa').value = facebook;
												document.getElementById('ad').innerHTML = address ;
												document.getElementById('p1').value = phone1;
												document.getElementById('p2').value = phone2;
												document.getElementById('note').value = note;
										}
								}

						});
				}

		</script>
		<script type="text/javascript">
				$(document).ready(function(){

						$("#in").keyup(function(){
								var search = $(this).val();

								if(search != ""){

										$.ajax({
												url: 'serch/sin.php',
												type: 'post',
												data: {search:search, type:1},
												dataType: 'json',
												success:function(response){

														var len = response.length;
														$("#searchResult").empty();
														for( var i = 0; i<len; i++){
																var id = response[i]['id'];
																var insta = response[i]['insta'];

																$("#searchResult").append("<li value='"+id+"'>"+insta+"</li>");

														}

														// binding click event to li
														$("#searchResult li").bind("click",function(){
																setText(this);
														});


												}
										});
								}

						});


				});


				function setText(element){

						var value = $(element).text();
						var userid = $(element).val();

						$("#in").val(value);
						$("#searchResult").empty();

						// Request User Details
						$.ajax({
								url: 'serch/sin.php',
								type: 'post',
								data: {userid:userid, type:2},
								dataType: 'json',
								success: function(response){

										var len = response.length;
										$("#userDetail").empty();
										if(len > 0){
											var id = response[0]['id'];
											var name = response[0]['name'];
											var insta = response[0]['insta'];
											var facebook = response[0]['facebook'];
											var address = response[0]['address'];
											var phone1 = response[0]['phone1'];
											var phone2 = response[0]['phone2'];
											var note = response[0]['note'];

												document.getElementById('txt_id').value = id;
													document.getElementById('na').value = name;
												document.getElementById('in').value = insta;
												document.getElementById('fa').value = facebook;
												document.getElementById('ad').innerHTML = address ;
												document.getElementById('p1').value = phone1;
												document.getElementById('p2').value = phone2;
												document.getElementById('note').value = note;
												document.getElementById('fff').value = id;



										}
								}

						});


				}

		</script>
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

                  <ul class="nav navbar-nav" style="margin-left:-7.8%;">
                      <li class="">
                        <?php if($_SESSION['type'] == 'Data entry'){
                          $sta="hidden";
                        } ?>
                          <a href="index1.php"  <?php echo @$sta; ?> > <i class="menu-icon fa ti-home"></i>Home </a>
                      </li>
                      <li class="active">
                          <a href="order.php"> <i class="menu-icon fa fa-laptop"></i>New Order</a>

                      </li>
                      <li class=" ">
                          <a href="profile.php" > <i class="menu-icon ti-pencil-alt"></i>New Profile</a>
                      </li>
                      <li class=" ">
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

    <!-- Left Panel -->

    <!-- Right Panel -->


    <div id="right-panel" class="right-panel">

      <!-- Header-->
      <header id="header" class="header">

          <div class="header-menu">

              <div class="col-sm-2">
                  <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>

              </div>
							<div class="col-sm-6">



								<div class="input-group col-md-6 mb-2 float-left" style="margin-left:-30%;">
										<div class="input-group-prepend">
												 <a class="nav-link" href=""><i class="fa "></i> send to: </a>
										</div>
										<select name="acc_type"  class="custom-select" style="width:50%;height:100%;border-radius:5px;" id="inputGroupSelect01">
											<?php
													$query = "SELECT * FROM account_tb where `acc_type`='turkey staff'";
													$result = mysqli_query($conn,$query);
													if(mysqli_num_rows($result) > 0)
													{
															while($row = mysqli_fetch_assoc($result))
																	{
																		echo "<option >".$row['username']."</option >";
																	}
																}
																	?>

										</select>
								</div>


							</div>
              <div class="col-sm-4">


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
                        <a class="nav-link" href="logout.php"><i class="fa "></i> Logout</a>

                      <div class="user-menu dropdown-menu">



                      </div>
                  </div>


              </div>
          </div>

      </header><!-- /header -->
      <!-- Header-->

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



																										 }
																								 }


															?>

      <div class="breadcrumbs">

<div style="background-color:transparent;" id="countryList"></div>
      </div>

			<div class="col-md-9" style="">
					<div class="card" style="border-radius:10px;background-color:">

							<div class="card-body" style="">
								<div class="col-sm-2" style="margin-bottom:15px;">

									<button type="button" style="" onclick="chang()" class="btn btn-info btn-circle btn-xl"><i class="glyphicon glyphicon-ok"></i></button>

									<script type="text/javascript">
									function chang() {
										var tel = "<?php echo $convert ?>";
									var input = document.getElementsByName('item_price[]');
									var paid = document.getElementById('paid').value;
									var extra =document.getElementById('extrashipp').value;
										var sendto = document.getElementById('inputGroupSelect01').value;
										var cargoo =0;
									cargoo = document.getElementById('car').value;
									document.getElementById('sendtoo').value=sendto;
									var k = 0;
									 for (var i = 0; i < input.length; i++) {
									    var a = input[i];
									    k += + a.value;
									}

															var item = document.getElementById('itemmm').value;
															var single = "<?php echo $single; ?>";
															var smail = "<?php echo	$small; ?>";
															var medium = "<?php echo	$medium; ?>";
															var large = "<?php echo	$large; ?>";
															var farda = "<?php echo	$farda; ?>";

															var ship=0;
															    while (item>0) {
															        if(item>=30){
															        item=item-30;
															        ship=ship+parseInt(farda,10);
															        continue;

															      }
															      if(item>=12){
															        item=item-12;
															        ship=ship+parseInt(large,10);
															        continue;
															      }
															      if(item>=8){
															        item=item-8;
															        ship=ship+parseInt(medium,10);
															        continue;
															      }
															      if(item>=5){
															        item=item-5;
															        ship=ship+parseInt(smail,10);
															        continue;
															      }
															      if(item>=1){
															        item=item-1;
															        ship=ship+parseInt(single,10);
															        continue;
															      }

															    }

																	document.getElementById('shipp').value=ship;

										cargoo=parseInt(cargoo,10);
										cargoo += k;
											extra=parseInt(extra,10);
											if (extra>0) {
												final_price=cargoo/(tel /100) +extra;
											}
											else {


											final_price=cargoo/(tel /100) +ship;
											}
											final_price=final_price.toFixed(2);
										var te=final_price-paid;



										 document.getElementById('til').value=k;
										document.getElementById('rem').value=te;
									 document.getElementById('totall').value=final_price;


									}
									</script>
								</div>
								<div class="col-sm-4" style="margin-bottom:2%;">
									<h3 style=""> <i class="fa fa-key white"></i> <b>&nbsp; <input name="txt_id" id="txt_id" style="width:83%; ;" type="text" required ></b></h3>
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


<form id="form"  method="post">

			<div class="col-sm-1">


	<input type="text" hidden id="fff" name="costidd" required value="">
	<input type="text" hidden name="dprice" value="<?php echo $convert ?>">
	<input type="text" hidden  id="sendtoo" name="sendto" value="">
				<button type="submit" style="background-color:#d0266d;border-radius:10px;border-style: none;" onclick="chang()" name="save" id="save" class="btn btn-primary"><img width="65%" src="../images/co.png" alt=""> <h2>&nbsp;&nbsp;Confirm&nbsp;</h2></button>

				<input type="hidden" name="save" id="chan" value="save">
		</div>

			<div class="col-sm-1" style="margin-left:2%;">

				<button type="submit" style="background-color:#d0266d;border-radius:10px;border-style: none;" onclick="addTobag()" name="buttt" id="bottun" class="btn btn-primary"><img width="65%" src="../images/ba.png" alt=""><h3>Add To Bag</h3></button>

		</div>


      <div class="content col-sm-9" style="">

				<div class="table-responsive">
				    <table class="table table-bordered" style="text-align:center;" id="crud_table">
				     <tr>
				      <th width="20%">Web Link</th>
				      <th width="25%">Color</th>
				      <th width="20%">Size</th>
				      <th width="10%">Price</th>
							 <th width="10%">img</th>
							 <th width="20%">img</th>
				      <th width="5%">Delete</th>
				     </tr>

				    </table>

				    <div align="" class="col-sm-6" style="">

				     <button type="button" name="add" id="add" style="background-color:#fbfbfb;border-radius:20px;" class="btn btn-block btn-xs"><img src="../images/pl.png" alt=""></button>
				    </div>
						<div align="" class="col-sm-6" style="">

						<button type="button" name="add1" id="add1" style="background-color:#fbfbfb;border-radius:20px;" class="btn btn-block btn-xs"><img src="../images/pl.png" alt=""></button>
					 </div>

    <br />

   </div>










  			<br />
      </div>
			<div class="col-md-3"  style="" >
									<div class="card" style="border-radius:10px;margin-bottom: 0px;margin-bottom:2%;">
											<div class="card-header" style="border-radius:10px;color:black;">

												 <center> <strong class="card-title">Grand Total</strong><br>
												<i class="fa fa-dollar"></i> <input  type="text" style=" border-radius:10px;width:65%;text-align:center; ;margin-top:5px;margin-bottom:10px;" name="totall" id="totall" value="" readonly></input>
												  </center>
											</div>

									</div>
									<div class="card" style="border-radius:10px;margin-bottom: 0px;margin-bottom:2%;">
											<div class="card-header" style="border-top-radius:10px;;color:black;">

												<div class="row form-group">
														<div class="col col-md-5"><label for="text-input" class=" form-control-label">	<i class="fa fa-dollar">&nbsp;Remaining</i></label></div>
														<div class="col-12 col-md-7"><h2><input type="text" style="border-radius:10px;text-align:center;" id="rem" name="remmaing" readonly value="" class="form-control form-control-lg col-sm-6 float-right"></div></h2>
												</div>
												<div class="row form-group">
														<div class="col col-md-5"><label for="text-input" class=" form-control-label"><i  class="fa fa-dollar"> Balance</i></label></div>
														<div class="col-12 col-md-7"><h2><input type="text" style="border-radius:10px;text-align:center;"   name="paidd" id="paid" value="0"  class="form-control form-control-lg col-sm-6 float-right"></div></h2>
												</div>



											</div>


									</div>
									<div class="card" style="border-radius:10px;margin-bottom: 0px;margin-bottom:2%;">
											<div class="card-header" style="border-top-radius:10px;color:black;">
												<div class="row form-group">
														<div class="col col-md-5"><label for="text-input" class=" form-control-label"><i class="fa fa-dollar">&nbsp;ShippingFee</i></label></div>
														<div class="col-12 col-md-7"><h2><input type="text" style="border-radius:10px;text-align:center;" id="shipp" name="shippingfee" value="" readonly class="form-control form-control-lg col-sm-6 float-right"></div></h2>
												</div>

												<div class="row form-group">
														<div class="col col-md-5"><label for="text-input" class=" form-control-label"><i class="fa fa-dollar">&nbsp;CustomFee</i></label></div>
														<div class="col-12 col-md-7"><h2><input type="text" style="border-radius:10px;text-align:center;"  id="extrashipp" name="extrashippingfee" value="0" class="form-control form-control-lg col-sm-6 float-right"></div></h2>
												</div>

												<div class="row form-group">
														<div class="col col-md-5"><label for="text-input" class=" form-control-label"><i class="fa fa-">&nbsp;Quantity</i></label></div>
														<div class="col-12 col-md-7"><h2><input type="text" style="border-radius:10px;text-align:center;"  id="itemmm" name="itemmm" value="" readonly value="" class="form-control form-control-lg col-sm-6 float-right"></div></h2>
												</div>


											</div>


									</div>
									<div class="card" style="">
											<div class="card-header" style="border-top-radius:10px;;color:black;">

												<div class="row form-group">
														<div class="col col-md-5"><label for="text-input" class=" form-control-label"><i class="fa fa-">&nbsp;CargoFee</i></label></div>
														<div class="col-12 col-md-7"><h2><input type="text" style="border-radius:10px;text-align:center;"  name="cargofee" id="car" value="0" class="form-control form-control-lg col-sm-6 float-right"></div></h2>
												</div>
												<div class="row form-group">
														<div class="col col-md-5"><label for="text-input" class=" form-control-label"><i style="margin-top:10px;" class="fa fa-try"> Total</i></label></div>
														<div class="col-12 col-md-7"><h2><input type="text" style="border-radius:10px;text-align:center;"  id="til" name="totaltil" value="" readonly value="" class="form-control form-control-lg col-sm-6 float-right"></div></h2>
												</div>


		</form>
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




					<script>


	 function readURL(input,x) {
if (input.files && input.files[0]) {
		var reader = new FileReader();
		var pec = "#blah";
			pec +=x;
		reader.onload = function (e) {
				$(pec)
						.attr('src', e.target.result);
		};

		reader.readAsDataURL(input.files[0]);
}
}
					$(document).ready(function(){
					 var count = 0;
					 var price =0;
					 var item=0;
							var itt=count;
							var dic=0;
							var html_code;
					 $('#add').click(function(){
						 for (var i = 0; i <5 ; i++) {
                                var html_code;
						 count = count + 1;
 					   html_code += "<tr id='row"+count+"'>";
 					   html_code += "<td width='23%' style='border-radius:5px;' class='web_link'><input style='border-radius:5px;width:100%' required name='weblink[]' type='text'/></td>";
 					   html_code += "<td  ><input style='width:100%;border-radius:5px;' name='color[]' required  type='text'/></td>";
 					   html_code += "<td  width='10%'><input style='width:100%;border-radius:5px;' required  name='size[]' type='text'/></td>";
 					   html_code += "<td  width='15%' ><input style='width:100%;border-radius:5px;' required  name='item_price[]' type='number'/></td>";
						 html_code += "<td  ><input style='width:105px;border-radius:5px;'class='img' required accept='image/*' name='file[]'  type='file'  onchange='readURL(this,"+count+");' /></td>";
						 html_code += "<td  ><img id='blah"+count+"' style='border-radius:5px;'  src='http://placehold.it/180' alt='your image' /></td>";
 					   html_code += "<td><button type='button' style='border-radius:5px;'  name='remove' data-row='row"+count+"' class='btn btn-danger btn-xs remove'><i class='fa fa-trash white'></i></button></td>";
 					   html_code += "</tr>" ;
						 	 }
						 itt=count-dic;
						 document.getElementById('itemmm').value=itt;

						 					 var input = document.getElementsByName('item_price[]');
						 					  var k = 0;
						 					  for (var i = 0; i < input.length; i++) {
						 					     var a = input[i];
						 					     k += + a.value;
						 					 }
						 					  document.getElementById('totall').value=k;
						 $('#crud_table').append(html_code);

					 });


					 $('#add1').click(function(){
					   count = count + 1;
					  var html_code = "<tr id='row"+count+"'>";
					   html_code += "<td width='23%' style='border-radius:5px;' class='web_link'><input name='weblink[]' style='border-radius:5px;width:100%' required type='text'/></td>";
					   html_code += "<td  ><input style='width:100%;border-radius:5px;'  name='color[]'  type='text'/></td>";
					   html_code += "<td  width='10%'><input style='width:100%;border-radius:5px;'  name='size[]' type='text'/></td>";
					   html_code += "<td  width='15%' ><input style='width:100%;border-radius:5px;' required  name='item_price[]' type='number'/></td>";
					   html_code += "<td  ><input style='width:105px;border-radius:5px;'class='img' required name='file[]'  type='file' accept='image/*' onchange='readURL(this,"+count+");' /></td>";
					   html_code += "<td ><img id='blah"+count+"'  src='http://placehold.it/180' style='border-radius:5px;' alt='your image' /></td>";
					   html_code += "<td><button type='button' style='border-radius:5px;'  name='remove' data-row='row"+count+"' class='btn btn-danger btn-xs remove'><i class='fa fa-trash white'></i></button></td>";
					   html_code += "</tr>" ;
					   itt=count-dic;
					   document.getElementById('itemmm').value=itt;

					             var input = document.getElementsByName('item_price[]');
					              var k = 0;
					              for (var i = 0; i < input.length; i++) {
					                 var a = input[i];
					                 k += + a.value;
					             }
					              document.getElementById('totall').value=k;
					   $('#crud_table').append(html_code);

					 });








					 $(document).on('click', '.remove', function(){
					  var delete_row = $(this).data("row");
					  $('#' + delete_row).remove();
						dic=dic+1;
						itt=count-dic;

						document.getElementById('itemmm').value=itt;
					 });

					 $('#form').on('submit',function(e){
						 e.preventDefault()




					  $.ajax({
					   url:"insert.php",
					   method:"POST",
						 contentType: false,
                         cache: false,
                         processData: false,

					   data:new FormData(this),
					   success:function(data){


							location.reload(true);
					    $("td[contentEditable='true']").text("");
					    for(var i=2; i<= count; i++)
					    {
					     $('tr#'+i+'').remove();
					    }

					   }
					  });
					 });

						 $(document).on('click', '.buttt', function(){

					 $('#form').on('submit',function(e){
						 e.preventDefault()
						$.ajax({
						 url:"insertbag.php",
						 method:"POST",
						 contentType: false,
												 cache: false,
												 processData: false,

						 data:new FormData(this),
						 success:function(data){


							location.reload(true);
							$("td[contentEditable='true']").text("");
							for(var i=2; i<= count; i++)
							{
							 $('tr#'+i+'').remove();
							}

						 }
						});
					 });



	 });


					});
					</script>



	<script>
		function addTobag() {
	document.getElementById('chan').value="bag";
			chang();


		}
	</script>

</body>

</html>
