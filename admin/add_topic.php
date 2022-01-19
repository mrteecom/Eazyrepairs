<?php
include "../chksession_user.php";
require "../inc/connect.php"; //เชื่อมต่อฐานข้อมูล
include "h.php";
//include "navbar.php";

$class_name = $_REQUEST['type_name'];
$sub_class = $_REQUEST['topic'];

echo "$class_name //$sub_class";


	$sql="INSERT INTO topic values('0','$class_name','$sub_class') ";
	$result=mysql_db_query($dbname,$sql);
	if ($result) {
        
        echo ("<script language='JavaScript'>
		alert('เพิ่มข้อมูลเรียบร้อยแล้ว');
		window.location.href='topic.php';
		</script>");
		
		
	} else {
        echo ("<script language='JavaScript'>
		alert('ไม่สามารถเพิ่มข้อมูลได้ครับ');
		window.location.href='topic.php';
		</script>");

	}


mysql_close();

?>