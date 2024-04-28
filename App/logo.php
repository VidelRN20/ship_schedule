<?php
$query_system_info = "SELECT id, meta_field, meta_value FROM system_info";
$result_system_info = mysqli_query($koneksi, $query_system_info);
$system_data = array();
if ($result_system_info) {
  while ($row = mysqli_fetch_assoc($result_system_info)) {
    $system_data[$row['id']][$row['meta_field']] = $row['meta_value'];
  }
}
?>
<style>
  img#cimg1 {
    height: 6vh;
    width: 6vh;
    object-fit: cover;
    border-radius: 100% 100%;
  }
</style>
<a href="index.php?page=dashboard" class="brand-link">
  <img id="cimg1" src="image/<?php echo $system_data[3]['logo']; ?>" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .6; border-radius: 100%; margin-top: 1px;">
  <span class="brand-text font-weight-bold" style="font-size: 16px; margin-left: 26px;"> <?php echo $system_data[2]['short_name']; ?></span>
</a>