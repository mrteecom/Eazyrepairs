<?php
include "../chksession_user.php";
include "h.php";
include "navbar.php";
include "../inc/connect.php"; //เชื่อมต่อฐานข้อมูล

/*
    $sql="select * from  shop where id_sp='$sess_idshop' ";
    $result=mysql_db_query($dbname,$sql);
    $r2 = mysql_fetch_array($result);
      $id_sp=$r2[id_sp];
      $sp_name=$r2[sp_name];
      $sp_logo=$r2[sp_logo];
      $sp_tax=$r2[sp_tax];
      $sp_add=$r2[sp_add];
      $sp_phone=$r2[sp_phone];
      $sp_email=$r2[sp_email];
      $sp_fb=$r2[sp_fb];
      $sp_line=$r2[sp_line];
      $sp_username=$r2[sp_username];
      $sp_pass=$r2[sp_pass];      
      $sp_status=$r2[sp_status];
      */
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
                            <h3 class="card-title">อัพเดทข้อมูลช่าง </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form method="POST" action="add_staff2.php?id_sp=<?php echo "$sess_idshop"; ?>" enctype="multipart/form-data" >
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" class="form-control" name="user_st"placeholder="กรุณากรอกข้อมูล"  required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="text" class="form-control" name="pass_st" placeholder="กรุณากรอกข้อมูล" required>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>ชื่อ</label>
                                            <input type="text" class="form-control" placeholder="กรุณากรอกข้อมูล" name="fname_st" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>นามสกุล</label>
                                            <input type="text" class="form-control" placeholder="กรุณากรอกข้อมูล" name="lname_st" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <!-- textarea -->
                                        <div class="form-group">
                                            <label>ที่อยู่</label>
                                            <textarea class="form-control" rows="3" name="add_st" 
                                                placeholder="กรุณากรอกข้อมูล" required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">    
                                    <div class="col">
                                        <div class="form-group">
                                            <label>จังหวัด</label>
                                            <span id="province">
                                                <select class="form-control" >
                                                    <option value="0">- เลือกจังหวัด -</option>
                                                </select>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>อำเภอ</label>
                                            <span id="amphur">
                                                <select class="form-control" >
                                                    <option value="0">- เลือกอำเภอ -</option>
                                                </select>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>ตำบล</label>
                                            <span id="district">
                                                <select class="form-control" >
                                                    <option value="0">- เลือกตำบล -</option>
                                                </select>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>รหัสไปรษณีย์</label>
                                            <input type="text" class="form-control" name="post_st"  placeholder="Postcode" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>เบอร์โทรศัพท์</label>
                                            <input type="text" class="form-control" placeholder="กรุณากรอกเบอร์โทร"  id="tel1" onkeyup="autoTab(this)" name="phone_st" required>
                                        </div>
                                    </div>                                    
                                </div>
                                <div class="card-footer">
                                    <button type="button"  onclick="window.location.href='index.php'" class="btn btn-danger">ย้อนกลับ</button>
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
<script type="text/javascript">
//สคริปห้ามกรอกตัวหนังสือกรอกได้เฉพาะตัวเลข
$("#tel1").keydown(function(e) {
    // Allow: backspace, delete, tab, escape, enter and .
    if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110]) !== -1 ||
        // Allow: Ctrl+A, Command+A
        (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
        // Allow: home, end, left, right, down, up
        (e.keyCode >= 35 && e.keyCode <= 40)) {
        // let it happen, don't do anything
        return;
    }
    // Ensure that it is a number and stop the keypress
    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
        e.preventDefault();
    }
});

function autoTab(obj){
    /* กำหนดรูปแบบข้อความโดยให้ _ แทนค่าอะไรก็ได้ แล้วตามด้วยเครื่องหมาย
    หรือสัญลักษณ์ที่ใช้แบ่ง เช่นกำหนดเป็น  รูปแบบเลขที่บัตรประชาชน
    4-2215-54125-6-12 ก็สามารถกำหนดเป็น  _-____-_____-_-__
    รูปแบบเบอร์โทรศัพท์ 08-4521-6521 กำหนดเป็น __-____-____
    หรือกำหนดเวลาเช่น 12:45:30 กำหนดเป็น __:__:__
    ตัวอย่างข้างล่างเป็นการกำหนดรูปแบบเลขบัตรประชาชน
    */
        var pattern=new String("___-___-____"); // กำหนดรูปแบบในนี้
        var pattern_ex=new String("-"); // กำหนดสัญลักษณ์หรือเครื่องหมายที่ใช้แบ่งในนี้
        var returnText=new String("");
        var obj_l=obj.value.length;
        var obj_l2=obj_l-1;
        for(i=0;i<pattern.length;i++){           
            if(obj_l2==i && pattern.charAt(i+1)==pattern_ex){
                returnText+=obj.value+pattern_ex;
                obj.value=returnText;
            }
        }
        if(obj_l>=pattern.length){
            obj.value=obj.value.substr(0,pattern.length);           
        }
}
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
    req.open("GET", "../inc/location.php?data=" + src + "&val=" + val); //สร้าง connection
    // req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=utf-8"); // set Header
    req.send(null); //ส่งค่า
}

window.onLoad = dochange('province', -1);
</script>
<!---------- end  input select 3 colum     ----------------->
<script>
function() {


};
</script>