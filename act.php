<?php
include('includes/connect.php');
  include('includes/cust-session.php');
if(isset($_POST['ins']))
{
    $url=$_POST['url'];
	$color=$_POST['color'];
	$size=$_POST['size'];
  $type=$_POST['type'];
	  $notes=$_POST['notes'];
    $cost_id=$_POST['id'];



            $result = mysqli_query($conn, $query);
               $query1 = mysqli_query($conn,"INSERT INTO ord (`size`, `link`, `color`,`img`, `notes`,`costid`)
                VALUES('$size','$url', '$color','$type','$notes','$cost_id')");
 header('Location:custmar.php');


        }
?>
