<?php
 $link = new mysqli('localhost', 'root', '123', 'pharma'); 

if (mysqli_connect_error()) 
{ 
die('Ошибка подключения (' . mysqli_connect_errno() . ') ' . mysqli_connect_error()); 
} 
mysqli_query( $link, "SET NAMES 'utf8' COLLATE 'utf8_general_ci'");
mysqli_query( $link, "SET CHARACTER SET 'utf8'");
mysqli_set_charset($link, "utf-8"); 
?>
