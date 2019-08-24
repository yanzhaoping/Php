<?php
session_start();
?>
<?php 
$conn = new mysqli('10.18.57.16', 'H_Z09416143', '177473','h_z09416143');
$news_id = $_POST["news_id"]; 
$category_id = $_POST["category_id"]; 
$title = $_POST["title"]; 
$content = $_POST["content"]; 
mysqli_query($conn,"set names 'gbk'");
$sql = "update news set category_id='$category_id',title='$title',content='$content' where news_id=$news_id"; 
mysqli_query($conn,$sql); 
mysqli_close($conn);
echo "新闻信息修改成功！"; 

?> 