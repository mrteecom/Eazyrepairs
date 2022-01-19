<?php
date_default_timezone_set('Asia/Bangkok');
$host = "localhost";
$user = "eazyrepair_admin";
$pw = "Eazy@2021!";
$dbname = "eazyrepair_appdb";
$con = mysql_connect($host, $user, $pw);
mysql_select_db($dbname);
mysql_query("set names 'utf8' ", $con);
mysql_query("SET character_set_results=utf8");
mysql_query("SET character_set_client=utf8");
mysql_query("SET character_set_connection=utf8");
if (!$con) {
    echo "<h3>ERROR : No Connect Database </h3>";
    exit();
}
