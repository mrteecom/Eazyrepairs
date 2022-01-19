<?php
include "../chksession_user.php";
require "../inc/connect.php"; //เชื่อมต่อฐานข้อมูล
require "../inc/connect2.php"; //เชื่อมต่อฐานข้อมูล

//include "h.php";
//include "navbar.php";
$id_cus = $_GET[id_cus];
$fname_cus = $_POST[fname_cus];
$lname_cus = $_POST[lname_cus];
$add_cus = $_POST[add_cus];

$pro_sp = $_POST[pro_sp];
$prov_cus = $_POST[province];

$amp_sp = $_POST[amp_sp];
$amp_cus = $_POST[amphur];

$dis_sp = $_POST[dis_sp];
$dis_cus = $_POST[district];

$pos_cus = $_POST[pos_cus];
$phone_cus = $_POST[phone_cus];
$email_cus = $_POST[email_cus];
$fb_cus = $_POST[fb_cus];
$line_cus = $_POST[line_cus];
//$datetime = date('Y-m-d');


echo "$id_cus // $fname_cus // $prov_cus // $pro_sp //$amp_cus // $amp_sp // $dis_cus // $dis_sp";

if($prov_cus){
	$sql="update customer set  cus_pro= '$prov_cus', cus_ampher= '$amp_cus', cus_dis= '$dis_cus' where id_cus='$id_cus' ";
	$result=mysql_db_query($dbname,$sql);
}
	$sql2="update customer set cus_fname='$fname_cus', cus_add='$add_cus', cus_lname='$lname_cus', cus_pos='$pos_cus', cus_phone='$phone_cus', cus_email='$email_cus', cus_fb='$fb_cus', cus_line='$line_cus' where id_cus='$id_cus' ";
	$result2=mysql_db_query($dbname,$sql2);

	
	if ($result or $result2) {
		$name = $_SESSION[sess_username] ;
		$status= "UpdateCustomer \r\n";
		include "../savelog.php";
		savelog($name,$status);	
		echo"<script type='text/javascript'>window.location.href = 'edit_cus.php?id=$id_cus';</script> ";
				
	} else {
		echo "<h3>ไม่สามารถบันทึกข้อมูลได้</h3>";
	}

mysql_close();
?>