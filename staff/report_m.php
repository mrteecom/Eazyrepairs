<?php
include "../chksession_user.php";
include "h.php";
include "navbar.php";
include "../inc/connect.php"; //เชื่อมต่อฐานข้อมูล
$thaimonth=array("00"=>"","01"=>"มค","02"=>"กพ","03"=>"มีค","04"=>"เมย","05"=>"พค","06"=>"มิย","07"=>"กค","08"=>"สค","09"=>"กย","10"=>"ตค","11"=>"พย","12"=>"ธค");

$allnet_price = 0 ;$today_m = date('m');
$sql="select * from service where id_sp = '$sess_idshop' and ser_status >='5'  ";
$result=mysql_db_query($dbname,$sql);
while($r = mysql_fetch_array($result)){
    $date_to = $r[ser_date_re];
    $Date_s2 = explode(" ", $date_to);
    $Date_s22 = explode("-", $Date_s2[0]);
      if($Date_s22[1] == $today_m){
        $net_price = $r[ser_netprice];
        $allnet_price = $allnet_price + $net_price ;
        $count_re++;

      }
}

/*
$count_re = 0 ;
$sql3="select * from service where id_sp = '$sess_idshop' and (ser_status ='6') ";
$result3=mysql_db_query($dbname,$sql3);
while($r3 = mysql_fetch_array($result3)){
    $date_to = $r[ser_date_re];
    $Date_s2 = explode(" ", $date_to);
    $Date_s22 = explode("-", $Date_s2[0]);
      if($Date_s22[1] == $today_m){
         $count_re++;
      }
}
*/
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>รายงานใบเสร็จรับเงินประจำเดือน <?php echo $thaimonth[$today_m];?></h1>
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
            <div class="row">

                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-info"><i class="fab fa-btc"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">รายได้ประจำเดือน <?php echo $thaimonth[$today_m];?></span>
                            <span class="info-box-number"> <?php echo number_format($allnet_price, 2); ?> บาท</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>

                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-warning"><i class="fas fa-tools"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">จำนวนใบแจ้งซ่อมประจำเดือน <?php echo $thaimonth[$today_m];?></span>
                            <span class="info-box-number"><?php echo"$count_re";?> รายการ</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
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
                            <h3 class="card-title">รายการใบเสร็จรับเงิน </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">ลำดับ</th>
                                        <th class="text-center">ชื่อ - นามสกุล</th>
                                       <!-- <th class="text-center">เบอร์โทรศัพท์</th>
                                        <th class="text-center">วันที่ส่ง</th> -->
                                        <th class="text-center">วันที่ออกบิล</th>
                                        <th class="text-center">อุปกรณ์</th>
                                        <th class="text-center">ราคา</th>
                                        <!-- <th class="text-center">อีเมล์</th>  -->                                      
                                        <th class="text-center">พิมพ์บิล</th>
                                        <!--<th class="text-center">ยืนยัน</th>
                                        <th class="text-center">แก้ไข</th> -->
                                    </tr>
                                </thead>
                                <tbody>

<?php
    $count=0; $today = date('Y-m-d');
    $sql=" select * from service inner JOIN customer on service.id_cus = customer.id_cus 
    where customer.id_sp = $sess_idshop and service.ser_status >= '5' order by code2_ser ";
    $result=mysql_db_query($dbname,$sql);
    while($r2 = mysql_fetch_array($result)){
      $id_cus=$r2[id_cus];
      $id_ser=$r2[id_ser];
      $id_devi=$r2[id_devi];
      $cus_fname=$r2[cus_fname];
      $cus_lname=$r2[cus_lname];
      //$cus_email=$r2[cus_email];
      //$cus_phone=$r2[cus_phone];
      //$ser_date_s=$r2[ser_date_s];
      $ser_date_re=$r2[ser_date_re];
      $ser_netprice=$r2[ser_netprice];
      $code2_ser=$r2[code2_ser];
      $count++;
     
        $sql2 =" select * from device where id_devi = '$id_devi' ";
        $result2=mysql_db_query($dbname,$sql2);
        $r3 = mysql_fetch_array($result2);
            $devi_type=$r3[devi_type];    
            $devi_class=$r3[devi_class];
            $devi_sub_class=$r3[devi_sub_class];
      
      
      

      // $Date_s = explode(" ", $ser_date_re);
      $Date_s2 = explode(" ", $ser_date_re);
      $Date_s = explode("-", $Date_s2[0]);
      
      //if($Date_s2[0] == $today){
         $ser_net+= $ser_netprice ;
      $date_sch1 = $Date_s[2] . "&nbsp;" . $thaimonth[$Date_s[1]] . "&nbsp;" . ($Date_s[0]+543);
?>

                                    <tr>
                                        <td class="text-center"><?php echo "$code2_ser"; ?></td>
                                        <td class="text-center"><?php echo "$cus_fname  $cus_lname"; ?></td>


                                        <td class="text-center"><?php echo "$date_sch1"; ?></td>
                                        <td class="text-center">
                                           <?php
                                                 echo "$devi_type / $devi_class / $devi_sub_class"; 
                                           ?>
                                        </td>
                                        <td class="text-right"><?php echo number_format($ser_netprice, 2); ?></td>                  


                                        <td class="text-center">
                                            <a href="#?id_ser=<?php echo"$id_ser";?>&id_cus=<?php echo"$id_cus";?>" class="btn btn-block btn-primary" target="_blank"><i class="fas fa-print"></i> </a>
                                        </td>
                                    <!--    
                                        <td class="text-center">
                                            <a href="update_ser.php?id_ser=<?php echo"$id_ser";?>&stu=2" class="btn btn-info btn-block"><i class="fas fa-check-circle"></i></a>
                                        </td>
                                        <td class="text-center">
                                            <a href="edit_ser.php?id_ser=<?php echo"$id_ser";?>&id_cus=<?php echo"$id_cus";?>" class="btn btn-warning btn-block"><i class="fas fa-edit"></i></a>
                                        </td>
                                    -->
                                        
                           
                                    </tr>
<?php   //}//enf if
 } //end while?>
                                   <!-- <tr>
                                        <td colspan="4" align="right"><b>รวม</b></td>
                                        <td  align="right"> <?php echo number_format($ser_net, 2); ?></td>
                                        <td  align="center"> 
                                            
                                        </td>
                                    </tr>-->
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
