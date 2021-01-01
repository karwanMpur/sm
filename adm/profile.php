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

    <link rel="stylesheet" href="../vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../vendors/jqvmap/dist/jqvmap.min.css">


    <link rel="stylesheet" href="../assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body>
  <style>
  @font-face {
     font-family: OpenSans;
     src: url(../includes/OpenSans-Regular.ttf);
  }

  * {
     font-family: OpenSans;
  }
  </style>

    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel" style="background-color:#b03060;">
        <nav class="navbar navbar-expand-sm navbar-default" style="background-color: #b03060;">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i style="color:white;" class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"><img src="../images/logo1.png" alt="Logo"></a>

            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="">
                      <?php if($_SESSION['type'] == 'Data entry'){
                        $sta="hidden";
                      } ?>
                        <a href="index1.php" <?php echo @$sta; ?>> <i class="menu-icon fa ti-home"></i>Home </a>
                    </li>
                    <li class="menu-item">
                        <a href="order.php" > <i class="menu-icon fa fa-laptop"></i>New Order</a>

                    </li>
                    <li class="active">
                        <a href="profile.php" > <i class="menu-icon ti-pencil-alt"></i>New Profile</a>
                    </li>
                    <li class=" ">
                        <a href="mybag.php" > <i class="menu-icon fa ti-shopping-cart-full"></i>My Bag</a>
                    </li>

                    <li class=" ">
                        <a href="Profiles.php" <?php echo @$sta; ?>> <i class="menu-icon fa ti-user"></i>Profiles</a>
                    </li>

                    <li class=" ">
                        <a href="activeorder.php" > <i class="menu-icon fa ti-clipboard"></i>Active Orders</a>
                    </li>
                    <li class="menu-item ">
                       <a href="arrived.php" > <i class="menu-icon fa ti-clipboard"></i>Arrived Orders</a>
                   </li>
                    <li class=" ">
                        <a href="orderlist.php" <?php echo @$sta; ?> > <i class="menu-icon fa ti-timer"></i>Order History</a>

                    </li>
                    <li class="">
                        <a href="cancele.php" > <i class="menu-icon ti-filter"></i>Cancelled Order</a>

                    </li>
                       <li class="">
                          <a href="invoicelist.php" > <i class="menu-icon fa ti-clipboard"></i>Active Invoice</a>

                      </li>
                      <li class="">
                          <a href="comp.php" <?php echo @$sta; ?>> <i class="menu-icon fa ti-timer"></i>Complete Invoice</a>

                      </li>
                    <li class=" ">
                        <a href="account.php" <?php echo @$sta; ?>> <i class="menu-icon fa ti-id-badge"></i>Page Roles</a>

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


              </div>

              <div class="content mt-3">

                <div class="col-md-7  " style="margin-left:20%;margin-top:-4%;">
                    <aside class="profile-nav alt">
                        <section class="card">
                            <div class="card-header user-header alt bg-dar" style="background-color:#b03060;">
                                <div class="media">
                                    <a href="#">
                                        <img class="align-self-center rounded-circle mr-3" style="width:65px; height:65px;" alt="" src="../images/prof.png">
                                    </a>
                          
                                </div>
                                <?php
                              
                         $query = "SELECT max(id) AS SmallestPrice FROM cust;";
                          $result = mysqli_query($conn,$query);
                            if(mysqli_num_rows($result) > 0)
                              {
                                  while($row = mysqli_fetch_assoc($result))
                    {
                                $maximum = $row['SmallestPrice'];

                    }}
                                ?>
                                 <center> <h1 style="color:white;"><?php  echo $maximum+1;?></h1> </center>
                            </div>

                            <div class="card-body card-block">
                                <form action="action.php" method="POST" enctype="multipart/form-data" class="">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">Full Name&nbsp;&nbsp;</div>
                                            <input type="text" id="username3" name="name" class="form-control">

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">Instagram&nbsp;&nbsp;</div>
                                            <input type="text" id="email3" name="insta" class="form-control">

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">&nbsp;Facebook&nbsp;&nbsp;</div>
                                            <input type="text" id="username3" name="facebook" class="form-control">

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;City&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                                            <input type="text" id="email3" name="city" class="form-control">

                                        </div>
                                    </div><div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">&nbsp;&nbsp;&nbsp;Address&nbsp;&nbsp;&nbsp;</div>
                                            <input type="text" id="username3" name="address" class="form-control">

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">Phone No.1</div>
                                            <input type="phone" id="email3" name="phon1" class="form-control">

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">Phone No.2</div>
                                            <input type="phone" id="password3" name="phone2" class="form-control">

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Note&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                                            <input type="phone" id="password3" name="note" class="form-control">

                                        </div>
                                    </div>
                                    <div class="form-actions form-group">
                                        <button type="submit" name="registerbtn" class="btn btn-success btn-block" style="border-radius:5px;">Save</button>
                                    </div>
                                </form>
                            </div>

                        </section>
                    </aside>
                </div>


              </div> <!-- .content -->
          </div><!-- /#right-panel -->

          <!-- Right Panel -->

          <script src="../vendors/jquery/dist/jquery.min.js"></script>
          <script src="../vendors/popper.js/dist/umd/popper.min.js"></script>
          <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
          <script src="../assets/js/main.js"></script>




        </body>

        </html>
