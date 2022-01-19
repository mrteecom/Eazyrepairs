<?php
include "../chksession_user.php";
require "../inc/connect.php"; //เชื่อมต่อฐานข้อมูล//include "h.php";
//include "navbar.php";
date_default_timezone_set("Asia/Bangkok");
session_start();
$bank_pay = $_POST[bank_pay];
$date_pay = $_POST[date_pay];
$file_pay = $_FILES[file_pay][tmp_name];
$file_pay_name = $_FILES[file_pay][name];

$id_pay = $_GET[id_pay];;
$status_pay=1;

$datetime = date('Y-m-d h:i:s');

echo "$bank_pay // $date_pay // $file_pay_name ";
require "../inc/connect.php"; //เชื่อมต่อฐานข้อมูล



///////////////-----การจัดการไฟล์ slip -----///////////////

if ($file_pay) {
	$array_last=explode(".",$file_pay_name);
	$c=count($array_last)-1; 
	$lastname=strtolower($array_last[$c]) ;
	if($lastname=="jpg" or $lastname=="jpeg" or $lastname=="png"){
		$file_pay_name1=$id_pay.'_'.$bank_pay.'.'.$lastname ;		
		copy($file_pay,"pay/".$file_pay_name1);
	}else{
		echo "<h3>ERROR : ไม่สามารถ Upload ไฟล์หลักฐานได้ครับ </h3>";
	}//end if
	unlink($file_pay);
}//end if


///////////////-----บทความลงฐานข้อมูล-----///////////////


	$sql="update pay set bank_pay='$bank_pay', date_pay='$date_pay', file_pay='$file_pay_name1',status_pay='1',datesave='$datetime' where id_pay='$id_pay' ";
	$result=mysql_db_query($dbname,$sql);
	if($result) { 
		
		$name = $file_pay_name1 ;
		$status= "AddSlipPay_$id_pay \r\n";
		include "../savelog.php";
		savelog($name,$status);	
		echo"<script type='text/javascript'>window.location.href = 'main_shop.php';</script> ";
	
	} else {
		echo "<h3>ไม่สามารถบันทึกข้อมูลได้ครับ</h3>";
	}

mysql_close();

?>
