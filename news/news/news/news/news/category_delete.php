<?php
?>
<?php 
session_start(); 
?> 
<?php 
$conn = new mysqli('10.18.57.16','H_Z09416143','177473','h_z09416143');
$category_id = $_GET['category_id']; 
mysqli_query($conn,"delete from category where category_id=$category_id");
mysqli_close($conn);
echo "�������༰�������ɾ���ɹ���<script>window.history.back();</script>"; 

?> 