<?php
//require "../inc/connect.php"; //เชื่อมต่อฐานข้อมูล
include "h.php";
include "navbar.php";
require "../inc/connect.php"; //เชื่อมต่อฐานข้อมูล

$id_pay = $_GET[id_pay];
$datetime = date('Y-m-d h:i:s');
$sql3="select * from pay where id_pay = '$id_pay' ";
$result3=mysql_db_query($dbname,$sql3);
$r3 = mysql_fetch_array($result3);
//$id_pay=$r3[id_pay];
$price_pay=$r3[price_pay];

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col">
                    <h1>แจ้งชำระเงิน</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <!-- right column -->
                <div class="col">
                    <!-- general form elements disabled -->
                    <div class="card card-warning">
                        <div class="card-header">
                            <h3 class="card-title">แจ้งหลักฐานการชำระเงิน</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form METHOD=POST ACTION="upload_slip2.php?id_pay=<?php echo"$id_pay";?>"
                                ENCTYPE="multipart/form-data" role="form">
                                <div class="row">
                                    <div class="col">
                                        <!-- select -->
                                        <div class="form-group">
                                            <label>ธนาคารผู้โอน</label>
                                            <select class="form-control" name="bank_pay">
                                                <option value="00">--โปรดระบุ--</option>
                                                <option value="BBL">ธนาคารกรุงเทพ</option>
                                                <option value="KBANK">ธนาคารกสิกรไทย</option>
                                                <option value="KTB">ธนาคารกรุงไทย</option>
                                                <option value="TMB">ธนาคารทหารไทย</option>
                                                <option value="SCB">ธนาคารไทยพาณิชย์</option>
                                                <option value="BAY">ธนาคารกรุงศรีอยุธยา</option>
                                                <option value="GSB">ธนาคารออมสิน</option>
                                                <option value="ISBT">ธนาคารอิสลามแห่งประเทศไทย</option>
                                                <option value="OTR">ธนาคารอื่นๆ</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>วันที่ชำระเงิน</label>
                                            <input type="date" class="form-control" name="date_pay">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="customFile">ยอดงินที่แจ้งชำระ</label>
                                            <input type="text" class="form-control" value="<?php echo"$price_pay";?>" disabled >

                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="customFile">หลักฐานการชำระเงิน</label>
                                            <div class="custom-file">
                                        
                                                <input type="file" class="form-control" id="file_pay"
                                                    name="file_pay">
                                            </div>
                                        </div>
                                    </div>

                                </div>


                                <div class="row">
                                    <div class="col">
                                        <p>ธนาคาร :  <br>
                                            ชื่อบัญชี : 
                                            <br>
                                            เลขที่บัญชี : 
                                        </p>
                                    </div>

                                </div>

                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">ส่งหลักฐาน</button>
                        </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
</div>
</div>
<!-- /.card -->
</div>
<!--/.col (right) -->
</div>
<!-- /.row -->
</div><!-- /.container-fluid -->
</section>

</div>
<!-- /.content-wrapper -->
<?php include "f.php";?>