<?php
require_once ('User.php');

$user = new User();
if ($_REQUEST['submit']) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	if ($_REQUEST['act'] == 'login') {
		if ($user->login($username, $password)) {
			echo '欢迎' . $_SESSION['username'] . '<br />';
			echo '登录成功！';
			echo '<a href="doUser.php?act=logout">注销</a>';
		} else {
			echo '登录失败! <a href ="./UserLogin.php">返回</a>';
		}
	}
	elseif ($_REQUEST['act'] == 'add_user') {
		$result = $user->add_user($username, $password);
		if ($result == -1) {
			echo "此用户 {$username} 已经存在,<a href ='./UserLogin.php'>返回</a>";
		}
		elseif ($result == 1) {
			echo "注册成功" . $_SESSION['username'] . "<br />";
			echo '<a href="doUser.php?act=logout">注销</a>';
		} else {
			echo "注册失败！";

		}

	}
}
elseif ($_REQUEST['act'] == 'logout') {
	$user->logout();
	echo '注销成功！ <a href ="./UserLogin.php">返回</a>';
} else {
	echo "参数错误！";
}
?>
