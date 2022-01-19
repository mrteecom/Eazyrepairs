<?php 
session_start();
$sess_userid=$_SESSION[sess_userid];
$sess_idshop=$_SESSION[sess_idshop];
$sess_username=$_SESSION[sess_username];
$sess_userstatus=$_SESSION[sess_userstatus];



if($sess_userid<>session_id() or $sess_username=="" ) {
	header("Location: login.php");exit();
}


?>