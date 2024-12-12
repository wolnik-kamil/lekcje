<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form method="POST">
        <label>
            Imię: <input type="text" name="imie" required>
        </label>
        <label>
            Nazwisko: <input type="text" name="nazwisko" required>
        </label>
        <label>
            Agent: <input type="radio" name="typ" value="a">
        </label>
        <label>
            Klient: <input type="radio" name="typ" value="k" checked>
        </label>
        <input type="submit" name="sub" value="Dodaj">
    </form>

    <?php
    $conn = mysqli_connect("localhost", "root", "", "5ti_g2_domy");
    $tabela = "klienci";
    

    if(isset($_POST['sub'])) {
        $typ = $_POST['typ'];
        if ($typ == "a") {
            $tabela = "agenci";
        }
        $imie = $_POST['imie'];
        $nazwisko = $_POST['nazwisko'];

        $sql = "INSERT INTO $tabela (imie, nazwisko) VALUES ('$imie', '$nazwisko')";
        mysqli_query($conn, $sql);
    }
 
    $sql = "SELECT imie, nazwisko FROM $tabela ORDER BY nazwisko;";
    $result = mysqli_query($conn, $sql);

    echo "<ol>\n";
    while($row = mysqli_fetch_assoc($result)) {
        echo "<li>".$row['imie']." ".$row['nazwisko']."</li>\n";
    }

    echo "</ol>\n";

    mysqli_close($conn);
    ?>
</body>
</html>