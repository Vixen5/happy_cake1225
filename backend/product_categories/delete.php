<?php
require_once('../is_login.php');
require_once('../../function/connection.php');
$query = $db->query("DELETE FROM product_categories WHERE product_categoryID=".$_GET['product_categoryID']);
header('Location: list.php');
?>