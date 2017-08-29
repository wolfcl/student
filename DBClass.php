<?php
/**
 * 数据处理类
 */
class DBClass extends PDO{
	var $sth;
	function execute($sql,$values=array()){
		$this->sth = $this->prepare($sql); //预执行SQL语句，可防止SQL注入
		return $this->sth->execute($values); //执行SQL语句
	}
	/**
	 * 得到所有SELECT语句执行后的数据集
	 *
	 */
	function get_all($sql,$values = array()){
		$this->execute($sql,$values);
		return $this->sth->fetchAll();
	}
	/**
	 * 得到一条SELECT语句执行后的数据集
	 *
	 */
	function get_one($sql,$values = array()){
		$this->execute($sql,$values);
		return $this->sth->fetch();
	}
	/**
	 * 取得记录中的列值
	 *
	 */
	function get_col($sql,$values = array(), $column_number=0){
		$this->execute($sql,$values);
		return $this->sth->fetchColumn($column_number);
	}
	/**
	 * 向数据表中插入数据
	 */
	function insert($table,$data){
		$fields = array_keys($data);
		$marks = array_fill(0,count($fields),'?');
		$sql = "INSERT INTO $table (`".implode('`,`',$fields)."`) VALUES (".implode(",",$marks).")";
		return $this->execute($sql,array_values($data));
	}
	/**
	 * 更新数据
	 */
	function update($table,$data,$where){
		$values = $bits = $wheres = array(); 	//建立数据
		foreach( $data as $k=>$v){           	//循环构建需要的条件参数
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
	 * 删除数据
	 */
	function delete($table,$field,$where){
		if(empty($where)){
			return false;
		}
		//预执行删除语句
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
	 * 将数据表导出成SQL语句
	 */
	function table2sql($table){
		$sql = array();
		$sql[] = "DROP TABLE IF EXISTS `{$table}`;\n"; //如果存在则删除该数据表
		$create_table = $this->get_one('SHOW CREATE TABLE '.$table); //返回表结构的SQL语句
		$sql[] = $create_table[1].";\n\n"; //将如上语句存入临时数组中
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
