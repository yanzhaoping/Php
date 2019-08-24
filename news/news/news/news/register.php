<?php

session_start();
$username=$password="";
if ($_SERVER["REQUEST_METHOD"] == "POST"){
$conn = new mysqli('10.18.57.16', 'H_Z09416143', '177473','h_z09416143');

$username=$_POST['username'];
$password=$_POST['password'];
$repassword = $_POST['repassword'];
if ($username == ''){
	echo '<script>alert("请输入用户名！");history.go(-1);</script>';
	exit(0);
}
if ($password == ''){
	echo '<script>alert("请输入密码");history.go(-1);</script>';
	exit(0);
}
if ($password != $repassword){
	echo '<script>alert("密码与确认密码应该一致");history.go(-1);</script>';
	exit(0);
}
if($password == $repassword){
$conn = new mysqli('10.18.57.16', 'H_Z09416143', '177473','h_z09416143');
	if ($conn->connect_error){
		echo '数据库连接失败！';
		exit(0);
	}else {
		mysqli_query($conn,"set names 'gbk'");
		$sql = "select username from user where username = '$_POST[username]'";
		
		$result = $conn->query($sql);
		$number = mysqli_num_rows($result);
		if ($number) {
			echo '<script>alert("用户名已经存在");history.go(-1);</script>';
		} else {
			mysqli_query($conn,"set names 'gbk'");
			$sql_insert = "insert into user (user_id,username,password) values(null,'$_POST[username]','$_POST[password]')";
			mysql_query("set names utf8'");
			$res_insert = $conn->query($sql_insert);
			if ($res_insert) {
				echo '<script>window.location="login.php";</script>';
			} else {
				echo "<script>alert('系统繁忙，请稍候！');</script>";
			}
		}
		}
		}else{
			echo "<script>alert('提交未成功！'); history.go(-1);</script>";
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
	<h2 class="form-signin-heading"s>注册用户</h2>
<label>用户名:</label>
<input type="text" size="20"  class="form-control" name="username" placeholder="请输入姓名"/>
<label>密  码:</label>
<input type="password" size="20" class="form-control" name="password" placeholder="请输入密码"/>
<td>请再次输入密码:</td>
<td><input type="text" name="repassword" class="form-control" placeholder="请再次输入密码"></td>
<input type="submit" name="submit" class="btn btn-primary" value="Submit"> </td>
已有账号？请<a href="login.php">登录</a>

</table>
</body>
</html>

