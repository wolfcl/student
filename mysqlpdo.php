<?php

	$dns = "mysql:dbname=test;host=127.0.0.1";
	$user = 'root';
	$password = '';
	$dbh = new PDO($dns,$user,$password);
	$query = "SELECT username,password FROM user";
	try{
		$pdostatement = $dbh->query($query);
		echo "һ���ӱ��л�ȡ��".$pdostatement->rowCount()."����¼<br />";
		foreach ($pdostatement as $row){
			echo "�û�����".$row['username'];
			echo " ���룺".$row['password']."<br />";
		}
	}catch(PDOException $e){
		echo '���ݿ�����ʧ�ܣ�'.$e->getMessage();
		exit;
	}
?>
