<?php

//upload.php

if(isset($_POST["image"]))
{
	$data = $_POST["image"];


	$image_array_1 = explode(";", $data);


	$image_array_2 = explode(",", $image_array_1[1]);

	$data = base64_decode($image_array_2[1]);

	$imageName = time() . '.jpg';

	file_put_contents("image/".$imageName, $data);

	echo '<center><img src="image/'.$imageName.'" class="img-thumbnail" /></center>';

	echo '<input type="hidden"  value="'.$imageName.'" name="file">';

}

?>
