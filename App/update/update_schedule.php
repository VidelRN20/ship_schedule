<?php
include('../../Configurasi/config.php');

if (isset($_POST['id'], $_POST['departure_datetime'], $_POST['arrival_datetime'], $_POST['ship_id'], $_POST['port_from_id'], $_POST['port_to_id'], $_POST['status'])) {
    $id = $_POST['id'];
    $departure_datetime = $_POST['departure_datetime'];
    $arrival_datetime = $_POST['arrival_datetime'];
    $ship_id = $_POST['ship_id'];
    $port_from_id = $_POST['port_from_id'];
    $port_to_id = $_POST['port_to_id'];
    $status = $_POST['status'];

    $query = mysqli_query($koneksi, "UPDATE schedules SET departure_datetime='$departure_datetime', arrival_datetime='$arrival_datetime', ship_id='$ship_id', port_from_id='$port_from_id', port_to_id='$port_to_id', schedule_status = '$status' WHERE id='$id'");
}
if ($query) {
    header('location: ../index.php?page=schedule');
} else {
    echo "Failed to insert data.";
}
?>;