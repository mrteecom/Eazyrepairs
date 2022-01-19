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
                            <form>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>ประเภทอุปกรณ์</label>
                                            <select class="form-control select2bs4" style="width: 100%;" required> 
                                                <option selected="selected">กรุณาระบุบประเภทอุปกรณ์</option>
                                                <option>คอมพิวเตอร์</option>
                                                <option>โน๊ตบุ๊ต</option>
                                                <option>โทรศัพท์</option>
                                                <option>แท็บเล็ต</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>ยี่ห้อ</label>
                                            <select class="form-control select2bs4" style="width: 100%;" required>
                                                <option selected="selected">กรุณาระบุบยี่ห้ออุปกรณ์</option>
                                                <option></option>
                                                <option></option>
                                                <option></option>
                                                <option></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                              
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>รุ่น</label>
                                            <input type="text" class="form-control" placeholder="กรุณากรอกข้อมูล" >
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>สี</label>
                                            <input type="text" class="form-control" placeholder="กรุณากรอกข้อมูล">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>IMEI</label>
                                            <input type="text" class="form-control" placeholder="กรุณากรอกข้อมูล">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Serial NO.</label>
                                            <input type="text" class="form-control" placeholder="กรุณากรอกข้อมูล">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="button"  onclick="window.location.href='repair.php'" class="btn btn-danger">ย้อนกลับ</button>
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