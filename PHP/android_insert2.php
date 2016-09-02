<?php
$con = mysqli_connect('pega.cl6h2fbtdud5.ap-northeast-1.rds.amazonaws.com', 'pega', 'pega#1234', 'pegadb', 3306) or die("connection failed");

$response = array();

if( !(empty($_POST['item_tagid']) || empty($_POST['item_face']) || empty($_POST['item_score']) || empty($_POST['item_time']) || empty($_POST['item_pic'])))
{
    $item_tagid=$_POST['item_tagid'];
    $item_face=$_POST['item_face'];
    $item_score=$_POST['item_score'];
    $item_time=$_POST['item_time'];
    $item_pic=$_POST['item_pic'];

    $result = mysqli_query($con,"INSERT INTO SwipeData(NFCTagID,FaceFeature,Score,SwipeTime,SwipePicture) VALUES('$item_tagid','$item_face','$item_score','$item_time','$item_pic')");    

    if($result>0){
           $response["success"] = 1;
         }    
     else{
           $response["success"] = 0;
         }
     echo json_encode($response);
}

?>