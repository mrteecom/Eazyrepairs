<?php
include "../chksession_user.php";
require "../inc/connect.php"; //เชื่อมต่อฐานข้อมูล
include "h.php";
//include "navbar.php";

$class_name = $_REQUEST['class_dev'];
$sub_class = $_REQUEST['sub_class_dev'];

echo "$class_name //$sub_class";


	$sql="INSERT INTO sub_class values('0','$class_name','$sub_class') ";
	$result=mysql_db_query($dbname,$sql);
	if ($result) {
        
        echo ("<script language='JavaScript'>
		alert('เพิ่มข้อมูลเรียบร้อยแล้ว');
		window.location.href='type.php';
		</script>");
		
		
	} else {
        echo ("<script language='JavaScript'>
		alert('ไม่สามารถเปลี่ยนสถานะของร้านค้าได้ครับ');
		window.location.href='type.php';
		</script>");

	}


mysql_close();

?>