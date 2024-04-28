<!DOCTYPE html>
<html lang="en">
<?php session_start();
if (!$_SESSION['firstname' . 'lastname']) {
  header('location:../index.php?session=expired');
}
include('header.php') ?>
<?php include('../Configurasi/config.php') ?>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <!-- Preloader -->
    <?php include('preloader.php') ?>
    <!-- /.navbar -->
    <?php include('navbar.php') ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <?php include('logo.php') ?>

      <!-- Sidebar -->
      <?php include('sidebar.php') ?>
      <!-- Sidebar -->
      <!-- /.sidebar -->
    </aside>
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <!-- /.content-header -->

      <!-- Content Wrapper. Contains page content -->

      <?php
      if (isset($_GET['page'])) {
        if ($_GET['page'] == 'dashboard') {
          include('dashboard.php');
        } else if ($_GET['page'] == 'schedule') {
          include('schedule/schedule.php');
        } else if ($_GET['page'] == 'edit_schedule') {
          include('edit/edit_schedule.php');
        } else if ($_GET['page'] == 'today_schedule') {
          include('schedule/today_schedule.php');
        } else if ($_GET['page'] == 'report') {
          include('report/report.php');
        } else if ($_GET['page'] == 'ship') {
          include('maintanance/ship.php');
        } else if ($_GET['page'] == 'edit_ship') {
          include('edit/edit_ship.php');
        } else if ($_GET['page'] == 'view_ship') {
          include('maintanance/view_ship.php');
        } else if ($_GET['page'] == 'port') {
          include('maintanance/port.php');
        } else if ($_GET['page'] == 'edit_port') {
          include('edit/edit_port.php');
        } else if ($_GET['page'] == 'view_port') {
          include('maintanance/view_port.php');
        } else if ($_GET['page'] == 'accomodation') {
          include('maintanance/accomodation.php');
        } else if ($_GET['page'] == 'edit_accommodation') {
          include('edit/edit_accommodation.php');
        } else if ($_GET['page'] == 'price') {
          include('maintanance/price.php');
        } else if ($_GET['page'] == 'edit_price') {
          include('edit/edit_price.php');
        } else if ($_GET['page'] == 'user') {
          include('user/user.php');
        } else if ($_GET['page'] == 'my_account') {
          include('user/my_account.php');
        } else if ($_GET['page'] == 'edit_user') {
          include('edit/edit_user.php');
        } else if ($_GET['page'] == 'system') {
          include('system/system.php');
        } else {
          include('dist/img/404.html');
        }
      } ?>

      <!-- /.content-wrapper -->


      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <?php include('footer.php') ?>
  </div>
</body>

</html>