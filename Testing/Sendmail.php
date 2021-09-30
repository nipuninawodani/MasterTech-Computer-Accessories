<?php

include '../PHP/Functions.php'; 

session_start();

$email="mahela100@gmail.com";
$fname="Mahela";
$uid=108;

sendmail($email,$fname,sprintf("%'.010d", $uid));

?>