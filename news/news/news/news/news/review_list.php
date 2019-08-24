<?php
?>

<?php 
$conn = new mysqli('10.18.57.16', 'H_Z09416143', '177473','h_z09416143');
$result_sql = "select * from review order by review_id desc "; 
mysqli_query($conn,"set names 'gbk'");
$result_set = $conn->query($result_sql); 
mysqli_close($conn); 
echo "系统所有评论信息如下：<br/>"; 
while($row = mysqli_fetch_array($result_set)){ 
     echo "评论内容：".$row["content"]."<br/>"; 
     echo "状态：".$row["state"]."<br/>"; 
     echo "<a href='review_delete.php?review_id=".$row["review_id"]."'>删除</a>"; 
     echo "&nbsp;&nbsp;&nbsp;"; 
     if($row["state"]=="未审核"){ 
     		echo "<a href='review_verify.php?review_id=".$row["review_id"]."'>审核</a>"; 
     } 
     echo "<hr/>"; 
} 

?> 