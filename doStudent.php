<?php
require_once ('Student.php');

$student = new Student();
if($_REQUST['act']=='userList'){
	$studentList = $student->getStudentList();
	return $studentList;
}else{
	echo "参数错误";
}
?>
