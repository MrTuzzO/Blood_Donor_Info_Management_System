<?php
$db_host = 'localhost';
$db_user = 'root';
$db_password = '';
$db_name = 'bdims_donorList';
$con = new mysqli($db_host, $db_user, $db_password, $db_name);

if (!$con) {
    echo ("Database not Connected");
}
?>