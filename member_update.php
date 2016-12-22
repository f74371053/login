<td class="tdrline">
<form action="updatelink.php" method="POST" name="formJoin" id="formJoin" onsubmit="return ckeckForm();">
  <p class="title">修改資料
  </p>
  <div class="dataDiv">
    <hr size="1"  />
    <p class="heading">帳號資料
    </p>
    <p><strong>使用帳號</strong>
      :<?php echo $row_RecMember["m_username"];?>
    </p>
    <p><strong>使用密碼</strong>:
      <input name="m_password" type="password" class="normalinput" id="m_password">
      <br>
    </p>
    <p><strong>確認密碼</strong>:
      <input name="m_passwordrecheck" type="password" class="normalinput" id="m_passwordrecheck">
      <br>
    </p>
    
