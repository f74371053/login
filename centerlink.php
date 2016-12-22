<?php
header("Content-Type: text/html; charset=utf-8");
require_once("connMysql.php");
session_start();
if(!isset($_SESSION["loginMember"]) ||($_SESSION["loginMember"]=="")){
header("Location: index.php");
}

if(isset($_GET["logout"]) && ($_GET["logout"]=="true")){
  unset($_SESSION["loginMember"]);
  unset($_SESSION["memberLevel"]);
  header("Location: index.php");
}

$query_RecMember = "SELECT * FROM `memberdata` WHERE `m_username`= '".$_SESSION["loginMember"]."'";
$RecMember = mysql_query($query_RecMember);
$row_RecMember=mysql_fetch_assoc($row_RecMember);
?>
