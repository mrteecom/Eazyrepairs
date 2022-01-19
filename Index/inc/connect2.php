
<?php
$host = "localhost"; // ส่วนมากมักเป็น localhost
$user = "root"; // Username 
//$user = "learn";
$pw = "12345678";
//$pw = "learndata@2018";

$dbname = "db_community"; // ชื่อฐานข้อมูล
function conndb() {
    global $conn;
    global $host;
    global $user;
    global $pw;
    global $dbname;
    $conn = mysql_connect($host,$user,$pw);

mysql_query("SET NAMES 'utf8'");
mysql_select_db($dbname) ;
  if (!$conn)
    die("ไม่สามารถติดต่อกับฐานข้อมูลได้");

  mysql_select_db($dbname,$conn)
    or die("ไม่สามารถเลือกใช้งานฐานข้อมูลได้");
}

function closedb() {
  global $conn;
  mysql_close($conn);
}
?>