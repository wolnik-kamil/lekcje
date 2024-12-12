<!DOCTYPE html>
<?php

session_start();

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    
    if(isset($_SESSION['login'])) {
        echo "Hej, ".$_SESSION['login'].". Witaj!";
    } else 
        echo "Access denied!";

    ?>
</body>
</html>