<?php
session_start();
 //����session
//session��ֵ
  
  if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $select =$_POST['sel'];
//     $select=$_POST['sel'];
  
$conn = new mysqli('10.18.57.16', 'H_Z09416143', '177473','h_z09416143');
mysqli_query($conn,"set names 'gbk'");
    if ($conn->connect_error){
        echo '���ݿ�����ʧ�ܣ�';
        exit(0);
    }else{
        if ($username == ''){
            echo '<script>alert("�������û�����");history.go(-1);</script>';
            exit(0);
        }
        if ($password == ''){
            echo '<script>alert("���������룡");history.go(-1);</script>';
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
            echo '<script>alert("�û������������");history.go(-1);</script>';
        }
        }else{
         $sql = "select admin_id,name,pwd from admin where name = '$_POST[username]' and pwd = '$_POST[password]'";
         
        $result = $conn->query($sql);
        $number = mysqli_num_rows($result);
        if ($number) {
        	$_SESSION['name']=$_POST['username'];
        	
            echo '<script>window.location="admin.php";</script>';
        } else {
            echo '<script>alert("�û������������");history.go(-1);</script>';
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
	<h2 class="form-signin-heading"s>��¼������ϵͳ</h2>
<label>�û���:</label>
<input type="text" size="20"  class="form-control" name="username"/>
<label>��  ��:</label>
<input type="password" size="20" class="form-control" name="password"/>
<label>��ɫ</label>
<select name="sel">
  <option value ="user">�û�</option>
  <option value ="admin">����Ա</option>
</select>
		
		<input name="submit" class="btn btn-primary" type="submit" value="��¼"/>
		<input type="reset" class="btn btn-default" value="����"/>
	
</form>
</div>
</body>
</html>