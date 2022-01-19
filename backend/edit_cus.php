<?php
include "../chksession_user.php";
include "h.php";
include "navbar.php";
require "../inc/connect.php"; //เชื่อมต่อฐานข้อมูล
require "../inc/connect2.php"; //เชื่อมต่อฐานข้อมูล
$id_cus =$_GET[id];
    $sql="select * from  customer where id_cus='$id_cus' ";
    $result=mysql_db_query($dbname,$sql);
    $r2 = mysql_fetch_array($result);
      $id_cus=$r2[id_cus];
      $cus_fname=$r2[cus_fname];
      $cus_lname=$r2[cus_lname];
      $cus_add=$r2[cus_add];
      $cus_pro=$r2[cus_pro];
      $cus_ampher=$r2[cus_ampher];
      $cus_dis=$r2[cus_dis];
      $cus_pos=$r2[cus_pos];
      $cus_phone=$r2[cus_phone];
      $cus_email=$r2[cus_email];
      $cus_fb=$r2[cus_fb];
      $cus_line=$r2[cus_line];
      
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>แก้ไขข้อมูลลูกค้า</h1>
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
                            <h3 class="card-title">แก้ไขข้อมูลลูกค้า</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form method="POST" action="edit_cus2.php?id_cus=<?php echo "$id_cus"; ?>" enctype="multipart/form-data" >
                                <div class="row">
                                    <div class="col-sm-6">
                                       
                                        <div class="form-group">
                                            <label>ชื่อ</label>
                                            <input type="text" class="form-control" name="fname_cus" value="<?php  echo"$cus_fname";?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>นามสกุล</label>
                                            <input type="text" class="form-control" value="<?php  echo"$cus_lname";?>" name="lname_cus">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <!-- textarea -->
                                        <div class="form-group">
                                            <label>ที่อยู่</label>
                                            <textarea class="form-control" rows="1" name="add_cus" placeholder="กรุณากรอกข้อมูล"><?php echo"$cus_add";?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">    
                                    <div class="col">
                                        <div class="form-group">
                                            <label>จังหวัด :: <?php echo"$cus_pro";?> </label>
                                            <span id="province">
                                                <select class="form-control" name="pro_sp">
                                                    <option value="<?php echo"$cus_pro";?>"><?php echo"$cus_pro";?></option>
                                                </select>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>อำเภอ</label>
                                            <span id="amphur">
                                                <select class="form-control" name="amp_sp">
                                                    <option value="<?php echo"$cus_ampher";?>"><?php echo"$cus_ampher";?></option>
                                                </select>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>ตำบล</label>
                                            <span id="district">
                                                <select class="form-control" name="dis_sp">
                                                    <option value="<?php echo"$cus_dis";?>"><?php echo"$cus_dis";?></option>
                                                </select>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>รหัสไปรษณีย์</label>
                                            <input type="text" class="form-control" name="post_add" value="<?php echo"$cus_pos";?>" placeholder="กรุณากรอกข้อมูล">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>เบอร์โทรศัพท์</label>
                                            <input type="text" class="form-control" id="tel1" onkeyup="autoTab(this)" name="phone_cus" value="<?php echo"$cus_phone";?>" placeholder="กรุณากรอกข้อมูล">
                                            
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>อีเมล์ติดต่อ</label>
                                            <input type="text" class="form-control"name="email_cus" value="<?php echo"$cus_email";?>" placeholder="กรุณากรอกข้อมูล">
                                        </div>
                                    </div>
                                
                                    <div class="col-sm-3">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>facebook</label>
                                            <input type="text" class="form-control" name="fb_cus" value="<?php echo"$cus_fb";?>" placeholder="กรุณากรอกข้อมูล">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>line</label>
                                            <input type="text" class="form-control" name="line_cus" value="<?php echo"$cus_line";?>" placeholder="กรุณากรอกข้อมูล">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="button"  onclick="window.location.href='main_customer.php'" class="btn btn-danger">ย้อนกลับ</button>
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

function dochange1(src, val) {
    var req = Inint_AJAX();
    req.onreadystatechange = function() {
        if (req.readyState == 4) {
            if (req.status == 200) {
                document.getElementById(src).innerHTML = req.responseText; //รับค่ากลับมา
            }
        }
    };
    req.open("GET", "../inc/location.php?data=" + src + "&val=" + val); //สร้าง connection
    // req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=utf-8"); // set Header
    req.send(null); //ส่งค่า
}

window.onclick = dochange1('province', -1);
</script>
<!---------- end  input select 3 colum     ----------------->
<script>
function() {


};
</script>