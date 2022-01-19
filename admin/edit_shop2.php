<?php
include "../chksession_user.php";
require "../inc/connect.php"; //เชื่อมต่อฐานข้อมูล
//include "h.php";
//include "navbar.php";

$pass_sp = $_POST[pass_sp];
$name_sp = $_POST[name_sp];
$tax_sp = $_POST[tax_sp];
$phone_sp = $_POST[phone_sp];
$email_sp = $_POST[email_sp];
$fb_sp = $_POST[fb_sp];
$line_sp = $_POST[line_sp];
/*$ = $_POST[];
$ = $_POST[];
$ = $_POST[];
$datetime = date('Y-m-d');
*/

$sql="update shop set sp_status = '$status', datesave='$datetime' where id_sp='$id_sp' ";
$result=mysql_db_query($dbname,$sql);

if ($result) {
        
    echo ("<script language='JavaScript'>
    alert('แก้ข้อมูลเรียบร้อยแล้ว');
    window.location.href='edit_shop.php';
    </script>");
    
    
} else {
    echo ("<script language='JavaScript'>
    alert('ไม่สามารถแก้ไขได้ครับ');
    window.location.href='edit_shop.php';
    </script>");

}


mysql_close();

?>