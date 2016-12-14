<?php
header("Content-Type: text/html; charset=utf-8");
require_once("connMysql.php");
if(isset($_POST["action"])&&($_POST["action"]=="join")){
  //查詢帳號是否已註冊
  $query_RecFindUser = "SELECT `m_username` FROM `memberdata` WHERE `m_username`='".$_POST["m_username"]."'";
  $query_RecFindUser = mysql_query($query_RecFindUser);
  if (mysql_num_rows($RecFindUser)>0){
    header("Location:member_join.php?errMsg=1&username".$_POST["m_username"]);
  }else {
    //如果沒有執行新增的動作
    $query_insert = "INEST INTO `memberdata`(`m_name` ,`m_username` ,`m_password` ,`m_phone`,`m_jointime`)VALUES (";
    $query_insert .= "'".$_POST["m_name"]."',";
    $query_insert .= "'".$_POST["m_username"]."',";
    $query_insert .= "'".md5($_POST["m_password"])."',";
    $query_insert .= "'".$_POST["m_phone"]."',";
    $query_insert .= "NOW())";
    mysql_query($query_insert);
    header("Location: member_join.php?loginStats=1");
  }
}
 ?>
 <script language="javascript">
 function checkForm(){
   if (document.formJoin.m_username.value==""){
     alert("輸入帳號!");
     document.formJoin.m_username.focus();
     return false;
   }else{
     uid=document.formJoin.m_username.value;
     if(uid.length<5 || uid.length>12){
       alert("帳號長度只能5至12字元!");
       document.formJoin.m_username.focus();
       return false;
     }
     for(idx0;idx<uid.length;idx++){
       if(uid.charAt(idx)>='A'&&uid.charAt(idx)<='Z'){
         alert("帳號不可含有大寫字元!");
         document.formJoin.m_username.focus();
         return false;
       }
    if(!(( uid.charAt(idx)>='a'&&uid.charAt(idx)<='z')||(uid.charAt(idx)>='0'&&uid.charAt(idx)<='9')||(uid.charAt(idx)=='_'))){
      alert("帳號只能是數字,小寫英文字母及「_」等符號,其他符號皆不可使用!");
      document.formJoin.m_username.focus();
      return false;
    }
     if(uid.charAt(idx)=='_'&&uid.charAt(idx-1)=='_'){
       alert("「_」不可相連!\n");
       document.formJoin.m_username.focus();
       return false;
     }
   }
   }
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
</heas>


<body>
  <?php if(isset($_GET["loginStats"])&&($_GET["loginStats"]=="1")){?>
  <script language="javascript">
  alert('會員新增成功\n可用申請的帳號密碼登入。');
  window.location.href='index.php';
  </script>
<?php}?>
