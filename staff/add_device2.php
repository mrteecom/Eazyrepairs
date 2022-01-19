<?php
include "../chksession_user.php";
require "../inc/connect.php"; //เชื่อมต่อฐานข้อมูล
//include "h.php";
//include "navbar.php";
$id_cus = $_GET[id_cus];
$type_dev = $_POST[type_dev];
$class_dev = $_POST[class_dev];
$sub_class_dev = $_POST[sub_class_dev];
$ot_class_dev = $_POST[ot_class_dev];
$color_dev = $_POST[color_dev];
$imei_dev = $_POST[imei_dev];
$serial_dev = $_POST[serial_dev];
$datetime = date('Y-m-d');

$id =$_GET[id];
$status =$_GET[status];
echo "$sess_idshop// $id_cus // <br> $type_dev// $class_dev //$sub_class_dev // $ot_class_dev  <br> $color_dev //  ";

        $sql3="select * from type where id_type= $type_dev ";
        $result3=mysql_db_query($dbname,$sql3);
        $r3 = mysql_fetch_array($result3);
            $type_name = $r3[type_name];

        $sql4="select * from class where id_class= $class_dev ";
        $result4=mysql_db_query($dbname,$sql4);
        $r4 = mysql_fetch_array($result4);
            $class_name = $r4[class_name];

        $sql5="select * from sub_class where id_sc= $sub_class_dev ";
        $result5=mysql_db_query($dbname,$sql5);
        $r5 = mysql_fetch_array($result5);
            $sc_name = $r5[sc_name];

if($sub_class_dev==0){
	$sub_class_dev2 = $ot_class_dev;
}else{
	$sub_class_dev2 = $sc_name;
}
echo "<br> $type_name // $class_name // $sc_name // $sub_class_dev2";

	$sql="insert into device values('','$id_cus','$sess_idshop','$type_name','$class_name','$sub_class_dev2','$color_dev','$imei_dev','$serial_dev','$datetime')";
	$result=mysql_db_query($dbname,$sql);
	if ($result) {
		$name = $_SESSION[sess_username] ;
		$status= "CreateDevice_$sess_idshop_$id_cus \r\n";
		include "../savelog.php";
		savelog($name,$status);	
		echo"<script type='text/javascript'>window.location.href = 'main_device.php?id_cus=$id_cus';</script> ";

	} else {
		echo "<h3>ไม่สามารถสมัครเป็นสมาชิกได้</h3>"; exit();
	}

mysql_close();
?>