<?php
include "../chksession_user.php";
require "../inc/connect.php"; //เชื่อมต่อฐานข้อมูล
include "h.php";
//include "navbar.php";
/*
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

*/
$id_sp = $sess_idshop;
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


    $sql13="select * from  provinces where id ='$prov_add' ";
    $result13=mysql_db_query($dbname,$sql13);
    $r13 = mysql_fetch_array($result13);
        $name_th_pro=$r13[name_th];
    $sql14="select * from amphures where id ='$amp_add' ";
    $result14=mysql_db_query($dbname,$sql14);
    $r14 = mysql_fetch_array($result14);
        $name_th_amp=$r14[name_th];
    $sql15="select * from districts where id ='$dis_add' ";
    $result15=mysql_db_query($dbname,$sql15);
    $r15 = mysql_fetch_array($result15);
        $name_th_dis=$r15[name_th];


echo "$id_sp // $fname_cus // $lname_cus <br>";
echo "$name_th_pro // $name_th_amp // $name_th_dis<br>";

	$sql3="select * from customer where id_sp='$id_sp' and cus_fname = '$fname_cus'  and  cus_lname = '$lname_cus' ";
	$result3=mysql_db_query($dbname,$sql3);
	$num=mysql_num_rows($result3);
	if($num) {
		$r3 = mysql_fetch_array($result3);
		$id_cus=$r3[id_cus];
		echo"<script type='text/javascript'>window.location.href = 'main_device.php?id_cus=$id_cus';</script> ";
		//echo "มีข้อมูลลูกค้าซ้ำในระบบนะครับ";  exit();
	}else{
		$id=0;
	$sql="insert into customer values('$id','$id_sp','$fname_cus','$lname_cus','$add_cus','$name_th_pro','$name_th_amp','$name_th_dis','$post_add','$phone_cus','$email_cus','$fb_cus','$line_cus','$datetime')";
    $result=mysql_db_query($dbname,$sql);
    print_r($sql);
		if ($result) {
			$name = $_SESSION[sess_username] ;
			$status= "CreateCustomer \r\n";
			include "../savelog.php";
			savelog($name,$status);	

			$sql2="select * from customer where id_sp='$id_sp' ";
			$result2=mysql_db_query($dbname,$sql2);
			while($r2 = mysql_fetch_array($result2)){
		      $id_cus=$r2[id_cus];
		     }//end while
		    // echo "$id_cus";
				echo"<script type='text/javascript'>window.location.href = 'add_repair4.php?id_cus=$id_cus';</script> ";
						
		} else {
				echo "<h3>ไม่สามารถสมัครเป็นสมาชิกได้</h3>";
		}
	}

mysql_close();
?>