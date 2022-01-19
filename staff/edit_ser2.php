<?php
include "../chksession_user.php";
require "../inc/connect.php"; //เชื่อมต่อฐานข้อมูล
//include "h.php";
//include "navbar.php";
$id_ser = $_GET[id_ser];
$id_cus =$_GET[id_cus];
/*$id_sp =$_GET[id_sp];
$type_dev = $_POST[type_dev];
$ban_dev = $_POST[ban_dev];
$class_dev = $_POST[class_dev];*/
$other_ser = $_POST[other_ser];
$price_ser1 = $_POST[price_ser1];
$price_ser2 = $_POST[price_ser2];
$price_ser3 = $price_ser1 + $price_ser2 ;
$datee_ser = $_POST[datee_ser];
$stu =$_GET[stu];
//$datetime = date('Y-m-d');

$datetime2 = date('Y-m-d H:i:s');
//echo "$datetime2 / $id_ser //$stu "; exit();

if($stu == 2){
	$sql3="update service set ser_date_re ='$datetime2' where id_ser='$id_ser'  ";
	$result3=mysql_db_query($dbname,$sql3);
}


//echo "$id_ser / $price_ser1 / $price_ser2 / $price_ser3 / $other_ser / $datee_ser /$stu";
//require_once('report.php'); //ยังไม่เปิดหน้าต่างใหม่ในการพิมพ์  และยังไม่ส่งเมล์

	$sql="update service set ser_price2='$price_ser2', ser_netprice='$price_ser3', ser_orther='$other_ser', ser_date_e='$datee_ser',ser_status='$stu' where id_ser='$id_ser' ";
	$result=mysql_db_query($dbname,$sql);
	if ($result) {
		$name = $_SESSION[sess_username] ;
		$status= "UpdateDevice_$id_devi \r\n";
		include "../savelog.php";
		savelog($name,$status);			
		
	} else {
		echo "<h3>ไม่สามารถอัพเดทข้อมูลได้</h3>"; exit();
	}


		echo"<script type='text/javascript'>window.location.href = 'main_repair2.php';</script> ";
		
mysql_close();
?>