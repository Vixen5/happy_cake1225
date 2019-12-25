<?php
session_start();
unset($_SESSION['member']);
header('Location: logout_success.php');
?>