<?php
session_start(); 
?>
<?php 
$conn = new mysqli('10.18.57.16', 'H_Z09416143', '177473','h_z09416143');
mysqli_query($conn,"set names 'gbk'");
$category_id = $_POST["category_id"]; 
$name = $_POST["category_name"]; 
$sql = "update category set name='$name' where category_id=$category_id"; 
mysqli_query($conn,$sql); 
mysqli_close($conn);
echo "新闻类别修改成功！ <script>window.history.back();</script>"; 

?> 