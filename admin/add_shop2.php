<?php
include "../chksession_user.php";
require "../inc/connect.php"; //เชื่อมต่อฐานข้อมูล
include "h.php";
//include "navbar.php";


$user = $_POST[user];
$pass = MD5($_POST[pass]);
$fname = $_POST[fname];
$lname = $_POST[lname];
$pack = $_POST[pack];
$datetime = date('Y-m-d h:i:s');
$id_sp = $_GET[id];
$status = $_GET[status];
//echo "$user // $pass// $status //$id_sp";
switch ($pack) {
	case '90':$price = '470'; break;
	case '180':$price = '890'; break;
	case '365':$price = '1590'; break;
	//case '730':$price = '3590'; break;
	
}
$dates = '0000-00-00 00:00:00';$id='0';
//$inputDate = "2011-09-09 15:25:40";


if($status ){
$user = $_GET[u];
$pass = $_GET[p];
$pack = $_GET[pack];
$strCurrDate = strtotime($datetime);
$date_end = date("Y-m-d H:i:s", mktime(date("H",$strCurrDate)+0, date("i",$strCurrDate)+0, date("s",$strCurrDate)+0, date("m",$strCurrDate)+0  , date("d",$strCurrDate)+$pack, date("Y",$strCurrDate)+0));
//echo "$pack  / $date_end $status //$id_sp";

	$sql="update shop set sp_status = '$status', sp_dateend='$date_end', datesave='$datetime' where id_sp='$id_sp' ";
	$result=mysql_db_query($dbname,$sql);
	if ($result) {

		if($status==1){
			$sql3="select * from shop where id_sp='$id_sp' ";
			$result3=mysql_db_query($dbname,$sql3);
			$r3 = mysql_fetch_array($result3);
				$sp_fname=$r3[sp_fname];
				$sp_lname=$r3[sp_lname];
		

			$sql2="insert into staff values('0','$id_sp','$sp_fname','$sp_lname','$user','$pass','','','','','','','$datetime','1')";
			$result2=mysql_db_query($dbname,$sql2);
			$name = $_SESSION[sess_username] ;
			$status= "CreateShop \r\n";
			include "../savelog.php";
			savelog($name,$status);	
			echo ("<script language='JavaScript'>
    			alert('เพิ่มข้อมูลสำเร็จ');
    			window.location.href='main_shop.php';
    			</script>"
    		);
		}

		$name = $_SESSION[sess_username] ;
		$status= "UpdateShop \r\n";
		include "../savelog.php";
		savelog($name,$status);	
		echo ("<script language='JavaScript'>
    alert('เพิ่มข้อมูลสำเร็จ');
    window.location.href='main_shop.php';
    </script>");
		
	
	} else {
		
		echo ("<script language='JavaScript'>
    alert('ไม่สามารถเปลี่ยนสถานะของร้านค้าได้ครับ');
    window.location.href='main_shop.php';
    </script>");
	}
}else{
	$sql="select * from shop where sp_username='$user' ";
	$result=mysql_db_query($dbname,$sql);
	$num=mysql_num_rows($result);
	if($num>0) {
		
		echo ("<script language='JavaScript'>
    alert('Username ซ้ำครับ');
    window.location.href='main_shop.php';
    </script>"); exit();
	}
	//$sql = "INSERT INTO `eazyrepair_appdb`.`shop` (`id_sp`, `sp_name`, `sp_logo`, `sp_tax`, `sp_username`, `sp_pass`, `sp_fname`, `sp_lname`, `sp_pack`, `sp_dateend`, `sp_status`, `datesave`) VALUES (NULL, \'\', \'\', \'\', \'a;kljsdfphsdfhn\', \'s21351\', \'sdfgnsdfgnmfsdgn\', \'sdfgnsdgnsdgnsdgn\', \'90\', \'2021-02-26 00:00:00\', \'0\', \'2021-02-22\');";
	$sql="insert into shop values('$id','','','','$user','$pass','$fname','$lname','$pack','$datetime','0','0','$datetime')";
	$result=mysql_db_query($dbname,$sql);
	if ($result) {
		$sql3="select * from shop where sp_username='$user' and sp_pass='$pass' ";
		$result3=mysql_db_query($dbname,$sql3);
		$r3 = mysql_fetch_array($result3);
			$id_sp=$r3[id_sp];
		
			
			
		$sql2="insert into add_sp values('$id','$id_sp','','','','','','','','','')";
		$result2=mysql_db_query($dbname,$sql2);

		$sql5=" insert into pay values('$id','$id_sp','','$datetime','$price','','0','$datetime')";
		$result5=mysql_db_query($dbname,$sql5);

		$name = $_SESSION[sess_username] ;
		$status= "CreateShop \r\n";
		include "../savelog.php";
		savelog($name,$status);	
		echo"<script type='text/javascript'>window.location.href = 'main_shop.php';</script> ";
		
		
	} else {
		
		echo ("<script language='JavaScript'>
    alert('ไม่สามารถสมัครเป็นสมาชิกได้');
    window.location.href='main_shop.php';
    </script>");
	}
}//end tf status
mysql_close();

?>