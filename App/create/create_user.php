<?php
include('../../Configurasi/config.php');

$result = mysqli_query($koneksi, "SELECT MAX(id) AS max_id FROM users");
$row = mysqli_fetch_assoc($result);
$last_user_id = $row['max_id'];

if (isset($_POST['NIK'], $_POST['firstname'], $_POST['lastname'], $_POST['username'], $_POST['password'], $_POST['type'], $_FILES['img'])) {
    $NIK = $_POST['NIK'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $type = $_POST['type'];
    $foto = $_FILES['img']['name'];
    $file = $_FILES['img']['tmp_name'];
    move_uploaded_file($file, '../image/' . $foto);

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $new_user_id = $last_user_id + 1;

    $query = mysqli_query($koneksi, "INSERT INTO users (id, NIK, firstname, lastname, username, password, type, avatar) VALUES ($new_user_id, '$NIK','$firstname','$lastname','$username', '$hashed_password', '$type', '$foto')");
    if ($query) {
        header('location: ../index.php?page=user');
    } else {
        echo "Failed to insert data.";
    }
}
