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
                    <h1>ข้อมูลลูกค้า</h1>
                </div>
                <div class="col-sm-6">
                  
                    <ol class="breadcrumb float-sm-right">
                        <a class="btn btn-app" href="add_cus.php">
                            <i class="fas fa-plus"></i> เพิ่มข้อมูลลูกค้า
                        </a>
                    </ol>
                
                </div>
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
                            <h3 class="card-title">ข้อมูลลูกค้า </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">ลำดับ</th>
                                        <th class="text-center">ชื่อ - นามสกุล</th>
                                        <th class="text-center">เบอร์โทรศัพท์</th>
                                        <th class="text-center">อีเมล์</th>
                                        <th class="text-center">อุปกรณ์</th>
                                      <!--  <th class="text-center">แจ้งซ่อม</th> -->
                                        <th class="text-center">จัดการ</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php
    $count=0;
    $sql="select * from customer where id_sp= $sess_idshop ";
    $result=mysql_db_query($dbname,$sql);
    while($r2 = mysql_fetch_array($result)){
      $id_cus=$r2[id_cus];
      $cus_fname=$r2[cus_fname];
      $cus_lname=$r2[cus_lname];
      $cus_email=$r2[cus_email];
      $cus_phone=$r2[cus_phone];
      //$sf_status=$r2[sf_status];
      $count++;


?>

                                    <tr>
                                        <td class="text-center"><?php echo "$count"; ?></td>
                                        <td class="text-center"><?php echo "$cus_fname  $cus_lname"; ?>
                                        </td>
                                        <td class="text-center"><?php echo "$cus_phone"; ?></td>
                                        <td class="text-center"><?php echo "$cus_email"; ?></td>
                                        <td class="text-center">
                                            <a class="btn btn-app" href="main_device.php?id_cus=<?php echo"$id_cus";?>">
                                                <i class="fa fa-mobile-alt"><i class="fa fa-desktop"></i></i> 
                                            </a>
                                        </td>
                                        <!--
                                        <td class="text-center">
                                            <a href="#?id=<?php echo"$id_cus";?>" class="btn btn-block btn-success btn-disabled"><i class="far fa-file-alt"></i> </a>
                                        </td>
                                    -->

                                        <td class="text-center">
                                            <a href="edit_cus.php?id=<?php echo"$id_cus";?>" class="btn btn-warning btn-block"><i class="fas fa-edit"></i></a>
                                         </td>
                           
                                    </tr>
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