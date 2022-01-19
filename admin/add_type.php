<?php
include "../chksession_user.php";
require "../inc/connect.php"; //เชื่อมต่อฐานข้อมูล
include "h.php";
//include "navbar.php";

$type = $_REQUEST[type_name];



	$sql="INSERT INTO type values('0','$type','1','') ";
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