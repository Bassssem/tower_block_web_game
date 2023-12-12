<?php 
include "config.php";
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}
    $a=$_POST['score'];
    $b=$_SESSION['username'];
    $req1="select * from `users` where username='$b';";
    $res=mysqli_query($conn,$req1);
    $row=mysqli_fetch_assoc($res);
    if($row['score']<$a){
    $req="update `users` set score='$a' where username='$b';";
    mysqli_query($conn, $req);
}
?>