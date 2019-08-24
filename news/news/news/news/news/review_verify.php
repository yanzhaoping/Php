<?php 
session_start(); 
?> 
<?php 
$conn = new mysqli('10.18.57.16', 'H_Z09416143', '177473','h_z09416143');
$review_id = $_GET["review_id"]; 
mysqli_query($conn,"set names 'gbk'");
mysqli_query($conn,"update review set state='ÒÑÉóºË' where review_id=$review_id" ); 
mysqli_close($close);
header("Location:review_list.php"); 
?> 