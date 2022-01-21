<?php
include "../chksession_user.php";
require "../inc/connect.php"; //เชื่อมต่อฐานข้อมูล
//include "h.php";
//include "navbar.php";
$id_sf = $_GET[id_sf];
//$user_st = $_POST[user_st];
$pass_st = md5($_POST[pass_st]);
$fname_st = $_POST[fname_st];
$lname_st = $_POST[lname_st];
$add_st = $_POST[add_st];

$pro_st = $_POST[pro_st];
$prov_add = $_POST[province];

$amp_st = $_POST[amp_st];
$amp_add = $_POST[amphur];

$dis_st = $_POST[dis_st];
$dis_add = $_POST[district];
$pos_st = $_POST[pos_st];
$phone_st = $_POST[phone_st];

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
	$sql="update staff set  sf_pro= '$prov_add', sf_ampher= '$amp_add', sf_dis= '$dis_add' where id_sf='$id_sf' ";
	$result=mysql_db_query($dbname,$sql);
}

//echo "$user_st //$pass_st  //$fname_st  //$lname_st ";

$sql2="update staff set  sf_add='$add_st', sf_phone='$phone_st', sf_pos='$pos_st', sf_pass='$pass_st', sf_fname= '$fname_st', sf_lname = '$lname_st' where id_sf='$id_sf' ";
$result2=mysql_db_query($dbname,$sql2);


if ($result2 or $result) {		
		$name = $_SESSION[sess_username] ;
		$status= "UpdateStaff_$id_sf  \r\n";
		include "../savelog.php";
		savelog($name,$status);	
		echo"<script type='text/javascript'>window.location.href = 'edit_staff.php?id=$id_sf';</script> ";
		
		
	} else {
		echo "<h3>ไม่สามารถอัพเดทข้อมูลร้านค้าได้</h3>"; exit();
	}

mysql_close();
?>