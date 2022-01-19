<?php
include "../chksession_user.php";
include "h.php";
include "navbar.php";
require "../inc/connect.php"; //เชื่อมต่อฐานข้อมูล
//echo "$sess_idshop";
$today = date('Y-m-d');
$count_mo = 0; $net_price = 0;
// $thaimonth=array("00"=>"","01"=>"มค","02"=>"กพ","03"=>"มีค","04"=>"เมย","05"=>"พค","06"=>"มิย","07"=>"กค","08"=>"สค","09"=>"กย","10"=>"ตค","11"=>"พย","12"=>"ธค");
$allnet_price = 0 ;
$sql="select * from service where id_sp = '$sess_idshop' and ser_status >='5' ";
$result=mysql_db_query($dbname,$sql);
while($r = mysql_fetch_array($result)){
    $date_to = $r[ser_date_re];
    $Date_s2 = explode(" ", $date_to);
      if($Date_s2[0] == $today){
        $net_price = $r[ser_netprice];
        $allnet_price = $allnet_price + $net_price ;
      }
}
    
$sql2="select * from service where id_sp = '$sess_idshop' and (ser_status >='1' and ser_status <='4') ";
$result2=mysql_db_query($dbname,$sql2);
while($r = mysql_fetch_array($result2)){
    $count_mo++;
}
$count_re = 0 ;
$sql3="select * from service where id_sp = '$sess_idshop' and (ser_status >='1' and ser_status <='4') ";
$result3=mysql_db_query($dbname,$sql3);
while($r3 = mysql_fetch_array($result3)){
    $date_to = $r3[ser_date_s];
    $Date_s2 = explode(" ", $date_to);
      if($Date_s2[0] == $today){
        $count_re++;
      }
}

?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>ข้อมูลร้านค้า</h1> 
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
                <div class="col-md-3 col-sm-6 col-12"> 
                    <a href="" >
                    <div class="info-box" >
                        <span class="info-box-icon bg-info"><i class="fab fa-btc"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">ยอดขายต่อวัน</span>
                            <span class="info-box-number"> 
                                <?php echo number_format($allnet_price, 2);?> บาท</span>
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
                            <span class="info-box-text">จำนวนใบแจ้งซ่อมทั้งหมด</span>
                            <span class="info-box-number"><?php echo"$count_mo";?> รายการ</span>
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
                            <span class="info-box-text">จำนวนใบแจ้งซ่อมวันนี้</span>
                            <span class="info-box-number"><?php echo"$count_re";?> รายการ</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                  </a>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
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
                                        <th class="text-center">ชื่อ - นามสกุล</th>
                                        <th class="text-center">อุปกรณ์</th>
                                        <th class="text-center">สถานะใบแจ้งซ่อม</th>
                                        <th class="text-center">จัดการ</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php 
$count = 0;
$sql=" select * from service inner JOIN customer on service.id_cus = customer.id_cus join device on service.id_devi = device.id_devi
    where customer.id_sp = $sess_idshop and service.ser_status<='5' ";
    $result=mysql_db_query($dbname,$sql);
    while($r2 = mysql_fetch_array($result)){
      $id_cus=$r2[id_cus];
      $id_ser=$r2[id_ser];
      $id_devi=$r2[id_devi];
      $cus_fname=$r2[cus_fname];
      $cus_lname=$r2[cus_lname];
      $devi_type=$r2[devi_type];    
      $devi_class=$r2[devi_class];
      $devi_sub_class=$r2[devi_sub_class];
      $ser_status =$r2[ser_status];
      $count++; 
      switch ($ser_status) {
          case '1': $status = "สร้างใบแจ้งซ่อม";break;
          case '2': $status = "ยืนยันใบแจ้งซ่อม";break;
          case '3': $status = "ยกลิก";break;
          case '4': $status = "กำลังดำเนินการซ่อม";break;
          case '5': $status = "ปิดใบแจ้งซ่อม";break;
      }


?>                                    
                                    <tr>
                                        <td class="text-center"><?php echo"$count";?></td>
                                        <td class="text-center"><?php echo"คุณ $cus_fname  $cus_lname";?></td>
                                        <td class="text-center"><?php echo"$devi_type/$devi_class/$devi_sub_class";?></td>
                                        <td class="text-center"><?php echo"$status";?> </td>
                                        <td class="text-center">X</td>
                                    </tr>
<?php } ?>
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
<?php
include "f.php";
?>

<script>
$(function() {
    $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
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