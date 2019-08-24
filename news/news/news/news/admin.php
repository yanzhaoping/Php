 <?php
 session_start(); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>


    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>

	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<title>新闻管理系统</title>
 <link rel="stylesheet" href="layui/css/layui.css">
  <script type="text/javascript">
  $(function(){
      $(".sideMenu").slide({
         titCell:"h3", 
         targetCell:"ul",
         defaultIndex:0, 
         effect:'slideDown', 
         delayTime:'500' , 
         trigger:'click', 
         triggerTime:'150', 
         defaultPlay:true, 
         returnDefault:false,
         easing:'easeInQuint',
         endFun:function(){
              scrollWW();
         }
       });
      $(window).resize(function() {
          scrollWW();
      });
      $(".menuson li").click(function() {
		$(".menuson li.on").removeClass("on");
		$(".menuson li").children().css('color', 'black');
		$(this).addClass("on");
		$(this).children().css('color', 'white');
		$("#here_area").html("当前位置："+$(this).children().html());
	});
  });
  function scrollWW(){
    if($(".side").height()<$(".sideMenu").height()){
       $(".scroll").show();
       var pos = $(".sideMenu ul:visible").position().top-38;
       $('.sideMenu').animate({top:-pos});
    }else{
       $(".scroll").hide();
       $('.sideMenu').animate({top:0});
       n=1;
    }
  } 

	

  </script>
  <script language=JavaScript>
function logout(){
	if (confirm("您确定要退出记账管理系统吗？"))
	window.location.href = "loginout.php";
	return false;
}
</script>
  <title>后台首页</title>
</head>
<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin">
  <div class="layui-header">
    <div class="layui-logo">新闻管理系统</div>
    <ul class="layui-nav layui-layout-right">
      <li class="layui-nav-item">
        <a href="javascript:;"> 
        <?php    echo "您好！{$_SESSION['name']}";?>    
      
        </a>
        <dl class="layui-nav-child">
          <dd><a href="#" onClick="logout();" id="out">退出&nbsp;</a></dd>
        </dl>
      </li>
    </ul>
  </div>
  
  <div class="layui-side layui-bg-black">
    <div class="layui-side-scroll">
       <c:if test="${currentType=='用户'}">
      <ul class="layui-nav layui-nav-tree"  lay-filter="test">
        <li class="layui-nav-item layui-nav-itemed">
          <a class="" href="javascript:;">新闻类别管理</a>
          <dl class="layui-nav-child">
            <dd><a  href="news/category_add.php" target="right">类别添加</a></dd>
            <dd><a  href="news/categoryList.php" target="right">类别列表</a></dd>
          </dl>
        </li>
        <li class="layui-nav-item">
          <a href="javascript:;">新闻管理</a>
          <dl class="layui-nav-child">
            <dd><a  href="news/news_add.php" target="right">新闻添加</a></dd>
            <dd><a  href="news/news_list.php" target="right">新闻列表</a></dd>
          </dl>
        </li>
        
    <li class="layui-nav-item">
          <a href="javascript:;">评论管理</a>
          <dl class="layui-nav-child">
            <dd><a  href="news/review_list.php" target="right">评论列表</a></dd>
          </dl>
        </li>
       
      </ul>
        </c:if>
        
        <c:if test="${currentType=='管理员'}">
          </c:if>
        
    </div>
  </div>
  
  <div class="layui-body">
   <div class="main">
       <iframe name="right" id="rightMain" frameborder="no" scrolling="auto" width="100%" height="700px" allowtransparency="true"></iframe>
    </div>
    <div class="bottom">
      <div id="bottom_bg"><a href="http://www.biyeseng.cn" target="_blank" align='center'></a></div>
    </div>
  
</div>
<script src="layui/layui.all.js"></script>
<script>
//JavaScript代码区域
layui.use('element', function(){
  var element = layui.element;
  
});
</script>

  
</body>

</html>
   
 
