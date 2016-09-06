<?php
  $con = mysqli_connect('pega.cl6h2fbtdud5.ap-northeast-1.rds.amazonaws.com', 'pega', 'pega#1234', 'pegadb', 3306) or die("connection failed");

  $response = array();

if( isset($_POST['item_emid'] ) && isset($_POST['item_name']) ) {
    $item_emid=$_POST['item_emid'];
    $item_name=$_POST['item_name'];

    $result = mysqli_query($con,"UPDATE EmployeeData SET EmployeeName='$item_name' WHERE EmployeeID='$item_emid'");

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