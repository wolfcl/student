<?php
error_reporting(0);
require_once('DBClass.php');
session_start();

class User{
	var $db;
	/**
	 * ���캯�����������ݿ�
	 */
	function __construct(){
		$this->db = new DBClass("mysql:dbname=test;host=localhost",'root','');
	}

	/**
	 * �û���¼
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
	 * ����û�
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
	 * �˳���¼
	 *
	 */
	function logout(){
		$_SESSION['user_id'] = '';
		return 1;
	}
}
?>
