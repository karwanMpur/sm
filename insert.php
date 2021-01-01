<?php
 include('includes/connect.php');
  include('includes/cust-session.php');
?>





<?php

  $today = date("d/m/Y");





if(isset($_POST['updatebtnk'])){

$web_link = $_POST['weblink'];
$color = $_POST["color"];
$size = $_POST["size"];
$note = $_POST["note"];
$item_price = $_POST["item_price"];
$files = $_POST["file"];




$sqlq = "INSERT INTO ord (link,color,size,price,img,costid,notes) VALUES ('$web_link','$color','$size',$item_price,'$files',$i,$note)";

$query = mysqli_query($conn,$sqlq);

  if($query){

     header('Location:orderk.php');
    }
    else{
         $query .= '
    INSERT INTO ord(link, color, size, price, costid, img,notes)
    VALUES("'.$web_link.'", "'.$color.'", "'.$size.'", "'.$item_price.'", "'.$i.'", "'.$files.'", "'.$note.'");
    ';
      if($query != '')
  {
  if(mysqli_multi_query($conn, $query))
   {


   }
   else
   {
    echo 'Error';
   }
  }
     
     header('Location:orderk.php');
    }
  echo $i;
  echo $web_link;
  echo "\n";
  echo $color;
  echo "\n";
  echo $size;
  echo "\n";
  echo $note;
  echo "\n";
  echo $item_price;
  echo "\n";
  echo $newfilename;
}

 // deleted
 if(isset($_GET['id'])){

      $id=$_GET['id'];



     $sql="DELETE FROM ord WHERE oid='$id'";
     $result=mysqli_query($conn,$sql);

     if($result){
         echo '<script> alert("Data deleted");</script>';
           header('Location:order.php');
     }
     else{
         echo '<script> alert("Data Not deleted");</script>' ;
     }

     }
     if(isset($_GET['idk'])){

          $id=$_GET['idk'];



         $sql="DELETE FROM ord WHERE oid='$id'";
         $result=mysqli_query($conn,$sql);

         if($result){
             echo '<script> alert("Data deleted");</script>';
               header('Location:orderk.php');
         }
         else{
             echo '<script> alert("Data Not deleted");</script>' ;
         }

         }


       if(isset($_POST['save'])){
           $i=$_SESSION['id'];
           $query1 = "SELECT * FROM ord where `costid`=$i AND !(  `bagid` IS NULL or `bagid`='')  GROUP  BY bagid ";
            $result1 = mysqli_query($conn,$query1);
            if(mysqli_num_rows($result1) > 0)
			     {
			         $r= "SELECT MAX(bagid) AS maximum FROM ord WHERE `costid`=$i";
			         $result12 = mysqli_query($conn,$r);
                    if(mysqli_num_rows($result12) > 0)
                              {
                                  while($ro = mysqli_fetch_assoc($result12))
                    {
                                $maximum = $ro['maximum'];

                    }
                    $ted=$i.'000';
                   $ted= (int)$ted;
                    if($ted<$maximum)
                     {
               $bagid=$maximum+1;
                     }
                     else{
                         	$count=1;
			       $bagid =$i.'00'.$count;
                     }
			     }
			     }

			     else{
			         	$count=1;
			         while($row1 = mysqli_fetch_assoc($result1))
			             {$count+=1;}

			       $bagid =$i.'00'.$count;
			     }


             $sql = "UPDATE ord SET b='1',bagid=$bagid WHERE costid='$i' AND (`b` IS NULL)";

             $result = mysqli_query($conn, $sql);
             if($result){

             header('Location:custmar.php');
             }
       }
       if(isset($_POST['savek'])){
           $i=$_SESSION['id'];
             $sql = "UPDATE ord SET b='1',bagid=$bagid WHERE costid='$i' AND (`b` IS NULL)";

             $result = mysqli_query($conn, $sql);
             if($result){

             header('Location:custmark.php');
             }
       }
?>
