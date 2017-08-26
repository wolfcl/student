<?php
/*
 * Created on 2017-8-2
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
<b>使用MVC框架实现的用户注册系统</b><hr />
<form id="regterForm" name="regterForm" method="post" action="doUser.php?act=add_user">

  <table>
    <tr>
      <td>用户名：</td><td><input type="text" name="username" id="username" size="25"/></td>
    </tr>
    <tr>
      <td>密码：</td><td><input type="password" name="password" id="password" size="25" maxlength="20"/></td>
    </tr>
    <tr>
      <td>&nbsp;</td><td><input type="submit" name="submit" value="提交"/>&nbsp;&nbsp;<input type="reset" name="reset" value="重置"/></td>
    </tr>
  </table>
</form>
