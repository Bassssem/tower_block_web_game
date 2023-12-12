<?php 

$server = "localhost";
$user = "id18808262_tower1";
$pass = "btw->!KW$*=yzE%9";
$database = "id18808262_tower";

$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}

?>