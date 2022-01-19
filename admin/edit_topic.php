<?php
include "../chksession_user.php";
include "h.php";
include "navbar.php";
include "../inc/connect.php"; //เชื่อมต่อฐานข้อมูล
$id_detail=$_GET['id_detail'];

$sql="SELECT * FROM  detail_t sb  WHERE sb.id_detail ='$id_detail' ";
$result=mysql_db_query($dbname,$sql);
if ($result) {
    $r2 = mysql_fetch_array($result);
    $id_type=$r2[id_type];
    $id_topic=$r2[id_topic];
    $id_detail=$r2[id_detail];
    $type_name=$r2[type_name];
    $topic=$r2[topic];
    $detail=$r2[detail];
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
                            <form method="POST" action="edit.php?id_detail=<?php echo"$id_detail";?>"
                                enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>ประเภทอุปกรณ์</label>
                                            <span id="type">
                                                <select class="form-control" name="type">
                                                    <option value="0">- ระบุประเภทอุปกรณ์ -</option>
                                                </select>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>ยี่ห้ออุปกรณ์</label>
                                            <span id="topic">
                                                <select class="form-control" name="topic">
                                                    <option value="0">- ระบุหัวข้ออาการเสีย -</option>
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
                                            <input type="text" class="form-control" name="detail"
                                                value="<?php echo "$detail";?>" required>
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
    req.open("GET", "../inc/auto_topic.php?data=" + src + "&val=" + val); //สร้าง connection
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