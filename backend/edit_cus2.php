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
$prov_add = $_POST[province];

$amp_sp = $_POST[amp_sp];
$amp_add = $_POST[amphur];

$dis_sp = $_POST[dis_sp];
$dis_add = $_POST[district];


$sql3="select * from  provinces where id ='$prov_add' ";
$result3=mysql_db_query($dbname,$sql3);
$r3 = mysql_fetch_array($result3);
$name_th_pro=$r3[name_th];

$sql4="select * from amphures where id ='$amp_add' ";
$result4=mysql_db_query($dbname,$sql4);
$r4 = mysql_fetch_array($result4);
$name_th_amp=$r4[name_th];

$sql5="select * from districts where id ='$dis_add' ";
$result5=mysql_db_query($dbname,$sql5);
$r5 = mysql_fetch_array($result5);
$name_th_dis=$r5[name_th];

if($prov_add){
	$prov_add = $name_th_pro ; $amp_add = $name_th_amp; $dis_add = $name_th_dis;
	$sql="update customer set  cus_pro= '$prov_add', cus_ampher= '$amp_add', cus_dis= '$dis_add' where id_cus='$id_cus' ";
	$result=mysql_db_query($dbname,$sql);
}


$post_add = $_POST[post_add];
$phone_cus = $_POST[phone_cus];
$email_cus = $_POST[email_cus];
$fb_cus = $_POST[fb_cus];
$line_cus = $_POST[line_cus];
//$datetime = date('Y-m-d');


//echo "$id_cus // $fname_cus // $prov_cus // $pro_sp //$amp_cus // $amp_sp // $dis_cus // $dis_sp";


	$sql2="update customer set cus_fname='$fname_cus', cus_add='$add_cus', cus_lname='$lname_cus', cus_pos='$post_add', cus_phone='$phone_cus', cus_email='$email_cus', cus_fb='$fb_cus', cus_line='$line_cus' where id_cus='$id_cus' ";
	$result2=mysql_db_query($dbname,$sql2);

	
	if ($result or $result2) {
		$name = $_SESSION[sess_username] ;
		$status= "UpdateCustomer \r\n";
		include "../savelog.php";
		savelog($name,$status);	
		echo"<script type='text/javascript'>window.location.href = 'main_customer.php';</script> ";
				
	} else {
		echo "<h3>ไม่สามารถบันทึกข้อมูลได้</h3>";
	}

mysql_close();
?>