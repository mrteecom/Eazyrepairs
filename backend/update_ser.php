<?php
include "../chksession_user.php";
require "../inc/connect.php"; //เชื่อมต่อฐานข้อมูล
include "h.php";
//include "navbar.php";
$id_ser = $_GET[id_ser];
$stu =$_GET[stu];
$id_sp = $_GET[id_sp];
$price =$_GET[price];
//$stu =5;



if($stu == 10){
	$sql10="update service set ser_status='$stu', ser_netprice=''  where id_ser='$id_ser' ";
	$result10=mysql_db_query($dbname,$sql10);
}


if($stu == 5){
	$datetime = date('Y-m-d H:i:s');
	$num_re = "RE000";
	$sql5 = "select code2_ser from service where id_sp ='$id_sp'  ";
	$result5=mysql_db_query($dbname,$sql5);
		while($r5 = mysql_fetch_array($result5)){
			$code2_ser = $r5[code2_ser];
				if($code2_ser){
					$num_re++;
				}
		}//end while
	$num_re++;
	$code2_ser = date('Ym').'SH'.$id_sp.$num_re ;
//echo "$id_sp // $code2_ser <br>";
	$sql4="update service set code2_ser='$code2_ser',ser_date_re ='$datetime',ser_netprice='$price' where id_ser='$id_ser' ";
	$result4=mysql_db_query($dbname,$sql4);

}// end if


echo "$id_ser // $stu //$sess_idshop ";
if($stu == 2){
	//$sql2="update service set ser_status='$stu', code2_ser='2000-01-01 00:00:00',ser_netprice=''  where id_ser='$id_ser' ";
	$sql2="update service set ser_status='$stu', code2_ser='2000-01-01 00:00:00'  where id_ser='$id_ser' ";
	$result2=mysql_db_query($dbname,$sql2);
}

	$sql="update service set  ser_status='$stu' where id_ser='$id_ser' ";
	$result=mysql_db_query($dbname,$sql);
	if ($result) {
		$name = $_SESSION[sess_username] ;
		$status= "UpdateService_$id_ser \r\n";
		include "../savelog.php";
		savelog($name,$status);	

		if( $stu == 1){
		echo"<script type='text/javascript'>window.location.href = 'main_repair.php';</script> ";			
		}else if($stu == 3){
		echo"<script type='text/javascript'>window.location.href = 'main_repair4.php';</script> ";			
		}else if($stu == 2 or $stu == 4){
		echo"<script type='text/javascript'>window.location.href = 'main_repair2.php';</script> ";			
		}else if($stu == 5){
		echo"<script type='text/javascript'>window.location.href = 'main_repair3.php';</script> ";			
		}else {
		echo"<script type='text/javascript'>window.location.href = 'index.php';</script> ";			
		}
		
	} else {
		echo "<h3>ไม่สามารถอัพเดทข้อมูลได้</h3>"; exit();
	}

mysql_close();
?>