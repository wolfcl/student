<?php

class DBClass extends PDO{
	var $sth;
	function execute($sql,$values=array()){
		$this->sth = $this->prepare($sql); //Ԥִ��SQL��䣬�ɷ�ֹSQLע��
		return $this->sth->execute($values); //ִ��SQL���
	}
	/**
	 * �õ�����SELECT���ִ�к�����ݼ�
	 *
	 */
	function get_all($sql,$values = array()){
		$this->sth = $this->execute($sql,$values);
		return $this->sth->fetchALl();
	}
	/**
	 * �õ�һ��SELECT���ִ�к�����ݼ�
	 *
	 */
	function get_one($sql,$values = array()){
		$this->execute($sql,$values);
		return $this->sth->fetch();
	}
	/**
	 * ȡ�ü�¼�е���ֵ
	 *
	 */
	function get_col($sql,$values = array(), $column_number=0){
		$this->execute($sql,$values);
		return $this->sth->fetchColumn($column_number);
	}
	/**
	 * �����ݱ��в�������
	 */
	function insert($table,$data){
		$fields = array_keys($data);
		$marks = array_fill(0,count($fields),'?');
		$sql = "INSERT INTO $table (`".implode('`,`',$fields)."`) VALUES (".implode(",",$marks).")";
		return $this->execute($sql,array_values($data));
	}
	/**
	 * ��������
	 */
	function update($table,$data,$where){
		$values = $bits = $wheres = array(); 	//��������
		foreach( $data as $k=>$v){           	//ѭ��������Ҫ����������
			$bits[] = "`$k` = ?";
			$values[]= $v;
		}

		if(is_array($where)){
			foreach($where as $c => $v){
				$wheres = "$c = ?";
				$values = $v;
			}
		}else{
			return false;
		}
		$sql = "UPDATE $table SET ".implode(', ',$bits).' WHERE '.implode(' AND ',$wheres);
		return $this->execute($sql,$values);
	}
	/**
	 * ɾ������
	 */
	function delete($table,$field,$where){
		if(empty($where)){
			return false;
		}
		//Ԥִ��ɾ�����
		$this->sth = $this->prepare("DELETE FROM $table WHERE $field = ?");

		if(is_array($where)){
			foreach($where as $key => $val){
				$this->sth->execute(array($val));
			}
		}else{
			$this->sth->execute(array($where));
		}
	}

	/**
	 * �����ݱ�����SQL���
	 */
	function table2sql($table){
		$sql = array();
		$sql[] = "DROP TABLE IF EXISTS `{$table}`;\n"; //���������ɾ�������ݱ�
		$create_table = $this->get_one('SHOW CREATE TABLE '.$table); //���ر�ṹ��SQL���
		$sql[] = $create_table[1].";\n\n"; //��������������ʱ������
		return implode('',$sql);
	}
	function dump_sql(){
		$sql = array();
		foreach($this->query('SHOW TABLES') as $row){
			$sql[] = $this->data2sql($row[0]);
		}
		return implode('',$sql);
	}

}
?>
