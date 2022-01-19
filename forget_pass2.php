<?php 
$fname = $_POST[fname];
$lname = $_POST[lname];

require "inc/connect.php"; //เชื่อมต่อฐานข้อมูล

$sql="select * from shop where sp_fname='$fname' and sp_lname='$lname'";
$result=mysql_db_query($dbname,$sql);
$r=mysql_fetch_array($result);
    $id_sp=$r[id_sp];

$sql2="select * from add_sp where id_sp='$id_sp' ";
$result2=mysql_db_query($dbname,$sql2);
$r2=mysql_fetch_array($result2);
    $sp_email=$r2[sp_email];

include "sendmail.php";
sendmail($sp_email,$id_sp);

 echo"<script type='text/javascript'>window.location.href = 'login.php';</script> ";

?>