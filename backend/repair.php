<?php
include "../chksession_user.php";
include "h.php";
include "navbar.php";
include "../inc/connect.php"; //เชื่อมต่อฐานข้อมูล
$id_devi = $_GET[id_devi];
$id_cus = $_GET[id_cus];
$id_ser = $_GET[id_ser];
    //echo "$id_ser / $id_cus /$id_devi / ";
    $sql2="select * from service inner join customer on service.id_cus = customer.id_cus inner join device on service.id_devi = device.id_devi where  service.id_ser = '$id_ser' and (customer.id_cus = '$id_cus' and device.id_devi = '$id_devi')";
    $result2=mysql_db_query($dbname,$sql2);
        $r2 = mysql_fetch_array($result2);

            $cus_fname = $r2[cus_fname];
            $cus_lname = $r2[cus_lname];
            $cus_add = $r2[cus_add];
            $cus_add=$r2[cus_add];
            $cus_pro=$r2[cus_pro];
            $cus_ampher=$r2[cus_ampher];
            $cus_dis=$r2[cus_dis];
            $cus_pos=$r2[cus_pos];
            $cus_phone=$r2[cus_phone];
            $cus_email=$r2[cus_email];
            $cus_fb=$r2[cus_fb];
            $cus_line=$r2[cus_line];

            $devi_type = $r2[devi_type];    
            $devi_class = $r2[devi_class];
            $devi_sub_class= $r2[devi_sub_class];            
            $devi_type=$r2[devi_type];
            $devi_ram=$r2[devi_ram];
            $devi_color=$r2[devi_color];
            $devi_imei=$r2[devi_imei];
            $devi_serial_no=$r2[devi_serial_no];

            $ser_detail = $r2[ser_detail]; 
            $ser_sick = $r2[ser_sick]; 
            $ser_device = $r2[ser_device]; 
            $ser_ortherd = $r2[ser_ortherd]; 
            $ser_orther = $r2[ser_orther]; 
            $ser_price = $r2[ser_price]; 
            $ser_price2 = $r2[ser_price2]; 
            $ser_netprice = $r2[ser_netprice];
            $ser_tech = $r2[ser_tech];
            $ser_date_e = $r2[ser_date_e];

           
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>ใบแจ้งซ่อม</h1>
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
                            <h3 class="card-title">ใบแจ้งรายการซ่อม </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form method="POST" action="report.php?id_ser=<?php echo"$id_ser";?>&id_cus=<?php echo"$id_cus";?>&id_devi=<?php echo"$id_devi";?>" target="_blank">
<!------------------------------------------ข้อมูลลูกค้า----------------------------------->
                                <div class="row">
                                    <div class="col-sm-6">
                                       
                                        <div class="form-group">
                                            <label>ชื่อ</label>
                                            <input type="text" class="form-control"  value="<?php  echo"$cus_fname";?>" disabled >
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>นามสกุล</label>
                                            <input type="text" class="form-control" value="<?php  echo"$cus_lname";?>"  disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <!-- textarea -->
                                        <div class="form-group">
                                            <label>ที่อยู่</label>
                                            <textarea class="form-control" rows="1" placeholder="กรุณากรอกข้อมูล" disabled><?php echo"$cus_add";?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">    
                                    <div class="col">
                                        <div class="form-group">
                                            <label>จังหวัด :: <?php echo"$cus_pro";?> </label>
                                             <input type="text" class="form-control" value="<?php  echo"$cus_pro";?>" disabled>
                                            <!--<span id="province">
                                                <select class="form-control" name="pro_sp">
                                                    <option value="<?php echo"$cus_pro";?>"><?php echo"$cus_pro";?></option>
                                                </select>
                                            </span>-->
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>อำเภอ</label>
                                            <input type="text" class="form-control" value="<?php  echo"$cus_ampher";?>" disabled>
                                            <!--<span id="amphur">
                                                <select class="form-control" name="amp_sp">
                                                    <option value="<?php echo"$cus_ampher";?>"><?php echo"$cus_ampher";?></option>
                                                </select>
                                            </span>-->
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>ตำบล</label>
                                            <input type="text" class="form-control" value="<?php  echo"$cus_dis";?>" disabled>
                                            <!--<span id="district">
                                                <select class="form-control" name="dis_sp">
                                                    <option value="<?php echo"$cus_dis";?>"><?php echo"$cus_dis";?></option>
                                                </select>
                                            </span>-->
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>รหัสไปรษณีย์</label>
                                            <input type="text" class="form-control"  value="<?php echo"$cus_pos";?>" disabled placeholder="กรุณากรอกข้อมูล">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>เบอร์โทรศัพท์</label>
                                            <input type="text" class="form-control"  value="<?php echo"$cus_phone";?>" placeholder="กรุณากรอกข้อมูล" disabled>
                                            
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>อีเมล์ติดต่อ</label>
                                            <input type="text" class="form-control" value="<?php echo"$cus_email";?>" placeholder="กรุณากรอกข้อมูล" disabled>
                                        </div>
                                    </div>
                                
                                    <div class="col-sm-3">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>facebook</label>
                                            <input type="text" class="form-control" value="<?php echo"$cus_fb";?>" placeholder="กรุณากรอกข้อมูล" disabled>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>line</label>
                                            <input type="text" class="form-control"  value="<?php echo"$cus_line";?>" placeholder="กรุณากรอกข้อมูล" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex p-2 bg-secondary text-white"></div>

<!------------------------------------------ข้อมูลอุปกรณ์ลูกค้า----------------------------------->
                                <div class="row">
                                    <div class="col-sm-3">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>ประเภทอุปกรณ์ :: </label>
                                            <input type="text" class="form-control"  value="<?php echo"$devi_type";?>" placeholder="กรุณากรอกข้อมูล" disabled>
                                            <!--<span id="type_dev">
                                                <select class="form-control" name="type_dev1">
                                                    <option value="<?php echo"$devi_type";?>"><?php echo"$devi_type";?></option>
                                                </select>
                                            </span>-->
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>ยี่ห้อ</label>
                                             <input type="text" class="form-control"  value="<?php echo"$devi_class";?>" placeholder="กรุณากรอกข้อมูล" disabled>
                                            <!--<span id="class_dev">
                                                <select class="form-control" name="class_dev1">
                                                    <option value="<?php echo"$devi_class";?>"><?php echo"$devi_class";?></option>
                                                   
                                                </select>
                                            </span>-->
                                        </div>
                                    </div>
                               
                                    <div class="col-sm-3">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>รุ่น</label>
                                             <input type="text" class="form-control"  value="<?php echo"$devi_sub_class";?>" placeholder="กรุณากรอกข้อมูล" disabled>
                                            <!--<span id="sub_class_dev">
                                                <select class="form-control" name="sub_class_dev1">
                                                    <option value="<?php echo"$devi_sub_class";?>"><?php echo"$devi_sub_class";?></option>
                                                   
                                                </select>
                                            </span>-->
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <!-- text input -->
                                       
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label>หน่วยความจำ</label>
                                            <input type="text" class="form-control" value="<?php echo"$devi_ram";?>"
                                                placeholder="กรุณากรอกข้อมูล" disabled>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label>สี</label>
                                            <input type="text" class="form-control" value="<?php echo"$devi_color";?>"
                                                placeholder="กรุณากรอกข้อมูล" disabled>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>IMEI</label>
                                            <input type="text" class="form-control"  value="<?php echo"$devi_imei";?>"
                                                placeholder="กรุณากรอกข้อมูล" disabled>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Serial NO.</label>
                                            <input type="text" class="form-control" value="<?php echo"$devi_serial_no";?>"
                                                placeholder="กรุณากรอกข้อมูล" disabled>
                                        </div>
                                    </div>                                    
                                </div>
                                <div class="d-flex p-2 bg-secondary text-white"></div>

<!------------------------------------------ข้อมูลอาการเสีย----------------------------------->
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- textarea -->
                                        <div class="form-group">
                                            <label>สภาพเครื่อง</label>
                                            <input type="text" class="form-control" value="<?php echo"$ser_detail";?>"
                                                placeholder="กรุณากรอกข้อมูล" disabled>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- textarea -->
                                        <div class="form-group">
                                            <label>อาการเสีย</label>
                                            <input type="text" class="form-control" value="<?php echo"$ser_sick";?>"
                                                placeholder="กรุณากรอกข้อมูล" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>อุปกรณ์ที่นำมาด้วย</label>
                                            <input type="text" class="form-control" placeholder="กรุณากรอกข้อมูล" value="<?php echo"$ser_device";?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>อุปกรณ์อื่นๆ</label>
                                            <input type="text" class="form-control" placeholder="กรุณากรอกข้อมูล" value="<?php echo"$ser_ortherd";?>" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>หมายเหตุ</label>
                                            <input type="text" class="form-control" placeholder="กรุณากรอกข้อมูล" value="<?php echo"$ser_orther";?>" disabled>
                                        </div>
                                    </div>

                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label>ราคา</label>
                                            <input type="number" class="form-control" value="<?php echo"$ser_price";?>" disabled> 
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label>Vat</label>
                                            <input type="number" class="form-control" value="<?php echo"$ser_price2";?>" disabled> 
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label>ราคาสุทธิ</label>
                                            <input type="number" class="form-control" value="<?php echo"$ser_netprice";?>" disabled > 
                                        </div>
                                    </div>


                                    




                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>วันที่รับคืน :: </label>
                                            <input type="text" class="form-control" name="datee_ser" value="<?php echo"$ser_date_e";?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>ช่างซ่อม</label>
                                            <input type="text" class="form-control" name="tech_ser" value="<?php echo"$ser_tech";?>" disabled>
                                        </div>
                                    </div>
                                </div>                                


                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <button onclick="window.location.href='main_repair.php'" class="btn btn-danger btn-block">ย้อนกลับ</button>
                                        </div>
                                        <div class="col-sm-3">
                                            <button type="submit" target="_blank" class="btn btn-primary btn-block" target="_blank"><i class="fas fa-print"></i>&nbsp Print</button>
                                        </div>
                                         <div class="col-sm-3">   
                                            <button onclick="window.location.href='update_ser.php?id_ser=<?php echo"$id_ser";?>&stu=2'" class="btn btn-info btn-block"><i class="fas fa-check-circle"></i>&nbsp ยืนยัน</button>
                                        </div>
                                        <div class="col-sm-3">    
                                            <button onclick="window.location.href='edit_ser.php?id_ser=<?php echo"$id_ser";?>&id_cus=<?php echo"$id_cus";?>&id_devi=<?php echo"$id_devi";?>'" class="btn btn-warning btn-block"><i class="fas fa-edit"></i>&nbsp แก้ไขข้อมูล</button>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-footer -->
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

window.onLoad = dochange1('province', -1);
</script>
<!---------- end  input select 3 colum     ----------------->
<script>
function() {


};
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