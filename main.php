<?php
session_start();
header("Content-Type:text/html;charset=utf-8");
?>
<html>
<head>
<title>
学生管理系统主界面
</title>
</head>

<body>
<b>学生管理系统主界面</b>
<hr />
<div>
	<ul>
		<li><a href="Studentadd.php">添加学生信息</a></li>
		<li><a href="Studentlist.php">查询学生信息</a></li>
		<li><a href="Useradd.php">添加用户账号</a></li>
		<li><a href="Userlist.php">查询用户账号</a></li>
	</ul>
</div>
</body>
</html>