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
	echo"<script>alert('������¼ϵͳ���ٽ������ۣ�');history.go(-1);</script>";
}
else{
	$review=$_POST['info'];
	mysqli_query($conn,"set names 'gbk'");
	$state = "δ���";
	$sql=mysqli_query($conn, "insert into review values(null,$user_id,$news_id,'$review','$state')");
	echo"<script>alert('���۳ɹ�������ˣ�');window.history.back();</script>";
}
?>
