<?php
session_start();
require_once('../function/connection.php');
$query = $db->query("SELECT * FROM admin WHERE account='".$_POST['account']."' AND password='".$_POST['password']."'");
$user = $query->fetch(PDO::FETCH_ASSOC);
if(isset($user) && $user['account'] != null){
    $_SESSION['user'] = $user;
    header('Location: news/list.php');
}else{
    header('Location: login.php?MSG=error');
}

?>