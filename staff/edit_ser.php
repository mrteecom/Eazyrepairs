<?php
include "../chksession_user.php";
include "h.php";
include "navbar.php";
include "../inc/connect.php"; //เชื่อมต่อฐานข้อมูล
$id_ser = $_GET[id_ser];
$id_cus = $_GET[id_cus];
    $sql6="select * from service inner join device on service.id_cus = device.id_cus join customer on service.id_cus = customer.id_cus where id_ser = '$id_ser'  ";
    $result6=mysql_db_query($dbname,$sql6);
        $r6 = mysql_fetch_array($result6);
            $id_devi = $r6[id_devi];
            $id_ser = $r6[id_ser];
            $id_cus = $r6[id_cus];
            $ser_detail = $r6[ser_detail];    
            $ser_sick = $r6[ser_sick];
            $ser_device = $r6[ser_device];
            $ser_ortherd = $r6[ser_ortherd];
            $ser_orther = $r6[ser_orther];
            $ser_price = $r6[ser_price];
            $ser_price2 = $r6[ser_price2];
            $ser_netprice = $r6[ser_netprice];
            $ser_date_s = $r6[ser_date_s];
            $ser_date_e = $r6[ser_date_e];
            $ser_status = $r6[ser_status];
            $devi_type=$r6[devi_type];    
            $devi_class=$r6[devi_class];
            $devi_sub_class=$r6[devi_sub_class];
            $cus_fname = $r6[cus_fname];
            $cus_lname = $r6[cus_lname];

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
<script language="JavaScript">
    function fncSum()
    {
         if(isNaN(document.Ser.price_ser.value) || document.Ser.price_ser.value == "")
         {
            alert('(Number A)Please input Number only.');
            document.Ser.price_ser.focus();
            return;
         }

         if(isNaN(document.Ser.price_ser2.value) || document.Ser.price_ser2.value == "")
         {
            alert('(Number B)Please input Number only.');
            document.Ser.price_ser2.focus();
            return;
         }

         document.Ser.price_ser3.value = parseFloat(document.Ser.price_ser.value) + parseFloat(document.Ser.price_ser2.value);
    }
</script>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>ใบแจ้งรายการซ่อม</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">

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
                    <!-- general form elements disabled -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">ใบแจ้งรายการซ่อม </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form name="Ser" method="POST" action="edit_ser2.php?id_ser=<?php echo "$id_ser";?>&id_cus=<?php echo"$id_cus";?>&stu=2" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>ลูกค้า</label>
                                            <input type="text" class="form-control" value="<?php echo "คุณ $cus_fname  $cus_lname"; ?>" disabled >
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>อุปกรณ์ของลูกค้า</label>
                                            <input type="text" class="form-control" value="<?php echo "$devi_type / $devi_class / $devi_sub_class"; ?>" disabled >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- textarea -->
                                        <div class="form-group">
                                            <label>สภาพเครื่อง</label>
                                            <textarea class="form-control" rows="3"   
                                               disabled ><?php echo "$ser_detail"; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- textarea -->
                                        <div class="form-group">
                                            <label>อาการเสีย</label>
                                            <textarea class="form-control" rows="3" 
                                               disabled ><?php echo "$ser_sick"; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>อุปกรณ์ที่นำมาด้วย</label>
                                            <input type="text" class="form-control" value="<?php echo "$ser_device";?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>อุปกรณ์อื่นๆ</label>
                                            <input type="text" class="form-control" value="<?php echo "$ser_ortherd";?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>อาการเสียเพิ่มเติม</label>
                                            <input type="text" class="form-control" name="other_ser" value="<?php echo "$ser_orther";?>">
                                        </div>
                                    </div>
                                </div>    
                                <div class="row">    
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>ราคา</label>
                                            <input type="number" class="form-control" value="<?php echo "$ser_price";?>" name="price_ser" OnChange="fncSum();" disabled> 
                                            
                                            <input type="number" class="form-control" value="<?php echo "$ser_price";?>" name="price_ser1"  hidden> 
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>ราคาเพิ่มเติม</label>
                                            <input type="number" class="form-control" value="<?php echo "$ser_price2";?>" name="price_ser2" OnChange="fncSum();" > 
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>ราคาสุทธิ</label>
                                            <input type="number" class="form-control" name="price_ser3" value="<?php echo "$ser_netprice";?>" disabled> 
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>วันที่รับคืน</label>
                                            <input type="date" class="form-control" name="datee_ser" required value="<?php echo "$ser_date_e";?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <label></label>
                                        <button type="button"  onclick="window.location.href='update_ser.php?id_ser=<?php echo"$id_ser";?>&stu=3' " class="btn btn-danger btn-block"><i class="fa fa-window-close "></i> ยกเลิก </button>
                                    </div>
                                    <div class="col-sm-3">
                                        <label></label>
                                        <button type="submit" class="btn btn-info btn-block"><i class="far fa-check-circle nav-icon"></i> ยืนยัน </button>
                                    </div>
                                    
                                </div>
                                <div class="card-footer">
                                    <button type="button"  onclick="window.location.href='main_repair.php' " class="btn btn-danger">ย้อนกลับ</button>
                                   
                                   <!-- <button type="submit" class="btn btn-success float-right">บันทึกข้อมูล</button> -->
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
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
