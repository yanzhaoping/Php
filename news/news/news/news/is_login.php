<?php 
function is_login(){ 
     if(isset($_SESSION["user_id"])){ 
    
     		return TRUE; 
     }else{ 
     
     		return FALSE; 
     } 
} 
?> 