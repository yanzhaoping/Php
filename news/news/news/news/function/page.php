<?php 
function page($total_records,$page_size,$page_current,$url,$keyword){ 
     $total_pages = ceil($total_records/$page_size); 
     $page_previous = ($page_current<=1)?1:$page_current-1; 
     $page_next = ($page_current>=$total_pages)?$total_pages:$page_current+1; 
     $page_start = ($page_current-5>0)?$page_current-5:0; 
     $page_end = ($page_start+10<$total_pages)?$page_start+10:$total_pages; 
     $page_start = $page_end-10; 
     if($page_start<0) $page_start = 0; 
     //判断$url中是否存在查询字符串 
     $parse_url = parse_url($url); 
     if(empty($parse_url["query"])){ 
     		$url = $url.'?';//若不存在，在$url后添加？ 
     }else{ 
     		$url = $url.'&'; //若存在，在$url后添加& 
     } 
     if(empty($keyword)){ 
     		$navigator = "<a href=".$url."page_current=$page_previous>上一页</a>  "; 
     		for($i=$page_start;$i<$page_end;$i++){ 
     			$j = $i+1; 
     			$navigator = $navigator."<a href='".$url."page_current=$j'>$j</a>  "; 
     		} 
     		$navigator = $navigator."<a href=".$url."page_current=$page_next>下一页</a>"; 
     		$navigator.= "<br/>共".$total_records."条记录，共".$total_pages."页，当前是第".$page_current."页"; 
     }else{ 
     		$keyword = $_GET["keyword"]; 
     		$navigator = "<a href=".$url."keyword=$keyword&page_current=$page_previous>上一页</a>  "; 
     		for($i=$page_start;$i<$page_end;$i++){ 
     			$j = $i+1; 
     			$navigator = $navigator."<a href='".$url."keyword=$keyword&page_current =$j'>$j</a>  "; 
     		} 
     		$navigator =$navigator."<a href=".$url."keyword=$keyword&page_current= $page_next>下一页</a>"; 
     		$navigator.= "<br/>共".$total_records."条记录，共".$total_pages."页，当前是第".$page_current."页"; 
     } 
     echo $navigator; 
} 
?> 