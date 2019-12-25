<?php
require_once('../is_login.php');
require_once('../../function/connection.php');
$query = $db->query("DELETE FROM news WHERE newsID=".$_GET['newsID']);
header('Location: list.php');
?>