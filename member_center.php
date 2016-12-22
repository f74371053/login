<p class="heading">
  <strong>會員系統</strong>
</p>
<p><strong><?php echo $row_RecMember["m_name"];?>
</strong>您好
</p>
<p>您總共登入了 <?php echo $row_RecMember["m_login"];?>次。
  本次登入的時間:<br>
  <?php echo $row_RecMember["m_logintime"];?>
</p>
<p align="left"><a herf="member_update.php">修改資料</a> | <a herf="?logout=true">登出系統</a>
</p>
