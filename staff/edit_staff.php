<?php
include "../chksession_user.php";
include "h.php";
include "navbar.php";
$id_sf =$_GET[id];
include "../inc/connect.php"; //เชื่อมต่อฐานข้อมูล


    $sql="select * from  staff where id_sf='$id_sf' ";
    $result=mysql_db_query($dbname,$sql);
    $r2 = mysql_fetch_array($result);
      $id_sp=$r2[id_sp];
      $sf_fname=$r2[sf_fname];
      $sf_lname=$r2[sf_lname];
      $sf_username=$r2[sf_username];
      $sf_pass=$r2[sf_pass];
      $sf_add=$r2[sf_add];
      $sf_pro=$r2[sf_pro];
      $sf_ampher=$r2[sf_ampher];
      $sf_dis=$r2[sf_dis];
      $sf_pos=$r2[sf_pos];
      $sf_phone=$r2[sf_phone];

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>อัพเดทข้อมูลช่าง</h1>
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
                            <form method="POST" action="edit_staff2.php?id_sf=<?php echo "$id_sf"; ?>" enctype="multipart/form-data" >
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" class="form-control" name="user_st" value="<?php echo"$sf_username"; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Reset Password</label>
                                            <input type="text" class="form-control" name="pass_st" value="<?php echo"$sf_pass"; ?>">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>ชื่อ</label>
                                            <input type="text" class="form-control" name="fname_st" value="<?php echo"$sf_fname"; ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>นามสกุล</label>
                                            <input type="text" class="form-control" name="lname_st" value="<?php echo"$sf_lname"; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <!-- textarea -->
                                        <div class="form-group">
                                            <label>ที่อยู่</label>
                                            <textarea class="form-control" rows="3" name="add_st" 
                                                placeholder="กรุณากรอกข้อมูล" ><?php echo"$sf_add"; ?> </textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">    
                                    <div class="col">
                                        <div class="form-group">
                                             <?php  
                                                
                                                $sql3="select * from  provinces where name_th ='$sf_pro' ";
                                                $result3=mysql_db_query($dbname,$sql3);
                                                $r3 = mysql_fetch_array($result3);
                                                      $name_th=$r3[name_th];
                                            ?>
                                            <label>จังหวัด</label>
                                            <span id="province">
                                                <select class="form-control" name="pro_sf">
                                                    <option value="<?php echo"$pro_sf";?>"><?php echo"$name_th";?></option>
                                                    <option value="0">- เลือกจังหวัด -</option>
                                                </select>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <?php  
                                                $sql4="select * from amphures where name_th ='$sf_ampher' ";
                                                $result4=mysql_db_query($dbname,$sql4);
                                                $r4 = mysql_fetch_array($result4);
                                                      $name_th=$r4[name_th];
                                            ?>
                                            <label>อำเภอ</label>
                                            <span id="amphur">
                                                <select class="form-control" name="amp_sf" >
                                                    <option value="<?php echo"$ampher_sf";?>"><?php echo"$name_th";?></option>
                                                </select>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <?php  
                                                $sql5="select * from districts where name_th ='$sf_dis' ";
                                                $result5=mysql_db_query($dbname,$sql5);
                                                $r5 = mysql_fetch_array($result5);
                                                      $name_th=$r5[name_th];
                                            ?>
                                            <label>ตำบล</label>
                                            <span id="district">
                                                <select class="form-control" name="dis_sf">
                                                    <option value="<?php echo"$dis_sf";?>"><?php echo"$name_th";?></option>
                                                </select>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>รหัสไปรษณีย์</label>
                                            <input type="text" class="form-control" name="pos_st" value="<?php echo"$sf_pos";?>" >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>เบอร์โทรศัพท์</label>
                                            <input type="text" class="form-control" name="phone_st" value="<?php echo"$sf_phone";?>" >
                                        </div>
                                    </div>                                    
                                </div>
                                <div class="card-footer">
                                    <button type="button"  onclick="window.location.href='main_staff.php'" class="btn btn-danger">ย้อนกลับ</button>
                                    <button type="submit" class="btn btn-success float-right">Update</button>
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
</script>
<script type="text/javascript">
//สคริปห้ามกรอกตัวหนังสือกรอกได้เฉพาะตัวเลข
$("#tel2").keydown(function(e) {
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