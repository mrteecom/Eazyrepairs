<?php
include "../chksession_user.php";
include "h.php";
include "navbar.php";
require "../inc/connect.php"; //เชื่อมต่อฐานข้อมูล
$type = $_GET['topic'];
$detail = $_GET['detail'];
?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>อาการเสียของอุปกรณ์</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <a class="btn btn-app" data-toggle="modal" data-target="#modal-class">
                            <i class="fas fa-plus"></i> เพิ่มหัวข้ออาการเสีย
                        </a>
                        <a class="btn btn-app" data-toggle="modal" data-target="#modal-subclass">
                            <i class="fas fa-plus"></i> เพิ่มอาการเสีย
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
            <form action="topic.php" method="GET">
                <div class="row">
                    <div class="col">
                        <label>หัวข้ออาการเสีย</label>
          
                            <select class="form-control" name="topic">
                            <option selected disabled>กรุณาระบุหัวข้ออาการเสีย</option>
                        <?php 
                                            $sql = "SELECT * FROM topic ";
                                            $result=mysql_db_query($dbname,$sql);
                                            while($re = mysql_fetch_array($result)){
                                   
                                            $id_topic=$re[id_topic];
                                            $topic=$re[topic];
                                            $id_type=$re[id_type];
                                            ?>
                                        <option value="<?php echo "$id_topic"; ?>"><?php echo "$topic"; ?></option>
                                        <?php }?>
                            </select>
      

                    </div>
                    <div class="col">
                        <label>อาการเสีย</label>
              
                            <select class="form-control" name="detail">
                            <option selected disabled>กรุณาระบุยี่ห้อ</option>
                        <?php 
                                            $sql = "SELECT * FROM topic  INNER JOIN detail_t  ";
                                            $result=mysql_db_query($dbname,$sql);
                                            while($re = mysql_fetch_array($result)){
                              
                                            $id_detail=$re[id_detail];
                                            $topic=$re[topic];
                                            $detail=$re[detail];
                                            ?>
                                        <option value="<?php echo "$id_detail"; ?>"><?php echo "$topic/$detail"; ?></option>
                                        <?php }?>
                            </select>
                   
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
                            <h3 class="card-title">อาการเสียของอุปกรณ์</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">ลำดับ</th>
                                        <th class="text-center">อุปกรณ์</th>
                                        <th class="text-center">หัวข้อ</th>
                                        <th class="text-center">อาการ</th>
                                        <th class="text-center">จัดการ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php   
    $count=0;
    $sql="SELECT * FROM type ty INNER JOIN topic cl  INNER JOIN detail_t sb ON ty.id_type=cl.id_type and cl.id_topic=sb.id_topic WHERE ty.status='1' AND (cl.id_topic = '$type' or sb.id_topic = '$class')";
    $result=mysql_db_query($dbname,$sql);
    while($r2 = mysql_fetch_array($result)){
        $count++;
      $id_type=$r2[id_type];
      $id_topic=$r2[id_topic];
      $id_detail=$r2[id_detail];
      $type_name=$r2[type_name];
      $topic=$r2[topic];
      $detail=$r2[detail];
      $status=$r2[status];
      if($type != '' or $detail != ''){


?>

                                    <tr>
                                        <td class="text-center"><?php echo "$count"; ?></td>
                                        <td class="text-center"><?php echo "$type_name"; ?></td>
                                        <td class="text-center"><?php echo "$topic";?></td>
                                        <td class="text-center"><?php echo "$detail";?></td>
                                        <td class="text-center"><a href="del.php?id_detail=<?php echo"$id_detail";?>"
                                                class="btn btn-danger btn-block">
                                                ลบอาการเสีย</a>
                                                <a href="edit_topic.php?id_detail=<?php echo"$id_detail";?>" class="btn btn-warning btn-block" >
                                                แก้ไข</a></td>




                                    </tr>
                                    <?php }}//end while ?>
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



<div class="modal fade" id="modal-subclass">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">เพิ่มอาการเสีย</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- /.card-header -->
                <div class="card-body">
                    <form method="POST" action="add_detail.php">
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
                                    <label>หัวข้ออาการเสีย</label>
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
                                    <label>อาการเสีย</label>
                                    <input type="text" class="form-control" placeholder="กรุณากรอกข้อมูล" name="detail"
                                        required>
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
<!-- /.modal subclass-->

<!-- /.modal subclass-->

<div class="modal fade" id="modal-subclass">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">เพิ่มอาการเสีย</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- /.card-header -->
                <div class="card-body">
                    <form method="POST" action="add_detail.php">
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
                                    <label>หัวข้ออาการเสีย</label>
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
                                    <label>อาการเสีย</label>
                                    <input type="text" class="form-control" placeholder="กรุณากรอกข้อมูล" name="detail"
                                        required>
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
<!-- /.modal subclass-->

<!-- /.modal class-->

<div class="modal fade" id="modal-class">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">เพิ่มหัวข้ออาการเสีย</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- /.card-header -->
                <div class="card-body">
                    <form method="POST" action="add_topic.php">
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
                                    <label>หัวข้ออาการเสีย</label>
                                    <input type="text" class="form-control" placeholder="กรุณากรอกข้อมูล" name="topic"
                                        required>
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