<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
$conn = new mysqli('10.18.57.16', 'H_Z09416143', '177473','h_z09416143');
	$category=$_POST["category"];
	mysqli_query($conn,"set names 'gbk'");
	$sql = "insert into category values(null,'$category')"; 
	mysqli_query($conn,$sql);
	mysqli_close($conn);
	echo "Ìí¼Ó³É¹¦ ";
}
?>