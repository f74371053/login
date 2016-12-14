<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<p class="heading">登入會員系統</p>
<form name="form1" method="post" action="loginlink.php">
  <p>帳號:
    <br>
    <input name="username" type="text" class="logintextbox" id="username" value="<?php if(isset($_COOKIE["remUser"])){echo$_COOKIE["remUser"];}?>">
        <p>密碼:<br>
    <input name="password" type="text" class="logintextbox" id="password" value="<?php if(isset($_COOKIE["remPass"])){echo$_COOKIE["remPass"];}?>">
  </p>
  <p>
    <input name="rememberme" type="checkbox" id="rememberme" value="true" checked>
    記住我的帳號密碼</p>
    <input type="submit" name="button" id="button" value="登入系統" >
  </form>
  <p align="center"><a href="admin_passmail.php"忘記密碼,補寄密碼信</a></p>
    <hr size="1" />
    <p class="heading">還沒有會員帳號?</p>
    <p>免費 註冊帳號</p>
    <p aling="right"><a href="member_join.php">馬上申請會員
    </a></p>
  </div>
