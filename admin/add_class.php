<?php
include "../chksession_user.php";
require "../inc/connect.php"; 
include "h.php";
$type = $_POST[type_name];
$class = $_POST[class_name];

	$sql="INSERT INTO class (id_class,id_type,class_name,status) values ('0','$type','$class','1') ";

	$result=mysql_db_query($dbname,$sql);

	print_r($sql.$dbname);
	die();

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