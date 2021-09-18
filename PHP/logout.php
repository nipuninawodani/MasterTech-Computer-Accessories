<?php
session_start();
session_destroy();   
setcookie("Email", "", time()- 60, "/","", 0); 
setcookie("Password", "", time()- 60, "/","", 0);    
header("Location: ../index.php");
?>