<?php
session_start();
$index = $_GET['CartID'];
unset($_SESSION['Cart'][$index]);
$_SESSION['Cart'] = array_values($_SESSION['Cart']);

header('Location: ../basket.php?Del=true');
?>