<?php
error_reporting(0);
require_once('DBClass.php');
session_start();

class User{
	var $db;
	/**
	 * 构造函数，连接数据库
	 */
	function __construct(){
		$this->db = new DBClass("mysql:dbname=test;host=localhost",'root','');
	}

	/**
	 * 加密用户密码
	 */
	function password($password){
		return md5(md5($password).'wolfcl.cn');
	}

	/**
	 * 用户登录
	 */
	function login($username,$password){
		$_user = $this->db->get_one("SELECT * FROM user WHERE username = ? AND password = ? ",array($username,$password));
		if($_user){
			$_SESSION['user_id'] = $_user['userid'];
			$_SESSION['username'] = $_user['username'];
			return true;
		}else{
			return false;
		}
	}

	/**
	 * 添加用户
	 */
	function add_user($username,$password){
		$_bool = $this->db->get_col("SELECT COUNT(1) FROM user WHERE username = ?", array($username));
		if($_bool){
			return -1;
		}
		$_result = $this->db->insert('user', array('username'=>$username,'password'=>$password));
		if($_result){
			$_SESSION['username'] = $username;
			return 1;
		}else{
			return 0;
		}
	}
		/**
	 * 退出登录
	 *
	 */
	function logout(){
		$_SESSION['username'] = '';
		return 1;
	}
}
?>
