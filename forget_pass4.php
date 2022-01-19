<?php   
require "inc/connect.php"; //เชื่อมต่อฐานข้อมูล
$id_user = $_GET[id_user];
$new_pass1 = $_POST[new_pass1];
$new_pass2 = $_POST[new_pass2];

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Eazy-Repairs | เข้าสู่ระบบ</title>
  <link rel="apple-touch-icon" sizes="180x180" href="Index/img/Eazy repairs 800x800.png">
    <link rel="icon" type="image/png" href="Index/img/Eazy repairs 800x800.png" sizes="32x32">
    <link rel="icon" type="image/png" href="Index/img/Eazy repairs 800x800.png" sizes="16x16">
<!-- sweetalert -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>

</head>


<?php 
if($new_pass1 == $new_pass2){
	$pass = md5($new_pass1);
	echo "$new_pass1 // $new_pass2 // $id_user // $pass";

	$sql="update staff set sf_pass = '$pass' where id_sp='$id_user' ";
	$result=mysql_db_query($dbname,$sql);

	if ($result) {
			$name = $id_user ;
			$status= "ChangPassword_$id_user \r\n";
			include "savelog.php";
			savelog($name,$status);	
?>
		<body onload="myFunction()">
		<script>
			function myFunction() {
			    swal({
				  type: 'success',
				  title: 'Success',
				  text: 'คุณสามารถเปลี่ยนรหัสผ่าน',
				  footer: '<a href="login.php">เข้าสู่ระบบ</a>'
				})
			}
		</script>

<?php
 		//echo"<script type='text/javascript'>window.location.href = 'login.php';</script> ";

					
		} else {
			echo "<h3>ไม่สามารถอัพเดทข้อมูลได้</h3>";
		}
	mysql_close();
	

  }elseif($new_pass1 != $new_pass2){ 
  	echo "$new_pass1 // $new_pass2 // $id_user // $pass";
 ?>
	<body onload="myFunction2()">
	<script>
			function myFunction2() {
			    swal({
				  type: 'error',
				  title: 'Error !!!',
				  text: 'รหัสผ่านและยืนยันรหัสผ่านไม่ตรงกัน !!',
				  footer: '<a href=forget_pass3.php?id_user=<?php echo"$id_user"?> > ย้อนกลับ </a>'
				})
			}
		</script>

<?php 


}  

	


?>

</body>
</html>
