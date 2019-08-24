<?php 
include_once 'file_system.php'; 
$file_name = $_GET["attachment"]; 
echo $file_name;
download("uploads/","$file_name"); 
?> 
