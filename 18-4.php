<b>People类的构造函数</b><hr />
<?php
class People
{
	private $name = '';
	private $age = 0;

	function __construct($name,$age)
	{
		$this->name = $name;
		$this->age = $age;
	}

	function intro()
	{
		return "名字叫：{$this->name}，今年{$this->age}岁。\r\n";
	}
	function get_name()
	{
		return $this->name;
	}
	private function get_age()
	{
		return $this->age;
	}
}

	$people = new People('PHP',30);
	echo '<pre>';
	print_r($people->get_name());
	print_r($people->intro());
	echo '</pre>';
?>
