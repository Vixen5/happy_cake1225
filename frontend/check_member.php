<?php
session_start();
require_once('../function/connection.php');
$query = $db->query("SELECT * FROM members WHERE account='".$_POST['account']."' AND password='".$_POST['password']."'");
$member = $query->fetch(PDO::FETCH_ASSOC);
if(isset($member) && $member['account'] != null){
    $_SESSION['member'] = $member;
    if(isset($_POST['url']) && $_POST['url'] == "basket"){
        header('Location: checkout1.php');
    }else{
        header('Location: customer-account.php');
    }
    
}else{
    header('Location: login_error.php');
}
?>