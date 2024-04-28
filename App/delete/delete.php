<?php
include('../../Configurasi/config.php');

// Cek apakah parameter 'id' telah diterima untuk operasi penghapusan
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Cek apakah parameter 'table' telah diberikan untuk menentukan tabel mana yang akan dihapus datanya
    if (isset($_GET['table'])) {
        $table = $_GET['table'];

        // Lakukan operasi penghapusan data dari database sesuai dengan tabel yang ditentukan
        if ($table === 'ship_list') {
            $query = mysqli_query($koneksi, "DELETE FROM ship_list WHERE id = '$id'");
            header('location: ../index.php?page=ship');
        } elseif ($table === 'port_list') {
            $query = mysqli_query($koneksi, "DELETE FROM port_list WHERE id = '$id'");
            header('location: ../index.php?page=port');
        } elseif ($table === 'users') {
            $query = mysqli_query($koneksi, "DELETE FROM users WHERE id = '$id'");
            header('location: ../index.php?page=user');
        } elseif ($table === 'accommodations') {
            $query = mysqli_query($koneksi, "DELETE FROM accommodations WHERE id = '$id'");
            header('location: ../index.php?page=accomodation');
        } elseif ($table === 'price') {
            $query = mysqli_query($koneksi, "DELETE FROM price WHERE id = '$id'");
            header('location: ../index.php?page=price');
        } elseif ($table === 'reservations') {
            $query = mysqli_query($koneksi, "DELETE FROM reservations WHERE id = '$id'");
            header('location: ../index.php?page=reservation');
        } elseif ($table === 'schedules') {
            $query = mysqli_query($koneksi, "DELETE FROM schedules WHERE id = '$id'");
            header('location: ../index.php?page=schedule');
        } else {
            echo "Invalid table name!";
        }
    }
}
