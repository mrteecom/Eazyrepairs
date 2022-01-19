<?php

require "../inc/connect.php";

$id_sc=$_GET['id'];
$id_topic=$_GET['id_detail'];

if($id_sc){
    $sql="delete from sub_class where id_sc='$id_sc' ";
	mysql_db_query($dbname,$sql);
	echo"	<script type='text/javascript'>window.location.href = 'type.php';</script> ";
}elseif($id_topic){
    $sql="delete from detail_t where id_detail='$id_topic'";
	mysql_db_query($dbname,$sql);
	echo"	<script type='text/javascript'>window.location.href = 'topic.php';</script> ";
}

?>