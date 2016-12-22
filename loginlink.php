<?php
header("Content-Type: text/html; charset=utf-8");
require_once("connMysql.php");
session_atart();
if(isset($_SESSION["loginMember"]) &&
     ($_SESSION["loginMember"]!="")){
       //帳號是member導向會員中心
       if($_SESSION["memberLevel"]=="member"{
         header("Location: member_center.php");
       }//否則導向管理中心
       else{
         header("Location: member_admin.php");
       }
     }
if (isset($_POST["username"]) && isset($_POST["password"])) {
  //繫結登入會員資料
  $query_RecLogin = "SELECT * FROM `memberdata` WHERE `m_username` = '".$_POST[username]."'";
  $RecLogin = mysql_query($query_RecLogin);
  //取出帳密值
  $row_RecLogin = mysql_fetch_assoc($RecLogin);
  $username = $row_RecLogin["m_username"];
  $password = $row_RecLogin["m_password`"];
  $level = $row_RecLogin["m_level"];
if(md5($_POST["password"]) == $password){//確認$_POST["psaaword"]與password符合即可登入
  //計算登入次數及更新登入時間
  $query_RecLoginUpdate = "UPDATE `memberdata` SET `m_login` = `m_login`+1, `m_logintime` = NOW() WHERE
  `m_username` = '".$_POST["username"]."'";
  mysql_query($query_RecLoginUpdate);
  //設定登入者名稱及等級
  $_SESSION["loginMember"]=$username;
  $_SESSION["memberLevel"]=$level;
  //用Cookie紀錄登入資料
  if(isset($_POST["rememberme"])&&($_POST["rememberme"]=="true")){
    setcookie("remUser", $_POST["username"], time()+365*24*60);
    setcookie("remPass", $_POST["password"], time()+365*24*60);
  }else{
    if(isset($_COOKIE["remUser"])){
      setcookie("remUser", $_POST["username"], time()-100);
      setcookie("remPass", $_POST["password"], time()-100);
    }
  }
  //帳號等級為member導向會員中心
if($_SESSION["memberLevel"]=="member"){
  header("Location:member_center.php");
  //否則導向管理中心
}else{
  header("Location: member_admin.php");
}else {
  header("Location: index.php?errMSG=1");
}
}
}
?>
<td width="200">
<div class="boxtl"></div><div class="boxtr"></div>
<div class="regbox"><?php if(isset($_GET["errMsg"]) &&($_GET["errMsg"]=="1")){?>
<div class="errDiv"> 登入帳號或密碼錯誤!</div>
<?php }?>
