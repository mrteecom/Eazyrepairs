<?php
function  sendmail($mailuser,$id_user) {
require_once('PHPMailer/PHPMailerAutoload.php');
    $mail = new PHPMailer();
	$mail->isSMTP();
	$mail->SMTPDebug = 2;
	$mail->Debugoutput = 'html';
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = "tls";
	$mail->Host = "mail.eazy-repairs.com"; // ถ้าใช้ smtp ของ server เป็นอยู่ในรูปแบบนี้ mail.domainyour.com
	$mail->Port = 587;
	$mail->isHTML();
	$mail->CharSet = "utf-8"; //ตั้งเป็น UTF-8 เพื่อให้อ่านภาษาไทยได้
	$mail->Username = "eazyrepair"; //กรอก Email Gmail หรือ เมลล์ที่สร้างบน server ของคุณเ
	$mail->Password = "Eazy@2021!"; // ใส่รหัสผ่าน email ของคุณ
	$mail->SetFrom('eazyrepair@localhost', 'Eazy-Repairs'); //กำหนด email เพื่อใช้เป็นเมล์อ้างอิงในการส่ง
	$mail->addAddress($mailuser);
	$mail->FromName = "Eazy-Repairs"; //ชื่อที่ใช้ในการส่ง
	$mail->Subject = "Reset Password | Eazy-Repairs";  //หัวเรื่อง emal ที่ส่ง

	$mail->msgHTML("<b> https://eazy-repairs.com/forget_pass3.php?id_user=$id_user </b>");

	if (!$mail->send()) {
		echo "ไม่สามารถส่งอีเมล์ได้ : " . $mail->ErrorInfo;
		} else {
		echo "ส่งอีเมล์สำเร็จ";
		}
	}

?>