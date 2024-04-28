<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <br>
    <div class="row">
      <div class="col-12">
        <h2>Schedules</h2>
      </div>
    </div>
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3><?php
                // Menghitung jumlah jadwal yang berada antara waktu sekarang dan masa depan
                $sched_all = $koneksi->query("SELECT COUNT(*) as total FROM `schedules` WHERE departure_datetime > NOW()")->fetch_assoc()['total'];
                echo number_format($sched_all);
                ?></h3>
            <p>Active Schedules</p>
          </div>
          <div class="icon">
            <i class="ion bi bi-calendar"></i>
          </div>
          <a href="index.php?page=schedule" class="small-box-footer">Active Schedules <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3> <?php
                  $sched_today = $koneksi->query("SELECT COUNT(*) as total FROM `schedules` WHERE DATE(departure_datetime) = CURDATE()")->fetch_assoc()['total'];
                  echo number_format($sched_today);
                  ?>
            </h3>
            <p>Today Schedules</p>
          </div>
          <div class="icon">
            <i class="ion bi bi-calendar-check"></i>
          </div>
          <a href="index.php?page=today_schedule" class="small-box-footer">Today schedules <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
    </div><!-- /.row -->
</section>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <h2>Maintenance</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-primary">
          <div class="inner">
            <h3><?php
                $sched_today = $koneksi->query("SELECT COUNT(*) as total FROM `ship_list`")->fetch_assoc()['total'];
                echo number_format($sched_today);
                ?>
            </h3>
            <p>Active Ship:<?php
                            $sched_today = $koneksi->query("SELECT COUNT(*) as total FROM `ship_list` WHERE status='1'")->fetch_assoc()['total'];
                            echo number_format($sched_today);
                            ?> | Inactive Ship: <?php
                                                $sched_today = $koneksi->query("SELECT COUNT(*) as total FROM `ship_list` WHERE status='0'")->fetch_assoc()['total'];
                                                echo number_format($sched_today);
                                                ?></p>
            <p></p>
          </div>
          <div class="icon">
            <i class="ion bi bi-train-freight-front"></i>
          </div>
          <a href="index.php?page=ship" class="small-box-footer">Vessel List <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-secondary">
          <div class="inner">
            <h3>
              <?php
              $sched_today = $koneksi->query("SELECT COUNT(*) as total FROM `port_list`")->fetch_assoc()['total'];
              echo number_format($sched_today);
              ?>
            </h3>
            <p>Port List</p>
          </div>
          <div class="icon">
            <i class="ion bi bi-sign-stop-lights"></i>
          </div>
          <a href="index.php?page=port" class="small-box-footer">Port List <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-dark">
          <div class="inner">
            <h3>
              <?php
              $sched_today = $koneksi->query("SELECT COUNT(*) as total FROM `accommodations`")->fetch_assoc()['total'];
              echo number_format($sched_today);
              ?>
            </h3>
            <p>Accomodations List</p>
          </div>
          <div class="icon">
            <i class="ion bi bi-tag"></i>
          </div>
          <a href="index.php?page=accomodation" class="small-box-footer">Accomodation List <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>
              <?php
              $sched_today = $koneksi->query("SELECT COUNT(*) as total FROM `price`")->fetch_assoc()['total'];
              echo number_format($sched_today);
              ?>
            </h3>
            <p>Price List</p>
          </div>
          <div class="icon">
            <i class="ion bi bi-tags"></i>
          </div>
          <a href="index.php?page=price" class="small-box-footer">Price List <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
    </div>
    <!-- ./col -->
  </div><!-- /.row -->
</section>
<!-- /.content -->