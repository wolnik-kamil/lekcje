<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form>
            <label>
                Imię:
                <input type="text" name="name">
            </label>
            <label>
                Nazwisko:
                <input type="text" name="surname">
            </label>
            <input type="submit" name="sub">
        </form>
        <?php
            require 'connect.php';
        if(isset($_GET['sub'])) {

            
            $imie = $_GET['name'];
            $nazwisko = $_GET['surname'];

            $sql = "INSERT INTO osoby (imie, nazwisko) VALUES ('$imie', '$nazwisko')";

            mysqli_query($conn, $sql);
            echo 'Dodano osobę :D';
            
        }
        mysqli_close($conn)

        ?>
</body>
</html>