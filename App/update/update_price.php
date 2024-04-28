<?php
include('../../Configurasi/config.php');

// Lakukan operasi penambahan data sesuai dengan tabel yang ditentukan
if (isset($_POST['id'], $_POST['accommodation'], $_POST['port_from_id'], $_POST['port_to_id'], $_POST['price'])) {
    $id = $_POST['id'];
    $accommodation = $_POST['accommodation'];
    $id_lokasi_awal = $_POST['port_from_id'];
    $id_lokasi_tujuan = $_POST['port_to_id'];
    $price = $_POST['price'];
    $query = mysqli_query($koneksi, "UPDATE price SET accommodation_id='$accommodation', id_lokasi_awal='$id_lokasi_awal', id_lokasi_tujuan='$id_lokasi_tujuan', price='$price' WHERE id='$id'");
    if ($query) {
        header('location: ../index.php?page=price');
    } else {
        echo "Failed to insert data.";
    }
}
?>;