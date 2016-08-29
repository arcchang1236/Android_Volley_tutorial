<?php
$con = mysqli_connect('pega.cl6h2fbtdud5.ap-northeast-1.rds.amazonaws.com', 'pega', 'pega#1234', 'pegadb', 3306) or die("connection failed");

$response = array();
if( isset($_GET['EmployeeID'] ) ) {

    $id=$_GET['EmployeeID'];
    $item=$_GET['EmployeeName'];
   
    $result = mysqli_query($con,"DELETE FROM EmployeeData WHERE EmployeeID='$id'");
   
    $row_count = mysqli_affected_rows($con);

    if($row_count>0){
        $response["success"] = 1;
        $response["message"] = "Deleted Sucessfully.";
       }
    else{
        $response["success"] = 0;
        $response["message"] = "Failed To Delete"; 
     } 
  echo json_encode($response);

 }
?>