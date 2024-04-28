<?php
session_start();
include('config.php');
$Username = $_POST['Username'];
$Password = $_POST['Password'];

$query = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$Username'");
if (mysqli_num_rows($query) == 1) {
    $user = mysqli_fetch_array($query);
    // Verifikasi kata sandi
    if (password_verify($Password, $user['password'])) {
        // Autentikasi berhasil
        $_SESSION['ssLogin'] = true;
        $_SESSION['ssUser'] = $Username;
        $_SESSION['password'] = $user['password'];
        $_SESSION['firstname' . 'lastname'] = $user['firstname'] . ' ' . $user['lastname'];
        $_SESSION['type'] = $user['type'];
        header('location:../app/index.php?page=dashboard');
    } else {
        // Autentikasi gagal
        header('location:../login.php?error=1');
    }
} else if ($Username == '' && $Password == '') {
    // Kedua bidang kosong
    header('location:../login.php?error=2');
} else {
    // Username tidak ditemukan
    header('location:../login.php?error=1');
}
