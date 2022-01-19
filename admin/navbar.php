<?php include "../chksession_user.php"; ?>
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

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar main-sidebar-custom sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index.php" class="brand-link">
            <img src="../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                style="opacity: .8">
            <span class="brand-text font-weight-light">AdminPhone</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block"> <?php echo"$_SESSION[sess_username]";?> </a>
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

                    <li class="nav-item ">
                        <a href="main_shop.php" class="nav-link ">
                            <i class="nav-icon fas fa-store-alt"></i>
                            <p>
                                ข้อมูลร้าน

                            </p>
                        </a>

                    </li>
                    <li class="nav-item">
                        <a href="type.php" class="nav-link">
                            <i class="fas fa-desktop nav-icon"></i>
                            <p>เพิ่มอุปกรณ์</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="topic.php" class="nav-link">
                            <i class="fas fa-desktop nav-icon"></i>
                            <p>เพิ่มอาการเสีย</p>
                        </a>
                    </li>
                    <li class="nav-item">
                    <a href="https://www.md5online.org/md5-decrypt.html" target="_blank" rel="noopener noreferrer"  class="nav-link"><i class="fas fa-desktop nav-icon"></i><p>ถอดรหัสMD5</p></a>
                    </li>
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