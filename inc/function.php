<?php
error_reporting(0);
//UPDATE tb_per SET user_per = MD5(user_per)
//UPDATE tb_per SET pass_per = MD5(pass_per)
//เชื่อต่อ Database
date_default_timezone_set('Asia/Bangkok');

$host = "localhost";
$user = "eazyrepair_admin";
$pw = "Eazy@2021!";
$dbname = "eazyrepair_appdb";
$con = mysql_connect($host,$user,$pw) or die("ไม่สามารถเชื่อมต่อฐานข้อมูลได้" . mysql_error());
mysql_select_db($dbname);
mysql_query("set names 'utf8' ", $con);
if (!$con) {
    echo ("<script language='JavaScript'>
    alert('ไม่สามารถเชื่อมฐานข้อมูลได้');
    window.location.href='404.php';
    </script>");
    exit();
}

function report($id_ser,$id_cus,$sess_idshop){
    
    
    global $con;

    $sql=" SELECT * FROM  shop sp INNER JOIN staff sf ON sp.id_sp = sf.id_sp WHERE sp.id_sp='$sess_idshop' ";
    $result = mysql_query($sql,$con);
    $data = mysql_fetch_array($result);

  return $data;
  mysql_close();
}
function ReportDetail($id_ser,$id_cus,$sess_idshop){
    
    global $con;

    $sql="SELECT * FROM  customer cus INNER JOIN service ser ON cus.id_cus = ser.id_cus  JOIN device devi ON cus.id_cus = devi.id_cus WHERE cus.id_sp = '$sess_idshop' AND ser.id_ser = '$id_ser' ";

    $result = mysql_query($sql,$con);
    $data = mysql_fetch_array($result);
    
    return $data;
    
    mysql_close();

}
function Barcode($code){

    global $con;

    $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
    $border = 2;//กำหนดความหน้าของเส้น Barcode
    $height = 50;//กำหนดความสูงของ Barcode
   
    return $generator->getBarcode($code , $generator::TYPE_CODE_128,$border,$height);

    mysql_close();

}

function adminLogin($username,$password,$chk){

    

    $user_login = md5($username);
    $passuser_login = md5($password);

    //print_r($chk);
    //die();

    global $con;

    $sql = "SELECT * FROM tb_admin WHERE user_admin='".$user_login."' AND pass_admin='".$passuser_login."' AND major_admin='".$chk."' ";
    $result = mysql_query($sql,$con);
    $num = mysql_num_rows($result);
    
    if ($num <= 0) {
        
        $x="ชื่อผู้ใช้งาน และ รหัสผ่านของท่านอีกครั้ง";

        return $x;
        exit();

    } else {
        
        $r = mysql_fetch_array($result);
        $user_admin = $r[user_admin];
        $major_admin = $r[major_admin];
        $fname_admin = $r[fname_admin];
        $lname_admin = $r[lname_admin];
        $img_admin = $r[img_admin];
        $email_admin = $r[email_admin];
        //------------------------------
        $_SESSION[sess_adminid] = session_id();
        $_SESSION[sess_adminuser] = $user_admin;
        $_SESSION[sess_adminmajor] = $major_admin;
        $_SESSION[sess_adminfname] = $fname_admin;
        $_SESSION[sess_adminlanme] = $lname_admin;
        $_SESSION[sess_adminimg] = $img_admin;
        $_SESSION[sess_adminemail] = $email_admin;


        $name = $user_admin;
        $status = "Admin_" . "$major_admin" . "_Login  \r\n";
        include '../inc/savelog.php';
        savelog($name, $status);
        header("Location: ../backend/index.php");


        exit();
    } 

    mysql_close();
}


function updateSendMail($id_art,$id_user,$email,$id_evo,$status){
	
	//print_r();
	//die();

	require_once('../api/PHPMailer/PHPMailerAutoload.php');
    $mail = new PHPMailer();
	$mail->isSMTP();
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = "tls";
	$mail->Host = "smtp.gmail.com"; // ถ้าใช้ smtp ของ server เป็นอยู่ในรูปแบบนี้ mail.domainyour.com
	$mail->Port = 587;
	$mail->isHTML();
	$mail->CharSet = "utf-8"; //ตั้งเป็น UTF-8 เพื่อให้อ่านภาษาไทยได้
	$mail->Username = "astc2020@vru.ac.th"; //กรอก Email Gmail หรือ เมลล์ที่สร้างบน server ของคุณเ
	$mail->Password = "123456789"; // ใส่รหัสผ่าน email ของคุณ
	$mail->SetFrom('no-reply@vru.ac.th'); //กำหนด email เพื่อใช้เป็นเมล์อ้างอิงในการส่ง
    $mail->FromName = "ASTC2020"; //ชื่อที่ใช้ในการส่ง
    
    $mail->Subject = "ขอเชิญประเมินบทความ ASTC2020";  //หัวเรื่อง emal ที่ส่ง

    if($status == '2'){
		$mail->Body = "ขอเชิญท่านประเมินบทความขอบคุณครับ "."\r\n".
		"ลิงค์ประเมินบทความ : http://sci.vru.ac.th/astc/backend/evo_expert.php?id_art=$id_art&id_user=$id_user&id_evo=$id_evo "; //รายละเอียดที่ส่ง
    }elseif($status == '3'){
		$mail->Body = "เนื่องจากท่านยังไม่ได้ทำการประเมินบทความระบบขออนุญาติยกเลิกท่านในการประเมินบทความนี้ เพื่อดำเนินการต่อขอบคุณครับ"; //รายละเอียดที่ส่ง
    }

	$mail->AddAddress($email); //อีเมล์และชื่อผู้รับ
    $mail->Send();
}

function savelog($name,$status){
    $day = date("d/M/Y");
    $time = date("H:i:s");
    //echo"$a <BR> $b <BR> $day $time ";
    $status = $status." - " ;
     $ds[] = array($day,$time,$name,$status);
    
      foreach($ds AS $row){
        $datas[] = implode('|', $row); // a1|b1|c1
      }
    $fp = fopen('savelog.txt','a');
    fwrite($fp, implode('\n\r', $datas));
    fclose($fp);
    }

function Chkuser($username,$password){

    
    
    $user_login = md5($username);
    $pass_login = md5($password);

    
    global $con;

    $sql ="SELECT * FROM tb_per WHERE user_per='".$user_login."' AND pass_per='".$pass_login."'";
    $result = mysql_query($sql,$con);
    $num = mysql_num_rows($result);


    if ($num <= 0) {
        
        $x="ชื่อผู้ใช้งาน และ รหัสผ่านของท่านอีกครั้ง";

        return $x;
        exit();

    }else{
        
        $r = mysql_fetch_array($result);
        $user_per = $r[user_per];
        $idcard_per = $r[idcard_per];
        $fnamet_per = $r[fnamet_per];
        $lnamet_per = $r[lnamet_per];
        $email_per = $r[email_per];
        $major_per = $r[major_per];
        $img_per = $r[img_per];
        $type_per = $r[type_per];
        //----------------------------------
        $_SESSION[sess_adminid] = session_id();
        $_SESSION[sess_adminuser] = $user_per;
        $_SESSION[sess_adminidcard_per] = $idcard_per;
        $_SESSION[sess_adminfnamet] = $fnamet_per;
        $_SESSION[sess_adminlnamet] = $lnamet_per;
        $_SESSION[sess_adminemail] = $email_per;
        $_SESSION[sess_adminimg] = $img_per;
        $_SESSION[sess_admintype] = $type_per;

        $name = $user_per;
        $status = 'User_'."$fnamet_per $lnamet_per"." Login  \r\n";
        include '../inc/savelog.php';
        savelog($name, $status);
        header("Location: ../user/index.php");
        

        exit();
    }

    mysql_close();
}

function getUser($id){

    global $con;

    $sql ="SELECT * FROM tb_per WHERE id_per='".$id."'";
    $result = mysql_query($sql,$con);
    $r = mysql_fetch_array($result);
    return $r;
    mysql_close();

}

function addAcp($id,$LevelEdu,$AbbDeedu,$MajorEdu,$UniEdu,$Other_Edu,$OtJob_Perjob,$CountryEdu,$YEdu,$fileupload){
    /*print_r($UniEdu);
    die();*/
    global $con;


}

function viewEdu($idcard_per){

 
    
    global $con;

    $sql="SELECT * FROM tb_pered WHERE idcard_per='".$idcard_per."' ORDER BY level_pered ASC";
   
    $result = mysql_query($sql,$con);
    $data = array();

    while ($row = mysql_fetch_array($result)){
        $nameArray[] = array(
            'id_ed' => $row['id_ed'],
            'idcard_ed' => $row['idcard_ed'],
            'level_pered' => $row['level_pered'],
            'maj_pered' => $row['maj_pered'],
            'abb_pered' => $row['abb_pered'],
            'uni_pered' => $row['uni_pered'],
            'year_pered' => $row['year_pered'],
            'conutry_pered' => $row['conutry_pered'],
            'doc_pered' => $row['doc_pered'],
            'dates_pered' => $row['dates_pered']
        );
        switch($level_pered){
            case "1": { $level_pered = "ปริญญาตรี"; break;  }
            case "2": { $level_pered = "ปริญญาโท"; break;   }
            case "3": { $level_pered = "ปริญญาเอก"; break;  }
            
            } 
    }

    $data = $nameArray;
  
    return $data;

    mysql_close();



}

function viewAca($major){
    
   
   
    global $con;

    $sql = "SELECT * from tb_per where (type_per='1' or type_per='3' or type_per='5')and major_per='".$major."' order by fnamet_per ASC";
    
    $result = mysql_query($sql,$con);
    
    $data = array();

    while ($row = mysql_fetch_array($result)){
        $nameArray[] = array(
            'id_per' => $row['id_per'],
            'idcard_per' => $row['idcard_per'],
            'tname2_per' => $row['tname2_per'],
            'tname1_per' => $row['tname1_per'],
            'tname_per' => $row['tname_per'],
            'fnamet_per' => $row['fnamet_per'],
            'email_per' => $row['email_per'],
            'lnamet_per' => $row['lnamet_per'],
            'major_per' => $row['major_per'],
            'type_per' => $row['type_per'],
            'img_per' => $row['img_per'],
            'status_per' => $row['status_per']

        );
        
    }
    
    $data = $nameArray;

    $arr = json_encode($data);
    $dex = json_decode($arr);
    //print_r($data);
    //die();
   
    
    return $data;
    
    mysql_close();
}

function viewWork($idcard_per){
    
   
    global $con;

    $sql="SELECT * FROM tb_perwo where idcard_per='".$idcard_per."' order by ye_perwo DESC";
    $result = mysql_query($sql,$con);
    $data = array();

    while ($row = mysql_fetch_array($result)){
        $nameArray[] = array(
            'id_perwo' => $row['id_perwo'],
            'ms_perwo' => $row['ms_perwo'],
            'ys_perwo' => $row['ys_perwo'],
            'me_perwo' => $row['me_perwo'],
            'ye_perwo' => $row['ye_perwo'],
            'job_perwo' => $row['job_perwo'],
            'or_perwo' => $row['or_perwo']
        );
        
    }

    $data = $nameArray;
  
    return $data;

    mysql_close();
}

function addWork($id,$ms_perwo,$now_perwo,$me_perwo,$position_perwo,$organi_perwo){

    global $con;

    date_default_timezone_set('Asia/Bangkok');
    $date = date("Ymd");

    $me_perwo1=explode("-",$me_perwo);
    $ye_perwo=$me_perwo1[0]; $me_perwo = $me_perwo1[1];
    
    $ms_perwo1=explode("-",$ms_perwo);
    $ys_perwo=$ms_perwo1[0]; $ms_perwo = $ms_perwo1[1];

    if($now_perwo='1') {
        $me_perwo = "Now";
        $ye_perwo = "Now";
    }

    $sql="INSERT INTO tb_perwo (id_perwo,code_u,idcard_per,ms_perwo,ys_perwo,me_perwo,ye_perwo,job_perwo,or_perwo,dates_perwo) 
    VALUES ('','201','".$id."','".$ms_perwo."','".$ys_perwo."','".$me_perwo."','".$ye_perwo."','".$position_perwo."','".$organi_perwo."','".$date."')";
     $result = mysql_query($sql,$con);
    
     if($result){
 
        $name = $_SESSION[sess_adminidcard_per];
         $status= "Add_WorkHistory_$id \r\n";
         include "../inc/savelog.php";
         savelog($name,$status);
 
 
         $x="success";
  
         return $x;
 
         header("Location: ../user/education.php");
     }else{
 
         $x="danger";
         return $x;
     
     }
     mysql_close();
 


}

function addEdu($id,$LevelEdu,$AbbDeedu,$MajorEdu,$UniEdu,$Other_Edu,$OtJob_Perjob,$CountryEdu,$YEdu,$fileupload){
   
    
    
    global $con;
    
    //ฟังก์ชั่นวันที่
    date_default_timezone_set('Asia/Bangkok');
    $date = date("Ymd");	
    //ฟังก์ชั่นสุ่มตัวเลข
    $numrand = (mt_rand());

    if($Other_Edu == '1'){
        $UniEdu = $Otjob_Perjob;
       
        }

    if ($fileupload != "") {
            //เพิ่มไฟล์
            $upload=$_FILES['fileupload'];
            
            if($upload <> '') {   //not select file
            //โฟลเดอร์ที่จะ upload file เข้าไป 
            $path="../backend/files_ed/";  

            //เอาชื่อไฟล์เก่าออกให้เหลือแต่นามสกุล
            $type = strrchr($_FILES['fileupload']['name'],".");
                
            //ตั้งชื่อไฟล์ใหม่โดยเอาเวลาไว้หน้าชื่อไฟล์เดิม
            $newname = $date.$numrand.$type;
            $path_copy=$path.$newname;
            $path_link="../backend/files_ed/".$newname;
            //คัดลอกไฟล์ไปเก็บที่เว็บเซริ์ฟเวอร์
        move_uploaded_file($_FILES['fileupload']['tmp_name'],$path_copy);  	
        
        } 
    }

    $sql ="INSERT INTO tb_pered (id_pered,code_u,idcard_pered,level_pered,maj_pered,abb_pered,uni_pered,year_pered,conutry_pered,doc_pered,dates_pered) 
    VALUES ('','201','".$id."','".$LevelEdu."','".$MajorEdu."','".$AbbDeedu."','".$UniEdu."','".$YEdu."','".$CountryEdu."','".$newname."','".$date."')";
    $result = mysql_query($sql,$con);
    
    if($result){

        $name = $_SESSION[sess_adminidcard_per] ;
        $status= "Add_EducationHistory_$id \r\n";
        include "../inc/savelog.php";
        savelog($name,$status);


        $x="success";
 
        return $x;

        header("Location: ../user/education.php");
    }else{

        $x="danger";
        return $x;
    
    }
    mysql_close();

}


function updateUser($id,$NameTitle,$NameFirst,$NameLast,$fileupload,$NameEFirst,$NameELast,$idcard_per,$bdate_per,$TelMobile
,$EmailRes,$AddRes,$AddrProvince,$AddrPostalCode){
    
   
  
    global $con;

        $sql ="UPDATE tb_per SET tname_per = '". $NameTitle ."', fnamet_per = '". $NameFirst ."', lnamet_per = '". $NameLast ."',
        fnamee_per = '". $NameEFirst ."', lnamee_per = '". $NameELast ."', bdate_per = '". $bdate_per ."', add_per = '". $AddRes ."',
        prov_per = '". $AddrProvince ."', zcode_per = '". $AddrPostalCode ."', phone_per = '". $TelMobile ."', email_per = '". $EmailRes ."'
         WHERE id_per = '".$id."'";
    
        $result = mysql_query($sql,$con);
        

        if($result){
    
        $name = $_SESSION[sess_adminidcard_per];
        $status= "Edit_Personal_$NameFirst_$NameEFirst_$NameELast \r\n";
        include '../inc/savelog.php';
        savelog($name,$status);
    
        $s="success";
        return $s;
    
        header("Location: ../user/index.php");
    
        }else{
    
        $s="danger";
    
        return $s;
    
        }
        

    mysql_close();
/*
    if($fileupload){
        
        if(move_uploaded_file($_FILES["fileupload"]["tmp_name"], "../backend/img_resize/" . $_FILES["fileupload"]["name"])){
        
            
        }
    }*/

    
    
    

}


function logOut(){
    session_start();
    $name = $_SESSION[sess_adminuser];
    $major = $_SESSION[sess_adminmajor];
    $fnamet_per = $_SESSION[sess_adminfnamet];
    $lnamet_per = $_SESSION[sess_adminlnamet];
    $img_per = $_SESSION[sess_adminimg] ;
    $type = $_SESSION[sess_admintype];
    
    if (!$type) {
        $status = "Admin_" . "$major" . "_Logout  \r\n";
    } else {
        $status = "User_" . "$fnamet_per $lnamet_per " . "_Logout  \r\n";
    }
    //    echo" $name , $major , $status";
    include '../inc/savelog.php';
    savelog($name, $status);

    session_start();
	session_unset();
	session_destroy();
	echo ("<script language='JavaScript'>
				window.location.href='../index.php';
				</script>");
	exit();
}

function formatDateFull($date)
{
	if ($date == "0000-00-00") {
		return "";
	}
	if ($date == "")
		return $date;
	$raw_date = explode("-", $date);
	return  $raw_date[2] . "/" . $raw_date[1] . "/" . $raw_date[0];
}

function dateThai($strDate)
{
	$strYear = date("Y", strtotime($strDate)) + 543;
	$strMonth = date("n", strtotime($strDate));
	$strDay = date("j", strtotime($strDate));
	$strHour = date("H", strtotime($strDate));
	$strMinute = date("i", strtotime($strDate));
	$strSeconds = date("s", strtotime($strDate));
	$strMonthCut = array("", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
	$strMonthThai = $strMonthCut[$strMonth];
	return "$strDay $strMonthThai $strYear";
}

function ConvertMonthNumberToText($input){
 
    $arr_month = array( "" , "มกราคม" , "กุมภาพันธ์" , "มีนาคม" ,
                       "เมษายน" , "พฤษภาคม" , "มิถุนายน" ,
                       "กรกฎาคม" ,"สิงหาคม" , "กันยายน" ,
                       "ตุลาคม" , "พฤศจิกายน" , "ธันวาคม" ) ;
    return $arr_month[ $input ] ;
 
}

function c($x) {
	$thai_m=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
	$date_array=explode("-",$x);
	$y=$date_array[0];
	$m=$date_array[1]-1;
	$d=$date_array[2];

	$m=$thai_m[$m];
	$y=$y+543;

	$displaydate="$d $m $y";
	return $displaydate;
} // end function displaydate

function checkemail($checkemail) { 
	if(ereg( "^[^@ ]+@([a-zA-Z0-9\-]+\.)+([a-zA-Z0-9\-]{2}|net|com|gov|mil|org|edu|int)$",$checkemail) )  {
		return true; 
	} else {
		return false; 
	}
} // end fuction checkemail


function check_date($date_now){ 
$start_date[0] = date(Y)-1;
$start_date[1] = 10;
$start_date[2] = 01;

$string1 = implode("-", $start_date);

$end_date[0] = date(Y);
$end_date[1] = 03;
$end_date[2] = 31;
$string2 = implode("-", $end_date);
$date_now = date('Y-m-d'); 
//echo"$string1 /$string2 /  $date_now <br>";

  $start_ts = strtotime($string1);
  $end_ts = strtotime($string2);
  $user_ts = strtotime($date_now);
//echo"$start_ts /$end_ts /  $user_ts ";

  // Check that user date is between start & end

    if(($user_ts >= $start_ts) && ($user_ts <= $end_ts)){
      //$datenow = true;
      return '1';
    }else{
      //$datenow = true;
      return '2';
    } //end if
    
}//end function checkdate

function check_semester($date_now){ 
$start_date[0] = date(Y)-1;
$start_date[1] = 06;
$start_date[2] = 01;

$string1 = implode("-", $start_date);

$end_date[0] = date(Y);
$end_date[1] = 05;
$end_date[2] = 31;
$string2 = implode("-", $end_date);
$date_now = date('Y-m-d'); 
//echo"$string1 /$string2 /  $date_now <br>";

  $start_ts = strtotime($string1);
  $end_ts = strtotime($string2);
  $user_ts = strtotime($date_now);
//echo"$start_ts /$end_ts /  $user_ts ";

  // Check that user date is between start & end

    if(($user_ts >= $start_ts) && ($user_ts <= $end_ts)){
      //$datenow = true;
      return $start_date[0];
    }else{
      //$datenow = true;
      return $end_date[0];
    } //end if
    
}//end function checkdate

?>