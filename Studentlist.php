<?php
header("Content-Type:text/html;charset=utf-8");
include("Student.php");
?>

<html>
<head>
<title>学生列表信息</title>
</head>
<body bgcolor="#FFFFFF" text="#000000" link="#FF9966" vlink="#FF9966" alink="#FFCC99">
<b>学生列表信息</b>
<hr />
<?php
	$stu = new Student();
	$studentList = $stu->getStudentList();
	foreach($studentList as $list){
		?>
	echo '编号：'.$list['stunum'].'<br />';
	echo '姓名：'.$list['stuname'].'<br />';
	echo '年龄：'.$list['stuage'].'<br />';
	echo '性别：'.$sex = $list['stusex']==1?"男":"女";;
	echo '<br />年纪：'.$list['stuclass'].'<br />';
	echo "<a href='Studentup.php?uid=$list[0]'>修改</a>   ";
	echo "<a href='Studentdel.php?uid=$list[0]'>删除</a>";
	echo '<hr />';

}
?>
<hr />
</body>
</html>

