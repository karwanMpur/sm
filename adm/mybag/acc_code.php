<?php
include('../../includes/connect.php');
$hello="";
    // delete code
	if(isset($_GET['id']))
    {
        $id=$_GET['id'];

        $sql="DELETE FROM ord WHERE bagid='$id'";
        $result=mysqli_query($conn,$sql);

        if($result){
            echo '<script> alert("Data deleted");</script>';
            header('Location:../mybag.php');
        }
        else{
            echo '<script> alert("Data Not deleted");</script>' ;
        }
    }
    // update code
    if(isset($_POST['updatebtn'])){

        $id=$_POST['nid'];
        $name=$_POST['name'];
        $insta=$_POST['insta'];
        $facebook=$_POST['facebook'];
        $city=$_POST['city'];
        $address=$_POST['address'];
        $phon1=$_POST['phone1'];
        $phone2=$_POST['phone2'];

            $sql = "UPDATE cust SET name='$name',insta='$insta',facebook='$facebook',city='$city',address='$address',phone1='$phone1',phone2='$phone2' WHERE id='$id' ";

            $result = mysqli_query($conn, $sql);
            if($result){
            echo '<script> alert("نوێکراوە");</script>';
            header('Location:../profiles.php');
            }

        }


?>
