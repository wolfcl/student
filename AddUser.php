<?php
require_once ('User.php');

$user = new User();
if ($_REQUEST['act'] == 'login') {
	if ($user->login($_REQUEST['username'], $_REQUEST['password'])) {
		echo 'µÇÂ¼³É¹¦£¡';
	} else {
		echo 'µÇÂ¼Ê§°Ü£¡';
	}
}elseif ($_REQUEST['act'] == 'logout') {
	$user->logout();
}elseif($_REQUEST['act'] == 'addUser'){
	$user->add_user($_REQUEST['username'],$_REQUEST['password']);
	echo '×¢²á³É¹¦£¡';
}else{
	echo '²ÎÊý´íÎó£¡';
}
?>
