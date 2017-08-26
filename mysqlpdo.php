<?php

	$dns = "mysql:dbname=test;host=127.0.0.1";
	$user = 'root';
	$password = '';
	$dbh = new PDO($dns,$user,$password);
	$query = "SELECT username,password FROM user";
	try{
		$pdostatement = $dbh->query($query);
		echo "一共从表中获取到".$pdostatement->rowCount()."条记录<br />";
		foreach ($pdostatement as $row){
			echo "用户名：".$row['username'];
			echo " 密码：".$row['password']."<br />";
		}
	}catch(PDOException $e){
		echo '数据库连接失败：'.$e->getMessage();
		exit;
	}
?>
