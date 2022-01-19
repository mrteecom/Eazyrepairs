<?php
include "../chksession_user.php";
require "../inc/connect.php"; //เชื่อมต่อฐานข้อมูล
require "../inc/connect2.php"; //เชื่อมต่อฐานข้อมูล
include "h.php";
//include "navbar.php";
$id_sp = $sess_idshop;

$name_sp = $_POST[name_sp];
$tax_sp = $_POST[tax_sp];
$add_sp = $_POST[add_sp];

$pro_sp = $_POST[pro_sp];
$prov_add = $_POST[province];

$amp_sp = $_POST[amp_sp];
$amp_add = $_POST[amphur];

$dis_sp = $_POST[dis_sp];
$dis_add = $_POST[district];

$post_add = $_POST[post_add];
$phone_sp = $_POST[phone_sp];
$email_sp = $_POST[email_sp];
$fb_sp = $_POST[fb_sp];
$line_sp = $_POST[line_sp];
$logo=$_FILES['file_logo']['tmp_name'];
$logo_name=$_FILES['file_logo']['name'];
$datetime = date('Ymd_His');

/*
echo "$add_sp // $pro_sp // $prov_add // $amp_sp // $amp_add // $dis_sp // $dis_add  // $post_add <br>";
echo "$pro / $amp / $dis";
*/
if ($logo) {	
	$array_last=explode(".",$logo_name);
	$c=count($array_last)-1; 
	$lastname=strtolower($array_last[$c]) ;
		if ($lastname=="png") {
			$logo_name1 = $sess_idshop.'_'.$name_sp.'_'.$datetime.'.'.$lastname;
			copy($logo,"images/".$logo_name1);			
			$sql2="update shop set sp_logo ='$logo_name1' where id_sp='$id_sp' ";
			$result2=mysql_db_query($dbname,$sql2);
			if ($result2) {		
			$name = $_SESSION[sess_username] ;
			$status= "UpdateShop \r\n";
			include "../savelog.php";
			savelog($name,$status);	
			echo"<script type='text/javascript'>window.location.href = 'edit_shop.php';</script> ";
			} else {
				echo "<h3>ไม่สามารถอัพเดทข้อมูลร้านค้าได้</h3>"; 
			}

		} else{
			echo "<h3>ERROR : เฉพาะรูปภาพนามสกุล *.png เท่านั้นครับ</h3>";  exit();
		}

} 
//echo "$name_sp //$sess_idshop // $logo_name //$logo_name1 ";

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
	$sql="update add_sp set  pro_sp= '$prov_add', ampher_sp= '$amp_add', dis_sp= '$dis_add' where id_sp='$id_sp' ";
	$result=mysql_db_query($dbname,$sql);
}

//echo "$pass_sp // $id_sp";
if($_POST[pass_sp]){
	$pass_sp = md5($_POST[pass_sp]);
	$sql2="update staff set sf_pass='$pass_sp' where id_sp='$id_sp' ";
	$result2=mysql_db_query($dbname,$sql2);

}

	$sql4="update shop set sp_name='$name_sp', sp_tax= '$tax_sp' where id_sp='$id_sp' ";
	$result4=mysql_db_query($dbname,$sql4);

	$sql3="update add_sp set sp_add = '$add_sp', pos_sp = '$post_add', sp_phone ='$phone_sp', sp_email= '$email_sp', sp_fb ='$fb_sp', sp_line= '$line_sp' where id_sp='$id_sp' ";

	$result3=mysql_db_query($dbname,$sql3);


if ($result or $result2 or $result3 or $result4) {		
		$name = $_SESSION[sess_username] ;
		$status= "UpdateShop \r\n";
		include "../savelog.php";
		savelog($name,$status);	
		echo"<script type='text/javascript'>window.location.href = 'edit_shop.php';</script> ";
		
		
	} else {
		echo "<h3>ไม่สามารถอัพเดทข้อมูลร้านค้าได้</h3>";
	}
mysql_close();
?>