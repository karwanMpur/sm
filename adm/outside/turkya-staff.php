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
                 <li class="">
                    <a href="home.php"> <i class="menu-icon  ti-filter"></i>home</a>
                    <hr style="margin-top:-2%;margin-bottom:2%;">
                      </li>
           <li class="active">
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
              <form class="" action="turkya-staff.php" method="post">


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
      <?php
if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
}
$no_of_records_per_page = 48;
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

            $query = "SELECT * FROM ord where `conf`>0 AND(  `conf-tu` IS NULL or `conf-tu`='') AND (  `canceled` IS NULL or `canceled`='') AND send ='$i' LIMIT $offset, $no_of_records_per_page;" ;
            $result = mysqli_query($conn,$query);
            if(mysqli_num_rows($result) > 0)
            {
                while($row = mysqli_fetch_assoc($result))
                    {

        ?>
        <div class="col-md-4 "   style="width:400px;height:800px;<?php echo $value_zoom; ?>" >
            <div class="card zoom" style="width:90%;border-radius:20px;">

                <div style="margin-bottom:-52px;">

                  <button class="btn btn-sm btn-secondary" style="border-radius:20px;background-color:transparent; width:15%;margin:10px;opacity: 0.7;"> <a target="_blank"  href="<?php echo $row['link'];?>" style="border:1px;border-color:black;">Link</a> </button>


                <button class="btn btn-sm btn-secondary float-right" style="background-color:transparent;border-radius:20px; width:12%;margin:10px;opacity: 0.7;">  <a target="_blank"  href="<?php echo "../../image/".$row['img'];?>">Pic</a> </button>

              </div>
              <img class=" mx-auto d-block" style="margin-top:2%;border-radius:20px;" width="97%" height="400px" src="<?php echo "../../image/".$row['img'];?>" alt="Card image cap">
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






                    <div class="ard col-12" style="border-radius:10px;margin-top:0px;margin-left:0%;margin-right:0%;height:60px;">

                      <center>
                           		<form action="bagtur.php" method="POST" target="_blank"   enctype="multipart/form-data">
																		<input type="hidden" name="nid" value="<?php echo $row['bagid'];?>">
																			<button style="border-style: none;border-radius:10px;margin:0%;background-Color:#808080;" type="submit" name="updatebtn" class="btn btn-info col-12  btn-block"><h2><i class="ti-shopping-cart-full"></i><?php echo $row['costid'];?> </h2></button>

																</form>



                            </center>

                    </div>
                    <form action="acc_code.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="nid" value="<?php echo $row['oid'];?>">


                    <div class="card-text text-sm-center float-left col-8" style="margin-top:8px;margin-left:3%;margin-right:3%;margin-bottom:2%;">

                      <input type="hidden" name="tuid" value="<?php echo $row['oid'];?>">
                      <button type="submit" name="updatetu" class="btn btn-success btn-block" style="border-radius: 10px;background-color: #009345;">
                          <h2> Teslim</h2>
                      </button>
                        </form>

                    </div>
                     <div class="card-text text col-3 float-right" style="margin-top:4%;margin-left:%;margin-right:1%;margin-bottom:0%;">
                       <a class="btn btn-danger btn-lg" style="border-radius:10px;" href="#del<?php echo $row['oid'];?>" data-toggle="modal"><i class="fa fa-warning white"></i></a>

                    </div>
                </div>
            </div>
        </div>
                    <div id="del<?php echo $row['oid']; ?>"  class="modal fade" id="smallmodal" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="smallmodalLabel">Bu ürünü iptal etmek istediğine emin misin ?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <br />
                            <form action="acc_code.php" method="POST" class="float-left"  enctype="multipart/form-data">
                        <div class="row form-group">
                          <div class="col-md-1">

                          </div>
                            <div style="margin-top:2%;" class="col col-md-4"><label for="selectLg" class=" form-control-label">cancel type</label></div>
                            <div class="col-12 col-md-6">
                                <select name="selectLg"  id="selectLg" class="form-control-lg form-control">
                                    <option value="cancel">cancel</option>
                                    <option value="lost">lost</option>
                                    <option value="wrong">wrong </option>

                                </select>
                            </div>
                            <div class="col-md-1">

                            </div>

                        </div>
                        <div class="row form-group" >
                          <div class="col-md-1">

                          </div>
                            <div style="margin-top:2%;" class="col col-md-4"><label for="" class=" form-control-label"> Other</label></div>
                            <div class="col-12 col-md-6"><input type="email" id="hf-cancle" name="hf-cancel" placeholder="Enter cancel type..." class="form-control"></div>
                            <div class="col-md-1">

                            </div>
                        </div>

                        <div class="modal-footer">
                          <a href="#" class="btn btn-white" data-dismiss="modal">Hayır</a>

                          <input type="hidden" name="idcanc" value="<?php echo $row['oid']; ?>">

                            <button  type="submit" name="cancel" class="btn btn-danger">Evet</button>

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
  </div><!-- /#right-panel -->

  <!-- Right Panel -->

  <script src="../../vendors/jquery/dist/jquery.min.js"></script>
  <script src="../../vendors/popper.js/dist/umd/popper.min.js"></script>
  <script src="../../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="../../assets/js/main.js"></script>



</body>

</html>
