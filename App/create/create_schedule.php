<?php
include('../../Configurasi/config.php');

if (isset($_POST['departure_datetime'], $_POST['arrival_datetime'], $_POST['ship_id'], $_POST['port_from_id'], $_POST['port_to_id'], $_POST['status'])) {
    $departure_datetime = $_POST['departure_datetime'];
    $arrival_datetime = $_POST['arrival_datetime'];
    $ship_id = $_POST['ship_id'];
    $port_from_id = $_POST['port_from_id'];
    $port_to_id = $_POST['port_to_id'];
    $Status = $_POST['status'];

    $query = mysqli_query($koneksi, "INSERT INTO schedules (departure_datetime, arrival_datetime, ship_id, port_from_id, port_to_id, schedule_status ) VALUES ('$departure_datetime','$arrival_datetime','$ship_id','$port_from_id','$port_to_id', '$Status')");
}
if ($query) {
    header('location: ../index.php?page=schedule');
} else {
    echo "Failed to insert data.";
}
?>;