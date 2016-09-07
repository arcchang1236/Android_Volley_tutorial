<?php
$con = mysqli_connect('pega.cl6h2fbtdud5.ap-northeast-1.rds.amazonaws.com', 'pega', 'pega#1234', 'pegadb', 3306) or die("connection failed");

$response = array();

$result = mysqli_query($con,"SELECT * FROM SwipeData");

if (mysqli_num_rows($result) > 0) {

    $response["orders"] = array();

    while ($row = mysqli_fetch_array($result)) {
            $item = array();
            $item["NFCTagID"] = $row["NFCTagID"];
            $item["FaceFeature"] = $row["FaceFeature"];
            $item["Score"] = $row["Score"];
            $item["SwipeTime"] = $row["SwipeTime"];
            $item["SwipePicture"] = $row["SwipePicture"];
            array_push($response["orders"], $item);
           }
     $response["success"] = 1;
}
else {
      $response["success"] = 0;
      $response["message"] = "No Items Found";
}
echo json_encode($response);

?>