<?php
?>
<?php 
session_start();
?> 
<?php 
$conn = new mysqli('10.18.57.16', 'H_Z09416143', '177473','h_z09416143');
mysqli_query($conn,"set names 'gbk'");
$review_id = $_GET["review_id"]; 
$sql = "delete from review where review_id=$review_id"; 
$result_set = $conn->query($sql); 
mysqli_close($sql);
header("Location:review_list.php"); 
?> 