<?php 
 session_start();
?> 
<html>
<head>
<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<table class="table table-bordered"> 
<?php 
$conn = new mysqli('10.18.57.16', 'H_Z09416143', '177473','h_z09416143');
mysqli_query($conn,"set names 'gbk'");
//�����ѯ�������ŵ�SQL���
$sql =  "select * from category order by category_id desc";
$result = $conn->query($sql);
mysqli_close($conn); 
if(mysqli_num_rows($result)==0){ 
     exit("���޼�¼��"); 
} 
while($row = mysqli_fetch_array($result)){ 
?> 
<tr> 
<td> 
     <?php echo $row['name'] ?>
</td>


<td> 
     <a href="category_edit.php?category_id=<?php echo $row['category_id']?>">�༭</a> 
</td> 
<td> 
     <a href="category_delete.php?category_id=<?php echo $row['category_id']?>" onclick="return confirm('ȷ��ɾ����');">ɾ��</a> 
</td> 

</tr> 
<?php 
} 
?> 
</table> 
</body>
</html>
