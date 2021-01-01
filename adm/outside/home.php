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
    <meta name="description" content="Smaily Bag">
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
    <link rel="stylesheet" href="../../vendors/jqvmap/dist/jqvmap.min.css">


    <link rel="stylesheet" href="../../assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>
<style>
.zoom {

transition: transform .2s; /* Animation */

margin: 0 auto;
}

.zoom:hover {
transform: scale(1.3); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
}
</style>

<body>


    <!-- Left Panel -->

     <aside id="left-panel" class="left-panel" style="background-color:#b03060;">
        <nav class="navbar navbar-expand-sm navbar-default" style="background-color: #b03060;">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i style="color:white;" class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href=".../../"><img src="../../images/logo1.png" alt="Logo"></a>

            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">

               <ul class="nav navbar-nav">
                 <li class="active">
                    <a href="home.php"> <i class="menu-icon  ti-filter"></i>home</a>
                    <hr style="margin-top:-2%;margin-bottom:2%;">
                      </li>
           <li class="">
               <a href="turkya-staff.php"> <i class="menu-icon  ti-home"></i>Ürünler</a>
                 <hr style="margin-top:-2%;margin-bottom:2%;">
           </li>
           <li class="">
               <a href="turkya-staffbag.php"> <i class="menu-icon  ti-briefcase"></i>Çantalar</a>
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

    <div id="right-panel" class="right-panel">

      <!-- Header-->
      <header id="header" class="header">

          <div class="header-menu">

              <div class="col-sm-1">
                  <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>

              </div>



                <div class="col-sm-2">



                </div>



              <div class="col-sm-9">
                  <div class="user-area dropdown float-right">
                        <a class="nav-link" href="logout.php"><i class="fa fa-power-off"></i> Logout</a>

                      <div class="user-menu dropdown-menu">



                      </div>
                  </div>


              </div>
          </div>

      </header><!-- /header -->
      <!-- Header-->

      <div class="breadcrumbs">


      </div>

      <div class="content mt-3">
        <?php
            $i=$_SESSION['username'];



            if(isset($_POST['filterB'])){

            	$from=$_POST['from'];
            	$to=$_POST['to'];






            	$query = "SELECT * FROM ord   where `confturdate`>='$from' AND `confturdate`<='$to' group BY bagid ";
            		 $result = mysqli_query($conn,$query);




            if(mysqli_num_rows($result) > 0)
            {

            	$iqtot=0;

            	$iq=0;
            		while($row = mysqli_fetch_assoc($result))
            				{

            					$iqtot+=$row['iq'];


            					$iq=$iq+1;


            				}
            }
            			}
            ?>
            <?php include("report.php"); ?>
            <div class="card col-md-12 mb-12">

                <div class="card-header"><center><b>Total Of All</b></center></div>
                <div class="card-body card-block">
                        <div class="form-group">
                          <div class="row form-group">
                              <div class="col col-md-7"><label for="text-input" class=" form-control-label"><b>Item Quantity</b></label></div>
                              <div class="col-12 col-md-5"><input type="text"  name="" value="<?php echo @$iqtot; ?>" placeholder="Text" class="form-control"></div>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="row form-group">
                              <div class="col col-md-7"><label for="text-input" class=" form-control-label"><b>Bag Quantity</b></label></div>
                              <div class="col-12 col-md-5"><input type="text"  name="" value="<?php echo @$iq; ?>" placeholder="Text" class="form-control"></div>
                          </div>
                        </div>


                </div>
            </div>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="book-show/js/jquery-1.9.1.min.js"><\/script>')</script>
        <script src="js/bootstrap.min.js"></script>

				<style>
				.pagination {
					display: inline-block;
				}

				.pagination a {
					color: black;
					float: left;
					padding: 8px 16px;
					text-decoration: none;
					border: 1px solid #ddd;
				}

				.pagination a.active {
					background-color: rgb(86,198,198);
					color: white;
					border: 1px solid rgb(86,198,198);
				}

				.pagination a:hover:not(.active) {background-color: #ddd;}

				.pagination a:first-child {
					border-top-left-radius: 5px;
					border-bottom-left-radius: 5px;
				}

				.pagination a:last-child {
					border-top-right-radius: 5px;
					border-bottom-right-radius: 5px;
				}
				</style>

      </div> <!-- .content -->
      <center>


      </center>
  </div><!-- /#right-panel -->

  <!-- Right Panel -->

  <script src="../../vendors/jquery/dist/jquery.min.js"></script>
  <script src="../../vendors/popper.js/dist/umd/popper.min.js"></script>
  <script src="../../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="../../assets/js/main.js"></script>



</body>

</html>
