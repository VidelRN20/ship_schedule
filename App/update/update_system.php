<?php
include('../../Configurasi/config.php');

$error_message = "";

$update_logo = "";
$update_cover = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $short_name = $_POST['short_name'];

    if (!empty($_FILES['logo']['name'])) {
        $update_logo = $_FILES['logo']['name'];
        $file = $_FILES['logo']['tmp_name'];

        $img_ext = pathinfo($update_logo, PATHINFO_EXTENSION);
        $allowed_ext = array("jpg", "jpeg", "png", "gif", "jfif");

        if (!in_array($img_ext, $allowed_ext)) {
            echo "Only JPG, JPEG, PNG, jfif and GIF files are allowed.";
            exit;
        }

        move_uploaded_file($file, '../image/' . $update_logo);
    }

    if (!empty($_FILES['cover']['name'])) {
        $update_cover = $_FILES['cover']['name'];
        $file = $_FILES['cover']['tmp_name'];

        $img_ext = pathinfo($update_cover, PATHINFO_EXTENSION);
        $allowed_ext = array("jpg", "jpeg", "png", "gif", "jfif");

        if (!in_array($img_ext, $allowed_ext)) {
            echo "Only JPG, JPEG, PNG, jfif and GIF files are allowed.";
            exit;
        }

        move_uploaded_file($file, '../image/' . $update_cover);
    }

    $query = "INSERT INTO system_info (id, meta_field, meta_value) VALUES 
              (1, 'name', '$name'),
              (2, 'short_name', '$short_name')";

    if (!empty($update_logo)) {
        $query .= ",(3, 'logo', '$update_logo')";
    }

    if (!empty($update_cover)) {
        $query .= ",(4, 'cover', '$update_cover')";
    }

    $query .= " ON DUPLICATE KEY UPDATE meta_value = VALUES(meta_value)";

    if (mysqli_query($koneksi, $query)) {
        header('location: ../index.php?page=system');
    } else {
        $error_message = "Gagal memperbarui data: " . mysqli_error($koneksi);
    }
}
