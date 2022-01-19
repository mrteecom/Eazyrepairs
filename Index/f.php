<!-- footer part start-->
<footer class="footer-area">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-sm-6 col-md-4 col-xl-3">
                <div class="single-footer-widget footer_1">
                
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-xl-4">
                <div class="single-footer-widget footer_2">
                   
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-md-4">
            <div class="single-footer-widget footer_2">
                    <h4>สถิติผู้เยี่ยมชมเว็บไซต์</h4>
                    <?php
                                     include "inc/condb.php";
                                    $date=date("d-m-Y");
                                        $ip = $_SERVER['REMOTE_ADDR'];
                                        $sql="INSERT INTO counter(date_visit,ip_visit,visit)VALUES
                                        ('$date', '$ip', '1')";
                                        mysqli_query($con,$sql);

                                        $today = date('d-m-Y');
                                        $sql="SELECT count(ip_visit) as visit From counter";
                                        $result= mysqli_query($con,$sql);
                                        $row = mysqli_fetch_array($result);
                                        $visit = $row['visit'];
                                        $id_visit = $row['id_vist'];
                                        //$openpage =  str_pad($visit,6,0,'str_pad_left'); //ทำเป็นเลข 6 หลักด้วยการเติมเลข 
                                        // 0 ข้างซ้าย?>
                    <p >จำนวนผู้เข้าชมเว็บไซต์ <?php echo number_format($visit)?> คน
                    </p>

                    <div class="social_icon">
                        <a href="#"> <i class="ti-facebook"></i> </a>
                        <a href="#"> <i class="ti-twitter-alt"></i> </a>
                        <a href="#"> <i class="ti-instagram"></i> </a>
                        <a href="#"> <i class="ti-skype"></i> </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="copyright_part_text text-center">
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="footer-text m-0">
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;<script>
                                document.write(new Date().getFullYear());
                                </script> All rights reserved | Eazy-Repairs<br>
                               
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </p>
                            <p class="footer-text m-0 text-right">  Powered by : <a href="#" 
                                    target="_blank">Eazy-Repairs</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer part end-->

<!-- jquery plugins here-->
<!-- jquery -->
<script src="js/jquery-1.12.1.min.js"></script>
<!-- popper js -->
<script src="js/popper.min.js"></script>
<!-- bootstrap js -->
<script src="js/bootstrap.min.js"></script>
<!-- easing js -->
<script src="js/jquery.magnific-popup.js"></script>
<!-- swiper js -->
<script src="js/swiper.min.js"></script>
<!-- swiper js -->
<script src="js/masonry.pkgd.js"></script>
<!-- particles js -->
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.nice-select.min.js"></script>
<!-- swiper js -->
<script src="js/slick.min.js"></script>
<script src="js/jquery.counterup.min.js"></script>
<script src="js/waypoints.min.js"></script>
<!-- custom js -->
<script src="js/custom.js"></script>

<!-- DataTables -->
<script src="backend/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="backend/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
</body>

</html>