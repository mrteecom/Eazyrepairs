<?php
// เรียกไฟล์ TCPDF Library เข้ามาใช้งาน กำหนดที่อยู่ตามที่แตกไฟล์ไว้
//เรียกใช้งาน libray ในการเจน pdf
require_once('../api/tcpdf/tcpdf.php');
require_once('../inc/connect.php');
require_once('../chksession_user.php');
session_start();

$id_cus = $_GET[id_cus];
$id_ser = $_GET[id_ser];

$thaimonth=array("00"=>"","01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน","05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฎาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");
$sql1="select * from  shop where id_sp='$sess_idshop' ";
    $result1=mysql_db_query($dbname,$sql1);
    $r3 = mysql_fetch_array($result1);
      $id_sp=$r3[id_sp];
      $sp_name=$r3[sp_name];
      $sp_logo=$r3[sp_logo];
      $sp_tax=$r3[sp_tax];
      $sp_add=$r3[sp_add];
      $pro_sp=$r3[pro_sp];
      $ampher_sp=$r3[ampher_sp];
      $dis_sp=$r3[dis_sp];
      $pos_sp=$r3[pos_sp];
      $sp_phone=$r3[sp_phone];
      $sp_email=$r3[sp_email];
      $sp_fb=$r3[sp_fb];
      $sp_line=$r3[sp_line];
      $date_check = date('Y-m-d');
      $Date = explode("-", $date_check);
      $date_check1 = $Date[2] . "&nbsp;" . $thaimonth[$Date[1]] . "&nbsp;" . ($Date[0]+543);

      $sql="select * from customer inner join service on customer.id_cus = service.id_cus  join device on customer.id_cus = device.id_cus where customer.id_sp = $sess_idshop and service.id_ser = '$id_ser' ";
        $result=mysql_db_query($dbname,$sql);
        $r2 = mysql_fetch_array($result);
        $id_cus=$r2[id_cus];
        $id_ser=$r2[id_ser];
        $cus_fname=$r2[cus_fname];
        $cus_lname=$r2[cus_lname];
        $cus_add=$r2[cus_add];
        $cus_pro=$r2[cus_pro];
        $cus_ampher=$r2[cus_ampher];
        $cus_dis=$r2[cus_dis];
        $cus_pos=$r2[cus_pos];
        $cus_email=$r2[cus_email];
        $cus_phone=$r2[cus_phone];
        $ser_date_s=$r2[ser_date_s];
        $ser_date_e=$r2[ser_date_e];
        $devi_type=$r2[devi_type];    
        $devi_class=$r2[devi_class];
        $devi_sub_class=$r2[devi_sub_class];
        $devi_color=$r2[devi_color];
        $devi_iemi=$r2[devi_iemi];
        $devi_serial_no=$r2[devi_serial_no];
        $ser_detail =$r2[ser_detail];
        $ser_sick =$r2[ser_sick];
        $ser_device =$r2[ser_device];
        $ser_otherd =$r2[ser_otherd];
        $ser_other =$r2[ser_other];
        $ser_price =$r2[ser_price];
        $Date = explode("-", $ser_date_e);
        $date_end = $Date[2] . "&nbsp;" . $thaimonth[$Date[1]] . "&nbsp;" . ($Date[0]+543);

?>
<?php
                                       
// เรียกใช้ Class TCPDF กำหนดรายละเอียดของหน้ากระดาษ
// PDF_PAGE_ORIENTATION = กระดาษแนวตั้ง
// PDF_UNIT = หน่วยวัดขนาดของกระดาษเป็นมิลลิเมตร (mm)
// PDF_PAGE_FORMAT = รูปแบบของกระดาษเป็น A4
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8');

// กำหนดตัวอักษรสำหรับส่วนเนื้อหา ชื่อตัวอักษร รูปแบบและขนาดตัวอักษร

$pdf->SetFont('cordiaupc', '',16, '', true);
// กำหนดคุณสมบัติของไฟล์ PDF เช่น ผู้สร้างไฟล์ หัวข้อไฟล์ คำค้น 
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Service App');
$pdf->SetTitle('ใบรับซ่อมสินค้า');
$pdf->SetSubject('ใบรับซ่อมสินค้า');
$pdf->SetKeywords('ใบรับซ่อมสินค้า, PDF');

// กำหนดรายละเอียดของหัวกระดาษ สีข้อความและสีของเส้นใต้
// PDF_HEADER_LOGO = ไฟล์รูปภาพโลโก้
// PDF_HEADER_LOGO_WIDTH = ขนาดความกว้างของโลโก้

$pdf->SetHeaderData($sp_logo ,20, $sp_name, array (0, 64, 255), array (0, 64, 128));

// กำหนดรายละเอียดของท้ายกระดาษ สีข้อความและสีของเส้น
$pdf->setFooterData(array (0, 64, 0), array (0, 64, 128));

// กำหนดตัวอักษร รูปแบบและขนาดของตัวอักษร (ตัวอักษรดูได้จากโฟลเดอร์ fonts)
// PDF_FONT_NAME_MAIN = ชื่อตัวอักษร helvetica
// PDF_FONT_SIZE_MAIN = ขนาดตัวอักษร 10
$pdf->setHeaderFont(Array (PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array (PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// กำหนดระยะขอบกระดาษ
// PDF_MARGIN_LEFT = ขอบกระดาษด้านซ้าย 15mm
// PDF_MARGIN_TOP = ขอบกระดาษด้านบน 27mm
// PDF_MARGIN_RIGHT = ขอบกระดาษด้านขวา 15mm
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

// กำหนดระยะห่างจากขอบกระดาษด้านบนมาที่ส่วนหัวกระดาษ
// PDF_MARGIN_HEADER = 5mm
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
// กำหนดระยะห่างจากขอบกระดาษด้านล่างมาที่ส่วนท้ายกระดาษ
// PDF_MARGIN_FOOTER = 10mm
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// กำหนดให้ขึ้นหน้าใหม่แบบอัตโนมัติ เมื่อเนื้อหาเกินระยะที่กำหนด
// PDF_MARGIN_BOTTOM = 25mm นับจากขอบล่าง
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);


// ข้อมูลที่จะแสดงในเนื้อหา
       

$html.=' <br>
<table>
<tr>
    <td style="text-align:center;font-size:/24px;"><b>ร้าน '.$sp_name.'</b></td><br>
</tr>
<tr>
    <td style="text-align:center;font-size:/16px;"><b>ที่อยู่ร้าน '  .$sp_add.'&nbsp; อำเภอ &nbsp;'.$ampher_sp .'&nbsp; ตำบล &nbsp;'.$dis_sp.'&nbsp; จังหวัด &nbsp;'.$pro_sp.'&nbsp; รหัสไปรษณี &nbsp;'.$pos_sp.'</b></td><br>
</tr>
<tr>
    <td style="text-align:center;font-size:/16px;"><b>เลขผู้เสียภาษี '  .$sp_tax.'&nbsp; เบอร์โทรร้าน &nbsp;'.$sp_phone .'&nbsp; E-mail &nbsp;'.$sp_email.'</b></td><br>
</tr>
<br>
<tr>
    <td style="text-align:center;font-size:/20px;"><b>ใบรับซ่อมสินค้า</b></td><br>
</tr>
';
    
$html.= '
</table>
<br>';


$html.='<table>
<tr>
<td colspan="2" style="text-align:left;font-size:/16px;"><p>วันที่รับซ่อมสินค้า '  .$date_check1.'</p></td>
<td colspan="2" style="text-align:right;font-size:/16px;"><p> ออกโดย'.$sess_idsf.'</p></td>

</tr>
</table>';
$html.='

<table >
<tr>
<td colspan="2" style="text-align:left;font-size:/16px;"><p>ชื่อลูกค้า '. $cus_fname .'&nbsp;'. $cus_lname.'</p></td>
<td colspan="2" style="text-align:right;font-size:/16px;"><p>เบอร์โทรลูกค้า '.$cus_phone.'</p></td>
</tr>
</table>
<table>
<tr>
<td colspan="2" style="text-align:left;font-size:/16px;"><p>ที่อยู่ลูกค้า '  .$cus_add.'อำเภอ &nbsp;'.$cus_ampher.'ตำบล &nbsp;'.$cus_dis.'จังหวัด &nbsp;'.$cus_pro.'รหัสไปรษณี &nbsp;'.$cus_pos.'</p></td>
<td colspan="2" style="text-align:right;font-size:/16px;"><p>E-mail ลูกค้า '.$cus_email.'</p></td>
</tr>
</table>
<br><hr>';

$html.='
<table>
            <tr>
                <th style="text-align:center;">ลำดับ</th>
                <th colspan="4" style="text-align:center;">รายละเอียดงาน</th>
                <th style="text-align:center;">จำนวน</th>
                <th colspan="2"  style="text-align:center;">ประเมินค่าซ่อม</th>
            </tr>';
   
                                           
$html.='<tr>
                <td style="text-align:center;">1</td>
                <td colspan="4">สินค้า '.$devi_type.'<br>ยี่ห้อ '.$devi_class.'<br>รุ่น '.$devi_sub_class.' 
                <br>สี'.$devi_color.'<br>IEMI '.$devi_iemi.'<br>Serial '.$devi_serial_no.' 
                <br>สภาพเครื่อง '.$ser_detail.'
                <br>อาการเสีย '.$ser_sick.'
                <br>อุปกรณ์ที่นำมาด้วย '.$ser_device.'
                <br>อุปกรณ์อื่นๆ '.$ser_otherd.'
                <br>บันทึกเพิ่มเติม '.$ser_other.'</td>
               
                <td style="text-align:center;">1</td>
                
                <td colspan="2" style="text-align:center;">'.number_format($ser_price).' บาท</td>
            </tr><br><hr>
                <tfoot>
                <tr>
                <td></td>
                <td colspan="4" style="text-align:center;">วันที่รับสินค้า '.$date_end.'</td>
                <td style="text-align:right;">ราคาสุทธิ</td>
                <td colspan="2" style="text-align:center;">'.number_format($ser_price).' บาท</td>
                </tr>
            </tfoot>
            ';

$html.='        </table>
      
        ';
$html.='<p style="font-size:12px;">หมายเหตุ: 1.ทางร้านจะคืนสินค้าให้แก่ผู้ที่นำเอกสารนี้มารับเท่านั้น เมื่อไม่มีการติดต่อกลับจากลูกค้าหลังได้รับจากทางร้านนานเกิน30วันหรือเบอร์โทรศัพท์ที่&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ให้ไว้ไม่สามารถติดต่อได้นานเกิน60วันทางร้านจะไม่รับผิดชอบใดๆทั้งสิ้น<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.ทางร้านจะรับผิดชอบตามอาการที่แจ้งซ่อมเท่านั้น หากมีอาการอื่นๆที่ไม่ได้ระบุทางร้านขอสงวนสิทธิ์คิดค่าบริการตามปกติ</p>';
$html.='

<table>
<br><br>
<tr>
<td colspan="2" style="text-align:left;font-size:/16px;"><p>.........................................ลูกค้า</p></td>
<td colspan="2" style="text-align:right;font-size:/16px;"><p>........................................พนักงาน</p></td>
</tr>
<tr>
<td colspan="2" style="text-align:left;font-size:/16px;"><p>วันที่ .........../................./............</p></td>
<td colspan="2" style="text-align:right;font-size:/16px;"><p>วันที่ ................/................./............</p></td>
</tr>
</table>


';
$pdf->AddPage();


// ข้อมูลที่จะแสดงในเนื้อหา
       

$html.=' <br>
<table>
<tr>
    <td style="text-align:center;font-size:/24px;"><b>ร้าน '.$sp_name.'</b></td><br>
</tr>
<tr>
    <td style="text-align:center;font-size:/16px;"><b>ที่อยู่ร้าน '  .$sp_add.'&nbsp; อำเภอ &nbsp;'.$ampher_sp .'&nbsp; ตำบล &nbsp;'.$dis_sp.'&nbsp; จังหวัด &nbsp;'.$pro_sp.'&nbsp; รหัสไปรษณี &nbsp;'.$pos_sp.'</b></td><br>
</tr>
<tr>
    <td style="text-align:center;font-size:/16px;"><b>เลขผู้เสียภาษี '  .$sp_tax.'&nbsp; เบอร์โทรร้าน &nbsp;'.$sp_phone .'&nbsp; E-mail &nbsp;'.$sp_email.'</b></td><br>
</tr>
<br>
<tr>
    <td style="text-align:center;font-size:/20px;"><b>ใบรับซ่อมสินค้า</b></td><br>
</tr>
';
    
$html.= '
</table>
<br>';


$html.='<table>
<tr>
<td colspan="2" style="text-align:left;font-size:/16px;"><p>วันที่รับซ่อมสินค้า '  .$date_check1.'</p></td>
<td colspan="2" style="text-align:right;font-size:/16px;"><p> ออกโดย'.$sess_idsf.'</p></td>

</tr>
</table>';
$html.='

<table >
<tr>
<td colspan="2" style="text-align:left;font-size:/16px;"><p>ชื่อลูกค้า '. $cus_fname .'&nbsp;'. $cus_lname.'</p></td>
<td colspan="2" style="text-align:right;font-size:/16px;"><p>เบอร์โทรลูกค้า '.$cus_phone.'</p></td>
</tr>
</table>
<table>
<tr>
<td colspan="2" style="text-align:left;font-size:/16px;"><p>ที่อยู่ลูกค้า '  .$cus_add.'อำเภอ &nbsp;'.$cus_ampher.'ตำบล &nbsp;'.$cus_dis.'จังหวัด &nbsp;'.$cus_pro.'รหัสไปรษณี &nbsp;'.$cus_pos.'</p></td>
<td colspan="2" style="text-align:right;font-size:/16px;"><p>E-mail ลูกค้า '.$cus_email.'</p></td>
</tr>
</table>
<br><hr>';

$html.='
<table>
            <tr>
                <th style="text-align:center;">ลำดับ</th>
                <th colspan="4" style="text-align:center;">รายละเอียดงาน</th>
                <th style="text-align:center;">จำนวน</th>
                <th colspan="2"  style="text-align:center;">ประเมินค่าซ่อม</th>
            </tr>';
   
                                           
$html.='<tr>
                <td style="text-align:center;">1</td>
                <td colspan="4">สินค้า '.$devi_type.'<br>ยี่ห้อ '.$devi_class.'<br>รุ่น '.$devi_sub_class.' 
                <br>สี'.$devi_color.'<br>IEMI '.$devi_iemi.'<br>Serial '.$devi_serial_no.' 
                <br>สภาพเครื่อง '.$ser_detail.'
                <br>อาการเสีย '.$ser_sick.'
                <br>อุปกรณ์ที่นำมาด้วย '.$ser_device.'
                <br>อุปกรณ์อื่นๆ '.$ser_otherd.'
                <br>บันทึกเพิ่มเติม '.$ser_other.'</td>
               
                <td style="text-align:center;">1</td>
                
                <td colspan="2" style="text-align:center;">'.number_format($ser_price).' บาท</td>
            </tr><br><hr>
                <tfoot>
                <tr>
                <td></td>
                <td colspan="4" style="text-align:center;">วันที่รับสินค้า '.$date_end.'</td>
                <td style="text-align:right;">ราคาสุทธิ</td>
                <td colspan="2" style="text-align:center;">'.number_format($ser_price).' บาท</td>
                </tr>
            </tfoot>
            ';

$html.='        </table>
      
        ';
$html.='<p style="font-size:12px;">หมายเหตุ: 1.ทางร้านจะคืนสินค้าให้แก่ผู้ที่นำเอกสารนี้มารับเท่านั้น เมื่อไม่มีการติดต่อกลับจากลูกค้าหลังได้รับจากทางร้านนานเกิน30วันหรือเบอร์โทรศัพท์ที่&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ให้ไว้ไม่สามารถติดต่อได้นานเกิน60วันทางร้านจะไม่รับผิดชอบใดๆทั้งสิ้น<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.ทางร้านจะรับผิดชอบตามอาการที่แจ้งซ่อมเท่านั้น หากมีอาการอื่นๆที่ไม่ได้ระบุทางร้านขอสงวนสิทธิ์คิดค่าบริการตามปกติ</p>';
$html.='

<table>
<br><br>
<tr>
<td colspan="2" style="text-align:left;font-size:/16px;"><p>.........................................ลูกค้า</p></td>
<td colspan="2" style="text-align:right;font-size:/16px;"><p>........................................พนักงาน</p></td>
</tr>
<tr>
<td colspan="2" style="text-align:left;font-size:/16px;"><p>วันที่ .........../................./............</p></td>
<td colspan="2" style="text-align:right;font-size:/16px;"><p>วันที่ ................/................./............</p></td>
</tr>
</table>


';

// กำหนดการแสดงข้อมูลแบบ HTML
// สามารถกำหนดความกว้างความสูงของกรอบข้อความ
// กำหนดตำแหน่งที่จะแสดงเป็นพิกัด x กับ y ซึ่ง x คือแนวนอนนับจากซ้าย ส่วน y คือแนวตั้งนับจากด้านล่าง
$pdf->writeHTMLCELL(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// กำหนดการชื่อเอกสาร และรูปแบบการแสดงผล
ob_end_clean();
$pdf->Output('ใบรับซ่อมสินค้า.pdf', 'I');?>
<?php die();?>