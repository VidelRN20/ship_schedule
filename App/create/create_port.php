<?php
include('../../Configurasi/config.php');

// Cek apakah parameter 'table' telah diberikan untuk menentukan tabel mana yang akan ditambahkan datanya

if (isset($_POST['name'], $_POST['location'], $_FILES['img'])) {
    $name = $_POST['name'];
    $location = $_POST['location'];
    $foto = $_FILES['img']['name'];
    $file = $_FILES['img']['tmp_name'];
    move_uploaded_file($file, '../image/' . $foto);
    $query = mysqli_query($koneksi, "INSERT INTO port_list (name, location, gambar) VALUES('$name','$location', '$foto')");
    if ($query) {
        header('location: ../index.php?page=port');
    } else {
        echo "Failed to insert data.";
    }
}
