<?php
	class People{
		public $name = '����';
		public $age = '20';
	}

	$people1 = new People();
	$people2 = new People();
	$people1->name='С��';
	$people1->age=25;
	$people2->name="����";
	$people2->age=30;

	echo '<pre>';
	print_r($people1);
	print_r($people2);
	echo '</pre>';
?>
