<?php
include "../chksession_user.php";
include "h.php";
include "navbar.php";
include "../inc/connect.php"; //เชื่อมต่อฐานข้อมูล
include "../inc/connect2.php"; //เชื่อมต่อฐานข้อมูล

$id_cus = $_GET[id_cus];

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
                    <h1>เพิ่มอุปกรณ์ของลูกค้า</h1>
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
                            <h3 class="card-title">เพิ่มอุปกรณ์ของลูกค้า</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form method="POST" action="add_device2.php?id_cus=<?php echo "$id_cus"; ?>"
                                enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>ประเภทอุปกรณ์</label>
                                            <span id="type_dev">
                                                <select class="form-control" >
                                                    <option value="0">- ระบุประเภทอุปกรณ์ -</option>
                                                </select>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>ยี่ห้อ</label>
                                            <span id="class_dev">
                                                <select class="form-control" >
                                                    <option value="0">- ระบุยี่ห้ออุปกรณ์ -</option>
                                                </select>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>รุ่น</label>
                                            <span id="sub_class_dev">
                                                <select class="form-control" >
                                                    <option value="0">- ระบุรุ่นอุปกรณ์ -</option>
                                                </select>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>รุ่นอื่นๆ โปรดระบุ</label>
                                            <input type="text" class="form-control" name="ot_class_dev"
                                                placeholder="กรุณากรอกข้อมูล">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>สี</label>
                                            <input type="text" class="form-control" name="color_dev"
                                                placeholder="กรุณากรอกข้อมูล" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>IMEI</label>
                                            <input type="text" class="form-control" name="imei_dev"
                                                placeholder="กรุณากรอกข้อมูล">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Serial NO.</label>
                                            <input type="text" class="form-control" name="serial_dev"
                                                placeholder="กรุณากรอกข้อมูล">
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

window.onLoad = dochange('type_dev', -1);
</script>
<!---------- end  input select 3 colum     ----------------->
<script>
function() {


};
</script>