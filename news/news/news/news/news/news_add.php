<?php 
session_start();
?> 
<html>
<head>
<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script></head>

<body>
<form action="news_save.php" method="post" enctype="multipart/form-data"> 
标题：	<input type="text"  size="60" name="title"><br/> 
内容：	
<input type="text" name="content"> 
<br/>
类别：	 
<select name="category_id" size="1"> 
<?php 
$conn = new mysqli('10.18.57.16', 'H_Z09416143', '177473','h_z09416143');
mysqli_query($conn,"set names 'gbk'");
$sql =  "select * from category";
$result = $conn->query($sql);
mysqli_close($conn);
while($row = mysqli_fetch_array($result)){ 
?> 
     <option value="<?php echo $row['category_id'];?>"><?php echo $row['name'];?></option> 
<?php 
} 
?> 
</select><br/> 
附件：	<input type="file" name="news_file" size="50"> 
<input type="hidden" name="MAX_FILE_SIZE" value="10485760"> 
<br/> 
<input type="submit" class="btn btn-primary" value="提交"><input type="reset" class="btn btn-default" value="重置"> 
</form> 
</body>
</html>