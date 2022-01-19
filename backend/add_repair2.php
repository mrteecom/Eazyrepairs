<?php
include "../chksession_user.php";
include "h.php";
//include "navbar.php";
include "../inc/connect.php"; //เชื่อมต่อฐานข้อมูล
/*
$id_devi = $_GET[id_devi];
$id_cus = $_GET[id_cus];
$id_sp = $_GET[id_sp];
$id_sf = $_SESSION[sess_idsf];
*/
//---------------------ข้อมูลลูกค้า---------------------------/
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
$datetime = date('Y-m-d H:i:s');


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
  //     echo "$name_th_pro // $name_th_amp // $name_th_dis";
//echo "$sess_idshop//$fname_cus // $datetime";
$max = mysql_query("select max(id_cus) from customer");
echo $total_max = mysql_result($max,0);
$id_cus=$total_max+1;
        
    $sql="insert into customer values('$id_cus','$id_sp','$fname_cus','$lname_cus','$add_cus','$name_th_pro','$name_th_amp','$name_th_dis','$post_add','$phone_cus','$email_cus','$fb_cus','$line_cus','$datetime')";
    $result=mysql_db_query($dbname,$sql);

    if ($result) {
        $sql2="select * from customer where id_sp='$id_sp' ";
        $result2=mysql_db_query($dbname,$sql2);
            while($r2 = mysql_fetch_array($result2)){
              $id_cus=$r2[id_cus];
             }//end while

    } else {
           // print_r($result);die();
        echo "<h3>ไม่สามารถสมัครเพิ่มข้อมูลลูกค้าได้</h3>"; exit();
    }//endif

//---------------------ข้อมูลอุปกรณ์---------------------------/
//$id_cus = $_GET[id_cus];
$type_dev = $_POST[type_dev];
$class_dev = $_POST[class_dev];
$sub_class_dev = $_POST[sub_class_dev];
$ot_class_dev = $_POST[ot_class_dev];
$ram_dev = $_POST[ram_dev];
$color_dev = $_POST[color_dev];
$imei_dev = $_POST[imei_dev];
$serial_dev = $_POST[serial_dev];
//$datetime = date('Y-m-d');

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
$max = mysql_query("select max(id_devi) from device");
echo $total_max = mysql_result($max,0);
$id_devi=$total_max+1;
    $sql6="insert into device values('$id_devi','$id_cus','$sess_idshop','$type_name','$class_name','$sub_class_dev2','$ram_dev','$color_dev','$imei_dev','$serial_dev','1','$datetime')";
    $result6=mysql_db_query($dbname,$sql6);
    if ($result6) {       
        $sql7="select * from device where id_sp='$sess_idshop' and id_cus='$id_cus' ";
        $result7=mysql_db_query($dbname,$sql7);
            while($r7 = mysql_fetch_array($result7)){
              $id_devi=$r7[id_devi];
            }//end while

    } else {
        echo "<h3>ไม่สามารถเพิ่มข้อมูลอุปกรณ์ได้</h3>"; exit();
    }//endif


//---------------------ข้อมูลใบแจ้งซ่อม---------------------------/
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
//$datetime = date('Y-m-d'); //ปีเดือนrenumber  202012re001

$num_re = "IP000";
    $sql8 = "select code_ser from service where id_sp ='$id_sp' ";
    $result8=mysql_db_query($dbname,$sql8);
    while($r8 = mysql_fetch_array($result8)){
          $num_re++;
    }//end while

$num_re++;

$code_ser = date('Ym').'SH'.$id_sp.$num_re ;


//echo "<br>$id_devi / $id_cus / $id_sp / $id_sf / $datee_ser / $code_ser"; 
$max = mysql_query("select max(id_ser) from service");
echo $total_max = mysql_result($max,0);
$idaa=$total_max+1;

$sql9="insert into service values('$idaa','$id_devi','$id_cus','$id_sp','0','$code_ser','$id','$detail_ser','$sick_ser','$device_ser','$otherd_ser','$other_ser','$price_ser','$vat_ser','$sum_ser','$datetime','$datee_ser','2000-01-01 00:00:00','1','$tech_ser')";
$result9=mysql_db_query($dbname,$sql9);
//print_r($sql9);
//die();
    if ($result9 ) {
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