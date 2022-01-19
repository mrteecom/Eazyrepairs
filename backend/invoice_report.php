<?php

require_once("h.php");
require_once("navbar.php");
require_once("../chksession_user.php");
require_once("../inc/connect.php");

$id_cus = $_GET['id_cus'];
$id_ser = $_GET['id_ser'];
$id_devi = $_GET['id_devi'];
$type_print = $_GET['type_print'];

$sql4="SELECT * from  shop where id_sp='$sess_idshop'";
    $result4=mysql_db_query($dbname,$sql4);
    $r4 = mysql_fetch_array($result4);
    $id_sp=$r4['id_sp'];
    $sp_name=$r4['sp_name'];


   

    $thaimonth=array("00"=>"","01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน","05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฎาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");

    $sql1="SELECT * from  shop sp inner join staff sf on sp.id_sp = sf.id_sp where sp.id_sp='$sess_idshop' ";
        $result1=mysql_db_query($dbname,$sql1);
        $r3 = mysql_fetch_array($result1);
        $id_sp=$r3['id_sp'];
        $sp_name=$r3['sp_name'];
        $sp_logo=$r3['sp_logo'];
        $sp_tax=$r3['sp_tax'];
        $fname=$r3['sf_fname'];
        $lname=$r3['sf_lname'];
    
        $date_check = date('Y-m-d');
        $Date = explode("-", $date_check);
        $date_check1 = $Date[2] . "&nbsp;" . $thaimonth[$Date[1]] . "&nbsp;" . ($Date[0]+543);
        $sess_idsf= $fname . $lname;

        $sql2= "SELECT * FROM add_sp asp INNER JOIN shop sp ON asp.id_sp=sp.id_sp WHERE asp.id_sp= '$sess_idshop'";
        $res=mysql_db_query($dbname,$sql2);
        $r8 = mysql_fetch_array($res);
        $sp_add=$r8['sp_add'];
        $pro_sp=$r8['pro_sp'];
        $ampher_sp=$r8['ampher_sp'];
        $dis_sp=$r8['dis_sp'];
        $pos_sp=$r8['pos_sp'];
        $sp_phone=$r8['sp_phone'];
        $sp_email=$r8['sp_email'];
        $sp_fb=$r8['sp_fb'];
        $sp_line=$r8['sp_line'];

        $sql="SELECT * from  service  inner join customer on service.id_cus = customer.id_cus join device on customer.id_cus = device.id_cus where customer.id_sp = '$sess_idshop' and (service.id_ser = '$id_ser' and device.id_devi ='$id_devi')";
            $result=mysql_db_query($dbname,$sql);
            $r2 = mysql_fetch_array($result);
            $id_cus=$r2['id_cus'];
            $id_ser=$r2['id_ser'];
            $cus_fname=$r2['cus_fname'];
            $cus_lname=$r2['cus_lname'];
            $cus_add=$r2['cus_add'];
            $cus_pro=$r2['cus_pro'];
            $cus_ampher=$r2['cus_ampher'];
            $cus_dis=$r2['cus_dis'];
            $cus_pos=$r2['cus_pos'];
            $cus_email=$r2['cus_email'];
            $cus_phone=$r2['cus_phone'];
            $ser_date_s=$r2['ser_date_s'];
            $ser_date_re=$r2['ser_date_re'];
            $ser_date_e=$r2['ser_date_e'];
            $devi_type=$r2['devi_type'];    
            $devi_class=$r2['devi_class'];
            $devi_sub_class=$r2['devi_sub_class'];
            $devi_color=$r2['devi_color'];
            $devi_iemi=$r2['devi_imei'];
            $devi_ram=$r2['devi_ram'];
            $devi_serial_no=$r2['devi_serial_no'];
            $ser_detail =$r2['ser_detail'];
            $ser_sick =$r2['ser_sick'];
            $ser_device =$r2['ser_device'];
            $ser_otherd =$r2['ser_otherd'];
            $ser_other =$r2['ser_orther'];
            $ser_price =$r2['ser_price'];
            $ser_price2 =$r2['ser_price2'];
            $ser_tech =$r2['ser_tech'];
            $ser_netprice =$r2['ser_netprice'];
            $code_ser =$r2['code_ser'];
            $code2_ser =$r2['code2_ser'];

            $total = number_format($ser_netprice);
            

            
    $Date_s = explode(" ",$ser_date_s);
    $Date_s2 = explode("-", $Date_s[0]);
    $date_sch1 = $Date_s2[2] . "&nbsp;" . $thaimonth[$Date_s2[1]] . "&nbsp;" . ($Date_s2[0]+543);
    
  $Date_s1 = explode(" ",$ser_date_e);
  $Date_s3 = explode("-", $Date_s1[0]);
  $date_end = $Date_s3[2] . "&nbsp;" . $thaimonth[$Date_s3[1]] . "&nbsp;" . ($Date_s3[0]+543);
      
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="callout callout-info">
                        <h5><i class="fas fa-info"></i> หมายเหตุ :</h5>
                        หน้านี้จะแสดงตัวอย่างใบรับซ่อมสินค้า
                    </div>
                    <div class="callout callout-info">
                        <h5><i class="fas fa-info"></i> โปรดระบุประเภทใบรับซ่อมสินค้าที่ต้องการปริ้น</h5>
                        <form action="invoice_report.php" method="GET">
                            <div class="row">
                            <div class="col">
                            <label for="">รหัสลูกค้า</label>
                            <input type="text" class="form-control" name="id_cus" id="id_cus" value="<?php echo "$id_cus";?>" readonly >
                            </div>
                            <div class="col">
                            <label for="">รหัสใบแจ้งซ่อม</label>
                            <input type="text" class="form-control" name="id_ser" id="id_ser" value="<?php echo "$id_ser";?>" readonly>

                            </div>
                            <div class="col">
                            <label for="">รหัสอุปกรณ์</label>
                            <input type="text" class="form-control" name="id_devi" id="id_devi" value="<?php echo "$id_devi";?>" readonly>
                            </div>
                            
                                <div class="col">
                                    <label for="">รูปแบบที่ต้องการปริ้น</label>
                                    <select class="form-control" name="type_print" id="type_print" required>
                                        <option selected disabled>โปรดระบุรูปแบบที่ต้องการปริ้น</option>
                                        <option value="3">ปริ้นเฉพาะต้นฉบับ</option>
                                        <option value="1">ปริ้นเฉพาะสำเนา</option>
                                        <option value="2">ปริ้นต้นฉบับและสำเนา</option>
                                    </select>
                                </div>

                                <div class="col">
                                    <label>ยืนยัน</label>
                                    <button  type="submit" class="form-control btn btn-info">ยืนยัน</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Main content -->
                    <div class="invoice p-3 mb-3">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-12">
                                <h2 class="page-header">
                                    <img src="../backend/images/<?php echo $sp_logo;?>"
                                        style="width:64px; height:64px;" alt="<?php echo $sp_name;?>">
                                    <?php echo $sp_name;?>
                                    <small class="float-right">ใบรับซ่อมสินค้า</small>
                                </h2>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- info row -->
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                ที่อยู่
                                <address>
                                    <strong><?php echo $sp_name;?></strong><br>
                                    ที่อยู่ <?php echo $sp_add;?> <br>ตำบล <?php echo $dis_sp;?><br>
                                    อำเภอ <?php echo $ampher_sp;?><br>จังหวัด <?php echo $pro_sp;?><br>รหัสไปรษณี
                                    <?php echo $pos_sp;?><br>
                                    เบอร์โทรศัพท์: <?php echo $sp_phone;?><br>
                                    <?php if(!$sp_email){ ?>อีเมล์ : -
                                    <?php }else{ ?>อีเมล์ : <?php echo $sp_email;?>
                                    <?php  } ?><br>

                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                ข้อมูลลูกค้า
                                <address>
                                    <strong><?php echo $cus_fname;?> <?php echo $cus_lname;?></strong><br>
                                    ที่อยู่ <?php echo $cus_add;?> <br>ตำบล <?php echo $cus_dis;?><br>
                                    อำเภอ <?php echo $cus_ampher;?><br>จังหวัด <?php echo $cus_pro;?><br>รหัสไปรษณี
                                    <?php echo $cus_pos;?><br>
                                    เบอร์โทรศัพท์: <?php echo $cus_phone;?><br>
                                    <?php if(!$cus_email){ ?>อีเมล์ : -
                                    <?php }else{ ?>อีเมล์ : <?php echo $cus_email;?>
                                    <?php } ?>

                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                <b>ใบรับซ่อม <?php echo $code_ser;?></b><br>

                                <br>
                                <b>วันที่ทำรายการ :</b> <?php echo $date_check1;?><br>
                                <b>วันที่รับคืน :</b> <?php echo $date_end;?><br>
                                <b>เวลารับคืน :</b> <?php echo  $Date_s1[1];?> น. <br>
                                <b>ช่างซ่อม :</b> <?php echo $ser_tech;?>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- Table row -->
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col" style="text-align:center;">ลำดับ</th>
                                            <th scope="col" colspan="4" style="text-align:center;">รายละเอียดงาน
                                            </th>
                                            <th scope="col" style="text-align:center;">จำนวน</th>
                                            <th scope="col" colspan="2" style="text-align:center;">ประเมินค่าซ่อม
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row" style="text-align:center;">1</th>
                                            <td colspan="4">&nbsp;&nbsp;<?php echo $devi_type;?> ยี่ห้อ
                                                <?php echo $devi_class;?> รุ่น <?php echo $devi_sub_class;?>
                                                <br>&nbsp;&nbsp;ความจุ <?php echo $devi_ram;?> สี
                                                <?php echo $devi_color;?>
                                                IEMI <?php echo $devi_iemi;?>
                                                <br>&nbsp;&nbsp;Serial <?php echo $devi_serial_no;?>
                                                <br>&nbsp;&nbsp;อาการเสีย <?php echo $ser_sick;?>
                                                <br>&nbsp;&nbsp;บันทึกเพิ่มเติม <?php echo $ser_other;?>
                                            </td>
                                            <td style="text-align:center;">1</td>
                                            <td colspan="2" style="text-align:center;">
                                                <?php echo number_format($ser_price,2);?> บาท</td>
                                        </tr>


                                    </tbody>
                                </table>

                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <div class="row">
                            <!-- accepted payments column -->
                            <div class="col-6">
                                <p class="lead">จะแสดงบาร์โค้ดหลังกดปริ้น</p>
                                <div style="width:500px;margin:auto;">
                                    <p></p>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-6">
                                <p class="lead"></p>

                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <th>ราคา :</th>
                                            <td class="text-right"><?php echo number_format($ser_price,2);?> บาท</td>
                                        </tr>
                                        <?php if(!$sp_tax){ ?>
                                            <?php }else{ ?>
                                            <tr>
                                                <th>ภาษี7% :</th>
                                                <td class="text-right"><?php echo number_format($ser_price2,2); ?> บาท</td>
                                            </tr>
                                            <?php }?>
                                        <tr>
                                            <th>ราคาสุทธิ :</th>
                                            <td class="text-right"><?php echo number_format($ser_netprice,2); ?> บาท
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <div class="row">
                            <div class="col-12 table-responsive">
                                <div class="table-responsive">
                                    <table class="table">
                                        <ol style="font-size:14px;" start=1>
                                            <lh> หมายเหตุ</lh>
                                            <li>ลูกค้าต้องนำใบรับซ่อมนี้ มาแสดงทุกครั้งที่มารับเครื่อง</li>
                                            <li>ลูกค้าจะต้องมารับเครื่องคืน และชำระสินค้าภายใน 30 วัน
                                                นับตั้งแต่วันที่ทางร้านแจ้งว่าซ่อมเสร็จเรียบร้อย</li>
                                            <li>หากลูกค้าไม่มารับเครื่องซ่อม ภายใน 30 วัน หลังจากที่ทางร้านได้แจ้งไป
                                                ถือว่าลูกค้าได้ยินยอมให้ทางร้านนำเครื่องไปบริจาค หรือ
                                                ดำเนินการใดตามที่ทางร้านเห็นสมควร
                                                โดยที่ลูกค้าไม่ติดใจเรียกร้องใดๆ ทั้งสิ้น</li>
                                            <li>ทางร้านรับประกันเฉพาะค่าแรง ในอาการเดิมที่ซ่อมไป ภายในระยะเวลา 30 วัน
                                                (การซ่อมเครื่องที่ตกกระแทก
                                                หรือ ตกน้ำ หรือ โดนความชื้น หรือ เคยซ่อมที่อื่นมาแล้ว หรือ
                                                ลูกค้าแกะเครื่องเองมาก่อนแล้ว
                                                ลูกค้าจะต้องยอมรับความเสี่ยงที่อาจจะมีอาการแทรกซ้อนตามมาได้
                                                โดยทางร้านจะไม่รับผิดชอบใดๆทุกกรณี)
                                            </li>
                                            <li>เครื่องที่ลูกค้าทำตกน้ำ หรือ ตกกระแทกมา โดยที่ลูกค้าไม่รู้ หรือ
                                                ตั้งใจปกปิดไม่แจ้งทางร้าน
                                                หรือพนักงานรับเครื่อง หากมีอาการแทรกซ้อนใดๆ ทางร้านจะไม่รับผิดชอบทุกกรณี
                                            </li>
                                            <li>การซ่อมเครื่องที่เปิดไม่ติด หรือไม่สามารถเข้าใช้งานได้
                                                หากทางร้านซ่อมเครื่องจนเปิดติดได้แล้ว
                                                หากมีอุปกรณ์อื่นภายในเสียหาย ทางร้านจะคิดค่าบริการเพิ่มตามจริง
                                                (เพราะทางร้านไม่สามารถเช็คได้ว่าอุปกรณ์นั้นๆ
                                                สามารถใช้ได้อยู่จริงหรือไม่เนื่องจากลูกค้าส่งเครื่องมาซ่อมในอาการเปิดไม่ติดหรือไม่สามารถเข้าเช็คใดๆ
                                                ได้</li>
                                            <li>กรณีเครื่องที่มาซ่อมในอาการต่างๆ หากจำเป็นที่จะต้องล้างข้อมูล หรือ
                                                ทำซอฟต์แวร์ใหม่
                                                ทางร้านจะแจ้งให้ลูกค้าทราบก่อน หากทางร้านแก้ไขอาการเสียได้แล้ว
                                                เครื่องติดล็อคแอคเคาท์ เช่น
                                                ICLOUD ,
                                                G-MAIL หรือ แอคเคาท์ใดๆ ทางร้านจะคิดค่าบริการเพิ่มตามจริง
                                                โดยลูกค้ายินยอมและเข้าใจเงื่อนไขนี้
                                            </li>
                                        </ol>
                                        <tr>
                                            <td colspan="2" style="text-align:left;font-size:/16px;">
                                                <p>.........................................ลูกค้า</p>
                                            </td>
                                            <td colspan="2" style="text-align:right;font-size:/16px;">
                                                <p>........................................พนักงาน</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" style="text-align:left;font-size:/16px;">
                                                <p>วันที่ .........../................./............</p>
                                            </td>
                                            <td colspan="2" style="text-align:right;font-size:/16px;">
                                                <p>วันที่ ................/................./............</p>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <table border="0">

                        </table>
                        <!-- this row will not appear when printing -->
                        <div class="row no-print">
                        <?php if(!$type_print){?>
                                    <button type="button" class="btn btn-danger disabled"><i class="fas fa-print"></i>โปรดระบุรูปแบบการปริ้นก่อนครับ</button>
                            <?php }else{?>
                            <div class="col-12">
                                <?php if($type_print == 3){?>
                                <a href="new_report.php?id_ser=<?php echo"$id_ser";?>&id_cus=<?php echo"$id_cus";?>&id_devi=<?php echo"$id_devi";?>&type_print=<?php echo "$type_print";?>"
                                    rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i>
                                    พิมพ์เฉพาะต้นฉบับ</a>
                                <?php }elseif($type_print == 1){?>
                                    <a href="new_report.php?id_ser=<?php echo"$id_ser";?>&id_cus=<?php echo"$id_cus";?>&id_devi=<?php echo"$id_devi";?>&type_print=<?php echo "$type_print";?>"
                                    rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i>
                                    พิมพ์เฉพาะสำเนา</a>
                                <?php }else {?>
                                    <a href="new_report.php?id_ser=<?php echo"$id_ser";?>&id_cus=<?php echo"$id_cus";?>&id_devi=<?php echo"$id_devi";?>&type_print=<?php echo "$type_print";?>"
                                    rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i>
                                    พิมพ์ทั้งต้นฉบับและสำเนา</a>
                                <?php }?>
                            </div>
                            <?php }?>
                        </div>
                    </div>
                    <!-- /.invoice -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php require_once("f.php"); ?>