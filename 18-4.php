<b>People��Ĺ��캯��</b><hr />
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
		return "���ֽУ�{$this->name}������{$this->age}�ꡣ\r\n";
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
