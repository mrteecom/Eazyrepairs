<?php
include "../chksession_user.php";
include "h.php";
include "navbar.php";
include "../inc/connect.php"; //เชื่อมต่อฐานข้อมูล
$id_cus = $_GET[id_cus];
    $sql6="select * from customer where id_cus= '$id_cus' ";
    $result6=mysql_db_query($dbname,$sql6);
        $r6 = mysql_fetch_array($result6);
            $cus_fname = $r6[cus_fname];
            $cus_lname = $r6[cus_lname];
            $cus_add=$r6[cus_add];
            $cus_pro=$r6[cus_pro];
            $cus_ampher=$r6[cus_ampher];
            $cus_dis=$r6[cus_dis];
            $cus_pos=$r6[cus_pos];
            $cus_email=$r6[cus_email];
            $cus_phone=$r6[cus_phone];
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>ข้อมูลอุปกรณ์ลูกค้า</h1>
                    <hr>
                    <p><?php echo "คุณ $cus_fname  $cus_lname"; ?> <br>
                    ที่อยู่ลูกค้า : <?php echo "$cus_add"?> อ.<?php echo "$cus_ampher"?> ต.<?php echo "$cus_dis"?> จ.<?php echo "$cus_pro"?><br> รหัสไปรษณีย์ <?php echo "$cus_pos"?><br>
                   เบอร์ติดต่อ : <?php echo "$cus_phone"?></p>
                    <hr>
                </div>
                <div class="col-sm-6">
                  
                    <ol class="breadcrumb float-sm-right">
                        <a class="btn btn-app" href="add_repair4.php?id_cus=<?php echo"$id_cus";?>">
                            <i class="fas fa-plus"></i> เพิ่มอุปกรณ์ลูกค้า
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
                            <h3 class="card-title">ข้อมูลอุปกรณ์ </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">ลำดับ</th>
                                        <th class="text-center">ประเภท</th>
                                        <th class="text-center">ยี่ห้อ-รุ่น</th>
                                        <th class="text-center">แจ้งเสีย/เครื่องเดิม</th>
                                        <th class="text-center">แก้ไข</th>
                                         <th class="text-center">เลิกใช้</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php
    $count=0;
    $sql="select * from device where id_cus= $id_cus  ";
    $result=mysql_db_query($dbname,$sql);
    while($r2 = mysql_fetch_array($result)){
      $id_devi=$r2[id_devi];
      $devi_type=$r2[devi_type];    
      $devi_class=$r2[devi_class];
      $devi_sub_class=$r2[devi_sub_class];
      //$=$r2[devi_ban];
      $devi_status=$r2[devi_status];
      $count++;
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


?>

                                    <tr>
                                        <td class="text-center"><?php echo "$count"; ?></td>
                                        <td class="text-center"><?php echo "$devi_type"; ?>
                                        </td>
                                        <td class="text-center"><?php echo "$devi_class / $devi_sub_class"; ?></td>
                                           <?php 
                                        if($devi_status == '1'){ ?>
                                        <td class="text-center">
                                            <a href="add_repair3.php?id_cus=<?php echo"$id_cus";?>&id_devi=<?php echo"$id_devi";?>" class="btn btn-block btn-danger"><i class="far fa-file-alt"></i></a>
                                            </td>
                                     
                                        <td class="text-center">
                                            <a href="edit_device.php?id_devi=<?php echo"$id_devi";?>&id_cus=<?php echo"$id_cus";?>" class="btn btn-warning btn-block"><i class="fas fa-edit"></i></a>
                                        </td>
                                        <td class="text-center">
                                  
                                            <a href="edit_device2.php?id_devi=<?php echo"$id_devi";?>&id_cus=<?php echo"$id_cus";?>&stu_devi=2" class="btn btn-success btn-block"><i class="fa fa-check-square"></i> </a>
                                        </td>

                                        <?php  } elseif($devi_status == '2'){ ?>
                                        <td class="text-center"></td>
                                        <td class="text-center"></td>
                                        <td>    
                                            <a href="edit_device2.php?id_devi=<?php echo"$id_devi";?>&id_cus=<?php echo"$id_cus";?>&stu_devi=1" class="btn btn-danger btn-block"><i class="fa fa-times-circle"></i> </a>
                                        </td>
                                        <?php  } ?>
                                            <!--<a href="edit_device2.php?id_devi=<?php echo"$id_devi";?>&id_cus=<?php echo"$id_cus";?>&stu_devi='0'" class="btn btn-default btn-block"><i class="fas fa-trash-alt"></i></a> -->
                                        
                           
                                    </tr>

<?php } //end while?> 

                                </tbody>
                           
                            </table>
                             <div class="card-footer">
                                    <button type="button"
                                        onclick="window.location.href='main_customer.php?'"
                                        class="btn btn-danger">ย้อนกลับ</button>
                                   <!-- <button type="submit" class="btn btn-success float-right">บันทึกข้อมูล</button> -->
                            </div>
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