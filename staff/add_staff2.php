<?php
include "../chksession_user.php";
require "../inc/connect.php"; //เชื่อมต่อฐานข้อมูล
//include "h.php";
//include "navbar.php";
$id_sp = $_GET[id_sp];
$user_st = $_POST[user_st];
$pass_st = $_POST[pass_st];
$fname_st = $_POST[fname_st];
$lname_st = $_POST[lname_st];

$add_st = $_POST[add_st];
$prov_st = $_POST[province];
$amp_st = $_POST[amphur];
$dis_st = $_POST[district];
$post_st = $_POST[post_st];
$phone_st = $_POST[phone_st];

$datetime = date('Y-m-d');

$sql3="select * from  provinces where id ='$prov_st' ";
$result3=mysql_db_query($dbname,$sql3);
$r3 = mysql_fetch_array($result3);
$name_th_pro=$r3[name_th];

$sql4="select * from amphures where id ='$amp_st' ";
$result4=mysql_db_query($dbname,$sql4);
$r4 = mysql_fetch_array($result4);
$name_th_amp=$r4[name_th];

$sql5="select * from districts where id ='$dis_st' ";
$result5=mysql_db_query($dbname,$sql5);
$r5 = mysql_fetch_array($result5);
$name_th_dis=$r5[name_th];

$id =$_GET[id];
$status =$_GET[status];
//echo "$id_sp // $user_st";
if($status){
	$sql="update staff set sf_status= '$status' where id_sf='$id' ";
	$result=mysql_db_query($dbname,$sql);
	if ($result) {		
		$name = $_SESSION[sess_username] ;
		$status= "AddStaff_$id_sp \r\n";
		include "../savelog.php";
		savelog($name,$status);	
		echo"<script type='text/javascript'>window.location.href = 'main_staff.php';</script> ";
		
		
	} else {
		echo "<h3>ไม่สามารถอัพเดทข้อมูลช่างได้</h3>";
	}

}else{

	$sql="insert into staff values('','$id_sp','$fname_st','$lname_st','$user_st','$pass_st','$add_st','$name_th_pro','$name_th_amp','$name_th_dis','$post_st','$phone_st','$datetime','2')";
	$result=mysql_db_query($dbname,$sql);


	if ($result) {
		$name = $_SESSION[sess_username] ;
		$status= "CreateStaff \r\n";
		include "../savelog.php";
		savelog($name,$status);	
		echo"<script type='text/javascript'>window.location.href = 'main_staff.php';</script> ";
		
		
	} else {
		echo "<h3>ไม่สามารถสมัครเป็นสมาชิกได้</h3>";
	}
}//end if status
mysql_close();
?>