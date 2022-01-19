<?php
date_default_timezone_set('Asia/Bangkok');
$host = "localhost";
$user="root";
//$user = "learn";
$pw = "12345678";
//$pw = "learndata@2018";
$dbname = "db_community";
$c = mysql_connect($host, $user, $pw) or die("ไม่สามารถติดต่อกับฐานข้อมูลได้" . mysql_error());
mysql_query("set names 'utf8' ", $c);
mysql_query("SET character_set_results=utf8");
mysql_query("SET character_set_client=utf8");
mysql_query("SET character_set_connection=utf8");
if (!$c) {
    echo "<h3>ERROR : No Connect Database </h3>";
    exit();
}
?>