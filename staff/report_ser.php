<?php
include "../chksession_user.php";
//include "h.php";
//include "navbar.php";
include "../inc/connect.php"; //เชื่อมต่อฐานข้อมูล
$id_cus = $_GET[id_cus];
$id_ser = $_GET[id_ser];


echo "ใบรับซ่อมสินค้า <br>";
//echo "$id_cus//$id_ser//$sess_idshop";

 $sql="select * from  shop where id_sp='$sess_idshop' ";
    $result=mysql_db_query($dbname,$sql);
    $r3 = mysql_fetch_array($result);
      $id_sp=$r3[id_sp];
      $sp_name=$r3[sp_name];
      $sp_logo=$r3[sp_logo];
      $sp_tax=$r3[sp_tax];
      $sp_add=$r3[sp_add];
      $pro_sp=$r3[pro_sp];
      $ampher_sp=$r3[ampher_sp];
      $dis_sp=$r3[dis_sp];
      $pos_sp=$r3[pos_sp];
      $sp_phone=$r3[sp_phone];
      $sp_email=$r3[sp_email];
      $sp_fb=$r3[sp_fb];
      $sp_line=$r3[sp_line];

$sql="select * from customer inner join service on customer.id_cus = service.id_cus  join device on customer.id_cus = device.id_cus where customer.id_sp = $sess_idshop and service.id_ser = '$id_ser' ";
    $result=mysql_db_query($dbname,$sql);
    $r2 = mysql_fetch_array($result);
      $id_cus=$r2[id_cus];
      $id_ser=$r2[id_ser];
      $cus_fname=$r2[cus_fname];
      $cus_lname=$r2[cus_lname];
      $cus_add=$r2[cus_add];
      $cus_pro=$r2[cus_pro];
      $cus_ampher=$r2[cus_ampher];
      $cus_dis=$r2[cus_dis];
      $cus_pos=$r2[cus_pos];
      $cus_email=$r2[cus_email];
      $cus_phone=$r2[cus_phone];
      $ser_date_s=$r2[ser_date_s];
      $ser_date_e=$r2[ser_date_e];
      $devi_type=$r2[devi_type];    
      $devi_class=$r2[devi_class];
      $devi_sub_class=$r2[devi_sub_class];
      $devi_color=$r2[devi_color];
      $devi_iemi=$r2[devi_iemi];
      $devi_serial_no=$r2[devi_serial_no];
      $ser_detail =$r2[ser_detail];
      $ser_sick =$r2[ser_sick];
      $ser_device =$r2[ser_device];
      $ser_otherd =$r2[ser_otherd];
	  $ser_other =$r2[ser_other];
      $ser_price =$r2[ser_price];



echo "<img src='images/$sp_logo'  >   $sp_name  <BR> ";
echo "$sp_add / $pro_sp / $ampher_sp /$dis_sp /$pos_sp 					วันที่  $ser_date_s <br>";
echo " $sp_phone / $sp_email											ออกโดย  	$sess_idsf <br>";

echo "ชื่อลูกค้า $cus_fname $cus_lname				เบอร์   $cus_phone   <br>";

echo "ที่อยู่  $cus_add / $cus_dis / $cus_ampher / $cus_pro / $cus_pos  <br>";
echo "สินค้า   $devi_type		ยี่ห้อ 		$devi_class			รุ่น		$devi_sub_class   	<br>";
echo "สี		$devi_color		IEMI 	$devi_iemi			Serial 	$devi_serial_no	<br>";
echo "สภาพเครื่อง		$ser_detail	<br>";
echo "อาการเสีย		$ser_sick	<br>";
echo "อุปกรณ์ที่นำมาด้วย	$ser_device	<br>";
echo "อุปกรณ์อื่นๆ 		$ser_otherd	<br>";
echo "บันทึกเพิ่มเติม		$ser_other	<br>";
echo "ประเมินราคาซ่อม	$ser_price		วันนัดรับสินค้า  	$ser_date_e		<br>";
?>