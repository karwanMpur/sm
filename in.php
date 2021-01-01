<?php
include('includes/connect.php');
 include('includes/cust-session.php');
$i=$_SESSION['id'];
if(isset($_POST['updatebtn'])){

$web_link = $_POST['weblink'];
$color = $_POST["color"];
$size = $_POST["size"];
$note = $_POST["note"];
$item_price = $_POST["item_price"];
$files = $_POST["file"];




$sqlq = "INSERT INTO ord (link,color,size,price,img,costid,notes) VALUES ('$web_link','$color','$size',$item_price,'$files',$i,$note)";

$query = mysqli_query($conn,$sqlq);

  if($query){

     header('Location:order.php');
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

     header('Location:order.php');
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
?>
