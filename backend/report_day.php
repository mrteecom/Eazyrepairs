<?php
include "../chksession_user.php";
include "h.php";
include "navbar.php";
require "../inc/connect.php";
require "../inc/function.php";//เชื่อมต่อฐานข้อมูล
$date_search = $_GET['date_search'];
$type_search = $_GET['type_search'];
if($type_search != ''){
 $types = $type_search;
}else{
    $types = 0;
}
$format =dateThai($date_search);

//print_r($date_search);
//die();
//$date_sear = explode("-", $date_search);
//$date = $date_sear[0].$date_sear[1].$date_sear[2];
//echo "$sess_idshop";
$today = date('Y-m-d');
$mount = date('Y-m');
$count_mo = 0; $net_price = 0;  $ser_s1 = 0 ; $ser_s2=0;
$allnet_price = 0 ;$count_re = 0 ;$count_ser_all_m=0;$count_ser_all_m1 =0;$count_ser_all_m2=0;$count_re2=0;$count_re1=0;$count_re3=0;


// $thaimonth=array("00"=>"","01"=>"มค","02"=>"กพ","03"=>"มีค","04"=>"เมย","05"=>"พค","06"=>"มิย","07"=>"กค","08"=>"สค","09"=>"กย","10"=>"ตค","11"=>"พย","12"=>"ธค");
///-------------ยอดขายประจำวันและประจำเดือน-----------------///

$sql="select * from service where id_sp = '$sess_idshop'  ";
$result=mysql_db_query($dbname,$sql);
while($r = mysql_fetch_array($result)){

    $ser_status = $r[ser_status];//สถานะใบแจ้งซ่อม


    $date_to_s = $r[ser_date_s]; //วันเวลาที่ใบแจ้งซ่อม
    $Date_s2 = explode(" ", $date_to_s); //วันที่ใบแจ้งซ่อม
    $Date_s3 = explode("-", $Date_s2[0]);
    $Date_s4 = $Date_s3[0].'-'.$Date_s3[1]; //เดือนปีในใบแจ้งซ่อม

    $ser_date_re = $r[ser_date_re]; //วันเวลาที่ใบเสร็จ
    $Date_re2 = explode(" ", $ser_date_re);//วันที่ใบแจ้งซ่อม
    $Date_re3 = explode("-", $Date_re2[0]);
    $Date_re4 = $Date_re3[0].'-'.$Date_re3[1]; //เดือนปีในใบเสร็จ




//---------------------ยอดขายต่อวัน---------------------------//

    if($Date_re3[0] == $date_search){
            $net_price = $r[ser_netprice];

            $allnet_price = $allnet_price + $net_price ;
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
    }//endif


//----------------------ยอดขายต่อเดือน------------------------//
    if($Date_re4 == $mount){
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
if($types == 0){
    

    $sql=" select * from service inner JOIN customer on service.id_cus = customer.id_cus join device on service.id_devi = device.id_devi
    where (customer.id_sp = '$sess_idshop')";
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
      $ser_date_re=$r2[ser_date_re];
      $devi_imei=$r2[devi_imei];
      $devi_serial_no=$r2[devi_serial_no];
      $devi_sub_class=$r2[devi_sub_class];
      $devi_color=$r2[devi_color];
      $ser_status =$r2[ser_status];
      $ser_netprice =$r2[ser_netprice];
      $code_ser = $r2[code_ser];//รหัสใบแจ้งซ่อม
      $code2_ser = $r2[code2_ser];//รหัสใบเสร็จ
     
      
      $ser_date = explode(" ",$ser_date_re);
  
      if($date_search == $ser_date[0] ){
      $sum =$sum+$ser_netprice;
      }
}
}elseif($types > 0){
    
 
  $sql=" select * from service inner JOIN customer on service.id_cus = customer.id_cus join device on service.id_devi = device.id_devi
  where (customer.id_sp = '$sess_idshop' and service.ser_status = '$types')";
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
    $ser_date_re=$r2[ser_date_re];
    $devi_imei=$r2[devi_imei];
    $devi_serial_no=$r2[devi_serial_no];
    $devi_sub_class=$r2[devi_sub_class];
    $devi_color=$r2[devi_color];
    $ser_status =$r2[ser_status];
    $ser_netprice =$r2[ser_netprice];
    $code_ser = $r2[code_ser];//รหัสใบแจ้งซ่อม
    $code2_ser = $r2[code2_ser];//รหัสใบเสร็จ
   
    
    $ser_date = explode(" ",$ser_date_re);

    if($date_search == $ser_date[0] ){
    $sum =$sum+$ser_netprice;
    }

}

}
?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <h1>รายงานรายวัน<?php //echo"$Date_re4 // $mount";?></h1>
                <!--<div class="col-sm-6">
                    <h1>รายงานรายวัน<?php //echo"$Date_re4 // $mount";?></h1> 
                </div>-->
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
                    <a href="">
                        <div class="info-box">
                            <span class="info-box-icon bg-info"><i class="fas fa-dollar-sign"></i></span>
                            <div class="info-box-content">
                                <?php if(!$date_search){?>
                                <span class="info-box-text">ยอดวันที่</span>
                                <?php }else{?>
                                <span class="info-box-text">ยอดวันที่ <?php echo $format;?></span>
                                <?php }?>
                                <span class="info-box-number">
                                    รวม <?php echo number_format($sum, 2);?> บาท
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                    </a>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

            </div>

            <br>
            <form action="report_day.php" method="GET">
                <div class="row">
                    <div class="col">
                        <label>วัน</label>
                        <input type="date" class="form-control" placeholder="กรุณาระบุวัน" name="date_search"
                            id="date_search">
                    </div>
                    
                    <div class="col">
                    <label for="">สถานะรายงานที่ต้องการ</label>
                        <select class="form-control" name="type_search" id="type_search" required>
                        <option selected disabled>โปรดระบุสถานะรายงานที่ต้องการ</option>
                        <option value="0">สถานะทั้งหมด</option>
                        <option value="1">รายงานใบซ่อม</option>
                        <option value="2">การดำเนินการซ่อม</option>
                        <option value="3">ยกเลิกการซ่อม </option>
                        <option value="4">รอชำระเงิน/รอส่งเครื่อง</option>
                        <option value="5">ปิดใบแจ้งซ่อม</option>
                        <option value="6">ทำรายการเรียบร้อย</option>
                        </select>
                    </div>
                    
                    <div class="col">
                        <label>ค้นหา</label>
                        <button type="submit" name="submit" class="form-control btn btn-info">ค้นหา</button>
                    </div>
                </div>
            </form>
            <br>

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
                                        <th class="text-center">ชื่อ - นามสกุล</th>
                                        <th class="text-center">ประเภท</th>
                                        <th class="text-center">ยี่ห้อ</th>
                                        <th class="text-center">รุ่น</th>
                                        <th class="text-center">IMEI</th>
                                        <th class="text-center">Serial No</th>
                                        <th class="text-center">สีเครื่อง</th>
                                        <th class="text-center">อาการเสีย</th>
                                        <th class="text-center">ราคา</th>
                                        <th class="text-center">สถานะใบแจ้งซ่อม</th>
                                        <!--<th class="text-center">จัดการ</th>-->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
if($types == 0){


        $count = 0;
        $sql=" select * from service inner JOIN customer on service.id_cus = customer.id_cus join device on service.id_devi = device.id_devi
            where (customer.id_sp = '$sess_idshop' )";               
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
              $ser_date_s=$r2[ser_date_s];
              $ser_date_re=$r2[ser_date_re];
              $devi_sub_class=$r2[devi_sub_class];
              $devi_imei=$r2[devi_imei];
              $devi_color=$r2[devi_color];
              $devi_serial_no=$r2[devi_serial_no];
              $ser_status =$r2[ser_status];
              $ser_netprice =$r2[ser_netprice];
              $ser_price =$r2[ser_price];
              $code_ser = $r2[code_ser];//รหัสใบแจ้งซ่อม
              $code2_ser = $r2[code2_ser];//รหัสใบเสร็จ
               if($ser_netprice == '0'){ $ser_netprice = $ser_price; } 
              if($code2_ser == "2000-01-01 00:00:00"){
                    $code2_ser ="";
              }
              
              $ser_date = explode(" ",$ser_date_s);

              if($date_search == $ser_date[0] ){
                $count++; 
              
?>
                                    <tr>
                                        <td class="text-center"><?php echo"$count";?> </td>
                                        <td class="text-center"><?php echo"$code_ser";?><br><?php echo "$code2_ser";?>
                                        </td>

                                        <td class="text-center"><?php echo"คุณ $cus_fname  $cus_lname";?></td>
                                        <td class="text-center">
                                            <a class="btn" data-toggle="modal"
                                                data-target="#modal-customer<?php echo"$id_ser";?>">
                                                <?php echo"$devi_type";?> </a>
                                        </td>
                                        <td class="text-center">
                                            <a class="btn" data-toggle="modal"
                                                data-target="#modal-customer<?php echo"$id_ser";?>">
                                                <?php echo"$devi_class";?> </a>
                                        </td>
                                        <td class="text-center">
                                            <a class="btn" data-toggle="modal"
                                                data-target="#modal-customer<?php echo"$id_ser";?>">
                                                <?php echo"$devi_sub_class";?></a>
                                        </td>
                                        
                                        <td class="text-center"><?php echo "$devi_imei";?></td>
                                        <td class="text-center"><?php echo "$devi_serial_no";?></td>
                                        <td class="text-center"><?php echo "$devi_color";?></td>
                                        <td class="text-center"><?php echo "$ser_sick";?></td>
                                        <td class="text-center">
                                            <p><?php echo number_format($ser_netprice,2);?></p>
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
                            case '6': echo"<a href='main_repair3.php' class='btn btn-block btn-flat btn-outline-success'><i class='far fa-money-bill-alt'></i> ทำรายการเรียบร้อย</a>";                
                            break;
                                          }
                                            
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
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p><?php echo "$ser_sick"; ?></p>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-secondary btn-block"
                                                        data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <!-- /.modal -->


                                    <?php } } }elseif($types > 0){  
                                        $count = 0;
                                        $sql=" select * from service inner JOIN customer on service.id_cus = customer.id_cus join device on service.id_devi = device.id_devi
                                            where (customer.id_sp = '$sess_idshop' and service.ser_status='$types' )";
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
                                              $ser_date_re=$r2[ser_date_re];
                                              $devi_sub_class=$r2[devi_sub_class];
                                              $devi_imei=$r2[devi_imei];
                                              $devi_color=$r2[devi_color];
                                              $devi_serial_no=$r2[devi_serial_no];
                                              $ser_status =$r2[ser_status];
                                              $ser_netprice =$r2[ser_netprice];
                                              $ser_price =$r2[ser_price];
                                              $code_ser = $r2[code_ser];//รหัสใบแจ้งซ่อม
                                              $code2_ser = $r2[code2_ser];//รหัสใบเสร็จ
                                             
                                              if($code2_ser == "2000-01-01 00:00:00"){
                                                 $code2_ser ="";
                                              }
                                              if($ser_netprice == '0'){ $ser_netprice = $ser_price; }

                                              
                                              $ser_date = explode(" ",$ser_date_re);
                                
                                              if($date_search == $ser_date[0] ){
                                                $count++; 
                                        ?>

                                        <tr>
                                        <td class="text-center"><?php echo"$count";?>2</td>
                                        <td class="text-center"><?php echo"$code_ser";?><br><?php echo "$code2_ser";?>
                                        </td>

                                        <td class="text-center"><?php echo"คุณ $cus_fname  $cus_lname";?></td>
                                        <td class="text-center">
                                            <a class="btn" data-toggle="modal"
                                                data-target="#modal-customer<?php echo"$id_ser";?>">
                                                <?php echo"$devi_type";?> </a>
                                        </td>
                                        <td class="text-center">
                                            <a class="btn" data-toggle="modal"
                                                data-target="#modal-customer<?php echo"$id_ser";?>">
                                                <?php echo"$devi_class";?> </a>
                                        </td>
                                        <td class="text-center">
                                            <a class="btn" data-toggle="modal"
                                                data-target="#modal-customer<?php echo"$id_ser";?>">
                                                <?php echo"$devi_sub_class";?></a>
                                        </td>
                                        
                                        <td class="text-center"><?php echo "$devi_imei";?></td>
                                        <td class="text-center"><?php echo "$devi_serial_no";?></td>
                                        <td class="text-center"><?php echo "$devi_color";?></td>
                                        <td class="text-center"><?php echo "$ser_sick";?></td>
                                        <td class="text-center">
                                            <p><?php echo number_format($ser_netprice, 2);?></p>
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
                            case '6': echo"<a href='main_repair3.php' class='btn btn-block btn-flat btn-outline-success'><i class='far fa-money-bill-alt'></i> ทำรายการเรียบร้อย</a>";                
                            break;
                                          }
                                            
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
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p><?php echo "$ser_sick"; ?></p>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-secondary btn-block"
                                                        data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <!-- /.modal -->
<?php }}}?>
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
       /* Swal.fire({
            title: 'กรุณาระบุสถานะรายงานที่ต้องการทุกครั้ง<br>เพื่อดูรายงานที่ท่านต้องการ',
            text: 'มีข้อสงสัยโปรดติดต่อแอดมิน',
            icon: 'info',
            timer: '50000',
            footer: '<a href=""></a>'
        });*/
</script>
<script>
$(function() {
    $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "excel", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
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