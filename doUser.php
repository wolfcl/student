<?php
require_once ('User.php');

$user = new User();
if ($_REQUEST['submit']) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	if ($_REQUEST['act'] == 'login') {
		if ($user->login($username, $password)) {
			echo '��ӭ' . $_SESSION['username'] . '<br />';
			echo '��¼�ɹ���';
			echo '<a href="doUser.php?act=logout">ע��</a>';
		} else {
			echo '��¼ʧ��! <a href ="./UserLogin.php">����</a>';
		}
	}
	elseif ($_REQUEST['act'] == 'add_user') {
		$result = $user->add_user($username, $password);
		if ($result == -1) {
			echo "���û� {$username} �Ѿ�����,<a href ='./UserLogin.php'>����</a>";
		}
		elseif ($result == 1) {
			echo "ע��ɹ�" . $_SESSION['username'] . "<br />";
			echo '<a href="doUser.php?act=logout">ע��</a>';
		} else {
			echo "ע��ʧ�ܣ�";

		}

	}
}
elseif ($_REQUEST['act'] == 'logout') {
	$user->logout();
	echo 'ע���ɹ��� <a href ="./UserLogin.php">����</a>';
} else {
	echo "��������";
}
?>
