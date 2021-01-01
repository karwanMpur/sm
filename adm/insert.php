<?php
 include('../includes/connect.php');
  include('../includes/session.php');
?>


<?php
//insert.php


//$web_link = $_POST['weblink'];
//$files = $_FILES['file'];
//print_r($files);
//for ($i=0; $i < sizeof($web_link); $i++) {
//  move_uploaded_file($files['tmp_name'][$i],"images/".$files['name'][$i]);
//}
//print_r($size);

  $tod = date("y-m-d");
  $costidd=$_POST['costidd'];
 $query1 = "SELECT * FROM ord where `costid`=$costidd AND !(  `bagid` IS NULL or `bagid`='')  GROUP  BY bagid ";
       $result1 = mysqli_query($conn,$query1);
            if(mysqli_num_rows($result1) > 0)
			     {
			         $r= "SELECT MAX(bagid) AS maximum FROM ord WHERE `costid`=$costidd";
			         $result12 = mysqli_query($conn,$r);
                    if(mysqli_num_rows($result12) > 0)
                              {
                                  while($ro = mysqli_fetch_assoc($result12))
                    {
                                $maximum = $ro['maximum'];

                    }
                    $ted=$costidd.'000';
                   $ted= (int)$ted;
                    if($ted<$maximum)
                     {
               $bagid=$maximum+1;
                     }
                     else{
                         	$count=1;
			       $bagid =$costidd.'00'.$count;
                     }
			     }
			     }

			     else{
			         	$count=1;
			         while($row1 = mysqli_fetch_assoc($result1))
			             {$count+=1;}

			       $bagid =$costidd.'00'.$count;
			     }

 if($_POST["save"]=="save")
 {


  $dprice=$_POST['dprice'];
  $web_link = $_POST['weblink'];
  $color = $_POST["color"];
  $size = $_POST["size"];
  $item_price = $_POST["item_price"];
  $files = $_FILES['file'];
  $cargofee=$_POST['cargofee'];
  $totaltil =$_POST['totaltil'];
  $itemmm=$_POST['itemmm'];
  $shippingfee=$_POST['shippingfee'];
  $paidd=$_POST['paidd'];
  $remmaing=$_POST['remmaing'];
  $totall=$_POST['totall'];
  $costidd=$_POST['costidd'];
    $sendto=$_POST['sendto'];
  $extrashippingfee=$_POST['extrashippingfee'];
  if ($extrashippingfee) {
    $shippingfee=$extrashippingfee;
  }




  $query = '';
  for($count = 0; $count<count($web_link); $count++)
  {
   $web_link_clean = mysqli_real_escape_string($conn, $web_link[$count]);
   $color_clean = mysqli_real_escape_string($conn, $color[$count]);
   $size_clean = mysqli_real_escape_string($conn, $size[$count]);
   $item_price_clean = mysqli_real_escape_string($conn, $item_price[$count]);
    $ext=end(explode(".", $files["name"][$count]));  // for extention
    $s=1;

    $temp = explode(".", $_FILES["file"]["name"][$count]);
    $rand = mt_rand(100,99999999);
    $ran=round(microtime(true));

    $newfilename = $ran.$rand. '.' . end($temp);
    move_uploaded_file($files["tmp_name"][$count], "../image/" . $newfilename);



   if($web_link_clean != '' && $color_clean != '' && $size_clean != '' && $item_price_clean != '')
   {
   $query .= '
    INSERT INTO ord(link, color, size, price, costid, img,`conf`, bagid, total, rem, paid, shfee, iq, cargo, totall,dprice,send,b)
    VALUES("'.$web_link_clean.'", "'.$color_clean.'", "'.$size_clean.'", "'.$item_price_clean.'", "'.$costidd.'", "'.$newfilename.'",
     "'.$tod.'", "'.$bagid.'", "'.$totall.'", "'.$remmaing.'", "'.$paidd.'", "'.$shippingfee.'", "'.$itemmm.'", "'.$cargofee.'", "'.$totaltil.'", "'.$dprice.'", "'.$sendto.'", "'.$s.'");
    ';
   }
  }
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
  else
  {
   echo 'All Fields are Required';
  }
 }
else {
     $s=1;
  $dprice=$_POST['dprice'];
 $web_link = $_POST['weblink'];
 $color = $_POST["color"];
 $size = $_POST["size"];
 $item_price = $_POST["item_price"];
 $files = $_FILES['file'];

 $cargofee=$_POST['cargofee'];
 $totaltil =$_POST['totaltil'];
 $itemmm=$_POST['itemmm'];
 $shippingfee=$_POST['shippingfee'];
 $paidd=$_POST['paidd'];
 $remmaing=$_POST['remmaing'];
 $totall=$_POST['totall'];
 $costidd=$_POST['costidd'];
 $extrashippingfee=$_POST['extrashippingfee'];
   if ($extrashippingfee) {
     $shippingfee=$extrashippingfee;
   }


 $query = '';
 for($count = 0; $count<count($web_link); $count++)
 {


  $web_link_clean = mysqli_real_escape_string($conn, $web_link[$count]);
  $color_clean = mysqli_real_escape_string($conn, $color[$count]);
  $size_clean = mysqli_real_escape_string($conn, $size[$count]);
  $item_price_clean = mysqli_real_escape_string($conn, $item_price[$count]);
  $temp = explode(".", $_FILES["file"]["name"][$count]);
  $rand = mt_rand(100,99999999);
  $ran=round(microtime(true));

  $newfilename = $ran.$rand. '.' . end($temp);
  move_uploaded_file($files["tmp_name"][$count], "../image/" . $newfilename);




  if($web_link_clean != '' && $color_clean != '' && $size_clean != '' && $item_price_clean != '')
  {
  $query .= '
   INSERT INTO ord(link, color, size, price, costid, img, bagid, total, rem, paid, shfee, iq, cargo, totall,dprice,b)
   VALUES("'.$web_link_clean.'", "'.$color_clean.'", "'.$size_clean.'", "'.$item_price_clean.'", "'.$costidd.'", "'.$newfilename.'",
     "'.$bagid.'", "'.$totall.'", "'.$remmaing.'", "'.$paidd.'", "'.$shippingfee.'", "'.$itemmm.'", "'.$cargofee.'", "'.$totaltil.'", "'.$dprice.'", "'.$s.'");
   ';
  }
 }
 if($query != '')
 {
 if(mysqli_multi_query($conn, $query))
  {

 }
}
}

?>
