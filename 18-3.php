<?php
	class People{
		public $name = '����';
		public $age = 30;

		function intro(){
			return "�����ǣ�{$this->name}������{$this->age}�ꡣ\r\n";
		}
	}

	$people = new People();
	echo '<pre>';
	print_r($people->intro());
	echo '</pre>';
?>
