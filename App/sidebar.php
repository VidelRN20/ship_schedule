<div class="sidebar">
  <?php
  if ($_SESSION['type'] == 'admin') {
    include('menu/admin.php');
  } else {
    include('menu/staff.php');
  }
  ?>

  <!-- Sidebar Menu -->
</div>
<script>
  // Ambil parameter 'page' dari URL
  var currentPage = '<?php echo $_GET['page']; ?>';

  // Ambil semua elemen dengan kelas 'nav-link'
  var navLinks = document.querySelectorAll('.nav-link');

  // Loop melalui setiap elemen
  navLinks.forEach(function(navLink) {
    // Ambil nilai href dari setiap link
    var href = navLink.getAttribute('href');

    // Periksa apakah link ini sesuai dengan halaman yang sedang dibuka
    if (href.indexOf('page=' + currentPage) !== -1) {
      // Jika sesuai, tambahkan kelas 'active' ke link
      navLink.classList.add('active');
    }
  });
</script>