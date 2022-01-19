<?php
include "../chksession_user.php";
//clude "h.php";
//include "navbar.php";
include "../inc/connect.php"; //เชื่อมต่อฐานข้อมูล
$id_devi = $_GET[id_devi];
$id_cus = $_GET[id_cus];
$id_sp = $_GET[id_sp];
$id_sf = $_SESSION[sess_idsf];

$detail_ser = $_POST[detail_ser];
$sick_ser = $_POST[sick_ser];
$device_ser = $_POST[device_ser];
$otherd_ser = $_POST[otherd_ser];
$other_ser = $_POST[other_ser];
$price_ser = $_POST[price_ser];
$datee_ser = $_POST[datee_ser];
$datetime = date('Y-m-d'); //ปีเดือนrenumber  202012re001

$num_re = "IP000";
$sql2 = "select code_ser from service where id_sp ='$id_sp' ";
$result2=mysql_db_query($dbname,$sql2);
while($r2 = mysql_fetch_array($result2)){
      $num_re++;
}//end while

$num_re++;

$code_ser = date('Ym').'SH'.$id_sp.$num_re ;


//echo "$id_devi / $id_cus / $id_sp / $id_sf / $datee_ser / $code_ser"; 

$sql="insert into service values('','$id_devi','$id_cus','$id_sp','$id_sf','$code_ser','','$detail_ser','$sick_ser','$device_ser','$otherd_ser','$other_ser','$price_ser','','$price_ser','$datetime','$datee_ser','','1')";
$result=mysql_db_query($dbname,$sql);
    if ($result) {
        $name = $_SESSION[sess_username] ;
        $status= "CreateService_$id_sp_$id_cus \r\n";
        include "../savelog.php";
        savelog($name,$status); 
        echo"<script type='text/javascript'>window.location.href = 'main_repair.php';</script> ";
       // echo"<script type='text/javascript'>window.location.href = 'add_repair.php?id_cus=$id_cus&id_devi=$id_devi';</script> ";

    } else {
        echo "<h3>ไม่สามารถบันทึกใบแจ้งซ่อมได้ครับ</h3>";
    }

mysql_close();
?>