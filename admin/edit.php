<?php
include "../chksession_user.php";
require "../inc/connect.php";
include "h.php";
$id_sc=$_GET['id'];


$id_topic=$_GET['id_detail'];

if($id_sc){
	
	$class_name = $_POST['class_dex'];
	$sub_class = $_POST['sub_class_dex'];
	$sql="UPDATE sub_class SET id_class = '$class_name' , sc_name = '$sub_class' WHERE id_sc='$id_sc' ";

	$result=mysql_db_query($dbname,$sql);
	if ($result) {
        
        echo ("<script language='JavaScript'>
		alert('อัพเดทข้อมูลเรียบร้อยแล้ว');
		window.location.href='type.php';
		</script>");
		
		
	} else {
        echo ("<script language='JavaScript'>
		alert('ไม่สามารถอัพเดทข้อมูล');
		window.location.href='type.php';
		</script>");

	}
mysql_close();

}elseif($id_topic){
	$class_name = $_POST['topic'];
	$sub_class = $_POST['detail'];
    $sql="UPDATE detail_t SET id_topic='$class_name',detail='$sub_class' WHERE id_detail='$id_topic' ";
	$result=mysql_db_query($dbname,$sql);
	if ($result) {
        
        echo ("<script language='JavaScript'>
		alert('อัพเดทข้อมูลเรียบร้อยแล้ว');
		window.location.href='topic.php';
		</script>");
		
		
	} else {
        echo ("<script language='JavaScript'>
		alert('ไม่สามารถอัพเดทข้อมูล');
		window.location.href='topic.php';
		</script>");

	}
mysql_close();
}

?>