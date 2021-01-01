<?php
include('includes/connect.php');
  include('includes/cust-session.php');
?>



<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Smiley Bag</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
    @font-face {
       font-family: OpenSans;
       src: url(includes/OpenSans-Regular.ttf);
    }

    * {
       font-family: OpenSans;
    }
    </style>

  <!-- ajax links-->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="vendors/jqvmap/dist/jqvmap.min.css">


    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>
<style >
input {
			border:none;

		}
</style>
<body>


    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel" style="background-color:#b03060;">
         <nav class="navbar navbar-expand-sm navbar-default" style="background-color: #b03060;">

             <div class="navbar-header" >
                 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                     <i style="color:white;" class="fa fa-bars"></i>
                 </button>
                 <a class="navbar-brand" href="./"><img src="images/logo1.png" alt="Logo"></a>
                 <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
             </div>

             <div id="main-menu" class="main-menu collapse navbar-collapse">
               <ul class="nav navbar-nav">
      <li class="">
          <hr style="margin-top:0%;margin-bottom:2%;">
          <a href="custmark.php"> <i class="menu-icon  ti-shopping-cart-full"></i><bp style="color:#ffffff;">Dawakarya Chalakakan  </bp></a>
            <hr style="margin-top:0%;margin-bottom:2%;">
      </li>

      <li class="active">
          <a href="orderk.php"> <i class="menu-icon ti-plus"></i><bp style="color:#ffffff;"> Dawakary Nwe </bp> </a>
            <hr style="margin-top:0%;margin-bottom:2%;">
      </li>
       <li class="">
                      <a href="bags.php"> <i class="menu-icon ti-bag"></i><bp style="color:#ffffff;">jantakanm</bp> </a>
                        <hr style="margin-top:0%;margin-bottom:2%;">
                  </li>

      <li class="">
          <a  href="logout.php"> <i class="menu-icon fa fa fa-power-off"></i><bp style="color:#ffffff;">  Daxstn </bp> </a>
            <hr style="margin-top:0%;margin-bottom:2%;">
      </li>
      <li class="">
            <a  href="custmar.php"> <i class="menu-icon fa fa fa-comments"></i><bp style="color:#ffffff;">English  </bp> </a>
            <hr style="margin-top:0%;margin-bottom:2%;">
      </li>
      <li class="active">
        <img src="images/custmar1.png" alt="">
        <img src="images/bag.png" alt="">
      </li>



  </ul>
             </div><!-- /.navbar-collapse -->
         </nav>
     </aside><!-- /#left-panel -->


    <!-- Right Panel -->


    <div id="right-panel" class="right-panel" >

      <!-- Header-->
      <header id="header" class="header" style=" background-color:#f1f2f7;">

          <div class="header-menu">

              <div class="col-sm-2">
                  <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>

              </div>
							<div class="col-sm-6">





							</div>
              <div class="col-sm-4">







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


                                                    $i=$_SESSION['id'];
                                                 $query1 = "SELECT * FROM ord where (`b` IS NULL) AND costid=$i";
                                                 $result1 = mysqli_query($conn,$query1);
                                                 if(mysqli_num_rows($result1) > 0)
                                                 {  $item=0;
                                                   $totall_price=0;
                                                     while($row1 = mysqli_fetch_assoc($result1))
                                                         {		$totall_price+=$row1['price'];
                                                            $item+=1;




                                                                    }
                                                                }


															?>
                              <?php




                               ?>


															<div class="content mt-4" style="margin-top:10%;">

														        <div class="col-5">
														          <button type="button" style="border-radius:10px;background-color:#00BFFF;border-style: none;" onclick="chang()" class="btn btn-success btn btn-xl "><small>Nrxy xamlenraw $</small></button>

																	  </div>
														        <div class="col-3" >
														          <center> <input style="text-align:center;border:none;margin-top:5px;border-radius:10px;margin-left:10%;" type="text" name="totall" class="col-10" readonly  id="totall" value=""> </center>
														          </div>




									<script type="text/javascript">
									function chang() {

										          var tel = "<?php echo $convert ?>";
															var single = "<?php echo $single; ?>";
															var smail = "<?php echo	$small; ?>";
															var medium = "<?php echo	$medium; ?>";
															var large = "<?php echo	$large; ?>";
															var farda = "<?php echo	$farda; ?>";
                              var item="<?php echo $item ?>";
                              var totall_price="<?php echo $totall_price; ?>"
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








											final_price=totall_price/(tel /100) +ship;

											final_price=final_price.toFixed(1);
										var te=final_price;
									 document.getElementById('totall').value=final_price;




									}
									</script>





			<div class="col-4" style="float:right;">

        <form class="" action="insert.php" method="post">

				<button type="submit" style="background-color:#b03060;border-radius:10px;border-style: none;"  onclick="changg()" name="save" id="save" class="btn float-right btn-primary"> Nardn</button>

        </form>
		</div>



    <div class="modal fade " id="del"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg-8" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Zyadkrdny dawakary bo Sabata</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
         <form action="in.php" method="POST">

         <div class="card-body card-block">

                 <div class="form-group">
                     <div class="input-group">
                         <div  class="input-group-addon col-2">Link</div>
                         <input type="text" id="weblink" name="weblink" required value="" class="form-control ">

                     </div>
                 </div>
                 <div class="form-group">
                     <div class="input-group">
                         <div class="input-group-addon col-2">Rang</div>
                         <input type="text" id="color" value="" name="color" class="form-control">

                     </div>
                 </div>
                 <div class="form-group">
                     <div class="input-group">
                         <div class="input-group-addon col-2">Qabara </div>
                         <input type="text" id="size" value="" name="size" class="form-control">

                     </div>
                 </div>
                 <div class="form-group">
                     <div class="input-group">
                         <div class="input-group-addon col-2">Nrx</div>
                         <input type="number" id="item_price" value="" required name="item_price" class="form-control">

                     </div>
                 </div>
                 <div class="form-group">
                     <div class="input-group">
                         <div class="input-group-addon col-2">Tebiny</div>
                         <input type="text" id="note" value=""  name="note" class="form-control">

                     </div>
                 </div>
                 <div class="form-group">
                     <div class="input-group">
                         <div class="input-group-addon col-2">Wena</div>





                         <input type="file" name="upload_image" id="upload_image"  required accept="image/*" class="form-control" />

                         <br>

     </div>
     <br>

     <center><div style="width:20%;hight:38%;" hidden id="uploaded_image"></div> </center>
                 </div>


         </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary textfont" style="border-radius:5px;" data-dismiss="modal">Pashgazbunawa</button>
            <button type="submit" name="updatebtnk" hidden  style="border-radius:5px;" id="suv"  class="btn btn-info textfont">Savehiden</button>
            <button type="button" name="up"  style="border-radius:5px;" onclick="crop()" class="btn btn-info textfont">Pashakawtkrdn</button>
          </div>
        </form>

        </div>
      </div>
    </div>


      <div class="content col-sm-12" style="margin-top:15px;">

				<div class="">




          <?php
              $i=$_SESSION['id'];
              $query = "SELECT * FROM ord WHERE costid=$i and (`b` IS NULL) ORDER BY oid ";
              $result = mysqli_query($conn,$query);




          ?>

                 <?php
                 if(mysqli_num_rows($result) > 0)
                 {
                       while($row = mysqli_fetch_assoc($result))
                        {


                 ?>

                 <div class="col-md-4">
                     <div class="card">
                         <div class="card-body">

                             <div class="mx-auto d-block">
                                 <img class="rounded mx-auto float-right" width="160" height="190" src="<?php echo "image/".$row['img'];?> " alt="">
                               <button class="btn btn-sm" style="border-radius:5px;background-color:#b03060;color: white;">  <a style="color: white;" target="_blank" href="<?php echo $row['link'];?>"><i class="fa ti-clip pr-1"></i>link</a> </button>
                             </div>
                             <hr>
                             <div class="card-header text-sm-left" style="width:50%;border-radius:15px;height:35px;padding-top: 5px;">
                               <strong > Nrx: <?php echo intval($row['price']);?>  </strong>
                             </div>
                             <div class="card-header text-sm-left" style="width:50%;border-radius:15px;height:35px;padding-top: 5px;">
                               <strong> <?php echo $row['color'];?>  </strong>
                             </div>
                             <div class="card-header text-sm-left" style="width:50%;border-radius:15px;height:35px;padding-top: 5px;">
                               <strong> <?php echo $row['size'];?>  </strong>
                             </div>
                             <div class="" style="margin-top:10%;border-radius:15px;height:35px;padding-top: 5px;">
                               <strong style="margin-top:5px;"><center><a class="btn btn-danger" style="border-radius:10px;"   href="#del<?php echo $row['oid'];?>" data-toggle="modal"><i class="white">Srinawa</i></a></center></strong>
                             </div>
                         </div >
                   </div>
                 </div>


                          <div id="del<?php echo $row['oid']; ?>"  class="modal fade" style="" id="smallmodal" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
                                          <div class="modal-dialog modal-sm" role="document">
                                              <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Dlnay la srinaway am dawakarya?</h5>
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span>
                                                      </button>
                                                  </div>

                                                  <div class="modal-footer">
                                                    <a href="#" class="btn btn-white" data-dismiss="modal">Baxer</a>
                                                     <a href="insert.php?id=<?php echo $row['oid']; ?>"><button name="deletebtn" type="submit" class="btn btn-danger">Bale</button></a>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>


                 <?php

                 }

                     }

                 ?>

     <div align="center" class="col-12">
					<input type="text" style="border-radius:10px;text-align:center;"  id="itemmm" name="itemmm"  readonly value="<?php echo @$item; ?>" class="form-control form-control-sm col-2 float-right">



            <button type="button" style="border-radius:10px;" name="add1" href="#del" data-toggle="modal" id="add1" class="btn btn-success btn-xs">Dawakary Nwe</button>

  				</div>

    <br />

   </div>










  			<br />
      </div>
			<div class="col-md-3"  style="" >




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
  		    <script src="vendors/jquery/dist/jquery.min.js"></script>
  		    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
  		    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
  		    <script src="assets/js/main.js"></script>


          <script src="jquery.min.js"></script>
          <script src="bootstrap.min.js"></script>
          <script src="croppie.js"></script>

          <link rel="stylesheet" href="croppie.css" />



  		    <script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
  		    <script src="vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
  		    <script src="vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
  		    <script src="vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
  		    <script src="vendors/jszip/dist/jszip.min.js"></script>
  		    <script src="vendors/pdfmake/build/pdfmake.min.js"></script>
  		    <script src="vendors/pdfmake/build/vfs_fonts.js"></script>
  		    <script src="vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
  		    <script src="vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
  		    <script src="vendors/datatables.net-buttons/js/buttons.colVis.min.js"></script>
  		    <script src="assets/js/init-scripts/data-table/datatables-init.js"></script>
	<script>

		function changg() {

			chang();


		}
	</script>




</body>

</html>
<div id="uploadimageModal" class="modal" style="zoom:88%;margin:5000px;" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

            <div class="modal-body">

            <div class="row">
            <div class="col-md-8 offset-md-2">
              <div id="image_demo" style="width:300px; margin-top:30px"></div>
            </div>

        </div>

          </div>
          <div class="modal-footer">
              <button class="btn btn-success crop_image"  id="myCheck"  >Crop & Upload Image</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
      </div>
    </div>
</div>
<script>
function crop() {
  document.getElementById("myCheck").click();

}

</script>
<script>
$(document).ready(function(){

  $image_crop = $('#image_demo').croppie({
    enableExif: true,
    viewport: {
      width:210,
      height:400,
      type:'square' //circle
    },
    boundary:{
      width:210,
      height:400
    }
  });
document.getElementById("myCheck").click();
  $('#upload_image').on('change', function(){
    var reader = new FileReader();
    reader.onload = function (event) {
      $image_crop.croppie('bind', {
        url: event.target.result
      }).then(function(){
        console.log('jQuery bind complete');
      });
    }
    reader.readAsDataURL(this.files[0]);
    $('#uploadimageModal').modal('show');

  });

  $('.crop_image').click(function(event){
    $image_crop.croppie('result', {
      type: 'canvas',
      size: 'viewport'
    }).then(function(response){
      $.ajax({
        url:"upload.php",
        type: "POST",
        data:{"image": response},
        success:function(data)
        {
          $('#uploadimageModal').modal('hide');
          $('#uploaded_image').html(data);
            document.getElementById("suv").click();
        }
      });
    })
  });

});
</script>
