<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        label {
            border: 1px solid black;
            margin: 0 2px;
            padding: 5px;
        }
    </style>
</head>
<body>
    <form>
        <label for="all">
            Wszyscy 
            <input type="radio" name="plec" checked id="all" value="all">
        </label>
        <label for="f">
            Baby 
            <input type="radio" name="plec" id="f" value="f">
        </label>
        <label for="m">
            Chopy 
            <input type="radio" name="plec" id="m" value="m">
        </label>
        <input type="submit" value="Pokaż">
    </form>

    <?php
    
    require 'connect.php';
    
    $insql = "WHERE imie LIKE '%'";

    if ($conn->connect_error) {
        die('Połączenie nieudane :('.$conn->connect_error);
    }



    if(isset($_GET['plec'])) {
        if($_GET['plec'] == 'f') {
            $insql = "WHERE imie LIKE '%a'";
        } else if ($_GET['plec'] == 'm') {
            $insql = "WHERE imie NOT LIKE '%a'";
        } else {
            $insql = "WHERE imie LIKE '%'";
        }
    }

    $sql = "SELECT imie, nazwisko FROM klienci $insql ORDER BY nazwisko, imie;";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)) {
        echo "<ol>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<li>".$row['imie']." ".$row['nazwisko']."</li>\n";
        }
        echo "</ol>"; 
    } else {
        echo "Nie ma klientow";
    }
    mysqli_close($conn)
    ?>
</body>
</html>