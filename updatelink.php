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
$redirectUrl="member_center.php";
if(isset($_POST["action"])&&($_POST["action"]=="update")){
  $query_update = "UPDATE `memberdata` SET";
  if(($_POST["m_password"]!="")&&($_POST["m_password"]==$_POST["m_passwordrecheck"])){
    $query_update .="`m_password`='".md5($_POST["m_password"])."',";
  }
  $query_update .="`m_name`='".$_POST["m_name"]."',";
  $query_update .="`m_sex`='".$_POST["m_sex"]."',";
  $query_update .="`m_email`='".$_POST["m_email"]."',";
  $query_update .="`m_phone`='".$_POST["m_phone"]."',";
  mysql_query($query_update);
  if(($_POST["m_password"]!="")&&($_POST["m_password"]==$_POST["m_passwordrecheck"])){
  unset($_SESSION["loginMember"]);
  unset($_SESSION["memberLevel"]);
  $redirectUrl="index.php";
  }
  header("Location: $redirectUrl");
}
$query_RecMember = "SELECT * FROM `memberdata` WHERE `m_username`= '".$_SESSION["loginMember"]."'";
$RecMember = mysql_query($query_RecMember);
$row_RecMember=mysql_fetch_assoc($row_RecMember);
?>
<script language="javascript">
function checkForm(){
if(!check_password(document.formJoin.m_password.value,
document.formJoin.m_passwordrecheck.value)){
 document.formJoin.m_password.focus();
 return false;
}
if(document.formJoin.m_name.value==""){
 alert("請填寫名子!");
 document.formJoin.m_name.focus();
 return false;
}
if(document.formJoin.m_email.value==""){
 alert("請填寫電子信箱!");
 document.formJoin.m_email.focus();
 return false;
}
if(!checkmail(document.formJoin.m_email)){
  document.formJoin.m_email.focus();
  return false;
}
return confirm('確定送出?');
}
function check_password(pw1,pw2){
 if(pw1==' '){
   alert("密碼不可空白!");
   return false;
 }
for(var idx=0;idx<pw1.lenhth;idx++){
  if(pw1.charAt(idx) == ' ' || pw1.charAt(idx) == '\"'){
    alert("密碼不可含有空白或雙引號!\n");
    return false;
  }
  if(pw1.length<5 ||pw1.length>10){
    alert("密碼長度只能5至10個字元!\n");
    return false;
  }
  if(pw1!=pw2){
    alert("密碼二次輸入不一樣,請重新輸入 !\n");
    return false;
  }
}
return true;
}
function checkmail(myEmail){//信箱格式限制
 var filter = /^([a-zA-Z0-9\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
 if(filter.test(myEmail.value)){
   return true;
 }
 alert("電子信箱格式不正確");
 return false;
}
</script>
