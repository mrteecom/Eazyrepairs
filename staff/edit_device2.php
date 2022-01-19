<?php
include "../chksession_user.php";
require "../inc/connect.php"; //เชื่อมต่อฐานข้อมูล
//include "h.php";
//include "navbar.php";
$id_cus = $_GET[id_cus];
$id_devi =$_GET[id_devi];
/*$type_dev = $_POST[type_dev];
$ban_dev = $_POST[ban_dev];
$class_dev = $_POST[class_dev];*/
$color_dev = $_POST[color_dev];
$imei_dev = $_POST[imei_dev];
$serial_dev = $_POST[serial_dev];
$datetime = date('Y-m-d');


$status =$_GET[status];
//echo "$id_cus // $type_dev//$sess_idshop ";

	$sql="update device set devi_color='$color_dev', devi_imei='$imei_dev', devi_serial_no='$serial_dev' where id_devi='$id_devi' ";
	$result=mysql_db_query($dbname,$sql);
	if ($result) {
		$name = $_SESSION[sess_username] ;
		$status= "UpdateDevice_$id_devi \r\n";
		include "../savelog.php";
		savelog($name,$status);	
		echo"<script type='text/javascript'>window.location.href = 'edit_device.php?id_devi=$id_devi';</script> ";
		
		
	} else {
		echo "<h3>ไม่สามารถอัพเดทข้อมูลได้</h3>";
	}

mysql_close();
?>