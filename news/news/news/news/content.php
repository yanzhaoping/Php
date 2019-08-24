<?php 
session_start();
?>
<html>
<head>
</head>
<body>
<?php 
      $conn = new mysqli('10.18.57.16', 'H_Z09416143', '177473','h_z09416143');
	  $newsid=$_GET['news_id'];	
	  mysqli_query($conn,"set names 'gbk'");
	  $rs=mysqli_query($conn,"select * from news where  news_id =".$newsid);
	
	  while($rows=mysqli_fetch_array($rs)){
		  $title = $rows['title'];
		  $content = $rows['content'];
		  $newsid=$rows['news_id'];
	  }
	  mysqli_query($conn,"set names 'gbk'");
	  $rs=mysqli_query($conn, "select * from review where  state='已审核' and news_id =".$newsid);
	  @$user_id=$_SESSION['user_id'];


	  mysqli_close($conn);

	 
	
?>
<div id="content">
  <div id="title">
    <h2>
	<?php echo $title;	?>

    </h2>
  </div>
  <div>
<!--     <div> -->
<!--      <td> -->
     
<!--      </td> -->
<!--     </div> -->
    <div id="newscontent">
      <?php echo $content; ?>
    </div>
	
    <div id="review">
      <h5>显示评论</h5>
      <div id="postreview">
        <table>
		  <?php
		    while($row = mysqli_fetch_array($rs)){ 
			 echo "评论内容：".$row["content"]."<br/>"; 
		 echo "<br/>"; 
			 
			} 
	  ?>
        </table>
      </div>

      <h5>发表评论</h5>
	  <form name="form1" method="post" action="addreview.php">
      <p><textarea rows="9" name="info" cols="35" ></textarea></p>
      <p>
   
        <input type="submit" value="提交" name="B1"/>
        <input type="reset" value="重设" name="B2"/>
      </form>
      </p>
    </div>
  </div>
</body>
</html>