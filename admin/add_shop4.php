<?php
include "../chksession_user.php";
require "../inc/connect.php"; //เชื่อมต่อฐานข้อมูล
//include "h.php";
//include "navbar.php";

$vat_sp = $_GET[vat];
$id_sp = $_GET[id];


$sql="update shop set sp_vat = '$vat_sp' where id_sp='$id_sp' ";
$result=mysql_db_query($dbname,$sql);

if ($result) {
        
    echo ("<script language='JavaScript'>
    alert('แก้ข้อมูลเรียบร้อยแล้ว');
    window.location.href='main_shop.php';
    </script>");
    
    
} else {
    echo ("<script language='JavaScript'>
    alert('ไม่สามารถแก้ไขได้ครับ');
    window.location.href='main_shop.php';
    </script>");

}


mysql_close();

?>