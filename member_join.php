<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<td class="tdrline">
  <form action="joinlink.php" method="POST"name="formJoin" id="formJoin" onsubmit="returncheckForm();">
  <p class="title">加入會員</p>
  <?php if(isset($_GET["errMsg"])||($_GET["errMsg"]=="1")){?>
  <div class="errDiv">帳號 <?php echo $_GET["username"];?>已經有人使用囉!</div>
<?php }?>
<div class="dataDiv">
  <p class="heading">帳號資料</p>
  <p><strong>使用帳號</strong>:
    <input name="m_username" type="text" class="normaliput" id="m_username">
    <font color="#FF0000">*</font><br>
    <span class="smalltext">請填入5~12字元內的小寫英文字母、數字、以及 _ 符號。</span>
  </p>
  <p><strong>使用密碼</strong>:
      <input name="m_password" type="password" class="normaliput" id="m_password">
      <font color="#FF0000">*</font><br>
      <span class="smalltext">請填入5~12字元內的小寫英文字母、數字。</span>
  </p>
  <p><strong>確認密碼</strong>:
        <input name="m_passwordrecheck" type="passwordcheck" class="normaliput" id="m_passwordrecheck">
        <font color="#FF0000">*</font><br>
        <span class="smalltext">再輸入一次密碼</span>
  </p>
        <hr size="1" />
        <p class="heading">個人資料</p>
  <p><strong>真實姓名</strong>:
          <input name="m_name" type="text" class="normaliput" id="m_name">
          <font color="#FF0000">*</font>
  </p>
  <p><strong>性  別
          </strong>:
          <input name="m_sex" type="radio" value="女" checked>
          女
          <input name="m_sex" type="radio" value="男" checked>
          男<font color="#FF0000">*</font>
 </p>
 <p><strong>電子信箱</strong>:
            <input name="m_email" type="text" class="normaliput" id="m_email">
            <font color="#FF0000">*</font></p>
            <p class="smalltext">請確認此信箱可使用，以便未來系統使用，如:補寄會員密碼信。
 </p>
 <p><strong>電 話</strong>:
              <input name="m_phone" type="text" class="normaliput" id="m_phone">
              <font color="#FF0000">*</font>
 </p>
            </div>
            <hr size="1" />
            <input name="action" type="hidden" id="action" value="join">
            <input type="submit" name="Submit2" value="送出申請">
            <input type="reset" name="Submit3" value="重設資料">
            <input type="button" name="Submit" value="回上一頁"onClick="window.history.back();">
          </form></td>
