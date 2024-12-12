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

    <form method="post">
        Login: <input type="text" name="login"><br>
        Haslo: <input type="password" name="pass"><br>
        <input type="submit" name="submit">
    
    </form>
    <?php
    if(isset($_POST['submit'])){
        if($_POST['login']=='Jan' && $_POST['pass']=='123') {
            $_SESSION['login']='Jan';
            header('Location: test.php');
        } else {
            echo "Zle pasy";
        }
    }
?>
</body>

</html>