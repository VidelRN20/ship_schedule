<?php
$username = $_SESSION["ssUser"];
$queryuser = mysqli_query($koneksi, "SELECT * FROM users WHERE username = '$username'");
$profile = mysqli_fetch_array($queryuser);
?>
<style>
  .user-img {
    position: absolute;
    height: 27px;
    width: 27px;
    object-fit: cover;
    left: -7%;
    top: -12%;
  }

  .btn-rounded {
    border-radius: 50px;
  }
</style>

<nav class="main-header navbar navbar-expand navbar-white navbar-light pt-0" style="margin-top: -15px;">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
  </ul>
  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Navbar Search -->
    <li class="nav-item">
      <div class="btn-group nav-link">
        <button type="button" class="btn btn-rounded badge badge-light dropdown-toggle dropdown-icon" data-toggle="dropdown">
          <span><img class="img-circle elevation-2 user-img" src="image/<?php echo $profile['avatar']; ?>" alt="User Image"></span>
          <span class="ml-3"><?php echo $_SESSION['firstname' . 'lastname'] . ' | ' . $_SESSION['type']; ?></span>
          <span class="sr-only">Toggle Dropdown</span>
        </button>
        <div class="dropdown-menu" role="menu" style="margin-left: 130px; top: 120%;">
          <a href="index.php?page=my_account" class="dropdown-item"><span class="fa fa-user"></span> My Account</a>
          <div class="dropdown-divider"></div>
          <a href="logout.php" class="dropdown-item; nav-link text-red"><span class="fas  fa-power-off"></span> Logout</a>
        </div>
      </div>
    </li>
  </ul>
</nav>