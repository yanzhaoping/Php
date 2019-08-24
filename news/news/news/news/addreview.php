<?php
session_start();
?>
<?php 
$url = $_SERVER["HTTP_REFERER"];
 $conn = new mysqli('10.18.57.16', 'H_Z09416143', '177473','h_z09416143');
// $one=$_SESSION['one'];
$news_id =substr($url,-1);
@$user_id=$_SESSION['user_id'];
// echo $one;
if($user_id== 0){
	echo"<script>alert('请您登录系统后，再进行评论！');history.go(-1);</script>";
}
else{
	$review=$_POST['info'];
	mysqli_query($conn,"set names 'gbk'");
	$state = "未审核";
	$sql=mysqli_query($conn, "insert into review values(null,$user_id,$news_id,'$review','$state')");
	echo"<script>alert('评论成功，待审核！');window.history.back();</script>";
}
?>
