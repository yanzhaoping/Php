<?php
session_start();
?>

<html>
<head>  
<meta http-equiv="X-UA-Compatible" content="text/html; charset=gbk">
	<title>����ϵͳ</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-default">
<div class="container">  <!--��������  -->
<div class="text-center">
<div>
<ul class="nav navbar-nav">
 <li><a class="navbar-brand" href="#">����ϵͳ</a></li>
</ul>
<ul class="nav navbar-nav navbar-right"> 
 <?php  
  		if(isset($_SESSION['username'])){
        echo "���ã�{$_SESSION['username']},��ӭ��";
        echo "<a href='loginout.php'>ע��</a>";
    }  else {
    	echo "<a href='login.php'>��½</a>&nbsp;&nbsp;&nbsp;";
    	echo "<a href='register.php'>ע��</a>";
    }
    ?>
  </ul> 
</div>
</div>
</nav>
<div >
<div class="">
<div id="myCarousel" class="carousel slide">
    <!-- �ֲ���Carousel��ָ�� -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>   
    <!-- �ֲ���Carousel����Ŀ -->
    <div class="carousel-inner">
        <div class="item active">
            <img src="images/2.jpg" alt="First slide" style="width:100%;height:350px">
             <div class="carousel-caption"><a href="news/news_detail.php" style="color: white">�����ɽ�ɽ��������һͷ�Ҿ�ʬ��</a></div>
        </div>
        <div class="item">
            <img src="images/3.jpg" alt="Second slide" style="width:100%;height:350px">
           <div class="carousel-caption"><a href="news/news_detail.php" style="color: white">�����ɽ�ɽ��������һͷ�Ҿ�ʬ��</div>
        </div>
        <div class="item">
            <img src="images/4.jpg" alt="Third slide" style="width:100%;height:350px">
                  <div class="carousel-caption"><a href="news/news_detail.php" style="color: white"> Ӣ����������ɯ��÷������������ְ</div>
        </div>
    </div>
    <!-- �ֲ���Carousel������ -->
    <a class="carousel-control left" href="#myCarousel" 
       data-slide="prev"> <span _ngcontent-c3="" aria-hidden="true" class="glyphicon glyphicon-chevron-right"></span></a>
    <a class="carousel-control right" href="#myCarousel" 
       data-slide="next">&rsaquo;</a>
</div>
<div>
<hr style=" border: 0;
    border-bottom: 2px solid green;" />
</div>
</div>
<div>
<!-- ���� -->
<div id="yule" class="col-lg-4" >
<h2>����</h2>
<div>
<ul class="list">
<?php
$conn = new mysqli('10.18.57.16', 'H_Z09416143', '177473','h_z09416143');
mysqli_set_charset($conn,"gbk");
$newsRes = mysqli_query($conn,"select * from news where category_id=1");
while($news = mysqli_fetch_array($newsRes)){
echo"<li><a href='content.php?news_id=".$news[0]."'>$news[3]</a></li>";

}
?>
</ul>
</div>
</div>
<div>
<div id="yule" class="col-lg-4" >
<h2>����</h2>
<div>
<ul class="list">
<?php
$conn = new mysqli('10.18.57.16', 'H_Z09416143', '177473','h_z09416143');
mysqli_set_charset($conn,"gbk");
$newsRes = mysqli_query($conn,"select * from news where category_id=2");
while($news = mysqli_fetch_array($newsRes)){
echo"<li><a href='content.php?news_id=".$news[0]."'>$news[3]</a></li>";

}
?>
</ul>
</div>
</div>
<div>
<div id="yule" class="col-lg-4">
<h2>����</h2>
<div>
<ul class="list">
<?php
$conn = new mysqli('10.18.57.16', 'H_Z09416143', '177473','h_z09416143');
mysqli_set_charset($conn,"gbk");
$newsRes = mysqli_query($conn,"select * from news where category_id=3");
while($news = mysqli_fetch_array($newsRes)){
echo"<li><a href='content.php?news_id=".$news[0]."'>$news[3]</a></li>";

}
?>
</ul>
</div>
</div>
</div>
</div>

</body>
</html>

