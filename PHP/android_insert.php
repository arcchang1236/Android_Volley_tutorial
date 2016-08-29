<?php
$con = mysqli_connect('pega.cl6h2fbtdud5.ap-northeast-1.rds.amazonaws.com', 'pega', 'pega#1234', 'pegadb', 3306) or die("connection failed");

$response = array();

if( !(empty($_POST['item_emid']) || empty($_POST['item_tagid']) || empty($_POST['item_name'])))
{
    $item_emid=$_POST['item_emid'];
    $item_tagid=$_POST['item_tagid'];
    $item_name=$_POST['item_name'];

    $result = mysqli_query($con,"INSERT INTO EmployeeData(EmployeeID,NFCTagID,EmployeeName) VALUES('$item_emid','$item_tagid','$item_name')");    

    if($result>0){
           $response["success"] = 1;
         }    
     else{
           $response["success"] = 0;
         }
     echo json_encode($response);
}

?>