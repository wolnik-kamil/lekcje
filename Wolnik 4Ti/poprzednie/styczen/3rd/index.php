<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    
    if(isset($_POST['submit'])){
        $login = $_POST['login'];
        $haslo = $_POST['haslo'];
        $folder = "users\\$login";
        $plik = $folder ."\\pass.txt";
        if ($_POST['submit']=="Zaloguj") {
            if(!file_exists($folder))
                echo "Nie ma takiego konta.";
            elseif (sha1($haslo)==file_get_contents($plik)){
                echo "OK, witaj $login";
                header("Location:galeria.php?login=$login");
            }
            else
            echo "Access denied.";
        } else //rejestracja
        if(file_exists($folder)) {
            echo "Taki user istnieje.";
        }
        else {
            mkdir($folder);
            $f = fopen($plik,"w");
            fputs($f,sha1($haslo));
            fclose($f);
            echo "Nowy użytkownik '$login' zarejestrowany.";
        }
        
    } else {
    
    ?>
    <form action="#" method="post">
        Login: <input type="text" name="login" required><br>
        Haslo: <input type="password" name="haslo" required><br>
        <input type="submit" name="submit" value="Zaloguj">
        <input type="submit" name="submit" value="Zarejestruj">
    </form>
    <?php
    
    }
    
    ?>
    
</body>
</html>