<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Eazy-Repairs | เข้าสู่ระบบ</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="apple-touch-icon" sizes="180x180" href="Index/img/Eazy repairs 800x800.png">
    <link rel="icon" type="image/png" href="Index/img/Eazy repairs 800x800.png" sizes="32x32">
    <link rel="icon" type="image/png" href="Index/img/Eazy repairs 800x800.png" sizes="16x16">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="#" class="h1"><b>Eazy </b>Repairs</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">ลืมรหัสผ่าน</p>

      <form action="forget_pass2.php" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="ชื่อ" name="fname">
          <div class="input-group-append">
           
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="นามสกุล" name="lname">
          <div class="input-group-append">
            
          </div>
        </div>
        <div class="row">
          
          <!-- /.col -->
          <div class="col">
            <button type="submit" class="btn btn-success btn-block">ส่ง Email </button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center mt-2 mb-3">
        
        
      </div>
     
    </div>
    <!-- /.card-body -->
    <div class="card card-outline card-primary">
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->
<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v9.0'
          });
        };

        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/th_TH/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>

      <!-- Your Chat Plugin code -->
      <div class="fb-customerchat"
        attribution="setup_tool"
        page_id="102849825181492"
  theme_color="#0A7CFF"
  logged_in_greeting="ติดต่อด้านใดครับ"
  logged_out_greeting="ติดต่อด้านใดครับ">
      </div>
      <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.js"></script>
      
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
<script>
        Swal.fire({
            title: 'สำหรับผู้ลืมE-mail',
            text: 'ให้ติดต่อแอดมินก่อน',
            icon: 'info',
            timer: '50000',
            footer: '<a href="https://www.facebook.com/Easy-Repairs-102849825181492">ติดต่อแอดมินที่เพจ</a>'
        });
        // window.location.href = "https://www.astcconference.com/calendar.php";
        </script>