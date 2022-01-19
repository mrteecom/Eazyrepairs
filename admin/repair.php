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
                    <h1>เพิ่มการแจ้งซ่อม</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <a class="btn btn-app" href="add_cus.php">
                            <i class="fas fa-plus"></i> เพิ่มข้อมูลลูกค้า
                        </a>
                        <a class="btn btn-app" href="add_device.php">
                            <i class="fas fa-plus"></i> เพิ่มอุปกรณ์ของลูกค้า
                        </a>
                        <a class="btn btn-app" href="add_repair.php">
                            <i class="fas fa-plus"></i> เพิ่มการแจ้งซ่อม
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
                            <h3 class="card-title">ข้อมูลการแจ้งซ่อม</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">ลำดับ</th>
                                        <th class="text-center">ชื่อ - นามสกุล</th>
                                        <th class="text-center">เบอร์โทร</th>
                                        <th class="text-center">จัดการ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td class="text-center">Internet
                                            Explorer 4.0
                                        </td>
                                        <td class="text-center"> 4</td>
                                        <td class="text-center">
                                            <a class="btn btn-app" data-toggle="modal" data-target="#modal-customer">
                                                <i class="fas fa-eye"></i> ดูข้อมูลลูกค้า
                                            </a>
                                            <a class="btn btn-app" href="his_recus.php" >
                                                <i class="fas fa-history"></i> ดูข้อมูลประการซ่อม
                                            </a>
                                            
                                        </td>
                                        <!-- /.modal customer-->
                                        <div class="modal fade" id="modal-customer">
                                            <div class="modal-dialog modal-xl">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">ข้อมูลลูกค้า</h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- /.card-header -->
                                                        <div class="card-body">
                                                            <dl class="row">
                                                                <dt class="col-sm-4">ชื่อ - นามสกุล</dt>
                                                                <dd class="col-sm-8">A description list is perfect for
                                                                    defining terms.</dd>
                                                                <dt class="col-sm-4">ที่อยู่</dt>
                                                                <dd class="col-sm-8">Vestibulum id ligula porta felis
                                                                    euismod semper eget lacinia odio sem nec elit.</dd>
                                                                <dd class="col-sm-8 offset-sm-4">Donec id elit non mi
                                                                    porta gravida at eget metus.</dd>
                                                                <dt class="col-sm-4">เบอร์โทร</dt>
                                                                <dd class="col-sm-8">Etiam porta sem malesuada magna
                                                                    mollis euismod.</dd>
                                                                <dt class="col-sm-4">อีเมล์
                                                                </dt>
                                                                <dd class="col-sm-8">Fusce dapibus, tellus ac cursus
                                                                    commodo, tortor mauris condimentum nibh, ut
                                                                    fermentum massa justo
                                                                    sit amet risus.
                                                                </dd>
                                                                <dt class="col-sm-4">facebook</dt>
                                                                <dd class="col-sm-8">Etiam porta sem malesuada magna
                                                                    mollis euismod.</dd>
                                                                <dt class="col-sm-4">line</dt>
                                                                <dd class="col-sm-8">Etiam porta sem malesuada magna
                                                                    mollis euismod.</dd>
                                                            </dl>
                                                        </div>
                                                        <!-- /.card-body -->
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">ปิด</button>

                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                        <!-- /.modal customer-->
                                        
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