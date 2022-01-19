<?php
include "../chksession_user.php";
include "h.php";
include "navbar.php";
require "../inc/connect.php"; //เชื่อมต่อฐานข้อมูล
//echo "$sess_idshop";
$today = date('Y-m-d');
$mount = date('Y-m');
$count_mo = 0; $net_price = 0;  $ser_s1 = 0 ; $ser_s2=0;
$allnet_price = 0 ;$count_re = 0 ;$count_ser_all_m=0;$count_ser_all_m1 =0;$count_ser_all_m2=0;$count_re2=0;$count_re1=0;$count_re3=0;


 
///-------------ยอดขายประจำวันและประจำเดือน-----------------///

$sql="select * from service where id_sp = '$sess_idshop'  ";
$result=mysql_db_query($dbname,$sql);
while($r = mysql_fetch_array($result)){
    $ser_status = $r[ser_status];//สถานะใบแจ้งซ่อม


    $date_to_s = $r[ser_date_s]; //วันเวลาที่ใบแจ้งซ่อม
    $Date_s2 = explode(" ", $date_to_s); //วันที่ใบแจ้งซ่อม
    $Date_s3 = explode("-", $Date_s2[0]);
    $Date_s4 = $Date_s3[0].'-'.$Date_s3[1]; //เดือนปีในใบแจ้งซ่อม

    $ser_date_re = $r[ser_date_s]; //วันเวลาที่ใบเสร็จ
    $Date_re2 = explode(" ", $ser_date_re);//วันเวลาที่ใบเสร็จ
    $Date_re3 = explode("-", $Date_re2[0]);
    $Date_re4 = $Date_re3[0].'-'.$Date_re3[1]; //เดือนปีในใบเสร็จ




//---------------------ยอดขายต่อวัน---------------------------//
    if($Date_s2[0] == $today){
        if($Date_re2[0] == $today){
            $net_price = $r[ser_netprice];
            $allnet_price = $allnet_price + $net_price ;
        }//endif
/////-----------------ใบแจ้งซ่อมทั้งหมดวันนี้--------------------------///
   
        $count_re1++;
    
/////-----------------ใบแจ้งซ่อมวันนี้ที่เสร็จ--------------------------///

        if($ser_status <='4' ){
            $count_re2++;
        }  else 
/////-----------------ใบแจ้งซ่อมวันนี้ที่ยังไม่เสร็จ--------------------------///
        if( $ser_status >='5' ){
            $count_re3++;
        }   
   
    } //endif
//echo " $ser_date_re / $Date_re4 <br>";
//----------------------ยอดขายต่อเดือน------------------------//
    if($Date_re4 == $mount){
        //echo " $ser_date_re / $Date_re4 <br>";
        $net_price_m = $r[ser_netprice];
        $allnet_price_m +=  $net_price_m ;
/////-----------------ใบแจ้งซ่อมประจำเดือน--------------------------///
        $count_ser_all_m++;
    
/////-----------------ใบแจ้งซ่อมประจำเดือนที่ไม่เสร็จ--------------------------///
        if($ser_status <='5' ){
            $count_ser_all_m1++;
        }else if($ser_status =='6' ){
/////-----------------ใบแจ้งซ่อมประจำเดือนที่เสร็จ--------------------------///

             $count_ser_all_m2++;
        }//endif
    }//endif

} //endwhile
  if($count_ser_all_m){
    $ser_s1 = ($count_ser_all_m1/$count_ser_all_m)*100;
    $ser_s2 = ($count_ser_all_m2/$count_ser_all_m)*100;
  }

?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>ข้อมูลร้านค้า  <?php //echo"$Date_re4 // $mount";?></h1> 
                </div>
                <div class="col-sm-6">
                    <!--<ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Layout</a></li>
              <li class="breadcrumb-item active">Fixed Layout</li>
            </ol>-->
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="container-fluid">
          <div class="row">
            <h3>รายวัน</h3>
          </div>
            <div class="row">

                <div class="col-md-3 col-sm-6 col-12"> 
                    <a href="" >
                    <div class="info-box" >
                        <span class="info-box-icon bg-info"><i class="fas fa-dollar-sign"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">ยอดขายต่อวัน</span>
                            <span class="info-box-number"> 
                                <?php echo number_format($allnet_price, 2);?> บาท
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                </a>
                    <!-- /.info-box -->
                </div>
             <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                  <a href="" >
                    <div class="info-box">
                        <span class="info-box-icon bg-danger"><i class="fas fa-tools"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">ใบแจ้งซ่อมทั้งหมด</span>
                            <span class="info-box-number"><?php echo"$count_re1 ";?> รายการ</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                  </a>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                
                <div class="col-md-3 col-sm-6 col-12">
                  <a href="" >
                    <div class="info-box">
                        <span class="info-box-icon bg-warning"><i class="fas fa-tools"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">ใบแจ้งซ่อมที่เหลือ</span>
                            <span class="info-box-number"><?php echo"$count_re2";?> รายการ</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                  </a>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                  <a href="" >
                    <div class="info-box">
                        <span class="info-box-icon bg-success"><i class="fas fa-tools"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">ใบแจ้งซ่อมที่เสร็จ</span>
                            <span class="info-box-number"><?php echo"$count_re3";?> รายการ</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                  </a>
                    <!-- /.info-box -->
                </div>
            </div>

<!-- =========================================================== -->
        <div class="row">
            <h3>รายเดือน</h3>
        </div>
        <div class="row">

          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-info">
              <span class="info-box-icon"><i class="fas fa-dollar-sign"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">ยอดขายต่อเดือน</span>
                <div class="progress">
                  <div class="progress-bar" style="width: 100%"></div>
                </div>
                <span class="progress-description">
                  <span class="info-box-number"><?php echo number_format($allnet_price_m, 2);?> บาท</span>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
           <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-danger">
              <span class="info-box-icon"><i class="fas fa-tools"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">ใบแจ้งซ่อมทั้งหมด</span>
                <div class="progress">
                  <div class="progress-bar" style="width: 100%"></div>
                </div>
                <span class="progress-description">
                  <span class="info-box-number"><?php echo"$count_ser_all_m ";?> รายการ</span>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
           
          <!-- /.col -->
           <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-warning">
              <span class="info-box-icon"><i class="fas fa-tools"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">ใบแจ้งซ่อมที่เหลือ</span>
                <div class="progress">
                  <div class="progress-bar" style="width: <?php echo"$ser_s1";?>%"></div>
                </div>
                <span class="progress-description">
                  <span class="info-box-number"><?php echo"$count_ser_all_m1";?> รายการ</span>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-success">
              <span class="info-box-icon"><i class="fas fa-tools"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">ใบแจ้งซ่อมที่เสร็จ</span>
                <div class="progress">
                  <div class="progress-bar" style="width: <?php echo"$ser_s2";?>%"></div>
                </div>
                <span class="progress-description">
                  <span class="info-box-number"><?php echo"$count_ser_all_m2";?> รายการ</span>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
        </div>

<!-- =========================================================== -->

            <div class="row">
                <div class="col-12">

                    <!-- /.เริ่มตาราง -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">ข้อมูลใบแจ้งซ่อม</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">ลำดับ</th>
                                        <th class="text-center">รหัส</th>
                                        <th class="text-center">วันที่ใบแจ้งซ่อม</th>
                                        <th class="text-center">วันที่ใบเสร็จ/คืนเงิน</th>
                                        <th class="text-center">ชื่อ - นามสกุล</th>
                                        <th class="text-center">ประเภท</th>
                                        <th class="text-center">ยี่ห้อ</th>
                                        <th class="text-center">รุ่น</th>
                                        <th class="text-center">IEMI</th>
                                        <th class="text-center">สถานะใบแจ้งซ่อม</th>
                                        <!--<th class="text-center">จัดการ</th>-->
                                    </tr>
                                </thead>
                                <tbody>
<?php 
$count = 0; $mount2 = date('Y-m');
$thaimonth=array("00"=>"","01"=>"มค","02"=>"กพ","03"=>"มีค","04"=>"เมย","05"=>"พค","06"=>"มิย","07"=>"กค","08"=>"สค","09"=>"กย","10"=>"ตค","11"=>"พย","12"=>"ธค");
$sql=" select * from service inner JOIN customer on service.id_cus = customer.id_cus join device on service.id_devi = device.id_devi
    where service.id_sp = '$sess_idshop' and (service.ser_status != 3) ";

    $result=mysql_db_query($dbname,$sql);
    while($r2 = mysql_fetch_array($result)){
      $id_cus=$r2[id_cus];
      $id_ser=$r2[id_ser];
      $id_devi=$r2[id_devi];
      $cus_fname=$r2[cus_fname];
      $cus_lname=$r2[cus_lname];
      $devi_type=$r2[devi_type];    
      $devi_class=$r2[devi_class];
      $ser_sick=$r2[ser_sick];
      $devi_sub_class=$r2[devi_sub_class];
      $devi_imei=$r2[devi_imei];
      $ser_status =$r2[ser_status];
      $ser_date_s =$r2[ser_date_s];
      $ser_date_re =$r2[ser_date_re];
      $code_ser = $r2[code_ser];//รหัสใบแจ้งซ่อม
      $code2_ser = $r2[code2_ser];//รหัสใบเสร็จ
      $count++;
      $date_ech2=""; $date_ech1="";

 /*
      $Date_s = explode(" ", $ser_date_s);
      $Date_s2 = explode("-", $Date_s[0]);
      $date_sch1 = $Date_s2[2] . "&nbsp;" . $thaimonth[$Date_s2[1]] . "&nbsp;" . ($Date_s2[0]+543);
      $Date_e = explode(" ",$r2[ser_date_re]);
     $Date_e2 = explode("-", $Date_e[0]);
        $date_ech2 = $Date_e2[2] . "&nbsp;" . $thaimonth[$Date_e2[1]] . "&nbsp;" . ($Date_e2[0]+543);

  
      if($code2_ser == "2000-01-01 00:00:00" or $code2_ser == 0 or !$code2_ser){
            $code2_ser = "";
            $ser_date_re = "";
 
      }else{
        
        }

   
      $arrDate1 = explode("-",$code_ser);
      $arrDate2 = explode("-",$code2_ser);
      $timStmp1 = mktime(0,0,0,$arrDate1[1],$arrDate1[2],$arrDate1[0]);
      $timStmp2 = mktime(0,0,0,$arrDate2[1],$arrDate2[2],$arrDate2[0]);

        $ser_date_re = $r2[ser_date_s]; //วันเวลาที่ใบเสร็จ
        $Date_re2 = explode(" ", $ser_date_re);//วันเวลาที่ใบเสร็จ
        $Date_re3 = explode("-", $Date_re2[0]);
        $Date_re4 = $Date_re3[0].'-'.$Date_re3[1]; //เดือนปีในใบเสร็จ
  */    //echo "$Date_re4 <br>";
      //if($Date_re4 == $mount2){ 
?>                                    
                                    <tr>
                                        <td class="text-center"><?php echo"$count";?></td>
                                        <td class="text-center"><?php echo"$code_ser <br> $code2_ser";?></td>
                                        <td class="text-center"><?php echo"$ser_date_re";?></td>
                                        <td class="text-center"><?php echo"$ser_date_s";?></td>

                                        <td class="text-center"><?php echo"คุณ $cus_fname  $cus_lname";?></td>
                                        <td class="text-center">                                           
                                            <a class="btn" data-toggle="modal" data-target="#modal-customer<?php echo"$id_ser";?>"> <?php echo"$devi_type";?> </a>
                                        </td>
                                        <td class="text-center">                                           
                                            <a class="btn" data-toggle="modal" data-target="#modal-customer<?php echo"$id_ser";?>"> <?php echo"$devi_class";?> </a>
                                        </td>
                                        <td class="text-center">                                           
                                            <a class="btn" data-toggle="modal" data-target="#modal-customer<?php echo"$id_ser";?>"> <?php echo"$devi_sub_class";?> </a>
                                        </td>
                                        <td class="text-center">                                           
                                            <a class="btn" data-toggle="modal" data-target="#modal-customer<?php echo"$id_ser";?>"> <?php echo"$devi_imei";?> </a>
                                        </td>


                                        <td class="text-center">
            <?php
                switch ($ser_status) {
                    case '1': echo"<a href='main_repair.php' class='btn btn-block btn-flat btn-outline-primary'><i class='fas fa-edit'></i> รายงานใบซ่อม</a>";
                            break;
                    case '2': echo"<a href='main_repair2.php' class='btn btn-block btn-flat btn-outline-secondary'><i class='fas fa-tools'></i> การดำเนินการซ่อม</a>";
                            break;
                    case '3': echo"<a href='main_repair4.php' class='btn btn-block btn-flat btn-outline-warning'><i class='fa fa-times-circle'></i> ยกเลิกการซ่อม</a>";
                            break;
                    case '4': echo"<a href='main_repair3.php' class='btn btn-block btn-flat btn-outline-success'><i class='far fa-money-bill-alt'></i> รอชำระเงิน/รอส่งเครื่อง</a>";
                            break;
                    case '5': echo"<a href='main_repair3.php' class='btn btn-block btn-flat btn-outline-success'><i class='far fa-money-bill-alt'></i> ปิดใบแจ้งซ่อม</a>";                
                            break;
                    case '6': echo"<a href='invoice_receipt.php?id_ser=$id_ser&id_cus=$id_cus&id_devi=$id_devi' class='btn btn-block btn-flat btn-outline-success' target='_blank'><i class='far fa-money-bill-alt'></i> ทำรายการเรียบร้อย</a>";
                            break;

                    case '10': echo"<a href='main_repair5.php' class='btn btn-block btn-flat btn-outline-danger' target='_blank'><i class='far fa-money-bill-alt'></i> คืนเงิน </a>";
                            break;
                }//endswitch
                                            
            ?>
                                        </td>
                                        <!--<td class="text-center">X</td>-->
                                    </tr>

      <!-- .modal -->
      <div class="modal fade" id="modal-customer<?php echo"$id_ser";?>">   
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">อาการเสีย</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p><?php echo "$ser_sick"; ?></p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Close</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->


<?php //}//endif
    }//end while
 ?>
                                </tbody>

                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.สิ้นสุดตาราง -->


                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php //include"chart.php"; ?>

<?php
include "f.php";
?>

<script>
$(function() {
    $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
       /* "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]*/
    })/*.buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)')*/;
    $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });
});
</script>