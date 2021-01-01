<?php
//action.php
include('../includes/connect.php');
  include('../includes/session.php');
$input = filter_input_array(INPUT_POST);


if(isset($_POST['registerbtn']))
{
    $name=$_POST['name'];
	$insta=$_POST['insta'];
	$facebook=$_POST['facebook'];
  $city=$_POST['city'];
	  $address=$_POST['address'];
    $phon1=$_POST['phon1'];
    $phon2=$_POST['phon2'];
    $note=$_POST['note'];


            $result = mysqli_query($conn, $query);
               $query1 = mysqli_query($conn,"INSERT INTO cust (`name`, `insta`, `facebook`,`city`, `address`,`phone1`,`phone2`,`note`)
                VALUES('$name','$insta', '$facebook','$city','$address','$phon1','$phon2','$note')");
 header('Location:profile.php');


        }









echo json_encode($input);

?>
