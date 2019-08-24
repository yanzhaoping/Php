<?php
?>
<?php 
session_start(); 
?> 
<?php 
$category_id = $_GET['category_id'];  
$conn = new mysqli('10.18.57.16', 'H_Z09416143', '177473','h_z09416143');
mysqli_query($conn,"set names 'gbk'");
$sql = "select * from category where category_id = $category_id";
$result = $conn->query($sql);
mysqli_close($conn);
$category = mysqli_fetch_array($result); 

?> 
<html>
<head>
<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<form action="category_update.php" method="post"> 

类别：<input  type="text"  name="category_name"  value="<?php echo $category['name'];?>"> 

<br/> 
<input type="hidden" name="category_id" value="<?php echo $category_id?>"> 
<input type="submit" class="btn btn-primary" value="修改"> 
<input type="button" class="btn btn-default" value="取消" onclick="window.history.back();"> 
</form>
</body>
</html>

