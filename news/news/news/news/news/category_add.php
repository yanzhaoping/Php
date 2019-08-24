<?php
session_start();
?>
<html>
<head>	
	<title>添加新闻类别</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="col-xs-4">
<form action="category_save.php" method="post">
<h2>添加类别：</h2><input type="text" size="20" class="form-control" name="category"><br/>
<input type="submit" class="btn btn-primary" value="提交"><input type="reset" class="btn btn-default" values="重置">
</form>
</div>
</body>
</html>
