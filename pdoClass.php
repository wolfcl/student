<?php


/*
 * PDO����mysql���ݿ�
 **/

$dbms = "mysql";
$dbName = "test";
$user = "root";
$pwd = "";
$host = "localhost";
$dns = "$dbms:host=$host;dbname=$dbName";
//dns "mysql:host=127.0.0.1;port=3306;dbname=test";
$pdo = new PDO($dns, $user, $pwd);
/**
 * �������ݿ�
 */
function conn($dns, $user, $pwd) {
	try {
		$pdo = new PDO($dns, $user, $pwd);
		echo "PDO�������ݿ�ɹ�";
	} catch (Exception $e) {
		echo $e->getMessage() . "<br />";
	}
}
/**
 * ����û�
 */
function addUser() {
	try {

		$query = "insert into user(username,password) values ('PDOtest1','PDOlove')";
		$res = $pdo->exec($query);
		echo "�û�ע��ɹ�����Ӱ������Ϊ��" . $res;
	} catch (Exception $e) {
		die($e->getMessage() . "<br>");
	}
}

function allUser() {
	try {
		$query = "select * from user";
		$res = $pdo->query($query);
		//������
		foreach ($res as $r) {
			echo $r[0] . " " . $r['username'] . " " . $r['password'] . "<br />";
		}
	} catch (Exception $e) {
		die("Error!:" . $e->getMessage() . "<br />");
	}
}

echo "<hr>";
function execut() {
	try {
		$query = "select * from user";
		$res = $pdo->prepare($query);
		$res->execute();
		while ($result = $res->fetch(PDO :: FETCH_ASSOC)) {
			echo $result['userid'] . " " . $result['username'] . " " . $result['password'] . "<br >";
		}
	} catch (Exception $e) {
		die($e->getMessage());
	}
}
?>
