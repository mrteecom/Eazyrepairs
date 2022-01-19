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
                            <h3 class="card-title">รายการใบแจ้งซ่อม (การรับชำระเงิน/คืนเครื่อง)</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">ลำดับ</th>
                                        <th class="text-center">ชื่อ - นามสกุล</th>
                                        <th class="text-center">เบอร์โทรศัพท์</th>
                                        <th class="text-center">วันที่ส่ง</th>
                                        <th class="text-center">วันที่ยกเลิก</th>
                                        <th class="text-center">อุปกรณ์</th>
                                        <th class="text-center">อีเมล์</th>
                                        <th class="text-center">ย้อนกลับ</th>

                                    </tr>
                                </thead>
                                <tbody>
<?php
    $count=0;
    $sql=" select * from service inner JOIN customer on service.id_cus = customer.id_cus 
    where customer.id_sp = $sess_idshop and (service.ser_status = '3')";
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
      $ser_date_re=$r2[ser_date_re];
      $ser_status=$r2[ser_status];
      $count++;
      
        $sql2 =" select * from device where id_devi = '$id_devi' ";
        $result2=mysql_db_query($dbname,$sql2);
        $r3 = mysql_fetch_array($result2);
            $devi_type=$r3[devi_type];    
            $devi_class=$r3[devi_class];
            $devi_sub_class=$r3[devi_sub_class];
      
      
      $thaimonth=array("00"=>"","01"=>"มค","02"=>"กพ","03"=>"มีค","04"=>"เมย","05"=>"พค","06"=>"มิย","07"=>"กค","08"=>"สค","09"=>"กย","10"=>"ตค","11"=>"พย","12"=>"ธค");

      $Date_s = explode("-", $ser_date_s);
      $Date_s2 = explode(" ", $Date_s[2]);
      $date_sch1 = $Date_s2[0] . "&nbsp;" . $thaimonth[$Date_s[1]] . "&nbsp;" . ($Date_s[0]+543);

      $Date_e = explode("-", $ser_date_re);
      $date_ech2 = $Date_e[2] . "&nbsp;" . $thaimonth[$Date_e[1]] . "&nbsp;" . ($Date_e[0]+543);

?>

                                    <tr>
                                        <td class="text-center"><?php echo "$count"; ?></td>
                                        <td class="text-center"><?php echo "$cus_fname  $cus_lname"; ?>
                                        </td>
                                        <td class="text-center"><?php echo "$cus_phone"; ?></td>
                                        <td class="text-center"><?php echo "$date_sch1"; ?></td>
                                        <td class="text-center"><?php echo "$date_ech2"; ?></td>
                                        <td class="text-center">
                                           <?php
                                                 echo "$devi_type / $devi_class / $devi_sub_class"; 
                                           ?>
                                        </td>
<?php           if($cus_email){ ?>                                        
                                        <td class="text-center"><?php //echo "$cus_email"; ?>
                                            <a href="#?id_ser=<?php echo"$id_ser";?>&id_cus=<?php echo"$id_cus";?>" class="btn btn-block btn-default"><i class="fas fa-mail-bulk"></i> </a>
                                        </td>
<?php            }else{ ?>
                                        <td class="text-center">
                                             <button class="btn btn-block btn-default" disabled><i class="fas fa-ban"></i> </button>                       
                                        </td>
<?php           } //end if?>


<?php           if($ser_status == 4){ ?>
                                        <!--
                                        <td class="text-center">
                                            <a href="report.php?id_ser=<?php echo"$id_ser";?>&id_cus=<?php echo"$id_cus";?>" class="btn btn-block btn-primary" disabled><i class="fas fa-print"></i> </a>
                                        </td>
                                    -->

                                        <td colspan="2" class="text-center">
                                            <a href="update_ser.php?id_ser=<?php echo"$id_ser";?>&stu=5&id_sp=<?php echo"$sess_idshop";?>" class="btn btn-danger btn-block"><i class="fab fa-btc"></i></a>
                                        </td>
 <?php          }else if($ser_status == 5){ ?>
                                        <td class="text-center">
                                            <a href="report.php?id_ser=<?php echo"$id_ser";?>&id_cus=<?php echo"$id_cus";?>" class="btn btn-block btn-primary" target="_blank"><i class="fas fa-print"></i> </a>
                                        </td>

                                        <td class="text-center">
                                            <a href="update_ser.php?id_ser=<?php echo"$id_ser";?>&stu=6" class="btn btn-success btn-block"><i class="fas fa-cloud-download-alt"></i></a>
                                        </td>
<?php           } //end if?>
                                         <td class="text-center">
                                            <a href="update_ser.php?id_ser=<?php echo"$id_ser";?>&stu=1" class="btn btn-warning btn-block"><i class="fas fa-history"></i></a>
                                        </td>
                           
                                    </tr>
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
