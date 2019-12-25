<?php

define('DB_SERVER', "sql201.byethost.com");
define('DB_USER', "b7_24948199");
define('DB_PASSWORD', "2019happycake");
define('DB_DATABASE', "b7_24948199_happycake");
define('DB_DRIVER', "mysql");

$db = new PDO(DB_DRIVER . ":dbname=" . DB_DATABASE . ";host=" . DB_SERVER, DB_USER, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

date_default_timezone_set("Asia/Taipei");

 ?>
