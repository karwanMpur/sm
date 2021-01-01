<?php
include('../../includes/connect.php');
//cancele in turkey dashbord
	$today = date("y-m-d");
  if(isset($_POST['cancel']))
  {
        $id=$_POST['idcanc'];
          $text=$_POST['hf-cancel'];
          $select=$_POST['selectLg'];
          if(!$text){
          $text=$select;
          }
          $to=date('Y-m-d H:i:s');

      $sql = "UPDATE ord SET canceled='$text',time='$to' WHERE oid='$id' ";

      $result = mysqli_query($conn, $sql);
      if($result){

      header('Location:turkya-staff.php');
      }
      else {
        echo $text;
      }
  }


  //cancele in turkey dashbord
    if(isset($_POST['cancelbag']))
    {
          $id=$_POST['idcanc'];
            $text=$_POST['hf-cancel'];
            $select=$_POST['selectLg'];
            $bag=$_POST['bagid'];
            if(!$text){
            $text=$select;
            }
            $to=date('Y-m-d H:i:s');

        $sql = "UPDATE ord SET canceled='$text',time='$to' WHERE oid='$id' ";

        $result = mysqli_query($conn, $sql);
        if($result){

        header('Location:bagtur.php?bag='.$bag);
        }
        else {
          echo $text;
        }
    }


    if(isset($_POST['updatetu'])){

        $id=$_POST['nid'];

          $to=date('Y-m-d H:i:s');

            $sql = "UPDATE ord SET `conf-tu`='$today',`time`='$to' WHERE oid='$id' ";

            $result = mysqli_query($conn, $sql);
            if($result){

            header('Location:turkya-staff.php');
            }

        }


        // taslim in one bag conf turkey
        						if(isset($_POST['updatetubag'])){

        								$id=$_POST['nid'];
        								$bid=$_POST['bagid'];


        										$sql = "UPDATE ord SET `conf-tu`='$today' WHERE oid='$id' ";

        										$result = mysqli_query($conn, $sql);
        										if($result){

        										header('Location:bagtur.php?bag='.$bid);
        										}

        								}


                        if(isset($_POST['undo'])){

                            $id=$_POST['tuid'];
                              $bag=$_POST['bagid'];
                              $today = null;

                              	$sql = "UPDATE ord SET `conf-tu`='$today' WHERE oid='$id' ";

                                $result = mysqli_query($conn, $sql);
                                if($result){

                              	header('Location:bagtur.php?bag='.$bag);
                                }

                            }

                            //uncancele
                            if(isset($_POST['uncanceletur'])){

                          $id=$_POST['nid'];


                              $sql = "UPDATE ord SET canceled= NULL WHERE oid='$id' ";

                              $result = mysqli_query($conn, $sql);
                              if($result){

                              header('Location:.canceletur.php');
                              }

                          }

                            // on one bag
                          if(isset($_POST['uncancel'])){

                        $id=$_POST['tuid'];
                        $bag=$_POST['bagid'];


                            $sql = "UPDATE ord SET canceled= NULL WHERE oid='$id' ";

                            $result = mysqli_query($conn, $sql);
                            if($result){

                          header('Location:bagtur.php?bag='.$bag);
                            }

                        }

                        // on main cancle page
                      if(isset($_POST['uncancelmain'])){

                    $id=$_POST['tuid'];
                    $bag=$_POST['bagid'];


                        $sql = "UPDATE ord SET canceled= NULL WHERE oid='$id' ";

                        $result = mysqli_query($conn, $sql);
                        if($result){

                      header('Location:canceletur.php');
                        }

                    }

                    // undo in main ldap_control_paged_result

                    						if(isset($_POST['updatetureject'])){

                    						    $id=$_POST['tuuid'];
                    						      $to;

                    						        $sql = "UPDATE ord SET `conf-tu`='$to' WHERE oid='$id' ";

                    						        $result = mysqli_query($conn, $sql);
                    						        if($result){

                    						        header('Location:turkya-staffundo.php');
                    						        }

                    						    }
 ?>
