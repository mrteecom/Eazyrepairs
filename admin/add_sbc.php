<?php
include "../chksession_user.php";
include "h.php";
include "navbar.php";
include "../inc/connect.php"; //เชื่อมต่อฐานข้อมูล
$id_sc=$_GET['id'];
$sql="SELECT * FROM type ty INNER JOIN class cl  INNER JOIN sub_class sb ON ty.id_type=cl.id_type and cl.id_class=sb.id_class WHERE sb.id_class='$id_sc' ";
$result=mysql_db_query($dbname,$sql);
if ($result) {
    $r2 = mysql_fetch_array($result);
    $id_type=$r2[id_type];
      $id_class=$r2[id_class];
      $id_sc=$r2[id_sc];
      $type_name=$r2[type_name];
      $class_name=$r2[class_name];
      $sc_name=$r2[sc_name];
      $status=$r2[status];
                            } // end if
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>เพิ่มข้อมูลร้านค้า</h1>
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
                            <h3 class="card-title">เพิ่มข้อมูลลูกค้า</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form method="POST" action="add_subclass.php" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>ประเภทอุปกรณ์</label>
                                            <span id="type_dev">
                                                <select class="form-control" name="type_dev">
                                                    <option value="0">- ระบุประเภทอุปกรณ์ -</option>
                                                </select>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>ยี่ห้ออุปกรณ์</label>
                                            <span id="class_dev">
                                                <select class="form-control" name="class_dev">
                                                    <option value="0">- ระบุยี่ห้ออุปกรณ์ -</option>
                                                </select>
                                            </span>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>รุ่นอุปกรณ์</label>
                                            <input type="text" class="form-control" placeholder="กรุณากรอกข้อมูล"
                                        name="sub_class_dev" required>
                                        </div>
                                    </div>
                                </div>
                        </div>

                        <div class="card-footer">
                            <button type="button" onclick="window.location.href='main_shop.php'"
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

window.onLoad = dochange('type_dev', -1);
</script>
<!---------- end  input select 3 colum     ----------------->
<script>
function() {


};
</script>