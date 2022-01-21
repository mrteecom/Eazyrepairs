<?php 
include "../chksession_user.php"; 
include "../inc/connect.php"; //เชื่อมต่อฐานข้อมูล
?>
<!-- Site wrapper -->
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>



        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">


            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>

        </ul>
    </nav>
    <!-- /.navbar -->
    <?php 
    $sql="select * from shop where id_sp='$sess_idshop' ";
    $result=mysql_db_query($dbname,$sql);
    $r2 = mysql_fetch_array($result);
      $id_sp=$r2[id_sp];
      $sp_logo=$r2[sp_logo];
      $sp_name=$r2[sp_name];
?>
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar main-sidebar-custom sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="edit_shop.php" class="brand-link">
            <?php  if($sp_logo){ ?>
            <img src="images/<?php echo "$sp_logo"; ?>" class="brand-image img-circle" style="opacity: .8">
            <?php  }else{ ?>
            <img src="images/main_logo.png" class="brand-image img-circle" style="opacity: .8">
            <?php  } ?>

            <span class="brand-text font-weight-light"><?php echo "$sp_name"; ?></span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <!--
                <div class="image">
                    <img src="../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                </div>
            -->
                <div class="info">
                    <?php  if($sp_name){ ?>
                    <a href="edit_shop.php" class="d-block"><?php echo "$sp_name"; ?></a>
                    <?php  }else{ ?>
                    <a href="edit_shop.php" class="d-block">Eazy-Repairs.com</a>
                    <?php  } ?>    
                </div>
            </div>

            <!-- SidebarSearch Form -->
            <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                        aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a href="index.php" class="nav-link">
                            <i class="fas fa-home nav-icon"></i>
                            <p>หน้าหลัก</p>
                        </a>
                    </li>

                    <!--  <li class="nav-item">
                                <a href="edit_shop.php" class="nav-link">
                                    <i class="fas fa-desktop nav-icon"></i>
                                    <p>ข้อมูลร้านค้า</p>
                                </a>
                            </li>-->

                     <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-user-tie"></i>
                            <p>
                                ช่าง
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="main_staff.php" class="nav-link">
                                    <i class="fas fa-users nav-icon"></i>
                                    <p>ข้อมูลช่าง</p>
                                </a>
                            </li>
                        </ul>
                       <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="add_staff.php" class="nav-link">
                                    <i class="fas fa-plus nav-icon"></i>
                                    <p>เพิ่มข้อมูลช่าง</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-portrait"></i>
                            <p>
                                ลูกค้า
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="main_customer.php" class="nav-link">
                                    <i class="fas fa-address-book nav-icon"></i>
                                    <p>ข้อมูลลูกค้า</p>
                                </a>
                            </li>
                            <!--<li class="nav-item">
                                <a href="add_cus.php" class="nav-link">
                                    <i class="fas fa-plus nav-icon"></i>
                                    <p>เพิ่มข้อมูลลูกค้า</p>
                                </a>
                            </li>-->
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-folder"></i>
                            <p>
                                ใบแจ้งซ่อม/ลูกค้าใหม่
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="main_repair.php" class="nav-link">
                                    <i class="fas fa-edit nav-icon"></i>
                                    <p>แจ้งซ่อม</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="main_repair2.php" class="nav-link">
                                    <i class="fas fa-tools nav-icon"></i>
                                    <p>ระหว่างซ่อม</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="main_repair3.php" class="nav-link">
                                    <i class="far fa-money-bill-alt nav-icon"></i>
                                    <p>ซ่อมเสร็จ</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="main_repair4.php" class="nav-link">
                                    <i class="fa fa-times-circle nav-icon"></i>
                                    <p>ยกเลิก/คืนเงิน</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="main_repair6.php" class="nav-link">
                                    <i class="fa fa-times-circle nav-icon"></i>
                                    <p>ยกเลิก/ระหว่างซ่อม</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="main_repair5.php" class="nav-link">
                                    <i class="fa fa-times-circle nav-icon"></i>
                                    <p>คืนเงิน</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-chart-line  nav-icon"></i>
                            <p>
                                รายงาน
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="report_day.php" class="nav-link">
                                    <i class="fas fa-chart-line  nav-icon"></i>
                                    <p>รายงานวัน</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="report_moth.php" class="nav-link">
                                    <i class="fas fa-chart-line  nav-icon"></i>
                                    <p>รายงานเดือน</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!--
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-archive"></i>
                            <p>
                                รายงาน
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                    
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="report_d.php" class="nav-link">
                                    <i class="fas fa-file-alt nav-icon"></i>
                                    <p>รายงานประจำวัน</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="report_m.php" class="nav-link">
                                    <i class="fas fa-file-alt nav-icon"></i>
                                    <p>รายงานประจำเเดือน</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                -->


                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
        <div class="sidebar-custom">
            <a href="logout.php" class="btn btn-danger"><i class="fas fa-sign-out-alt"></i>ออกจากระบบ</a>
        </div>
        <!-- /.sidebar-custom -->
    </aside>
