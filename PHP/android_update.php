<?php
  $con = mysqli_connect('pega.cl6h2fbtdud5.ap-northeast-1.rds.amazonaws.com', 'pega', 'pega#1234', 'pegadb', 3306) or die("connection failed");

  $response = array();

if( isset($_POST['EmployeeID'] ) && isset($_POST['EmployeeName']) ) {
    $item_emid=$_POST['EmployeeID'];
    $item_name=$_POST['EmployeeName'];

    $result = mysqli_query($con,"UPDATE EmployeeData SET EmployeeName='$item_name' WHERE EmployeeID='$item_emid'") or die(mysqli_error());

    $row_count = mysqli_affected_rows($con);

    if($row_count>0){
         $response["success"] = 1;
         $response["message"] = "Updated Sucessfully.";
     }
    else{
        $response["success"] = 0;
        $response["message"] = "Failed To Update.";  
     }  
  echo json_encode($response);
}
?>