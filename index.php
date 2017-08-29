<html>
<head>
<title>
PHP学生管理系统
</title>
</head>
<body>
<div style="width:350px;height:80px;text-align:center;position:absolute;left:46%;margin-top:100px;">
	<b>学生管理系统</b>
	<hr />
  <form action="doUser.php?act=login" method="post">
  <table>
    <tr>
      <td>用户名：</td><td><input type="text" name="username" id="username"></td>
    </tr>
    <tr>
      <td>密码：</td><td><input type="password" name="password" size="20" maxlength="20"/></td>
    </tr>
    <tr>
      <td></td><td><input type="submit" name="submit" id="submit" value="登 录"/> <input type="reset" name="reset" value="重 置"/></td>
    </tr>
  </table>
  </form>
</div>

<div>

</div>
</body>
</html>