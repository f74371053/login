<?php
$db_host = "localhost";
$db_table= "phpmember";
$db_username= "qaz";
$db_password= "wsx";
if (!@mysql_connect($db_host, $db_username, $db_password))
die("資料連結失敗~");
if (!@mysql_select_db($db_table)) die("資料庫選擇失敗!");
mysql_query("SET NAMES 'utf8'");
 ?>
