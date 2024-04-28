<?php
include('../../Configurasi/config.php');

// Cek apakah parameter 'table' telah diberikan untuk menentukan tabel mana yang akan ditambahkan datanya
if (isset($_POST['id_code'], $_POST['name'], $_POST['description'], $_POST['status'], $_FILES['img'])) {
    $id_code = $_POST['id_code'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $status = $_POST['status'];
    $foto = $_FILES['img']['name'];
    $file = $_FILES['img']['tmp_name'];
    move_uploaded_file($file, '../image/' . $foto);

    $query = mysqli_query($koneksi, "INSERT INTO ship_list (id_code, name, description, status, gambar) VALUES ('$id_code','$name','$description','$status', '$foto')");
    if ($query) {
        header('location: ../index.php?page=ship');
    } else {
        echo "Failed to insert data.";
    }
}
