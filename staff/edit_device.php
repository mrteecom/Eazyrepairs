<?php
include "../chksession_user.php";
include "h.php";
include "navbar.php";
include "../inc/connect.php"; //เชื่อมต่อฐานข้อมูล
$id_devi = $_GET[id_devi];
$id_cus = $_GET[id_cus];
//echo "$id_devi";

    $sql6="select * from customer where id_cus= '$id_cus' ";
    $result6=mysql_db_query($dbname,$sql6);
        $r6 = mysql_fetch_array($result6);
            $cus_fname = $r6[cus_fname];
            $cus_lname = $r6[cus_lname];

    $sql="select * from  device where id_devi='$id_devi' ";
    $result=mysql_db_query($dbname,$sql);
    $r2 = mysql_fetch_array($result);
      $id_devi=$r2[id_devi];
      $id_cus=$r2[id_cus];
      $devi_type=$r2[devi_type];
      $devi_ban=$r2[devi_ban];
      $devi_class=$r2[devi_class];
      $devi_sub_class=$r2[devi_sub_class];
      $devi_type=$r2[devi_type];
      $devi_color=$r2[devi_color];
      $devi_imei=$r2[devi_imei];
      $devi_serial_no=$r2[devi_serial_no];
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
<style>

select{
    font-family: "FontAwesome";
}
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>แก้ไขอุปกรณ์ของลูกค้า</h1>
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
                            <h3 class="card-title">แก้ไขอุปกรณ์ของลูกค้า <?php echo " คุณ $cus_fname  $cus_lname"; ?></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form method="POST"
                                action="edit_device2.php?id_cus=<?php echo "$id_cus"; ?>&id_devi=<?php echo "$id_devi"; ?>"
                                enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>ประเภทอุปกรณ์</label>
                                            <input type="text" class="form-control" value="<?php echo"$devi_type";?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>ยี่ห้อ</label>
                                            <input type="text" class="form-control" value="<?php echo"$devi_class";?>" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>รุ่น</label>
                                            <input type="text" class="form-control" value="<?php echo"$devi_sub_class";?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>สี</label>
                                            <input type="text" class="form-control" name="color_dev"
                                                placeholder="กรุณากรอกข้อมูล" value="<?php echo"$devi_color"; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>IMEI</label>
                                            <input type="text" class="form-control" name="imei_dev"
                                                placeholder="กรุณากรอกข้อมูล" value="<?php echo"$devi_imei"; ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Serial NO.</label>
                                            <input type="text" class="form-control" name="serial_dev"
                                                placeholder="กรุณากรอกข้อมูล" value="<?php echo"$devi_serial_no"; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="button"
                                        onclick="window.location.href='main_device.php?id_cus=<?php echo $id_cus ?>'"
                                        class="btn btn-danger">ย้อนกลับ</button>
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

<script language=Javascript>
function Inint_AJAX() {
    try {
        return new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e) {} //IE
    try {
        return new ActiveXObject("Microsoft.XMLHTTP");
    } catch (e) {} //IE
    try {
        return new XMLHttpRequest();
    } catch (e) {} //Native Javascript
    alert("XMLHttpRequest not supported");
    return null;
};

function dochange(src, val) {
    var req = Inint_AJAX();
    req.onreadystatechange = function() {
        if (req.readyState == 4) {
            if (req.status == 200) {
                document.getElementById(src).innerHTML = req.responseText; //รับค่ากลับมา
            }
        }
    };
    req.open("GET", "../inc/autoselect.php?data=" + src + "&val=" + val); //สร้าง connection
    // req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=utf-8"); // set Header
    req.send(null); //ส่งค่า
}

window.onLoad = dochange('type', -1);
</script>
<!---------- end  input select 3 colum     ----------------->
<script>
function() {


};
</script>