<?php
session_start();
 //开启session
//session赋值
  
  if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $select =$_POST['sel'];
//     $select=$_POST['sel'];
  
$conn = new mysqli('10.18.57.16', 'H_Z09416143', '177473','h_z09416143');
mysqli_query($conn,"set names 'gbk'");
    if ($conn->connect_error){
        echo '数据库连接失败！';
        exit(0);
    }else{
        if ($username == ''){
            echo '<script>alert("请输入用户名！");history.go(-1);</script>';
            exit(0);
        }
        if ($password == ''){
            echo '<script>alert("请输入密码！");history.go(-1);</script>';
            exit(0);
        }
        if($select=='user'){
        
        $sql = "select user_id,username,password from user where username = '$_POST[username]' and password = '$_POST[password]'";
       mysqli_query($conn,"set names 'gbk'");
	    $result = $conn->query($sql);
        $number = mysqli_num_rows($result);
        $row = mysqli_fetch_array($result);
        $_SESSION['user_id']=$row['user_id'];
        if ($number) {
          $_SESSION['username']=$_POST['username'];
         echo '<script>window.location="index.php";</script>';
        } else {
            echo '<script>alert("用户名或密码错误！");history.go(-1);</script>';
        }
        }else{
         $sql = "select admin_id,name,pwd from admin where name = '$_POST[username]' and pwd = '$_POST[password]'";
         
        $result = $conn->query($sql);
        $number = mysqli_num_rows($result);
        if ($number) {
        	$_SESSION['name']=$_POST['username'];
        	
            echo '<script>window.location="admin.php";</script>';
        } else {
            echo '<script>alert("用户名或密码错误！");history.go(-1);</script>';
        }
        }
    }
   
    }
    ?>
    <html>
    <head>   
      <meta http-equiv="X-UA-Compatible" content="IE=edge charset">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
<body>
<div class="container">
<div class="row">
<div class="col-md-4">
<form action="login.php"  method="post">
	<input type="hidden" name="action" value="login"/>
	<h2 class="form-signin-heading"s>登录到新闻系统</h2>
<label>用户名:</label>
<input type="text" size="20"  class="form-control" name="username"/>
<label>密  码:</label>
<input type="password" size="20" class="form-control" name="password"/>
<label>角色</label>
<select name="sel">
  <option value ="user">用户</option>
  <option value ="admin">管理员</option>
</select>
		
		<input name="submit" class="btn btn-primary" type="submit" value="登录"/>
		<input type="reset" class="btn btn-default" value="重置"/>
	
</form>
</div>
</body>
</html>