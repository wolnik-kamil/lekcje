<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        Login: <input type="text" name="login" required>
        Password: <input type="password" name="passwd" required>
        <input type="submit">
    </form>
    <?php
    require 'connect.php';
    if(isset($_POST['passwd'])) {
        $login = $_POST['login'];
        $passwd = $_POST['passwd'];
        $sql = "SELECT id_klienta as id, CONCAT(imie, nazwisko) as logname FROM klienci WHERE CONCAT(imie, nazwisko) like \"$login\" AND id_klienta = $passwd ";
        $validation = mysqli_query($conn, $sql);
        if(mysqli_num_rows($validation) == 1) {
            $_SESSION['login'] = $login;
            $_SESSION['passwd'] = $passwd;
            header('Location: outcome.php');
        } else {
            echo "Niepoprawne dane logowania lub brak uzytkownika w bazie.";
        }
    }

    ?>
</body>
</html>