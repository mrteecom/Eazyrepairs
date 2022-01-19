<?php
include "../chksession_user.php";
include "h.php";
include "navbar.php";
require "../inc/connect.php"; //เชื่อมต่อฐานข้อมูล

$type =$_GET['type_dev'];
$class =$_GET['class_dev'];

?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>ประเภทอุปกรณ์</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <a class="btn btn-app" data-toggle="modal" data-target="#modal-type">
                            <i class="fas fa-plus"></i> เพิ่มอุปกรณ์
                        </a><a class="btn btn-app" data-toggle="modal" data-target="#modal-class">
                            <i class="fas fa-plus"></i> เพิ่มยี่ห้ออุปกรณ์
                        </a>
                        <a href="add_sbc.php" class="btn btn-app">
                            <i class="fas fa-plus"></i> เพิ่มรุ่นอุปกรณ์
                        </a>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="container-fluid">
            <br>
            <form action="type.php" method="GET">
                <div class="row">
                    <div class="col">
                        <label>อุปกรณ์</label>
                        <span id="type_dev">
                            <select class="form-control" name="type_dev">
                                <option value="0">- ระบุประเภทอุปกรณ์ -</option>
                            </select>
                        </span>
                    </div>
                    <div class="col">
                        <label>ยี่ห้อ</label>
                        <span id="class_dev">
                            <select class="form-control" name="class_dev">
                                <option value="0">- ระบุยี่ห้ออุปกรณ์ -</option>
                            </select>
                        </span>
                    </div>
                    <div class="col">
                        <label>ค้นหา</label>
                        <button type="submit" class="form-control btn btn-info">ค้นหา</button>
                    </div>
                </div>
            </form>
            <br>
            <div class="row">
                <div class="col-12">

                    <!-- /.เริ่มตาราง -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">อุปกรณ์</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">ลำดับ</th>
                                        <th class="text-center">ประเภท</th>
                                        <th class="text-center">ยี่ห้อ</th>
                                        <th class="text-center">รุ่น</th>
                                        <th class="text-center">จัดการ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php   
    $count=0;
    $sql="SELECT * FROM type ty INNER JOIN class cl  INNER JOIN sub_class sb ON ty.id_type=cl.id_type and cl.id_class=sb.id_class WHERE ty.status='1' AND (ty.id_type = '$type' AND cl.id_class = '$class') ";
    $result=mysql_db_query($dbname,$sql);
    while($r2 = mysql_fetch_array($result)){
        $count++;
      $id_type=$r2[id_type];
      $id_class=$r2[id_class];
      $id_sc=$r2[id_sc];
      $type_name=$r2[type_name];
      $class_name=$r2[class_name];
      $sc_name=$r2[sc_name];
      $status=$r2[status];
      if($type != '' or $class != ''){

?>

                                    <tr>
                                        <td class="text-center"><?php echo "$count"; ?></td>
                                        <td class="text-center"><?php echo "$type_name"; ?></td>
                                        <td class="text-center"><?php echo "$class_name";?></td>
                                        <td class="text-center"><?php echo "$sc_name";?></td>
                                        <td class="text-center"><a href="del.php?id=<?php echo"$id_sc";?>"
                                                class="btn btn-danger btn-block">
                                                ลบรุ่น</a>
                                            <a href="edit_type.php?id_edit=<?php echo"$id_sc";?>"
                                                class="btn btn-warning btn-block" >
                                                แก้ไข</a>

                                        </td>




                                    </tr>
                                    <?php   }}//end while ?>
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

<!-- /.modal class-->

<div class="modal fade" id="modal-class">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">เพิ่มยี่ห้ออุปกรณ์</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- /.card-header -->
                <div class="card-body">
                    <form method="POST" action="add_class.php">
                        <div class="row">
                            <div class="col">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>ชื่ออุปกรณ์</label>
                                    <select name="type_name" class="form-control" id="">
                                        <option value="กรุณาระบุอุปกรณ์">กรุณาระบุอุปกรณ์</option>
                                        <?php 
                                            $sql = "SELECT * FROM type WHERE status='1' ";
                                            $result=mysql_db_query($dbname,$sql);
                                            while($re = mysql_fetch_array($result)){
                                                $count++;
                                            $id_type=$re[id_type];
                                            $type_name=$re[type_name];
                                            $status=$re[status];
                                            ?>
                                        <option value="<?php echo "$id_type"; ?>"><?php echo "$type_name"; ?></option>
                                        <?php }?>
                                    </select>

                                </div>
                            </div>
                            <div class="col">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>ยี่ห้ออุปกรณ์</label>
                                    <input type="text" class="form-control" placeholder="กรุณากรอกข้อมูล"
                                        name="class_name" required>
                                </div>
                            </div>
                        </div>
                </div>
                <!-- /.card-body -->
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                <button type="submit" class="btn btn-success float-right">บันทึกข้อมูล</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal class-->

<!-- /.modal type-->

<div class="modal fade" id="modal-type">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">เพิ่มอุปกรณ์</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- /.card-header -->
                <div class="card-body">
                    <form method="POST" action="add_type.php">
                        <div class="row">
                            <div class="col">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>ชื่ออุปกรณ์</label>
                                    <input type="text" class="form-control" placeholder="กรุณากรอกข้อมูล"
                                        name="type_name" required>
                                </div>
                            </div>
                        </div>
                </div>
                <!-- /.card-body -->
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                <button type="submit" class="btn btn-success float-right">บันทึกข้อมูล</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal type-->

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
    }) /*.buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)')*/ ;
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