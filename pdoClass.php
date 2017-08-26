<?php


/*
 * PDO连接mysql数据库
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
 * 连接数据库
 */
function conn($dns, $user, $pwd) {
	try {
		$pdo = new PDO($dns, $user, $pwd);
		echo "PDO连接数据库成功";
	} catch (Exception $e) {
		echo $e->getMessage() . "<br />";
	}
}
/**
 * 添加用户
 */
function addUser() {
	try {

		$query = "insert into user(username,password) values ('PDOtest1','PDOlove')";
		$res = $pdo->exec($query);
		echo "用户注册成功，受影响行数为：" . $res;
	} catch (Exception $e) {
		die($e->getMessage() . "<br>");
	}
}

function allUser() {
	try {
		$query = "select * from user";
		$res = $pdo->query($query);
		//输出结果
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
