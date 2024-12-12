<!DOCTYPE html>
<?php

session_start();
if(!isset($_COOKIE['ktoryraz']))
    $ktoryraz = 0;
else
    $ktoryraz = $_COOKIE['ktoryraz'];

if (!isset($_SESSION['ktoryraz'])){
    $ktoryraz++;
    setcookie("ktoryraz",$ktoryraz,time()+365*24*3600);
    setcookie("czas",time(),time()+365*24*3600);
    $_SESSION['ktoryraz'] =1;
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sesje</title>
</head>
<body>
    <?php
    var_dump($_SESSION);
    echo "Jestes tu po raz $ktoryraz";

    ?>
</body>
</html>