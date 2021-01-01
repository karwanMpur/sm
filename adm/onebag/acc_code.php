<?php
include('../../includes/connect.php');

if(isset($_POST['deletebtn'])){

    $id=$_POST['vdele'];
    $bagid=$_POST['vbag'];

    $sql="DELETE FROM ord WHERE oid='$id'";
    $result=mysqli_query($conn,$sql);

    if($result){
        echo '<script> alert("Data deleted");</script>';
        header('Location:../bag.php?bagid='.$bagid);
    }
    else{
        echo '<script> alert("Data Not deleted");</script>' ;
    }

    }


        if(isset($_POST['updatebtn'])){

            $id=$_POST['nid'];
            $link=$_POST['link'];
            $color=$_POST['color'];
            $size=$_POST['size'];
            $price=$_POST['price'];
            $bagid=$_POST['vbag'];
            $img=$_FILES["img"]["name"];

              if(!empty($img)){
                  
                     $temp = explode(".", $_FILES["img"]["name"]);
                    $newfilename = round(microtime(true)) . '.' . end($temp);
                    move_uploaded_file($_FILES["img"]["tmp_name"], "../../image/" . $newfilename);

           
                $sql = "UPDATE `ord` SET `link`='$link',`color`='$color',`size`='$size',`price`='$price',img='$newfilename' WHERE oid='$id' ";
              }
              else {
                  $sql = "UPDATE `ord` SET `link`='$link',`color`='$color',`size`='$size',`price`='$price' WHERE oid='$id' ";
              }
                $result = mysqli_query($conn, $sql);
                if($result){


                header('Location:../bag.php?bagid='.$bagid);
                }

            }

            //update in invoice
            if(isset($_POST['updatebtnon'])){

                $id=$_POST['nid'];
                $link=$_POST['link'];
                $color=$_POST['color'];
                $size=$_POST['size'];
                $price=$_POST['price'];
                $bagid=$_POST['vbag'];
                $img=$_FILES["img"]["name"];

                  if(!empty($img)){
                         $temp = explode(".", $_FILES["img"]["name"]);
                    $newfilename = round(microtime(true)) . '.' . end($temp);
                    move_uploaded_file($_FILES["img"]["tmp_name"], "../../image/" . $newfilename);

                    $sql = "UPDATE `ord` SET `link`='$link',`color`='$color',`size`='$size',`price`='$price',img='$newfilename' WHERE oid='$id' ";
                  }
                  else {
                      $sql = "UPDATE `ord` SET `link`='$link',`color`='$color',`size`='$size',`price`='$price' WHERE oid='$id' ";
                  }
                    $result = mysqli_query($conn, $sql);
                    if($result){


                    header('Location:../arrivedbag.php?bagid='.$bagid);
                    }

                }


              // insert ....

            if (isset($_POST['insert']))
            {
                $price=$_POST['price'];
                $size=$_POST['size'];
                $color=$_POST['color'];
                $link=$_POST['link'];
                $bag=$_POST['vbag'];
                $costid=$_POST['costid'];
                
                   $temp = explode(".", $_FILES["img"]["name"]);
                    $newfilename = round(microtime(true)) . '.' . end($temp);
                    move_uploaded_file($_FILES["img"]["tmp_name"], "../../image/" . $newfilename);
                $sql = "INSERT INTO ord (link,color,size,price,img,bagid,costid,b) VALUES ('$link','$color','$size',$price,'$newfilename',$bag,$costid,1)";
                $query = mysqli_query($conn,$sql);
               
                header('Location:../bag.php?bagid='.$bag);
                }

                      //update one bag

                        if(isset($_POST['save'])){
                            $today = date("d/m/Y");
                            $tod = date("Y-m-d");
                            $id=$_POST['id'];
                            $dprice=$_POST['dprice'];
                            $total=$_POST['totallf'];
                            $rem=$_POST['remf'];
                            $paid=$_POST['paidf'];
                            $ship=$_POST['shipf'];
                            $iq=$_POST['iq'];
                            $cargo=$_POST['cargof'];
                            $sendto=$_POST['sendto'];
                            $bid=$_POST['bid'];
                            $extrashippingfee=$_POST['extrashippingfee'];
                            if ($extrashippingfee) {
                              $ship=$extrashippingfee;
                            }

                                if(!empty($id)){
                                  $sql = "UPDATE `ord` SET `conf`='$today',`conf`='$tod',`costid`='$id',`send`='$sendto',`total`='$total',`rem`='$rem',`paid`='$paid',`shfee`='$ship',`iq`='$iq',`cargo`='$cargo',`dprice`='$dprice' WHERE bagid='$bid' ";
                                }  else {
                                $sql = "UPDATE `ord` SET `total`='$total',`conf`='$today',`conf`='$tod',`send`='$sendto',`rem`='$rem',`paid`='$paid',`shfee`='$ship',`iq`='$iq',`cargo`='$cargo',`totall`='$totallir',`dprice`='$dprice' WHERE bagid='$bid' ";
                                }

                                $result = mysqli_query($conn, $sql);
                                if($result){


                                header('Location:../mybag.php');
                                }

                            }

                            //update one bag

                              if(isset($_POST['inoicesave'])){

                                  $today = date("d/m/Y");
                                  $id=$_POST['id'];
                                  $total=$_POST['totallf'];
                                  $rem=$_POST['remf'];
                                  $paid=$_POST['paidf'];
                                  $ship=$_POST['shipf'];
                                  $iq=$_POST['iq'];
                                  $cargo=$_POST['cargof'];

                                  $bid=$_POST['bid'];


                                      if(!empty($id)){
                                        $sql = "UPDATE `ord` SET `takeit`='$today',`costid`='$id',`total`='$total',`invoice_paid`='$rem',`paid`='$paid',`shfee`='$ship',`iq`='$iq',`cargo`='$cargo',`rem`=0
                                         WHERE bagid ='$bid' AND (`canceled` IS NULL OR `canceled`='') AND (`takeit` IS NULL OR `takeit`='') ";
                                      }  else {
                                      $sql = "UPDATE `ord` SET `total`='$total',`takeit`='$today',`invoice_paid`='$rem',`paid`='$paid',`shfee`='$ship',`iq`='$iq',`cargo`='$cargo',`rem`=0
                                       WHERE bagid='$bid' AND (`canceled` IS NULL OR `canceled`='') AND (`takeit` IS NULL OR `takeit`='')";
                                      }


                                      $sql2="UPDATE `ord` SET `total`='$total',`invoice_paid`='$rem',`paid`='$paid',`shfee`='$ship',`iq`='$iq',`cargo`='$cargo',`rem`=0
                                       WHERE bagid ='$bid'";

                                      $result = mysqli_query($conn, $sql);
                                      if($result){


                                      header('Location:../arrivedbag.php?bagid='.$bid);
                                      }

                                  }





?>
