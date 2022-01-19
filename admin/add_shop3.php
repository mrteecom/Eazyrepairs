<?php 
require "../inc/connect.php"; //เชื่อมต่อฐานข้อมูล
$id=0;
$datetime = date('Y-m-d h:i:s');
$price=0;
$name="EazyRepairs03210";
$name2="Eazy-Repairs";
$name3="Client0";
$name4="Stage0";
$pack = '7';
$num='000';
/*
for ($i=1; $i <= 500; $i++) {
 	$num++;
	$num = sprintf('%03d', $num);
	$user = $name.$num;
	$pass = md5($name2.$num);
	$fname = $name3.$num;
	$lname = $name4.$num;
	echo "$user /  $pass / $fname / $lname<br>";

        $sql="insert into shop values('$id','','','','$user','$pass','$fname','$lname','$pack','$datetime','0','$datetime')";
	
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

	} else {
		
		echo ("<script language='JavaScript'>
    alert('Nooooooooo');
   
    </script>");
	}
}	*/mysql_close();

?>