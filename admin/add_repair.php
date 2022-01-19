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
                    <h1>เพิ่มรายการซ่อม</h1>
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
                            <h3 class="card-title">เพิ่มรายการซ่อม</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>ลูกค้า</label>
                                            <select class="form-control select2bs4" style="width: 100%;" required>
                                                <option selected="selected">กรุณาระบุบชื่อลูกค้า</option>
                                                <option>Alaska</option>
                                                <option>California</option>
                                                <option>Delaware</option>
                                                <option>Tennessee</option>
                                                <option>Texas</option>
                                                <option>Washington</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>อุปกรณ์ของลูกค้า</label>
                                            <select class="form-control select2bs4" style="width: 100%;" required>
                                                <option selected="selected">กรุณาระบุบอุปกรณ์ที่ซ่อม</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- textarea -->
                                        <div class="form-group">
                                            <label>สภาพ</label>
                                            <textarea class="form-control" rows="3"
                                                placeholder="กรุณากรอกข้อมูล"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>อาการที่พบบ่อย</label>
                                            <select class="form-control select2bs4" style="width: 100%;" required>
                                                <option selected="selected">กรุณาระบุอาการที่พบ</option>
                                                <option value="เปลี่ยนหน้าจอ (ยกชุด)">เปลี่ยนหน้าจอ (ยกชุด)</option>
                                                <option value="1">เปลี่ยนกระจกหน้าจอ
                                                </option>
                                                <option value="2">เปลี่ยนทัชสกรีน
                                                </option>
                                                <option value="3">เปลี่ยนแบตเตอรี่
                                                </option>
                                                <option value="4">เปลี่ยนกล้องหน้า
                                                </option>
                                                <option value="5">เปลี่ยนกล้องหลัง
                                                </option>
                                                <option value="6">เปลี่ยนฝาหลัง
                                                </option>
                                                <option value="7">เปลี่ยนชุดบอดี้
                                                </option>
                                                <option value="8">เปลี่ยนสวิต เปิด-ปิด (ปุ่มนอก)
                                                </option>
                                                <option value="9">เปลี่ยนสวิต เพิ่ม-ลดเสียง (ปุ่มนอก)
                                                </option>
                                                <option value="10">เปลี่ยนเลนส์กล้องหลัง
                                                </option>
                                                <option value="11">เปลี่ยนลำโพงกระดิ่ง
                                                </option>
                                                <option value="12">เปลี่ยนลำโพงสนทนา
                                                </option>
                                                <option value="13">เปลี่ยนลำโพงหูฟัง
                                                </option>
                                                <option value="14">เปลี่ยนชุดควบคุมเซนเซอร์หน้าจอ
                                                </option>
                                                <option value="15">เปลี่ยนไมค์โครโฟน
                                                </option>
                                                <option value="16">เปลี่ยนชุดมอเตอร์สั่น
                                                </option>
                                                <option value="17">เปลี่ยนถาดซิม (นอก)
                                                </option>
                                                <option value="18">เปลี่ยนถาดซิม (ใน)
                                                </option>
                                                <option value="19">เปลี่ยนก้นชาร์จ
                                                </option>
                                                <option value="20">เปลี่ยนสายแพร ชุดชาร์จ
                                                </option>
                                                <option value="21">เปลี่ยนสายแพร ชุดไมโครโฟน
                                                </option>
                                                <option value="22">เปลี่ยนสายแพร ชุดหูฟัง
                                                </option>
                                                <option value="23">เปลี่ยนสายแพร ปุ่มย้อนกลับ
                                                </option>
                                                <option value="24">เปลี่ยนสายแพร ปุ่มโฮม
                                                </option>
                                                <option value="25">เปลี่ยนสายแพร เพิ่ม-ลดเสียง
                                                </option>
                                                <option value="26">เปลี่ยนสายแพร สแกนลายนิ้วมือ
                                                </option>
                                                <option value="27">เปลี่ยนสายแพร สวิตเปิด-ปิด
                                                </option>
                                                <option value="28">ซ่อมเมนบอร์ด เปิดเครื่องไม่ติด
                                                </option>
                                                <option value="29">ซ่อมเมนบอร์ด ชาร์จไฟไม่เข้า
                                                </option>
                                                <option value="30">ซ่อมเมนบอร์ด ไฟหน้าจอไม่แสดงผล
                                                </option>
                                                <option value="31">ซ่อมเมนบอร์ด สัมผัสหน้าจอไม่ได้
                                                </option>
                                                <option value="32">ซ่อมเมนบอร์ด กล้องหน้าใช้งานไม่ได้
                                                </option>
                                                <option value="33">ซ่อมเมนบอร์ด กล้องหลังใช้งานไม่ได้
                                                </option>
                                                <option value="34">ซ่อมเมนบอร์ด เครื่องกินแบตผิดปกติ
                                                </option>
                                                <option value="35">ซ่อมเมนบอร์ด เครื่องไม่อ่านซิมการ์ด
                                                </option>
                                                <option value="36">ซ่อมเมนบอร์ด เครื่องร้อนผิดปกติ
                                                </option>
                                                <option value="37">ซ่อมเมนบอร์ด เพิ่มหน่วยความจำ (เพิ่มความจุ)
                                                </option>
                                                <option value="38">ซ่อมเมนบอร์ด ไฟแฟลชใช้งานไม่ได้
                                                </option>
                                                <option value="39">ซ่อมเมนบอร์ด ไมค์โครโฟนใช้งานไม่ได้
                                                </option>
                                                <option value="40">ซ่อมเมนบอร์ด ไม่มีสัญญาณ (โทรเข้า-ออก) ไม่ได้
                                                </option>
                                                <option value="41">ซ่อมเมนบอร์ด ระบบเสียงใช้งานไม่ได้
                                                </option>
                                                <option value="42">ซ่อมเมนบอร์ด ลำโพงสนทนาใช้งานไม่ได้
                                                </option>
                                                <option value="43">ปลดล็อครหัสหน้าจอ
                                                </option>
                                                <option value="44">ปลดล็อค ICLOUD
                                                </option>
                                                <option value="45">ปลดล็อค G-mail
                                                </option>
                                                <option value="46">ปลดล็อค Huawei ID
                                                </option>
                                                <option value="47">ปลดล็อค OPPO ID
                                                </option>
                                                <option value="48">ปลดล็อค Samsung Account
                                                </option>
                                                <option value="49">ปลดล็อค Vivo Account
                                                </option>
                                                <option value="50">ปลดล็อค Xiaomi Account
                                                </option>
                                                <option value="51">ปลดล็อคเครื่องนอก (ใส่ซิมไทยไม่ได้)
                                                </option>
                                                <option value="52">อัพเกรดซอฟแวร์ เครื่องติดรายเดือน
                                                </option>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-sm-6">
                                        <!-- textarea -->
                                        <div class="form-group">
                                            <label>อาการ</label>
                                            <textarea class="form-control" rows="3"
                                                placeholder="กรุณากรอกข้อมูล"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>อุปกรณ์ที่นำมาด้วย</label>
                                            <input type="text" class="form-control" placeholder="กรุณากรอกข้อมูล">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>อุปกรณ์อื่นๆ</label>
                                            <input type="text" class="form-control" placeholder="กรุณากรอกข้อมูล">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>เพิ่มเติม</label>
                                            <input type="text" class="form-control" placeholder="กรุณากรอกข้อมูล">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>ราคา</label>
                                            <input type="text" class="form-control" placeholder="กรุณากรอกข้อมูล">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>วันที่รับคืน</label>
                                            <input type="date" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="button" onclick="window.location.href='repair.php'"
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