<?php
include "../inc/admin_session.php";

$option = $_POST["option"];
$eng_option = $_POST["eng_option"];
$name = $_POST["name"];
$a_price = $_POST["a_price"];
$c_price = $_POST["c_price"];

$dbcon = mysqli_connect("localhost", "root", "", "ibali") or die ("접속에 실패하였습니다.");
mysqli_set_charset($dbcon, "utf8");

$sql = "insert into option (option, eng_option, name, a_price, c_price) values ('$option', '$eng_option', '$name', '$a_price', '$c_price');";

mysqli_query($dbcon, $sql);

mysqli_close($dbcon);

header( 'Location: http://localhost/website3/admin/option/option.php' );
?>