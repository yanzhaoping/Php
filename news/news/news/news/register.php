<?php

session_start();
$username=$password="";
if ($_SERVER["REQUEST_METHOD"] == "POST"){
$conn = new mysqli('10.18.57.16', 'H_Z09416143', '177473','h_z09416143');

$username=$_POST['username'];
$password=$_POST['password'];
$repassword = $_POST['repassword'];
if ($username == ''){
	echo '<script>alert("�������û�����");history.go(-1);</script>';
	exit(0);
}
if ($password == ''){
	echo '<script>alert("����������");history.go(-1);</script>';
	exit(0);
}
if ($password != $repassword){
	echo '<script>alert("������ȷ������Ӧ��һ��");history.go(-1);</script>';
	exit(0);
}
if($password == $repassword){
$conn = new mysqli('10.18.57.16', 'H_Z09416143', '177473','h_z09416143');
	if ($conn->connect_error){
		echo '���ݿ�����ʧ�ܣ�';
		exit(0);
	}else {
		mysqli_query($conn,"set names 'gbk'");
		$sql = "select username from user where username = '$_POST[username]'";
		
		$result = $conn->query($sql);
		$number = mysqli_num_rows($result);
		if ($number) {
			echo '<script>alert("�û����Ѿ�����");history.go(-1);</script>';
		} else {
			mysqli_query($conn,"set names 'gbk'");
			$sql_insert = "insert into user (user_id,username,password) values(null,'$_POST[username]','$_POST[password]')";
			mysql_query("set names utf8'");
			$res_insert = $conn->query($sql_insert);
			if ($res_insert) {
				echo '<script>window.location="login.php";</script>';
			} else {
				echo "<script>alert('ϵͳ��æ�����Ժ�');</script>";
			}
		}
		}
		}else{
			echo "<script>alert('�ύδ�ɹ���'); history.go(-1);</script>";
		}
	}
		?>
		<html>
		<head>
			
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
<body>
<div class="container">
<div class="row">
<div class="col-md-4">
<form action="register.php"  method="post">
	<input type="hidden" name="action" value="login"/>
	<h2 class="form-signin-heading"s>ע���û�</h2>
<label>�û���:</label>
<input type="text" size="20"  class="form-control" name="username" placeholder="����������"/>
<label>��  ��:</label>
<input type="password" size="20" class="form-control" name="password" placeholder="����������"/>
<td>���ٴ���������:</td>
<td><input type="text" name="repassword" class="form-control" placeholder="���ٴ���������"></td>
<input type="submit" name="submit" class="btn btn-primary" value="Submit"> </td>
�����˺ţ���<a href="login.php">��¼</a>

</table>
</body>
</html>

