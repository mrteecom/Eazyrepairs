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
                            <h3 class="card-title">รายการใบแจ้งซ่อม (การดำเนินการซ่อม) </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">เลขที่ใบแจ้งซ่อม</th>
                                        <th class="text-center">ชื่อ - นามสกุล</th>
                                        <th class="text-center">เบอร์โทรศัพท์</th>


                                        <th class="text-center">วันที่นัดรับ</th>
                                        <th class="text-center">ประเภท</th>
                                        <th class="text-center">ยี่ห้อ</th>
                                        <th class="text-center">รุ่น</th>
                                        <th class="text-center">ตรวจสอบ</th>
                                        <th class="text-center">Yes</th>
                                        <th class="text-center">Back</th>
                                        <th class="text-center">ยกเลิก</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
    $count=0;
    $sql="select * from customer inner join service on customer.id_cus = service.id_cus where customer.id_sp = $sess_idshop and service.ser_status = 2 ";
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
      $devi_type=$r2[devi_type];      
      $devi_class=$r2[devi_class];
      $devi_sub_class=$r2[devi_sub_class];
      $code_ser=$r2[code_ser];
      $ser_sick=$r2[ser_sick];
      $count++;
        $sql2 =" select * from device where id_devi = '$id_devi' ";
        $result2=mysql_db_query($dbname,$sql2);
        $r3 = mysql_fetch_array($result2);
            $devi_type=$r3[devi_type];    
            $devi_class=$r3[devi_class];
            $devi_imei=$r3[devi_imei];
            $devi_serial_no=$r3[devi_serial_no];
            $devi_color=$r3[devi_color];
            $devi_sub_class=$r3[devi_sub_class];
/*
        $sql3="select * from type where id_type= $devi_type ";
        $result3=mysql_db_query($dbname,$sql3);
        $r3 = mysql_fetch_array($result3);
            $type_name = $r3[type_name];

        $sql4="select * from class where id_class= $devi_class ";
        $result4=mysql_db_query($dbname,$sql4);
        $r4 = mysql_fetch_array($result4);
            $class_name = $r4[class_name];

        $sql5="select * from sub_class where id_sc= $devi_sub_class ";
        $result5=mysql_db_query($dbname,$sql5);
        $r5 = mysql_fetch_array($result5);
            $sc_name = $r5[sc_name];
*/
$thaimonth=array("00"=>"","01"=>"ม.ค.","02"=>"ก.พ.","03"=>"มี.ค.","04"=>"เม.ย.","05"=>"พ.ค.","06"=>"มิ.ย.","07"=>"ก.ค.","08"=>"ส.ค.","09"=>"ก.ย.","10"=>"ต.ค.","11"=>"พ.ย.","12"=>"ธ.ค.");

      $Date_s = explode(" ", $ser_date_s);
      $Date_s2 = explode("-", $Date_s[0]);
      $date_sch1 = $Date_s2[2] . "&nbsp;" . $thaimonth[$Date_s2[1]] . "&nbsp;" . ($Date_s2[0]+543);

      $Date_e = explode(" ", $ser_date_e);
      $Date_e2 = explode("-", $Date_e[0]);
      $date_ech2 = $Date_e2[2] . "&nbsp;" . $thaimonth[$Date_e2[1]] . "&nbsp;" . ($Date_e2[0]+543);
?>

                                    <tr>
                                        <td class="text-center"><?php echo "$code_ser"; ?></td>
                                        <td class="text-center"><?php echo "$cus_fname  $cus_lname"; ?>
                                        </td>
                                        <td class="text-center"><?php echo "$cus_phone"; ?></td>

                                        <!--<td class="text-center"><?php echo "$date_sch1"; ?></td>-->

                                        <td class="text-center"><?php echo "$date_ech2 $Date_e[1]"; ?></td>
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
                                                <?php echo"$devi_sub_class";?> <br> IMEI : <?php echo "$devi_imei";?>
                                                <br>Serial No : <?php echo "$devi_serial_no";?><br> สีเครื่อง : <?php echo "$devi_color";?> </a>
                                        </td>

                                        <td class="text-center">
                                            <a href="invoice_report.php?id_ser=<?php echo"$id_ser";?>&id_cus=<?php echo"$id_cus";?>&id_devi=<?php echo"$id_devi";?>"
                                                class="btn btn-block btn-primary" target="_blank"><i
                                                    class="fas fa-eye"></i> </a>
                                        </td>


                                        <td class="text-center">
                                            <a href="update_ser.php?id_ser=<?php echo"$id_ser";?>&stu=4"
                                                class="btn btn-success btn-block"><i class="fas fa-check"></i></a>
                                        </td>
                                        <td class="text-center">
                                            <a href="update_ser.php?id_ser=<?php echo"$id_ser";?>&stu=1"
                                                class="btn btn-warning btn-block"><i class="fas fa-history"></i></a>
                                        </td>
                                        <td class="text-center">
                                            <a href="update_ser.php?id_ser=<?php echo"$id_ser";?>&stu=3"
                                                class="btn btn-danger btn-block"><i class="fas fa-window-close"></i></a>
                                        </td>


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
                                    <?php } //end while?>
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
    }) /*.buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)')*/ ;
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