<?php
$db_host = "localhost";
$db_user = "chunmuk";
$db_passwd = "cnsanr92!";
$db_name = "chunmuk";

$dbcon = mysqli_connect($db_host, $db_user, $db_passwd, $db_name);
mysqli_set_charset($dbcon, "utf8");
?>