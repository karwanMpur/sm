<?php
include('../../includes/connect.php');

    // delete code
	if(isset($_GET['id']))
    {
        $id=$_GET['id'];

        $sql="DELETE FROM cust WHERE id='$id'";
        $result=mysqli_query($conn,$sql);

        if($result){
            echo '<script> alert("Data deleted");</script>';
            header('Location:../Profiles.php');
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
        $phone1=$_POST['phone1'];
        $phone2=$_POST['phone2'];
				$note=$_POST['note'];

            $sql = "UPDATE cust SET name='$name',insta='$insta',facebook='$facebook',city='$city',address='$address',phone1='$phone1',phone2='$phone2',note='$note' WHERE id='$id' ";

            $result = mysqli_query($conn, $sql);
            if($result){

            header('Location:../Profiles.php');
            }

        }
				// update code
				if(isset($_POST['uodateprice'])){

						$id=$_POST['nid'];
						$price=$_POST['price'];
						$check=$_POST['check'];
						if($check){
							$check=1;

						}
						else {
								$price=NULL;
							$check=NULL;
						}
								$sql = "UPDATE cust SET type='$check',sshipping='$price' WHERE id='$id' ";

								$result = mysqli_query($conn, $sql);
								if($result){

								header('Location:Profile.php?id='.$id);
								}

						}				// update code
										if(isset($_POST['updatebalance'])){

												$id=$_POST['nid'];
												$balanceadd=$_POST['balanceadd'];
												$balance=$_POST['balance'];
												$total=$balanceadd+$balance;
														$sql = "UPDATE cust SET balance='$total' WHERE id='$id' ";

														$result = mysqli_query($conn, $sql);
														if($result){

														header('Location:Profile.php?id='.$id);
														}

												}


?>
