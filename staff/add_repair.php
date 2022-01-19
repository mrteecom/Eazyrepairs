<?php
include "../chksession_user.php";
include "h.php";
include "navbar.php";
include "../inc/connect.php"; //เชื่อมต่อฐานข้อมูล
$id_devi = $_GET[id_devi];
$id_cus = $_GET[id_cus];
    $sql6="select * from customer inner join device on customer.id_cus = device.id_cus where customer.id_cus = '$id_cus' and device.id_devi = '$id_devi' ";
    $result6=mysql_db_query($dbname,$sql6);
        $r6 = mysql_fetch_array($result6);
            $cus_fname = $r6[cus_fname];
            $cus_lname = $r6[cus_lname];
            $devi_type = $r6[devi_type];    
            $devi_class = $r6[devi_class];
            $devi_sub_class= $r6[devi_sub_class];
            $id_sp = $r6[id_sp];
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
                            <form method="POST" action="add_repair2.php?id_cus=<?php echo "$id_cus";?>&id_devi=<?php echo "$id_devi";?>&id_sp=<?php echo "$id_sp";?>"
                                enctype="multipart/form-data">
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
                                            <textarea class="form-control" rows="3" name="detail_ser"  
                                                placeholder="กรุณากรอกข้อมูล"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- textarea -->
                                        <div class="form-group">
                                            <label>อาการเสีย</label>
                                            <textarea class="form-control" rows="3" name="sick_ser"
                                                placeholder="กรุณากรอกข้อมูล"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>อุปกรณ์ที่นำมาด้วย</label>
                                            <input type="text" class="form-control" placeholder="กรุณากรอกข้อมูล" name="device_ser">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>อุปกรณ์อื่นๆ</label>
                                            <input type="text" class="form-control" placeholder="กรุณากรอกข้อมูล"name="otherd_ser">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>หมายเหตุ</label>
                                            <input type="text" class="form-control" placeholder="กรุณากรอกข้อมูล" name="other_ser">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>ราคา</label>
                                            <input type="number" class="form-control" placeholder="กรุณากรอกข้อมูล" name="price_ser" required> 
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>วันที่รับคืน</label>
                                            <input type="datetime-local" class="form-control" name="datee_ser" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="button"  onclick="window.location.href='main_device.php?id_cus=<?php echo"$id_cus";?>'" class="btn btn-danger">ย้อนกลับ</button>
                                    <button type="submit" class="btn btn-success float-right">บันทึกข้อมูล</button>
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