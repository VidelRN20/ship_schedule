<?php
include('../../Configurasi/config.php');

// Cek apakah parameter 'table' telah diberikan untuk menentukan tabel mana yang akan ditambahkan datanya

if (isset($_POST['id'], $_POST['name'], $_POST['location'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $location = $_POST['location'];
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
    $query = mysqli_query($koneksi, "UPDATE port_list SET name='$name', location='$location' $update_gambar WHERE id='$id'");
    if ($query) {
        header('location: ../index.php?page=port');
    } else {
        echo "Failed to insert data.";
    }
}
