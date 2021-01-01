<?php
include('../includes/connect.php');

if(isset($_POST['registerbtn']))
{
    $username=$_POST['email'];
    $password=password_hash($_POST['password'],PASSWORD_DEFAULT);
    $acc_state=$_POST['Status'];
    $acc_type=$_POST['acc_type'];

            $query = "INSERT INTO account_tb (username, password, acc_state, acc_type) VALUES ('$username','$password','$acc_state','$acc_type')";
            $query_run = mysqli_query($conn, $query);

            if($query_run)
            {

                echo '<script> alert("زیادکرا");</script>';
                header('Location:account.php');
            }
            else
            {
                // echo "not done";
                echo '<script> alert("زیادنەکرا");</script>';
                header('Location:account.php');
            }

        }
    // delete code
	if(isset($_GET['id']))
    {
        $id=$_GET['id'];

        $sql="DELETE FROM account_tb WHERE acc_id='$id'";
        $result=mysqli_query($conn,$sql);

        if($result){
            echo '<script> alert("Data deleted");</script>';
            header('Location:account.php');
        }
        else{
            echo '<script> alert("Data Not deleted");</script>' ;
        }
    }

    //delete one bag
    if(isset($_GET['bagid']))
      {
          $id=$_GET['bagid'];

          $sql="DELETE FROM ord WHERE bagid='$id'";
          $result=mysqli_query($conn,$sql);

          if($result){
              echo '<script> alert("Data deleted");</script>';
              header('Location:mybag.php');
          }
          else{
              echo '<script> alert("Data Not deleted");</script>' ;
          }
      }
        //modify System
        if(isset($_POST['modify'])){

            $single=$_POST['single'];
            $smal=$_POST['small'];
            $medium=$_POST['medium'];
            $large=$_POST['large'];
            $farda=$_POST['farda'];
            $mony=$_POST['moniy'];
            $dis=$_POST['dis'];
              $today = date("d/m/Y");

                $sql = "UPDATE d SET single='$single',small='$smal',medium='$medium',large='$large',farda='$farda',dtol='$mony',date='$today',dis='$dis' WHERE id='1' ";

                $result = mysqli_query($conn, $sql);
                if($result){

                header('Location:index1.php');
                }

            }
    // update code
    if(isset($_POST['updatebtn'])){

        $id=$_POST['nid'];
        $username=$_POST['username'];
        $password=password_hash($_POST['password'],PASSWORD_DEFAULT);
        $acc_state=$_POST['acc_state'];
        $acc_type=$_POST['acc_type'];


        if(!empty($imgName)){

            $sql = "UPDATE account_tb SET username='$username',password='$password',acc_state='$acc_state',acc_type='$acc_type' WHERE acc_id='$id' ";

            $result = mysqli_query($conn, $sql);
            if($result){

            echo '<script> alert("نوێکراوە");</script>';
            header('Location:account.php');
            }
            else{
            echo '<script> alert("نوێنەکراوە");</script>' ;
            }
        }

        else{
            $sql = "UPDATE account_tb SET username='$username',password='$password',acc_state='$acc_state',acc_type='$acc_type' WHERE acc_id='$id' ";

            $result = mysqli_query($conn, $sql);
            if($result){
            echo '<script> alert("نوێکراوە");</script>';
            header('Location:account.php');
            }
            else{
            echo '<script> alert("نوێنەکراوە");</script>' ;
            }
        }

	}


?>
