<?php
include_once 'page.php';
session_start();
?>
<?php 
$conn = new mysqli('10.18.57.16', 'H_Z09416143', '177473','h_z09416143');
//�����ѯ�������ŵ�SQL��� 
mysqli_query($conn,"set names 'gbk'");
$search_sql = "select * from news order by news_id desc"; 
//������ģ����ѯ��ȡ��ģ����ѯ�Ĺؼ���keyword 
$keyword = ""; 
if(isset($_GET["keyword"])){ 
$keyword = trim($_GET["keyword"]); 
//����ģ����ѯ���ŵ�SQL��� 
mysqli_query($conn,"set names 'gbk'");
$search_sql = "select * from news where title like '%$keyword%' or content like '%$keyword%' order by news_id desc"; 
} 
//�ṩ����ģ����ѯ��form�� 
?> 
<html>
<head><link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script></head>
	<form class="navbar-form navbar-left" role="search"  action="news_list.php" method="get"> 
<input type="text" name="keyword" class="form-control"  value="<?php echo $keyword?>" placeholder="Search">
<button type="submit" class="btn btn-default">����</button>
</form>
<br/> 
<table  class="table table-bordered"> 
<?php 
$conn = new mysqli('10.18.57.16', 'H_Z09416143', '177473','h_z09416143');
mysqli_query($conn,"set names 'gbk'");
//��ҳ��ʵ�� 
$result_news = $conn->query($search_sql); 
$total_records = mysqli_num_rows($result_news); 
$page_size = 5; 
if(isset($_GET["page_current"])){ 
     $page_current = $_GET["page_current"]; 
}else{ 
     $page_current=1; 
} 
$start = ($page_current-1)*$page_size; 
mysqli_query($conn,"set names 'gbk'");
$sql = "select * from news order by news_id desc limit $start,$page_size"; 
if(isset($_GET["keyword"])){ 
     $keyword = trim($_GET["keyword"]);  
     mysqli_query($conn,"set names 'gbk'");
     //����ģ����ѯ���ŵ�SQL��� 
     $sql = "select * from news where title like '%$keyword%' or content like '%$keyword%' order by news_id desc"; 
}
     $result_set = $conn->query($sql);
     mysqli_close($conn);
     if(mysqli_num_rows($result_set)==0){
     	exit("���޼�¼��");
     }


while($row = mysqli_fetch_array($result_set)){ 
	
?> 
<tr> 
<td> 
   <a href=""><?php echo mb_strcut($row['title'],0,50,"gbk")?></a> 
</td>
<td>�ļ���<a href="download.php?attachment=<?php echo urlencode($row['attachment']);?>"><?php  echo $row['attachment']?> </a></td>


<td> 
     <a href="news_edit.php?news_id=<?php echo $row['news_id']?>">�༭</a> 
</td> 
<td> 
     <a href="news_delete.php?news_id=<?php echo $row['news_id']?>" onclick="return confirm('ȷ��ɾ����');">ɾ��</a> 
</td> 

</tr> 
<?php 
} 
?> 
</table> 
<?php 
//��ӡ��ҳ������
$url = $_SERVER["PHP_SELF"]; 
page($total_records,$page_size,$page_current,$url,$keyword); 
?> 