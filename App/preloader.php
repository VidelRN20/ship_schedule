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
<div class="preloader flex-column justify-content-center align-items-center">
  <img class="animation__shake" src="image/<?php echo $system_data[3]['logo']; ?>" alt="Logo" style="border-radius: 100%; background-size: cover;">
</div>