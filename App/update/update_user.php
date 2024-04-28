<?php
include('../../Configurasi/config.php');

if (isset($_POST['id'], $_POST['NIK'], $_POST['firstname'], $_POST['lastname'], $_POST['username'], $_POST['type'])) {
    $id = $_POST['id'];
    $NIK = $_POST['NIK'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $type = $_POST['type'];

    // Hanya jika ada perubahan password
    if (!empty($_POST['password'])) {
        $password = $_POST['password'];
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $update_password = ", password='$hashed_password'";
    } else {
        $update_password = "";
    }

    // Hanya jika ada file yang diunggah
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
        $update_avatar = ", avatar='$foto'";
    } else {
        $update_avatar = "";
    }

    $query = "UPDATE users SET NIK='$NIK', firstname='$firstname', lastname='$lastname', username='$username', type='$type' $update_password $update_avatar WHERE id='$id'";
    $stmt = mysqli_prepare($koneksi, $query);

    if ($stmt) {
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header('location: ../index.php?page=user');
    } else {
        echo "Failed to update data.";
    }
}
