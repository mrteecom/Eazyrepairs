<?php
include "../chksession_user.php";
include "h.php";
include "navbar.php";
require "../inc/connect.php"; //เชื่อมต่อฐานข้อมูล

    $count_0=0;$count_1=0;$count_2=0;
    $sql="select * from shop ";
    $result=mysql_db_query($dbname,$sql);
    while($r2 = mysql_fetch_array($result)){
      $sp_status=$r2[sp_status];
      if($sp_status == 0){
        $count_0++;
      }else if($sp_status == 1){
        $count_1++;
      }else if($sp_status == 2){
        $count_2++;
      }
      
    }

?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>ข้อมูลสรุป</h1>
                </div>
                <div class="col-sm-6">
                    <!--<ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Layout</a></li>
              <li class="breadcrumb-item active">Fixed Layout</li>
            </ol>-->
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="container-fluid">
        <div class="row">
              
              <div class="col-md-3 col-sm-6 col-12">
                  <div class="info-box">
                      <span class="info-box-icon bg-info"><i class="fas fa-store-alt"></i></span>

                      <div class="info-box-content">
                          <span class="info-box-text">จำนวนร้านค้าที่ว่าง</span>
                          <span class="info-box-number"><?php echo "$count_0"; ?></span>
                      </div>
                      <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
              </div>
              <!-- /.col -->
              <div class="col-md-3 col-sm-6 col-12">
                  <div class="info-box">
                      <span class="info-box-icon bg-success"><i class="fas fa-store-alt"></i></span>

                      <div class="info-box-content">
                          <span class="info-box-text">จำนวนร้านค้าที่เปิด</span>
                          <span class="info-box-number"><?php echo "$count_1"; ?></span>
                      </div>
                      <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
              </div>
              <!-- /.col -->
              <div class="col-md-3 col-sm-6 col-12">
                  <div class="info-box">
                      <span class="info-box-icon bg-danger"><i class="fas fa-store-alt"></i></span>

                      <div class="info-box-content">
                          <span class="info-box-text">จำนวนเร้านค้าที่ปิด</span>
                          <span class="info-box-number"><?php echo "$count_2"; ?></span>
                      </div>
                      <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
              </div>
              <!-- /.col -->
          </div>
          <!-- /.row -->
            <div class="row">
                <div class="col-12">
                   
                    

                    <div class="col">
                        <!-- ประเภทการซ่อม -->
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="far fa-chart-bar"></i>
                                    ประเภทการซ่อม
                                </h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div id="bar-chart" style="height: 300px;"></div>
                            </div>
                            <!-- /.card-body-->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- ประเภทการซ่อม -->
                    
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

<script>
$(function() {

    /*
     * BAR CHART
     * ---------
     */

    var bar_data = {
        data: [
            [1, 10],
            [2, 8],
            [3, 4],
            [4, 13],
            [5, 17],
            [6, 9]
        ],
        bars: {
            show: true
        }
    }
    $.plot('#bar-chart', [bar_data], {
        grid: {
            borderWidth: 1,
            borderColor: '#f3f3f3',
            tickColor: '#f3f3f3'
        },
        series: {
            bars: {
                show: true,
                barWidth: 0.5,
                align: 'center',
            },
        },
        colors: ['#3c8dbc'],
        xaxis: {
            ticks: [
                [1, 'January'],
                [2, 'February'],
                [3, 'March'],
                [4, 'April'],
                [5, 'May'],
                [6, 'June']
            ]
        }
    })
    /* END BAR CHART */
})
</script>