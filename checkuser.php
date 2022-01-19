<?php
include "h.php";	
session_start();
$user_login=$_POST[user_login];
$pass_login=MD5($_POST[pass_login]);

//echo"$user_login <BR> $pass_login ";
?>

<?php	

if($user_login=="" or $pass_login=="") {
?>		
<script language='JavaScript'>
		alert('กรุณาตรวจสอบการกรอกข้อมูล');
		window.location.href='login.php';
		</script>
<?php 

	exit();
}//end if

require "inc/connect.php"; //เชื่อมต่อฐานข้อมูล


$sql="select * from staff where sf_username='$user_login' and sf_pass='$pass_login'";
$result=mysql_db_query($dbname,$sql);
$num=mysql_num_rows($result);

 if($num<= 0){
    echo ("<script language='JavaScript'>
    alert('กรุณาตรวจสอบ Username และ Password ให้ถูกต้อง');
    window.location.href='login.php';
    </script>"); exit();
	}else{
		$r=mysql_fetch_array($result);
		$id_shop=$r[id_sp];
		$fname_user=$r[sf_fname];
        $lname_user=$r[sf_lname];
        
		$status_user=$r[sf_status];

		$name_user = $fname_user.' '.$lname_user;
			
		$_SESSION[sess_userid]=session_id();
		$_SESSION[sess_idshop]=$id_shop;
		$_SESSION[sess_username]=$name_user;
		$_SESSION[sess_userstatus]=$status;

		//echo"<BR> $_SESSION[sess_userid] <BR> $name_user";
		
		$name = $name_user;
		$status= "User_Login  \r\n";
		include "savelog.php";
		savelog($name,$status);
        if ($status_user=='0') {
            header("Location: admin/index.php");
        }else if($status_user=='1') {
            header("Location: backend/index.php");
        }else if($status_user>='2') {
            header("Location: index.php");
        }
		
		exit();
	}//end if

?>

