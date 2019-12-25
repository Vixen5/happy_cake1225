<?php
require_once('../function/connection.php');
$query = $db->query("SELECT * FROM members WHERE account='".$_POST['account']."'");
$data = $query->fetch(PDO::FETCH_ASSOC);
if($data != null){
    echo "repeat";
}else{
    echo "no_repeat";
}
?>