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
                    <h1>ข้อมูลช่าง</h1>
                </div>
                <div class="col-sm-6">
                  
                    <ol class="breadcrumb float-sm-right">
                        <a class="btn btn-app" href="add_staff.php">
                            <i class="fas fa-plus"></i> เพิ่มข้อมูลช่าง
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
                            <h3 class="card-title">ข้อมูลช่าง </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">ลำดับ</th>
                                        <th class="text-center">ชื่อ - นามสกุล</th>
                                        <th class="text-center">ชื่อผู้ใช้งาน</th>
                                        <th class="text-center">เปิด/ปิด</th> 
                                        <th class="text-center">แก้ไข</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php
    $count=0;
    $sql="select * from staff where id_sp= $sess_idshop and (sf_status='2' or sf_status='4')";
    $result=mysql_db_query($dbname,$sql);
    while($r2 = mysql_fetch_array($result)){
      $id_sf=$r2[id_sf];
      $sf_fname=$r2[sf_fname];
      $sf_lname=$r2[sf_lname];
      $sf_pass=$r2[sf_pass];
      $sf_username=$r2[sf_username];
      $sf_status=$r2[sf_status];
      $count++;


?>

                                    <tr>
                                        <td class="text-center"><?php echo "$count"; ?></td>
                                        <td class="text-center"><?php echo "$sf_fname  $sf_lname"; ?>
                                        </td>
                                        <td class="text-center"><?php echo "$sf_username"; ?></td>
                                        <!--<td class="text-center"><?php echo "$sf_pass"; ?></td> -->
                                        <td class="text-center">
                            <?php 
                                if($sf_status == 4){
                            ?>                                  
                                            <a href="add_staff2.php?status=2&id=<?php echo"$id_sf";?>" class="btn btn-success"><i class="fas fa-user-alt"></i></a>        
                            <?php
                                }else if($sf_status == 2){
                            ?>
                                            <a href="add_staff2.php?status=4&id=<?php echo"$id_sf";?>" class="btn btn-danger "><i class="fas fa-user-alt-slash"></i></a>
                            <?php } //end if {
                            ?>

                                        <td class="text-center">
                                            <a href="edit_staff.php?status=2&id=<?php echo"$id_sf";?>" class="btn btn-warning"><i class="fas fa-user-edit"></i>
                                            </a>
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