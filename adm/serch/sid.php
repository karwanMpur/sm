<?php
include('../../includes/connect.php');
  include('../../includes/session.php');

$type = $_POST['type'];

// Search result
if($type == 1){
    $searchText = $_POST['search'];

    $sql = "SELECT id,name FROM cust where id like '%".$searchText."%' order by id asc limit 5";

    $result = mysqli_query($conn,$sql);

    $search_arr = array();

    while($fetch = mysqli_fetch_assoc($result)){
        $id = $fetch['id'];


        $search_arr[] = array("id" => $id);
    }

    echo json_encode($search_arr);
}

// get User data
if($type == 2){
    $userid = $_POST['userid'];

    $sql = "SELECT * FROM cust where id=".$userid;

    $result = mysqli_query($conn,$sql);

    $return_arr = array();
    while($fetch = mysqli_fetch_assoc($result)){
        $id = $fetch['id'];
        $name = $fetch['name'];
        $insta = $fetch['insta'];
        $facebook = $fetch['facebook'];
        $address = $fetch['address'];
        $p1 = $fetch['phone1'];
        $p2 = $fetch['phone2'];

        $return_arr[] = array("id"=>$id, "name"=> $name, "insta"=> $insta, "facebook"=> $facebook, "address"=> $address, "phone1"=> $p1, "phone2"=> $p2);
    }

    echo json_encode($return_arr);
}
