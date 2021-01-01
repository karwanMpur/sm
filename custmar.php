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


  <aside id="left-panel" class="left-panel" style="background-color:#b03060;">
      <nav class="navbar navbar-expand-sm navbar-default" style="background-color: #b03060">

          <div class="navbar-header" style="" >
              <button class="navbar-toggler" style="" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                  <i style="color:white;" class="fa fa-bars"></i>
              </button>
              <a class="navbar-brand" href="./"><img src="images/logo1.png" alt="Logo"></a>
              <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
          </div>

          <div id="main-menu" class="main-menu collapse navbar-collapse">
              <ul class="nav navbar-nav">
                  <li class="active">
                      <hr style="margin-top:0%;margin-bottom:2%;">
                      <a href="custmar.php"> <i class="menu-icon  ti-shopping-cart-full"></i><bp style="color:#ffffff;">Active Orders</a>
                        <hr style="margin-top:0%;margin-bottom:2%;">
                  </li>

                  <li class="">
                      <a href="order.php"> <i class="menu-icon ti-plus"></i><bp style="color:#ffffff;">New Order</bp> </a>
                        <hr style="margin-top:0%;margin-bottom:2%;">
                  </li>
                   <li class="">
                      <a href="bags.php"> <i class="menu-icon ti-bag"></i><bp style="color:#ffffff;">My Bags</bp> </a>
                        <hr style="margin-top:0%;margin-bottom:2%;">
                  </li>
                  <li class="">
                      <a  href="logout.php"> <i class="menu-icon fa fa fa-power-off"></i><bp style="color:#ffffff;">Logout</bp> </a>
                        <hr style="margin-top:0%;margin-bottom:2%;">
                  </li>
                  <li class="">
                        <a  href="custmark.php"> <i class="menu-icon fa fa fa-comments"></i><bp style="color:#ffffff;">Kurdish </bp> </a>
                        <hr style="margin-top:0%;margin-bottom:2%;">
                  </li>
                  <li class="active">
                    <img src="images/custmar.png" alt="">
                    <img src="images/bag.png" alt="">
                  </li>



              </ul>
          </div><!-- /.navbar-collapse -->
      </nav>
  </aside><!-- /#left-panel -->

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
            <?php
                $i=$_SESSION['id'];
                $query = "SELECT * FROM ord WHERE costid=$i and`takeit` IS NULL AND !(`b` IS NULL) ORDER BY oid desc ";
                $result = mysqli_query($conn,$query);
                if(mysqli_num_rows($result) > 0)
                {
                    while($row = mysqli_fetch_assoc($result))
                        { $place="";
                          if($row['img']){
                            $im=$row['img'];
                          }
                          else{
                            $im="adh.jpg";
                          }
                              if($row['canceled']) {
                                  $place="canceled";
                                  
                              }
                              
                          else
                          {
                              if($row['conf']){
                            if($row['conf-tu']){
                              if($row['arrive']){
                                  $place="Arrived To Erbil  : ".$row['arrive'];

                              }
                              else {
                              $place="On the way: ".$row['conf-tu'];
                              }

                            }
                            else {
                            $place="Purchased Date : ".$row['conf'];
                            }

                          }
                          else {
                            $place="In review";

                          }
                          }

            ?>
            <div class="col-md-4">
                <div class="card">

                    <div class="card-body">




                        <div class="mx-auto d-block">
                            <img class="rounded mx-auto float-right" width="160" height="190" src="<?php echo "image/".$im;?> " alt="">
                          <button class="btn btn-sm" style="border-radius:5px;background-color:#b03060;color: white;">  <a style="color: white;" target="_blank" href="<?php echo $row['link'];?>"><i class="fa ti-clip pr-1"></i>link</a> </button>

                        </div>
                        <hr>

                        <div class="card-header text-sm-left" style="width:50%;border-radius:15px;height:35px;padding-top: 5px;">
                          <strong > ID: <?php echo $row['oid'];?>  </strong>

                        </div>
                        <div class="card-header text-sm-left" style="width:50%;border-radius:15px;height:35px;padding-top: 5px;">
                          <strong> <?php echo $row['color'];?>  </strong>

                        </div>
                        <div class="card-header text-sm-left" style="width:50%;border-radius:15px;height:35px;padding-top: 5px;">
                          <strong> <?php echo $row['size'];?>  </strong>

                        </div>

                        <div class="card-header" style="margin-top:10%;border-radius:15px;height:35px;padding-top: 5px;">
                          <h6 class="text-md-left mt-1 mb-1" style=""><strong style="margin-bottom:5px;"><?php echo $place;?></strong></h6>
                        </div>

                    </div >


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
