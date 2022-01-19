<?php
include "h.php";
include "navbar.php";
?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>เพิ่มข้อมูลช่าง</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <a class="btn btn-app" data-toggle="modal" data-target="#modal-xl">
                            <i class="fas fa-plus"></i> เพิ่มช่าง
                        </a>
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

                    <!-- /.เริ่มตาราง -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">ข้อมูลช่าง</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">ลำดับ</th>
                                        <th class="text-center">ชื่อ - นามสกุล</th>
                                        <th class="text-center">ชื่อผู้ใช้งาน</th>
                                        <th class="text-center">รหัสผ่าน</th>
                                        <th class="text-center">จัดการ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">Trident</td>
                                        <td class="text-center">Internet
                                            Explorer 4.0
                                        </td>
                                        <td class="text-center">Win 95+</td>
                                        <td class="text-center"> 4</td>
                                        <td class="text-center">X</td>
                                    </tr>

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

<div class="modal fade" id="modal-xl">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">เพิ่มข้อมูลช่าง</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- general form elements disabled -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">เพิ่มข้อมูลช่าง</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form>
                            <div class="row">
                                <div class="col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>ชื่อ</label>
                                        <input type="text" class="form-control" placeholder="กรุณากรอกข้อมูล" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>นามสกุล</label>
                                        <input type="text" class="form-control" placeholder="กรุณากรอกข้อมูล" required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>username</label>
                                        <input type="text" class="form-control" placeholder="กรุณากรอกข้อมูล">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>password</label>
                                        <input type="text" class="form-control" placeholder="กรุณากรอกข้อมูล">
                                    </div>
                                </div>
                            </div>


                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
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