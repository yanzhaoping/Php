
<?php 
include_once 'file_system.php';
if(empty($_POST)){ 
     $message = "上传的文件超过了php.ini中post_max_size选项限制的值"; 
	 echo "<h2>保存失败!</h2>";
}else{ 
	$admin_id=1;
     $category_id = $_POST["category_id"]; 
     $title = $_POST["title"]; 
     $content = $_POST["content"]; 
// 	 $pic = $_POST["picture"];
//      $currentDate =  date("Y-m-d H:i:s"); 
//      $clicked = 0; 
     $file_name = $_FILES["news_file"]["name"]; 
     $message = upload($_FILES["news_file"],"uploads"); 
     $conn = new mysqli('10.18.57.16', 'H_Z09416143', '177473','h_z09416143');
     mysqli_query($conn,"set names 'gbk'");
     $sql = "insert into news values(null,$admin_id,$category_id,'$title','$content','$file_name')"; 
     mysqli_query($conn,$sql);
     mysqli_close($conn);
     if($message=="文件上传成功！"||$message=="没有选择上传附件！"){
   $conn = new mysqli('10.18.57.16', 'H_Z09416143', '177473','h_z09416143');
     	
     }
    
} 
$message = urlencode($message);
//
echo "<h2>保存成功!</h2>";
// header("Location:news_list.php&message=$message");  
?>