<?php
require_once ('User.php');

$user = new User();
if ($_REQUEST['act'] == 'login') {
	if ($user->login($_REQUEST['username'], $_REQUEST['password'])) {
		echo '��¼�ɹ���';
	} else {
		echo '��¼ʧ�ܣ�';
	}
}elseif ($_REQUEST['act'] == 'logout') {
	$user->logout();
}elseif($_REQUEST['act'] == 'addUser'){
	$user->add_user($_REQUEST['username'],$_REQUEST['password']);
	echo 'ע��ɹ���';
}else{
	echo '��������';
}
?>
