<?php
	class People{
		public $name = '张三';
		public $age = 30;

		function intro(){
			return "名字是：{$this->name}，今年{$this->age}岁。\r\n";
		}
	}

	$people = new People();
	echo '<pre>';
	print_r($people->intro());
	echo '</pre>';
?>
