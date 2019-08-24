<?php  
$database_connection = null; 
function get_connection(){ 
   $conn = new mysqli('10.18.57.16', 'H_Z09416143', '177473','h_z09416143');
   mysqli_query($conn,"set names 'gbk'");
} 
function close_connection(){ 
     global $database_connection; 
     if($database_connection){ 
     		mysql_close($database_connection) or die(mysql_error()); 
	} 
} 
?> 