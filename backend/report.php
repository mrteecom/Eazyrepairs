
<?php
 //เรียกใช้งาน libray ในการเจน pdf
require_once('../api/tcpdf/tcpdf.php');
session_start();

require_once('../inc/connect.php');
require_once('../chksession_user.php');
session_start();

$id_cus = $_GET[id_cus];
$id_ser = $_GET[id_ser];
$id_devi = $_GET[id_devi];

$thaimonth=array("00"=>"","01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน","05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฎาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");

$sql1="select * from  shop sp inner join staff sf on sp.id_sp = sf.id_sp where sp.id_sp='$sess_idshop' ";
    $result1=mysql_db_query($dbname,$sql1);
    $r3 = mysql_fetch_array($result1);
      $id_sp=$r3[id_sp];
      $sp_name=$r3[sp_name];
      $sp_logo=$r3[sp_logo];
      $sp_tax=$r3[sp_tax];
      $fname=$r3[sf_fname];
      $lname=$r3[sf_lname];
   
      $date_check = date('Y-m-d');
      $Date = explode("-", $date_check);
      $date_check1 = $Date[2] . "&nbsp;" . $thaimonth[$Date[1]] . "&nbsp;" . ($Date[0]+543);
      $sess_idsf= $fname . $lname;

      $sql2= "SELECT * FROM add_sp asp INNER JOIN shop sp ON asp.id_sp=sp.id_sp WHERE asp.id_sp= '$sess_idshop'";
      $res=mysql_db_query($dbname,$sql2);
      $r8 = mysql_fetch_array($res);
      $sp_add=$r8[sp_add];
      $pro_sp=$r8[pro_sp];
      $ampher_sp=$r8[ampher_sp];
      $dis_sp=$r8[dis_sp];
      $pos_sp=$r8[pos_sp];
      $sp_phone=$r8[sp_phone];
      $sp_email=$r8[sp_email];
      $sp_fb=$r8[sp_fb];
      $sp_line=$r8[sp_line];

      $sql="select * from  service  inner join customer on service.id_cus = customer.id_cus join device on customer.id_cus = device.id_cus where customer.id_sp = '$sess_idshop' and (service.id_ser = '$id_ser' and device.id_devi ='$id_devi')";
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
        $ser_date_re=$r2[ser_date_re];
        $ser_date_e=$r2[ser_date_e];
        $devi_type=$r2[devi_type];    
        $devi_class=$r2[devi_class];
        $devi_sub_class=$r2[devi_sub_class];
        $devi_color=$r2[devi_color];
        $devi_iemi=$r2[devi_imei];
        $devi_ram=$r2[devi_ram];
        $devi_serial_no=$r2[devi_serial_no];
        $ser_detail =$r2[ser_detail];
        $ser_sick =$r2[ser_sick];
        $ser_device =$r2[ser_device];
        $ser_otherd =$r2[ser_otherd];
        $ser_other =$r2[ser_orther];
        $ser_price =$r2[ser_price];
        $ser_price2 =$r2[ser_price2];
        $ser_tech =$r2[ser_tech];
        $ser_netprice =$r2[ser_netprice];

        $total = number_format($ser_netprice);
        $code_ser =$r2[code_ser];
        $code2_ser =$r2[code2_ser];

        
  $Date_s = explode(" ",$ser_date_s);
  $Date_s2 = explode("-", $Date_s[0]);
  $date_sch1 = $Date_s2[2] . "&nbsp;" . $thaimonth[$Date_s2[1]] . "&nbsp;" . ($Date_s2[0]+543);

  $Date_s1 = explode(" ",$ser_date_e);
  $Date_s3 = explode("-", $Date_s1[0]);
  $date_end = $Date_s3[2] . "&nbsp;" . $thaimonth[$Date_s3[1]] . "&nbsp;" . ($Date_s3[0]+543);                       

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('ใบรับซ่อมสินค้า');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_RIGHT);

//set auto page breaks
$pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);

//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

//set some language-dependent strings
$pdf->setLanguageArray($l);

// ---------------------------------------------------------
// set font

// define barcode style
$style = array(
    'position' => 'R',
    'align' => 'C',
    'stretch' => false,
    'fitwidth' => true,
    'cellfitalign' => '',
    'border' => true,
    'hpadding' => 'auto',
    'vpadding' => 'auto',
    'fgcolor' => array(0,0,0),
    'bgcolor' => false, //array(255,255,255),
    'text' => true,
    'font' => 'cordiaupc',
    'fontsize' => 8,
    'stretchtext' => 4
);  

$fornt = array(
    
    'font' => 'cordiaupc',
    'fontsize' => 20,

);

//$fontname = $pdf->addTTFfont('fonts/Browa.ttf', 'TrueTypeUnicode', '', 32);
$pdf->SetFont('cordiaupc', '', 12);



$pdf->setPageOrientation('P', $autopagebreak = '', $bottommargin = '');
// get the current page break margin
$bMargin = $pdf->getBreakMargin();
// get current auto-page-break mode
$auto_page_break = $pdf->getAutoPageBreak();
// disable auto-page-break
$pdf->SetAutoPageBreak(true, 0);
// Set some content to print

//ส่วนหัวเองสาร
$header_html  .= <<<EOD

<table>
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col">&nbsp;&nbsp;&nbsp;<img src="images/{$sp_logo}"
      style="width:64px; height:64px;" alt="{$sp_name}"></th>
      <th scope="col" colspan="2"></th>
    </tr>
  </thead>
  
</table><br>
<table border="1">
  <tbody>
    <tr>
      <th scope="row" colspan="2"><b style="text-align:left;font-size:25px;">&nbsp; {$sp_name}</b><br/>&nbsp; {$sp_add} อ.{$ampher_sp} ต.{$dis_sp} จ.{$pro_sp} <br>&nbsp; รหัสไปรษณีย์ {$pos_sp} โทร : {$sp_phone}<br/>&nbsp; อีเมล์ : {$sp_email}</th>

      <td colspan="2"><b style="text-align:center;font-size:25px;">ใบรับซ่อมสินค้า</b><br>&nbsp;<b>เลขที่ใบรับซ่อมสินค้า : </b>{$code_ser}<br><b>&nbsp; เลขประจำตัวผู้เสียภาษี : </b>{$sp_tax}<br><b>&nbsp; วันที่ออกใบกำกับภาษี : </b>{$date_sch1}</td>
    </tr>
    
  </tbody>
</table>
<br><br>
<table border="1">
  <tbody>
    <tr>
    <th scope="row" colspan="2"><b>&nbsp; ข้อมูลลูกค้า</b><br><b>&nbsp; ที่อยู่ลูกค้า</b>:<br>&nbsp; {$cus_add} อ.{$cus_ampher} ต.{$cus_dis} จ.{$cus_pro}<br>&nbsp; รหัสไปรษณีย์ {$cus_pos}</th>
    <td colspan="2"><b>&nbsp; ชื่อลูกค้า</b>: {$cus_fname} {$cus_lname}<br><b>&nbsp; เบอร์ติดต่อ</b>: {$cus_phone}<br><b>&nbsp; ช่าง</b>: {$ser_tech}</td>
  </tr>
  </tbody>
</table>
EOD;
//ส่วนหัวเองสาร

EOD;
//ส่วนตัวเองสาร
$body_html  .= <<<EOD
<br><br>
<table border="1">
  <thead>
    <tr>
      <th scope="col" style="text-align:center;">ลำดับ</th>
      <th scope="col" colspan="4" style="text-align:center;">รายละเอียดงาน</th>
      <th scope="col" style="text-align:center;">จำนวน</th>
      <th scope="col" colspan="2" style="text-align:center;">ประเมินค่าซ่อม</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row" style="text-align:center;">1</th>
      <td colspan="4">&nbsp;&nbsp;{$devi_type} ยี่ห้อ {$devi_class} รุ่น {$devi_sub_class }
      <br>&nbsp;&nbsp;ความจุ {$devi_ram} สี {$devi_color} IEMI {$devi_iemi} <br>&nbsp;&nbsp;Serial {$devi_serial_no}
      <br>&nbsp;&nbsp;อาการเสีย {$ser_sick}
      <br>&nbsp;&nbsp;บันทึกเพิ่มเติม {$ser_other}</td>
      <td style="text-align:center;">1</td>
      <td colspan="2" style="text-align:center;">{$total} บาท</td>
    </tr>
    <tr>
      <th scope="row" style="text-align:center;"></th>
      <td colspan="4">&nbsp;&nbsp;วันที่รับสินค้า {$date_end} เวลา {$Date_s1[1]} น.</td>
      <td style="text-align:center;">ราคาสุทธิ</td>
      <td colspan="2" style="text-align:center;">{$total} บาท</td>
    </tr>
  </tbody>
</table>

EOD;
//ส่วนท้ายเอกสาร
$footer_html2  .= <<<EOD
<br><br>
<table border="1">
<ol style="font-size:14px;" start=1>
    <lh> หมายเหตุ</lh>
    <li>ลูกค้าต้องนำใบรับซ่อมนี้ มาแสดงทุกครั้งที่มารับเครื่อง</li>
    <li>ลูกค้าจะต้องมารับเครื่องคืน และชำระสินค้าภายใน 30 วัน นับตั้งแต่วันที่ทางร้านแจ้งว่าซ่อมเสร็จเรียบร้อย</li>
    <li>หากลูกค้าไม่มารับเครื่องซ่อม ภายใน 30 วัน หลังจากที่ทางร้านได้แจ้งไป  ถือว่าลูกค้าได้ยินยอมให้ทางร้านนำเครื่องไปบริจาค หรือ ดำเนินการใดตามที่ทางร้านเห็นสมควร โดยที่ลูกค้าไม่ติดใจเรียกร้องใดๆ ทั้งสิ้น</li>
    <li>ทางร้านรับประกันเฉพาะค่าแรง ในอาการเดิมที่ซ่อมไป ภายในระยะเวลา 30 วัน (การซ่อมเครื่องที่ตกกระแทก หรือ ตกน้ำ หรือ โดนความชื้น หรือ เคยซ่อมที่อื่นมาแล้ว หรือ ลูกค้าแกะเครื่องเองมาก่อนแล้ว ลูกค้าจะต้องยอมรับความเสี่ยงที่อาจจะมีอาการแทรกซ้อนตามมาได้ โดยทางร้านจะไม่รับผิดชอบใดๆทุกกรณี)</li>
    <li>เครื่องที่ลูกค้าทำตกน้ำ หรือ ตกกระแทกมา โดยที่ลูกค้าไม่รู้ หรือ ตั้งใจปกปิดไม่แจ้งทางร้าน หรือพนักงานรับเครื่อง หากมีอาการแทรกซ้อนใดๆ ทางร้านจะไม่รับผิดชอบทุกกรณี</li>
<li>การซ่อมเครื่องที่เปิดไม่ติด หรือไม่สามารถเข้าใช้งานได้ หากทางร้านซ่อมเครื่องจนเปิดติดได้แล้ว หากมีอุปกรณ์อื่นภายในเสียหาย ทางร้านจะคิดค่าบริการเพิ่มตามจริง (เพราะทางร้านไม่สามารถเช็คได้ว่าอุปกรณ์นั้นๆ สามารถใช้ได้อยู่จริงหรือไม่เนื่องจากลูกค้าส่งเครื่องมาซ่อมในอาการเปิดไม่ติดหรือไม่สามารถเข้าเช็คใดๆ ได้</li>
<li>กรณีเครื่องที่มาซ่อมในอาการต่างๆ หากจำเป็นที่จะต้องล้างข้อมูล หรือ ทำซอฟต์แวร์ใหม่ ทางร้านจะแจ้งให้ลูกค้าทราบก่อน หากทางร้านแก้ไขอาการเสียได้แล้ว เครื่องติดล็อคแอคเคาท์ เช่น ICLOUD , G-MAIL หรือ แอคเคาท์ใดๆ ทางร้านจะคิดค่าบริการเพิ่มตามจริง โดยลูกค้ายินยอมและเข้าใจเงื่อนไขนี้</li>
  </ol>
</table>

  <table>
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col" colspan="2"></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row" colspan="2" style="text-align:left;font-size:16px;"><p>.........................................ลูกค้า</p></th>
      <td></td>
      <td colspan="2" style="text-align:right;font-size:16px;"><p>........................................พนักงาน</p></td>
    </tr>
    <tr>
    <th scope="row" colspan="2" style="text-align:left;font-size:16px;"><p>วันที่ .........../................./............</p></th>
    <td></td>
    <td colspan="2" style="text-align:right;font-size:16px;"><p>วันที่ ................/................./............</p></td>
  </tr>
  </tbody>
</table>
EOD;
$pdf->AddPage();
//แสดงในข้อมูลทั้งหมดในรูปแบบ pdf
$html = <<<EOD
{$header_html}
{$body_html}
{$footer_html2}
<br><br><br><br>
EOD;


// Print text using writeHTMLCell()

$pdf->Cell(18,0, 'ส่วนของลูกค้า','B', 1, 'L');
$pdf->write1DBarcode($code_ser, 'C128', '', '', '', 18, 0.4, $style, 'N');

$pdf->Ln(2);
$pdf->writeHTMLCELL(0, 0, '', '', $html, 0, 1, 0, true, '', true);
// ข้อมูลที่จะแสดงในเนื้อหา
$pdf->Cell(16,0, 'ส่วนของร้าน','B', 1, 'L');
$pdf->write1DBarcode($code_ser, 'C128', '', '', '', 18, 0.4, $style, 'N');

$pdf->Ln(2);
$pdf->writeHTMLCELL(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
ob_end_clean();
$filename = 'IP_'.$code_ser;
$pdf->Output($filename.'.pdf', 'I')

?>