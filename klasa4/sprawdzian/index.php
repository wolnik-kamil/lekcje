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
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    
    echo "Jestes tu po raz $ktoryraz";
    if ($ktoryraz>1){
        echo ", a ostatnio byleś tu ".date("Y-m-d H:i:s", $_COOKIE['czas']);
    }
    echo "<br>W tej sesji odswiezyles strone $ilerazy razy, a sesja trwa: ".date("s")." sekund.<br>";

    if(isset($_GET['submit'])){
        if($_GET['login']=='admin' && $_GET['pass']=='1234') {
            $_SESSION['login']='Jan';
            header('Location: index2.php');
        } else {
            echo "Zle dane logowania";
        }
    }
    ?>

    <form>
        <fieldset style="width: max-content;">
            Login: <input type="text" name="login"><br>
            Hasło:<input type="password" name="pass"><br>
            <input type="submit" name="submit">
        </fieldset>
    </form>
    <?php
    ?>
</body>
</html>