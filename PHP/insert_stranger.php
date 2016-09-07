<?php
$con = mysqli_connect('pega.cl6h2fbtdud5.ap-northeast-1.rds.amazonaws.com', 'pega', 'pega#1234', 'pegadb', 3306) or die("connection failed");

$response = array();

if( !(empty($_POST['item_strface']) || empty($_POST['item_strpic']) || empty($_POST['item_strtime'])))
{
    $item_strface=$_POST['item_strface'];
    $item_strpic=$_POST['item_strpic'];
    $item_strtime=$_POST['item_strtime'];

    $result = mysqli_query($con,"INSERT INTO StrangerData(FaceData,StrangerPic,RecordTime) VALUES('$item_strface','$item_strpic','$item_strtime')");    

    if($result>0){
           $response["success"] = 1;
         }    
     else{
           $response["success"] = 0;
         }
     echo json_encode($response);
}

?>