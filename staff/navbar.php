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
            <li class="nav-item d-none d-sm-inline-block">
                <a href="index.php" class="nav-link">Home</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">Contact</a>
            </li>
        </ul>



        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">

            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell"></i>
                    <span class="badge badge-warning navbar-badge">15</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-item dropdown-header">15 Notifications</span>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-envelope mr-2"></i> 4 new messages
                        <span class="float-right text-muted text-sm">3 mins</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-users mr-2"></i> 8 friend requests
                        <span class="float-right text-muted text-sm">12 hours</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-file mr-2"></i> 3 new reports
                        <span class="float-right text-muted text-sm">2 days</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                </div>
            </li>
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
        <a href="index.php" class="brand-link">
            <img src="images/<?php echo "$sp_logo"; ?>" class="brand-image img-circle"
                style="opacity: .8" >
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
                    <a href="#" class="d-block"><?php echo "$sp_name"; ?></a>
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
               with font-awesome or any other icon font library 
                    <li class="nav-item menu-open">
                        <a href="#" class="nav-link active">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="edit_shop.php" class="nav-link">
                                    <i class="fas fa-desktop nav-icon"></i>
                                    <p>ข้อมูลร้านค้า</p>
                                </a>
                            </li>
                        </ul>
                    </li>
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
                    </li>-->
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
                            <li class="nav-item">
                                <a href="add_cus.php" class="nav-link">
                                    <i class="fas fa-plus nav-icon"></i>
                                    <p>เพิ่มข้อมูลลูกค้า</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-folder"></i>
                            <p>
                                ใบแจ้งซ่อม
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="main_repair.php" class="nav-link">
                                    <i class="fas fa-edit nav-icon"></i>
                                    <p>รายงานใบซ่อม</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="main_repair2.php" class="nav-link">
                                    <i class="fas fa-tools nav-icon"></i>
                                    <p>การดำเนินการซ่อม</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="main_repair3.php" class="nav-link">
                                    <i class="far fa-money-bill-alt nav-icon"></i>
                                    <p>ปิดใบแจ้งซ่อม</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="main_repair4.php" class="nav-link">
                                    <i class="fa fa-times-circle nav-icon"></i>
                                    <p>ยกเลิกใบแจ้งซ่อม</p>
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
                    </li>-->


                </ul>
                </li>
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