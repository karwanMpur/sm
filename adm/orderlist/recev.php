
<?php
include('../../includes/connect.php');

if(isset($_POST['updatetu'])){

    $id=$_POST['tuid'];
      $today = date("d/m/Y");

        $sql = "UPDATE ord SET conf-tu='$today' WHERE oid='$id' ";

        $result = mysqli_query($conn, $sql);
        if($result){

        header('Location:../turkya-staff.php');
        }

    }

if(isset($_POST['updatetureject'])){

    $id=$_POST['tuid'];
      $today = null;

        $sql = "UPDATE ord SET conf-tu='$today' WHERE oid='$id' ";

        $result = mysqli_query($conn, $sql);
        if($result){

        header('Location:../turkya-staff.php');
        }

    }
     ?>
