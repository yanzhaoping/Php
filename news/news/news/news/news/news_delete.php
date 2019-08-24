<?php 
session_start(); 
?> 
<?php 
$conn = new mysqli('10.18.57.16', 'H_Z09416143', '177473','h_z09416143');
mysqli_query($conn,"set names 'gbk'");
$news_id = $_GET["news_id"]; 
mysqli_query($conn,"delete from news where news_id=$news_id"); 
mysqli_close($conn);
echo "新闻及相关评论信息删除成功！"; 

?> 