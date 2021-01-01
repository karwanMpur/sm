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
@font-face {
   font-family: OpenSans;
   src: url(../../includes/OpenSans-Regular.ttf);
}

* {
   font-family: OpenSans;
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
                  <li class="">
                      <a href="turkya-staffbag.php"> <i class="menu-icon  ti-briefcase"></i>Çantalar</a>
                        <hr style="margin-top:-2%;margin-bottom:2%;">
                  </li>
                    <li class="active">
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

              <div class="col-sm-2">
                  <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>

              </div>
              <form class="" action="turkya-staffundo.php" method="post">


                <div class="col-sm-2">
                    <select name="selectLg" onchange="this.form.submit();"  class="form-control-lg form-control">
                          <option value="">show</option>
                        <option value="zoom:100%">1</option>
                        <option value="zoom:64%">2</option>
                        <option value="zoom:50%">3</option>
                        <option  value="zoom:25%">4</option>
                    </select>


                </div>

                </form>

              <div class="col-sm-5">
                  <div class="user-area dropdown float-right">
                        <a class="nav-link" href="logout.php"><i class="fa fa-power-off"></i> Logout</a>

                      <div class="user-menu dropdown-menu">



                      </div>
                  </div>


              </div>
          </div>

      </header><!-- /header -->
      <!-- Header-->
      <?php
if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
}
$no_of_records_per_page = 12;
$offset = ($pageno-1) * $no_of_records_per_page;
$total_pages_sql = "SELECT COUNT(*) FROM ord";
$result = mysqli_query($conn,$total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);



if(isset($_POST['selectLg']))
{
$value_zoom=$_POST['selectLg'];
}

 ?>

      <div class="breadcrumbs">


      </div>

      <div class="content mt-3">
        <?php
            $i=$_SESSION['username'];
            $query = "SELECT * FROM ord where `conf-tu`>0 AND send='$i' ORDER BY time DESC LIMIT $offset, $no_of_records_per_page;";
            $result = mysqli_query($conn,$query);
            if(mysqli_num_rows($result) > 0)
            {
                while($row = mysqli_fetch_assoc($result))
                    {

        ?>
          <div class="col-md-4 "   style="width:400px;height:800px;<?php echo $value_zoom; ?>" >
            <div class="card" style="width:90%;border-radius:20px;">

                <div style="margin-bottom:-52px;">

                  <button class="btn btn-sm btn-secondary" style="border-radius:20px;background-color:transparent; width:15%;margin:10px;opacity: 0.7;"> <a target="_blank"  href="<?php echo $row['link'];?>" style="border:1px;border-color:black;">Link</a> </button>


                <button class="btn btn-sm btn-secondary float-right" style="background-color:transparent;border-radius:20px; width:12%;margin:10px;opacity: 0.7;">  <a target="_blank"  href="<?php echo "../../image/".$row['img'];?>">Pic</a> </button>

              </div>
              <img class=" mx-auto d-block" style="margin-top:2%;border-radius:20px;" width="97%" height="450px" src="<?php echo "../../image/".$row['img'];?>" alt="Card image cap">
                <div class="" style="">

                  <div class="ard" >

                    <div class="ard float-right" style="background-Color:#f2f2f2;border-radius:10px;margin-top:5px;margin-left:1%;margin-right:3%;height:50px;width:25.5%;">

                      <center>    <h5 style="margin:13px"> <?php echo $row['oid'];?> </h5> </center>

                    </div>
                    <div class="ard float-right" style="background-Color:#f2f2f2;border-radius:10px;margin-top:5px;margin-left:1%;margin-right:0%;height:50px;width:30.3%;">

                      <center>    <h5 style="margin:13px">  <?php echo $row['color'];?> </h5> </center>

                    </div>
                    <div class="ard float-right" style="background-Color:#f2f2f2;border-radius:10px;margin-top:5px;margin-bottom:10px;margin-left:1%;margin-right:0%;height:50px;width:35%;">

                      <center>    <h5 style="margin:13px">  <?php echo $row['size'];?> </h5> </center>

                    </div>

                    </div>
                    <form action="acc_code.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="nid" value="<?php echo $row['oid'];?>">




                    <div class="ard" style="background-Color:#808080;border-radius:10px;margin-top:65px;margin-left:3%;margin-right:3%;height:60px;">

                      <center>    <strong><h2 style="padding-top:15px;;color:white;">  <?php echo $row['costid'];?> </h2> </strong> </center>

                    </div>

                    <div class="card-text text-sm-center" style="margin-top:8px;margin-left:3%;margin-right:3%;margin-bottom:2%;">
                      <form action="acc_code.php" method="POST" enctype="multipart/form-data">
                      <input type="hidden" name="tuuid" value="<?php echo $row['oid'];?>">
                      <button type="submit" name="updatetureject" class="btn btn-danger btn-block" style="border-radius: 10px;">
                          <h1> Geri Al </h1>
                      </button>
                        </form>
                    </div>
                </div>
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

<hr>

<center>
  <div class="pagination ">


        <a href="?pageno=1"><strong>ilk</strong></a>

        <li style="float:right;" class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>"><strong>Önce
  </strong></a>
        </li>
        <li style="float:right;" class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno >= $total_pages){ echo "?pageno=".($pageno + 1); } else { echo "?pageno=".($pageno + 1); } ?>"><strong>Sonraki</strong></a>
        </li>
        <li style="float:right;" class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
            <a href=""><strong><?php echo $pageno; ?>
  </strong></a>
        </li>


  </div>

</center>
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
  </div><!-- /#right-panel -->

  <!-- Right Panel -->

  <script src="../../vendors/jquery/dist/jquery.min.js"></script>
  <script src="../../vendors/popper.js/dist/umd/popper.min.js"></script>
  <script src="../../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="../../assets/js/main.js"></script>




</body>

</html>
