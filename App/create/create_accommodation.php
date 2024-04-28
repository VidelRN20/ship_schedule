<?php
include('../../Configurasi/config.php');

// Lakukan operasi penambahan data sesuai dengan tabel yang ditentukan
if (isset($_POST['accommodation'], $_POST['description'])) {
    $accommodation = $_POST['accommodation'];
    $description = $_POST['description'];
    $query = mysqli_query($koneksi, "INSERT INTO accommodations (accommodation, description) VALUES('$accommodation', '$description')");
    if ($query) {
        header('location: ../index.php?page=accomodation');
    } else {
        echo "Failed to insert data.";
    }
}
?>;