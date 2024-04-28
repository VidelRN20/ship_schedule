<?php
include('../../Configurasi/config.php');

// Lakukan operasi penambahan data sesuai dengan tabel yang ditentukan
if (isset($_POST['id'], $_POST['accommodation'], $_POST['description'])) {
    $id = $_POST['id'];
    $accommodation = $_POST['accommodation'];
    $description = $_POST['description'];
    $query = mysqli_query($koneksi, "UPDATE accommodations SET accommodation='$accommodation', description='$description' WHERE id='$id'");
    if ($query) {
        header('location: ../index.php?page=accomodation');
    } else {
        echo "Failed to insert data.";
    }
}
?>;