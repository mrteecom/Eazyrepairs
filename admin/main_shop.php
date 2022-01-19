<?php
include "../chksession_user.php";
include "h.php";
include "navbar.php";
require "../inc/connect.php"; //เชื่อมต่อฐานข้อมูล

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
                    <ol class="breadcrumb float-sm-right">
                        <a class="btn btn-app" href="add_shop.php">
                            <i class="fas fa-plus"></i> เพิ่มข้อมูลร้านค้า
                        </a>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <!-- /.เริ่มตาราง -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">ข้อมูลร้านค้า</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">ลำดับ</th>
                                        <th class="text-center">ชื่อร้านค้า</th>
                                        <th class="text-center">username</th>
                                        <th class="text-center">เบอร์โทร</th>
                                        <th class="text-center">วันหมดอายุ</th>
                                        <th class="text-center">สถานะ</th>
                                        <th class="text-center">Vat</th>
                                        <th class="text-center">จัดการ</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php   
    $count=0;
    $sql="select * from shop inner join add_sp on shop.id_sp = add_sp.id_sp ";
    $result=mysql_db_query($dbname,$sql);
    while($r2 = mysql_fetch_array($result)){
        $count++;
      $id_sp=$r2[id_sp];
      $sp_name=$r2[sp_name];
      $sp_username=$r2[sp_username];
      $sp_pass=$r2[sp_pass];
      $sp_phone=$r2[sp_phone];
      $sp_email=$r2[sp_email];
      $sp_fb=$r2[sp_fb];
      $sp_line=$r2[sp_line];
      $sp_status=$r2[sp_status];
      $sp_pack=$r2[sp_pack];
      $sp_dateend=$r2[sp_dateend];
      $sp_vat=$r2[sp_vat];
      

?>
                                    <tr>
                                        <td class="text-center"><?php echo "$count"; ?></td>
                                        <td class="text-center"><?php echo "$sp_name"; ?></td>
                                        <td class="text-center"><?php echo "$sp_username";?></td>
                                        <td class="text-center"><?php echo "$sp_phone"; ?></td>
                                        <td class="text-center"><?php echo "$sp_dateend"; ?></td>
                            <!-- กำหนดค่า status ร้านค้า -->
                            <?php 
                                if($sp_status == 0){
                            ?>
                                        <td class="text-center">
                                            <a href="add_shop2.php?status=1&id=<?php echo"$id_sp";?>&u=<?php echo"$sp_username";?>&p=<?php echo"$sp_pass";?>&pack=<?php echo"$sp_pack";?>" class="btn btn-block btn-default">
                                            ยังไม่ใช้งาน </a>
                                            </td>
                            <?php
                                }else if($sp_status == 1){
                            ?>
                                        <td class="text-center">
                                            <a href="add_shop2.php?status=2&id=<?php echo"$id_sp";?>" class="btn btn-success btn-block">
                                            เปิดร้าน</a>
                                         </td>
                            <?php }else if($sp_status == 2){
                            ?>
                                        <td class="text-center">
                                            <a href="add_shop2.php?status=1&id=<?php echo"$id_sp";?>" class="btn btn-danger btn-block">
                                            ปิดร้าน</a>
                                            </td>
                            <?php }  ?>   

                            <!-- กำหนดค่า Vat -->
                            <?php 
                                if($sp_vat == 0){
                            ?>
                                        <td class="text-center">
                                            <a href="add_shop4.php?vat=1&id=<?php echo"$id_sp";?>" class="btn btn-danger btn-block">
                                            No</a>
                                        </td>
                            <?php 
                                }else{
                            ?>
                                        <td class="text-center">
                                            <a href="add_shop4.php?vat=0&id=<?php echo"$id_sp";?>" class="btn btn-success btn-block">
                                            Yes</a>
                                        </td>

                            <?php 
                                }
                            ?>


                                        <td class="text-center">
                                            <a class="btn btn-app" data-toggle="modal" data-target="#modal-customer<?php echo"$id_sp";?>">
                                                <i class="fas fa-eye"></i> ดูข้อมูลลูกค้า
                                            </a>
                                        <?php 
                                        $sql3="select * from pay where id_sp = '$id_sp' ";
                                        $result3=mysql_db_query($dbname,$sql3);
                                            $r3 = mysql_fetch_array($result3);
                                            $status_pay=$r3[status_pay];
                                            $id_pay=$r3[id_pay];
                                            $file_pay=$r3[file_pay];

                                        if($status_pay){ ?>
                                            <a class="btn btn-app" href="pay/<?php echo"$file_pay"; ?>" target='_blank' >
                                                <i class="fas fa-money-bill"></i>ชำระเงิน
                                            </a>
                                        <?php }else{ ?>
                                            <a class="btn btn-app" href="upload_slip.php?id_pay=<?php echo"$id_pay";?>" >
                                                <i class="fas fa-ban"></i>ยังไม่ชำระ
                                            </a>
                                        <?php } ?>

                                            
                                        </td>
                                        <!-- /.modal customer-->
                               
                                        <div class="modal fade" id="modal-customer<?php echo"$id_sp";?>">
                                            <div class="modal-dialog modal-xl">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">ข้อมูลลูกค้า</h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- /.card-header -->
                                                        <div class="card-body">
                                                            <dl class="row">
                                                                <dt class="col-sm-4">ชื่อร้านค้า</dt>
                                                                <dd class="col-sm-8"><?php echo "$sp_name"; ?></dd>
                                                                <dt class="col-sm-4">ที่อยู่</dt>
                                                                <dd class="col-sm-8"><?php echo "$sp_address"; ?></dd>
                                                                <dt class="col-sm-4">username</dt>
                                                                <dd class="col-sm-8"><?php echo "$sp_username"; ?></dd>
                                                                <dt class="col-sm-4">password</dt>
                                                                <dd class="col-sm-8"><?php echo "$sp_pass"; ?></dd>
                                                                <dt class="col-sm-4">เบอร์โทร</dt>
                                                                <dd class="col-sm-8"><?php echo "$sp_phone"; ?></dd>
                                                                <dt class="col-sm-4">อีเมล์
                                                                </dt>
                                                                <dd class="col-sm-8"><?php echo "$sp_email"; ?>
                                                                </dd>
                                                                <dt class="col-sm-4">facebook</dt>
                                                                <dd class="col-sm-8"><?php echo "$sp_fb"; ?></dd>
                                                                <dt class="col-sm-4">line</dt>
                                                                <dd class="col-sm-8"><?php echo "$sp_line"; ?></dd>
                                                            </dl>
                                                        </div>
                                                        <!-- /.card-body -->
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">ปิด</button>

                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                        <!-- /.modal customer-->
  
                                    </tr>
  <?php }//end while ?> 
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
        
    });
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