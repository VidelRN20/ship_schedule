<?php
include('../../Configurasi/config.php');

// Cek apakah parameter 'table' telah diberikan untuk menentukan tabel mana yang akan ditambahkan datanya
if (isset($_POST['id'], $_POST['id_code'], $_POST['name'], $_POST['description'], $_POST['status'])) {
    $id = $_POST['id'];
    $id_code = $_POST['id_code'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $status = $_POST['status'];
    if (!empty($_FILES['img']['name'])) {
        $foto = $_FILES['img']['name'];
        $file = $_FILES['img']['tmp_name'];

        // Periksa apakah file yang diunggah adalah gambar
        $img_ext = pathinfo($foto, PATHINFO_EXTENSION);
        $allowed_ext = array("jpg", "jpeg", "png", "gif", "jfif");

        if (!in_array($img_ext, $allowed_ext)) {
            echo "Only JPG, JPEG, PNG, jfif and GIF files are allowed.";
            exit;
        }

        move_uploaded_file($file, '../image/' . $foto);
        $update_gambar = ", gambar='$foto'";
    } else {
        $update_gambar = "";
    }
    $query = mysqli_query($koneksi, "UPDATE ship_list SET id_code='$id_code', name='$name', description='$description', status='$status' $update_gambar WHERE id='$id'");
    if ($query) {
        header('location: ../index.php?page=ship');
    } else {
        echo "Failed to insert data.";
    }
}
