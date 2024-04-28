<?php
session_start();
// unset($_SESSION['firstname' . 'lastname']);
// unset($_SESSION['type']);
session_destroy();
header('location: ../login.php');
?>;