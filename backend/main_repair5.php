<?php
include "../chksession_user.php";
include "h.php";
include "navbar.php";
include "../inc/connect.php"; //เชื่อมต่อฐานข้อมูล

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>ใบแจ้งซ่อม</h1>
                </div>
<!--

                <div class="col-sm-6">
                  
                    <ol class="breadcrumb float-sm-right">
                        <a class="btn btn-app" href="add_cus.php">
                            <i class="fas fa-plus"></i> รายการใบแจ้งซ่อม
                        </a>
                    </ol>
                
                </div>
-->                
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
                
        <div class="container-fluid">
 

                
            <!-- /.row -->
            <div class="row">
                <div class="col-12">

                    <!-- /.เริ่มตาราง -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">รายการใบแจ้งซ่อม (การรับชำระเงิน/ส่งเครื่อง)</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">ลำดับ</th>
                                        <th class="text-center">ชื่อ - นามสกุล</th>
                                        <th class="text-center">เบอร์โทรศัพท์</th>
                                        <th class="text-center">วันที่ชำระเงิน</th>
                                        <th class="text-center">จำนวนวัน</th>
                                        <th class="text-center">ประเภท</th>
                                        <th class="text-center">ยี่ห้อ</th>
                                        <th class="text-center">รุ่น</th>
                                        <th class="text-center">ราคาซ่อม</th>
                                        <!--<th class="text-center">ราคา</th>
                                        <th class="text-center">พิมพ์ใบเสร็จ</th>
                                        <th class="text-center">ปิดงาน</th>-->
                                        <th class="text-center">คืนเงิน</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
<?php
    $count=0;
    $sql=" select * from service inner JOIN customer on service.id_cus = customer.id_cus 
    where customer.id_sp = $sess_idshop and service.ser_status = '6' ";
    $result=mysql_db_query($dbname,$sql);
    while($r2 = mysql_fetch_array($result)){
      $id_cus=$r2[id_cus];
      $id_ser=$r2[id_ser];
      $id_devi=$r2[id_devi];
      $cus_fname=$r2[cus_fname];
      $cus_lname=$r2[cus_lname];
      $cus_email=$r2[cus_email];
      $cus_phone=$r2[cus_phone];
      $ser_date_s=$r2[ser_date_s];
      $ser_date_e=$r2[ser_date_e];
      $ser_status=$r2[ser_status];
      $ser_netprice=$r2[ser_netprice];
      //$code_ser=$r2[code_ser];
      $code2_ser=$r2[code2_ser];
      $ser_sick=$r2[ser_sick];
      
      $count++;
      
        $sql2 =" select * from device where id_devi = '$id_devi' ";
        $result2=mysql_db_query($dbname,$sql2);
        $r3 = mysql_fetch_array($result2);
            $devi_type=$r3[devi_type];    
            $devi_class=$r3[devi_class];
            $devi_sub_class=$r3[devi_sub_class];
      
      
            $thaimonth=array("00"=>"","01"=>"ม.ค.","02"=>"ก.พ.","03"=>"มี.ค.","04"=>"เม.ย.","05"=>"พ.ค.","06"=>"มิ.ย.","07"=>"ก.ค.","08"=>"ส.ค.","09"=>"ก.ย.","10"=>"ต.ค.","11"=>"พ.ย.","12"=>"ธ.ค.");

      $Date_s = explode(" ", $ser_date_s);
      $Date_s2 = explode("-", $Date_s[0]);
      $date_sch1 = $Date_s2[2] . "&nbsp;" . $thaimonth[$Date_s2[1]] . "&nbsp;" . ($Date_s2[0]+543);
      $today = date('Y-m-d');
      
      $calculate =strtotime("$today")-strtotime("$Date_s[0]");
      $summary=floor($calculate / 86400); // 86400 มาจาก 24*360 (1วัน = 24 ชม.)
/*
      $Date_e = explode(" ", $ser_date_e);
      $Date_e2 = explode("-", $Date_e[0]);
      $date_ech2 = $Date_e2[2] . "&nbsp;" . $thaimonth[$Date_e2[1]] . "&nbsp;" . ($Date_e2[0]+543);
      */

?>

                                    <tr>
                                        <td class="text-center"><?php echo "$code2_ser"; ?></td>
                                        <td class="text-center"><?php echo "$cus_fname  $cus_lname"; ?>
                                        </td>
                                        <td class="text-center"><?php echo "$cus_phone"; ?></td>
                                        <td class="text-center"><?php echo "$date_sch1"; ?></td>
                                        <td class="text-center"><?php echo "$summary"; ?></td>
                                        <td class="text-center">                                           
                                            <a class="btn" data-toggle="modal" data-target="#modal-customer<?php echo"$id_ser";?>"> <?php echo"$devi_type";?> </a>
                                        </td>
                                        <td class="text-center">                                           
                                            <a class="btn" data-toggle="modal" data-target="#modal-customer<?php echo"$id_ser";?>"> <?php echo"$devi_class";?> </a>
                                        </td>
                                        <td class="text-center">                                           
                                            <a class="btn" data-toggle="modal" data-target="#modal-customer<?php echo"$id_ser";?>"> <?php echo"$devi_sub_class";?> </a>
                                        </td>
                                        <td class="text-center"><?php echo number_format($ser_netprice, 2); ?></td>

                                        <td class="text-center">
                                            <a href="update_ser.php?id_ser=<?php echo"$id_ser";?>&stu=10" class="btn btn-danger btn-block"><i class="fas fa-times-circle"></i></a>
                                        </td>
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
<?php    } //end while?>
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
        "autoWidth": true,
        /*"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]*/
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
