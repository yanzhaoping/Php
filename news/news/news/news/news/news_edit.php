<?php 
session_start(); 
?> 
<?php 
$conn = new mysqli('10.18.57.16', 'H_Z09416143', '177473','h_z09416143');
$news_id = $_GET["news_id"]; 
mysqli_query($conn,"set names 'gbk'"); 
$sql="select * from news where news_id=$news_id";
$result_category = mysqli_query($conn,"select * from category");
$result_news = $conn->query($sql);
mysqli_close($conn);
$news = mysqli_fetch_array($result_news); 
?> 
<form action="news_update.php" method="post"> 
标题：<input type="text"  size="60" name="title" value="<?php echo $news['title']?>"><br/> 
<!--  图片：<input type="text"  size="60" name="picture" value="<?php echo $news['picture']?>"><br/> -->
内容：	
<input type="text" name="content"> 
类别：<select name="category_id" size="1"> 
<?php 
while($category = mysqli_fetch_array($result_category)){ 
?> 
     <option value="<?php echo $category['category_id'];?>" <?php echo ($news ['category_id']==$category['category_id'])?"selected":""?>><?php echo $category ['name'];?> </option> 
<?php 
} 
?> 
     </select><br/> 
<br/> 
<input type="hidden" name="news_id" value="<?php echo $news_id?>"> 
<input type="submit" value="修改"> 
<input type="button" value="取消" onclick="window.history.back();"> 
</form> 