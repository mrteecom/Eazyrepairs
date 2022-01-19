<?php
include "../chksession_user.php";
require "../inc/connect.php"; //เชื่อมต่อฐานข้อมูล
include "h.php";
//include "navbar.php";
$id_devi = $_GET[id_devi];
$id_cus = $_GET[id_cus];
$id_ser = $_GET[id_ser];
//echo "$sess_idshop";

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
//---------------------------ข้อมูลลูกค้า---------------------------------//

if($prov_add){
	$prov_add = $name_th_pro ; $amp_add = $name_th_amp; $dis_add = $name_th_dis;
	$sql="update customer set  cus_pro= '$prov_add', cus_ampher= '$amp_add', cus_dis= '$dis_add' where id_cus='$id_cus' ";
	$result=mysql_db_query($dbname,$sql);
}

$fname_cus = $_POST[fname_cus];
$lname_cus = $_POST[lname_cus];
$add_cus = $_POST[add_cus];
$post_add = $_POST[post_add];
$phone_cus = $_POST[phone_cus];
$email_cus = $_POST[email_cus];
$fb_cus = $_POST[fb_cus];
$line_cus = $_POST[line_cus];

$sql2="update customer set cus_fname='$fname_cus', cus_add='$add_cus', cus_lname='$lname_cus', cus_pos='$post_add', cus_phone='$phone_cus', cus_email='$email_cus', cus_fb='$fb_cus', cus_line='$line_cus' where id_cus='$id_cus' ";
$result2=mysql_db_query($dbname,$sql2);


//---------------------------ข้อมูลอุปกรณื---------------------------------//

$type_dev = $_POST[type_dev];
$class_dev = $_POST[class_dev];
$sub_class_dev = $_POST[sub_class_dev];
$type_dev1 = $_POST[type_dev1];
$class_dev1 = $_POST[class_dev1];
$sub_class_dev1 = $_POST[sub_class_dev1];
$ot_class_dev = $_POST[ot_class_dev];

//echo "$sub_class_dev1 // $sub_class_dev";

    $sql7="select * from type where id_type= '$type_dev' ";
    $result7=mysql_db_query($dbname,$sql7);
    $r7 = mysql_fetch_array($result7);
        $type_name = $r7[type_name];

    $sql8="select * from class where id_class= '$class_dev' ";
    $result8=mysql_db_query($dbname,$sql8);
    $r8 = mysql_fetch_array($result8);
        $class_name = $r8[class_name];

    $sql9="select * from sub_class where id_sc= '$sub_class_dev' ";
    $result9=mysql_db_query($dbname,$sql9);
    $r9 = mysql_fetch_array($result9);
        $sc_name = $r9[sc_name];

    if($sub_class_dev==0){
        $sub_class_dev2 = $ot_class_dev;
    }else{
        $sub_class_dev2 = $sc_name;
    }

    /*
if($type_dev){
	//$prov_add = $type_name ; $amp_add = $name_th_amp; $dis_add = $name_th_dis;
	$sql6="update device set  devi_type= '$type_name', devi_class= '$class_name', devi_sub_class= '$sub_class_dev2' where id_devi='$id_devi' ";
	$result6=mysql_db_query($dbname,$sql6);
}*/
$ram_dev = $_POST[ram_dev];
$color_dev = $_POST[color_dev];
$imei_dev = $_POST[imei_dev];
$serial_dev = $_POST[serial_dev];
$datetime = date('Y-m-d H:i:s');
//echo "<br>$type_name//$class_name//$sub_class_dev2 <br>";

if(!$id_devi){
	$max_dev = mysql_query("select max(id_devi) from device");
	$total_max_dev = mysql_result($max_dev,0);
	$id_dev=$total_max_dev+1;
	//echo "$id_dev<br>";

	$sql16="insert into device values('$id_dev','$id_cus','$sess_idshop','$type_name','$class_name','$sub_class_dev2','$ram_dev','$color_dev','$imei_dev','$serial_dev','1','$datetime')";
	$result16=mysql_db_query($dbname,$sql16);

	$sql12="select * from device where id_sp='$sess_idshop' and id_cus='$id_cus' ";
	$result12=mysql_db_query($dbname,$sql12);
	while($r12 = mysql_fetch_array($result12)){
      $id_devi=$r12[id_devi];
     }

}else{
	$sql10="update device set devi_ram='$ram_dev', devi_color='$color_dev', devi_imei='$imei_dev', devi_serial_no='$serial_dev' where id_devi='$id_devi' ";
	$result10=mysql_db_query($dbname,$sql10);
	
}


//---------------------------อาการเสีย---------------------------------//
$detail_ser = $_POST[detail_ser];
$sick_ser = $_POST[sick_ser];
$device_ser = $_POST[device_ser];
$otherd_ser = $_POST[otherd_ser];
$other_ser = $_POST[other_ser];
$price_ser = $_POST[price_ser];
$vat_ser = $_POST[vat_ser];
$sum_ser = $_POST[sum_ser];
$datee_ser = $_POST[datee_ser];
$tech_ser = $_POST[tech_ser];
//echo "$datee_ser //  $tech_ser";

echo "$id_ser / $price_ser1 / $price_ser2 / $price_ser3 / $other_ser / $datee_ser /$stu/$sick_ser";
//require_once('report.php'); //ยังไม่เปิดหน้าต่างใหม่ในการพิมพ์  และยังไม่ส่งเมล์


if($id_ser){
	$sql11="update service set ser_detail='$detail_ser',ser_sick='$sick_ser',ser_device='$device_ser',ser_ortherd='$otherd_ser',ser_orther='$other_ser', ser_price='$price_ser', ser_price2='$vat_ser', ser_netprice='$sum_ser', ser_date_e='$datee_ser',ser_tech='$tech_ser' where id_ser='$id_ser' ";
}else{

$num_re = "IP000";
    $sql18 = "select code_ser from service where id_sp ='$sess_idshop' ";
    $result18=mysql_db_query($dbname,$sql18);
    while($r18 = mysql_fetch_array($result18)){
          $num_re++;
    }//end while

$num_re++;
$code_ser = date('Ym').'SH'.$sess_idshop.$num_re ;

$max_ser = mysql_query("select max(id_ser) from service");
$total_max_ser = mysql_result($max_ser,0);
$id_sers=$total_max_ser+1;
$id=0;
	$sql11="insert into service values('$id_sers','$id_devi','$id_cus','$id_sp','0','$code_ser','$id','$detail_ser','$sick_ser','$device_ser','$otherd_ser','$other_ser','$price_ser','$vat_ser','$sum_ser','$datetime','$datee_ser','2000-01-01 00:00:00','1','$tech_ser')";
}

	$result11=mysql_db_query($dbname,$sql11);
	
	$sql12="select * from service where id_sp='$sess_idshop' and id_cus='$id_cus' and id_devi='$id_devi' ";
	$result12=mysql_db_query($dbname,$sql12);
	while($r12 = mysql_fetch_array($result12)){
      $id_ser=$r12[id_ser];
     }

	if ($result11) {
		$name = $_SESSION[sess_username] ;
		$status= "UpdateDevice_$id_devi \r\n";
		include "../savelog.php";
		savelog($name,$status);		
//echo "//$id_ser";
		//echo"<script type='text/javascript'>window.location.href = 'report.php?id_ser=$id_ser&id_cus=$id_cus';</script>";
	} else {
		echo "<h3>ไม่สามารถอัพเดทข้อมูลได้</h3>"; exit();
	}

		
		echo"<script type='text/javascript'>window.location.href = 'repair.php?id_ser=$id_ser&id_cus=$id_cus&id_devi=$id_devi';</script> ";
		
mysql_close();
?>