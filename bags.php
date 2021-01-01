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
                  <li class="">
                      <hr style="margin-top:0%;margin-bottom:2%;">
                      <a href="custmar.php"> <i class="menu-icon  ti-shopping-cart-full"></i><bp style="color:#ffffff;">Active Orders</a>
                        <hr style="margin-top:0%;margin-bottom:2%;">
                  </li>

                  <li class="">
                      <a href="order.php"> <i class="menu-icon ti-plus"></i><bp style="color:#ffffff;">New Order</bp> </a>
                        <hr style="margin-top:0%;margin-bottom:2%;">
                  </li>
                   <li class="active">
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



          <div class="content mt-3">
  
  
  
  
  
            <div class="table-responsive" style="zoom:76%">
              <?php
  
                $i=$_SESSION['id'];
             	$query = "SELECT * FROM ord  where  !(  `conf` IS NULL OR `conf`='') AND costid=$i group BY ord.bagid DESC ";
						$result = mysqli_query($conn,$query);
          
              ?>
                          <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead class="table-dark" style="background-color:#b03060;">
                                <tr>
  
  
                                  <th width="10%">Bag</th>
                                  <th width="6%">IQ</th>
                                  <th width="10%">Price</th>
                                  <th width="5%">Purchase</th>
                                  <th width="6%">Status</th>
                                  <th width="8%">Show</th>
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
  
                                    <td><?php $bidf=$row['bagid']; echo $bidf;?></td>
                                    <td><?php echo $row['iq'];?></td>
                                    <td><?php echo $row['total'];?>$</td>
                                    <td ><?php echo $row['conf'];?></td>
                                    <td><?php
                                    $query1 = "SELECT * FROM ord where bagid=$bidf ";
                                    $result1 = mysqli_query($conn,$query1);
                                    $numitem=0;
                                    if(mysqli_num_rows($result1) > 0)
                                    {
                                        while($row1 = mysqli_fetch_assoc($result1))
                                            {$numitem=$numitem+1;}
                                            }
                                    $query2 = "SELECT * FROM ord where bagid=$bidf AND (  `canceled` IS NULL or `canceled`='') AND (  `takeit` IS NULL or `takeit`='') ";
                                    $result2 = mysqli_query($conn,$query2);
                                    $numitem1=0;
                                    if(mysqli_num_rows($result2) > 0)
                                    {
                                        while($row2 = mysqli_fetch_assoc($result2))
                                            {$numitem1=$numitem1+1;}
                                            if ($numitem1==$numitem) {
                                            echo "Pending";
                                            }
                                            else {
                                              echo "Active";
                                            }
                                             }
  
                                            else {
                                              echo "Completed";
                                            }
  
  
  
                                    ?></td>
  
                                                                      <td>
                                                                          <center>
  
  
  
                                                                            <form action="bagshow.php" method="POST" class="float-left" style="margin-right:5px;margin-bottom:11%;" enctype="multipart/form-data">
                                                                            <input type="hidden" name="nid" value="<?php echo $row['bagid'];?>">
                                                                              <button style="border-radius:10px;" type="submit" name="updatebtn" class="btn btn-info textfont"><i class="ti-shopping-cart-full"></i></button>
  
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

      <script src="vendors/jquery/dist/jquery.min.js"></script>
      <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
      <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
      <script src="assets/js/main.js"></script>


      <script src="vendors/chart.js/dist/Chart.bundle.min.js"></script>




    </body>

    </html>
