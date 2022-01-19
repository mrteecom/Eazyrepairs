<?php
include "../chksession_user.php";
require "../inc/connect.php"; //เชื่อมต่อฐานข้อมูล
//include "h.php";
//include "navbar.php";
$id_sp = $_GET[id_sp];
$fname_cus = $_POST[fname_cus];
$lname_cus = $_POST[lname_cus];
$add_cus = $_POST[add_cus];
$prov_add = $_POST[province];
$amp_add = $_POST[amphur];
$dis_add = $_POST[district];
$post_add = $_POST[post_add];
$phone_cus = $_POST[phone_cus];
$email_cus = $_POST[email_cus];
$fb_cus = $_POST[fb_cus];
$line_cus = $_POST[line_cus];
$datetime = date('Y-m-d');


echo "$id_sp // $fname_cus";


	$sql="insert into customer values('','$id_sp','$fname_cus','$lname_cus','$add_cus','$prov_add','$amp_add','$dis_add','$post_add','$phone_cus','$email_cus','$fb_cus','$line_cus','$datetime')";
	$result=mysql_db_query($dbname,$sql);
	if ($result) {
		$name = $_SESSION[sess_username] ;
		$status= "CreateCustomer \r\n";
		include "../savelog.php";
		savelog($name,$status);	
		echo"<script type='text/javascript'>window.location.href = 'main_customer.php';</script> ";
		
		
	} else {
		echo "<h3>ไม่สามารถสมัครเป็นสมาชิกได้</h3>";
	}

mysql_close();
?>