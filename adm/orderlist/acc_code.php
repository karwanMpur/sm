<?php
include('../../includes/connect.php');
	$today = date("y-m-d");
    // delete code
	if(isset($_GET['id']))
    {
        $id=$_GET['id'];

        $sql="DELETE FROM ord WHERE oid='$id'";
        $result=mysqli_query($conn,$sql);

        if($result){
            echo '<script> alert("Data deleted");</script>';
            header('Location:../orderlist.php');
        }
        else{
            echo '<script> alert("Data Not deleted");</script>' ;
        }
    }


//arived all items in one bag
if(isset($_POST['ariveallitem'])){

		$id=$_POST['bagidall'];


				$sql = "UPDATE ord SET arrive='$today' WHERE bagid='$id' AND (`canceled` IS NULL OR `canceled`='') ";

				$result = mysqli_query($conn, $sql);
				if($result){

				header('Location:../activeorder.php');
				}

		}


		// delete code
	if(isset($_GET['ida']))
		{
				$id=$_GET['ida'];

				$sql="DELETE FROM ord WHERE oid='$id'";
				$result=mysqli_query($conn,$sql);

				if($result){
						echo '<script> alert("Data deleted");</script>';
						header('Location:../activeorder.php');
				}
				else{
						echo '<script> alert("Data Not deleted");</script>' ;
				}
		}
		//deleted
		if(isset($_GET['idarr']))
			{
					$id=$_GET['idarr'];

					$sql="DELETE FROM ord WHERE oid='$id'";
					$result=mysqli_query($conn,$sql);

					if($result){
							echo '<script> alert("Data deleted");</script>';
							header('Location:../arrived.php');
					}
					else{
							echo '<script> alert("Data Not deleted");</script>' ;
					}
			}
    // update code

		// update code
		if(isset($_POST['updatebtn'])){

				$id=$_POST['nid'];


						$sql = "UPDATE ord SET arrive='$today' WHERE oid='$id' ";

						$result = mysqli_query($conn, $sql);
						if($result){

						header('Location:../activeorder.php');
						}

				}
					// update code
		if(isset($_POST['updatebtnff'])){
                    	$bid=$_POST['bag'];
				$id=$_POST['nid'];
				 date("y-m-d");

						$sql = "UPDATE ord SET arrive='$today' WHERE oid='$id' ";

						$result = mysqli_query($conn, $sql);
						if($result){
                        header('Location:../activebag.php?bagid='.$bid);

						}

				}
				// deleted
				if(isset($_POST['deletebtn'])){

						$id=$_POST['nid'];
						$bid=$_POST['bag'];


		        $sql="DELETE FROM ord WHERE oid='$id'";
		        $result=mysqli_query($conn,$sql);

		        if($result){
		            echo '<script> alert("Data deleted");</script>';
		            	header('Location:../activebag.php?bagid='.$bid);
		        }
		        else{
		            echo '<script> alert("Data Not deleted");</script>' ;
		        }

						}


				// update code
				if(isset($_POST['updatebtnnb'])){

						$id=$_POST['nid'];
							$bid=$_POST['bag'];


								$sql = "UPDATE ord SET arrive='$today' WHERE oid='$id' ";

								$result = mysqli_query($conn, $sql);
								if($result){

								header('Location:../activebag.php?bagid='.$bid);
								}

						}


						//invoice update
						// update code
						if(isset($_POST['updatebtninvoice'])){

								$id=$_POST['nid'];
									$bid=$_POST['bag'];


									$query = "SELECT takeit FROM ord where oid='$id'";
											$result = mysqli_query($conn,$query);
											if(mysqli_num_rows($result) > 0)
											{
													while($row = mysqli_fetch_assoc($result))
															{
																$tek=$row['takeit'];
															}
														}
									if ($tek) {
									$sql = "UPDATE ord SET takeit=NULL WHERE oid='$id' ";
									}
									else {



										$sql = "UPDATE ord SET takeit='$today' WHERE oid='$id' ";
												}
										$result = mysqli_query($conn, $sql);
										if($result){

										header('Location:../arrivedbag.php?bagid='.$bid);
										}

								}


//cancel order
// update code
if(isset($_POST['updatebtncancle'])){

		$id=$_POST['nid'];


				$sql = "UPDATE ord SET canceled='yes' WHERE oid='$id' ";

				$result = mysqli_query($conn, $sql);
				if($result){

				header('Location:../activeorder.php');
				}

		}
		if(isset($_POST['updatebtncanclell'])){

		$id=$_POST['nid'];


				$sql = "UPDATE ord SET canceled='yes' WHERE oid='$id' ";

				$result = mysqli_query($conn, $sql);
				if($result){

				header('Location:../arrived.php');
				}

		}

		// update code
		if(isset($_POST['updatebtncanclenb'])){

				$id=$_POST['nid'];
		$bid=$_POST['bag'];

						$sql = "UPDATE ord SET canceled='yes' WHERE oid='$id' ";

						$result = mysqli_query($conn, $sql);
						if($result){

							header('Location:../activebag.php?bagid='.$bid);
						}

				}


		// update code uncancele
		if(isset($_POST['uncancele'])){

				$id=$_POST['nid'];


						$sql = "UPDATE ord SET canceled= NULL WHERE oid='$id' ";

						$result = mysqli_query($conn, $sql);
						if($result){

						header('Location:../cancele.php');
						}

				}
				// to turkey staff

					if(isset($_POST['uncanceletur'])){

				$id=$_POST['nid'];


						$sql = "UPDATE ord SET canceled= NULL WHERE oid='$id' ";

						$result = mysqli_query($conn, $sql);
						if($result){

						header('Location:../canceletur.php');
						}

				}

		//update one order in table
		if(isset($_POST['updatebtnord'])){

				$id=$_POST['nid'];
				$link=$_POST['link'];
				$color=$_POST['color'];
				$size=$_POST['size'];
				$price=$_POST['price'];
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


					header('Location:../activeorder.php');
						}




						}






						//update one order in table
						if(isset($_POST['updatebtnordab'])){

								$id=$_POST['nid'];
								$link=$_POST['link'];
								$color=$_POST['color'];
								$size=$_POST['size'];
								$price=$_POST['price'];
								$bid=$_POST['bagid'];
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

										header('Location:../activebag.php?bagid='.$bid);
										}

								}

				//udate to active order

				//update one order in table
				if(isset($_POST['updatebtnactiveord'])){

						$id=$_POST['nid'];
						$link=$_POST['link'];
						$color=$_POST['color'];
						$size=$_POST['size'];
						$price=$_POST['price'];
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


								header('Location:../arrived.php');
								}

						}




						if(isset($_POST['updatetuallbag'])){

								$id=$_POST['bagid'];


										$sql = "UPDATE ord SET `conf-tu`='$today' WHERE bagid='$id' ";

										$result = mysqli_query($conn, $sql);
										if($result){

										header('Location:../turkya-staffbag.php');
										}

								}







?>
