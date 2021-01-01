<?php
include('includes/connect.php');
  include('includes/cust-session.php');
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

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">
    <style>
    @font-face {
       font-family: OpenSans;
       src: url(includes/OpenSans-Regular.ttf);
    }

    * {
       font-family: OpenSans;
    }
    </style>
    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="vendors/jqvmap/dist/jqvmap.min.css">


    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    


</head>

<body>

    <script>
    $(document).ready(function(){
        $("#del").modal('show');
    });
</script>
  

        <!-- Left Panel -->

        <!-- Right Panel -->

        <div id="right-panel" class="right-panel">

          <!-- Header-->
          <header id="header" class="header" style="border:none;background-color:#f1f2f7;" >

              <div class="header-menu">

                  <div class="col-sm-7">
                      <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>

                  </div>


              </div>

          </header><!-- /header -->
          <!-- Header-->

          <div class="content mt-3" style="margin-top:-5%;">
          
            <div class="modal fade" id="del" style="margin-top:15%;"  tabindex="1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            	<div class="modal-dialog modal-lg-8" role="document">
            		<div class="modal-content">
            			<div class="modal-header">
            				<h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete this Order in Your Bag?</h5>
            				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
            					<span aria-hidden="true">&times;</span>
            				</button>
            			</div>
            		 
            
            			<div class="modal-footer">
            				<div class="modal-footer">
            				 <a href="#" class="btn btn-white" data-dismiss="modal">No</a>
            					<a href="insert.php?id=<?php echo $row['oid']; ?>"><button name="deletebtn" type="submit" class="btn btn-danger">Yes</button></a>
            			 </div>
            			</div>
            	
            
            		</div>
            	</div>
            </div>



          </div> <!-- .content -->
      </div><!-- /#right-panel -->

      <!-- Right Panel -->

      <script src="vendors/jquery/dist/jquery.min.js"></script>
      <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
      <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
      <script src="assets/js/main.js"></script>


      <script src="vendors/chart.js/dist/Chart.bundle.min.js"></script>




    </body>

    </html>
