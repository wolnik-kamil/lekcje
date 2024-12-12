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
        $_SESSION['ktoryraz'] =1;
    }
    setcookie("czas",time(),time()+365*24*3600);
    if (!isset($_COOKIE['ilerazy'])){
        $ilerazy=1;
    } else {
        $ilerazy = $_COOKIE['ilerazy']+1;
    }
    setcookie("ilerazy",$ilerazy,time()+365*24*3600);
    if(isset($_GET['color'])) {
        $color = $_GET['color'];
        setcookie("color",$color,time()+365*24*3600);
    } else if(isset($_COOKIE['color'])) {
        $color = $_COOKIE['color'];
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-color: <?php echo $color; ?>;
        }
    </style>
</head>
<body>
    <?php
        echo "Jestes tu po raz $ktoryraz, ostatnio byleś tu ";
        if ($ktoryraz>1){
            echo date("Y-m-d H:i:s", $_COOKIE['czas']);
        }
        echo "<br>W tej sesji odswiezyles strone $ilerazy razy, a sesja trwa: ".date("s")." sekund.<br>";
    ?>
    <form>
        <input type="color" name="color" value="<?php echo $color; ?>"> <--Zmien kolor tła<br>
        <input type="submit">
    </form>
    <a href="index.php">Wyloguj</a>
</body>
</html>