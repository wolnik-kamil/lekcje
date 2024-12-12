<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    
    $conn = mysqli_connect("localhost", "root", "", "5ti_g2_konta");
    $sql = "SELECT * FROM test";
    $result = mysqli_query($conn, $sql);

    echo "<table>";
    echo "<tr><th>Imię</th><th>Nazwisko</th><th>Środki</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>".$row['imie']."</td><td>".$row['nazwisko']."</td><td>";
        echo "<form><input type=\"hidden\" name=\"klient\" value=\"".$row['ID']."\">";
        echo "<input type=\"submit\" name=\"minus\" value=\"-\"> ".$row['srodki']." ";
        echo "<input type=\"submit\" name=\"plus\" value=\"+\"></form></td></tr>";
        

    }
    echo "</table>";

    if(isset($_GET['plus'])) {
        $klient = $_GET['klient'];
        $sql = "UPDATE test SET srodki = srodki + 1 WHERE ID = $klient";
        mysqli_query($conn, $sql);
    }
    if(isset($_GET['minus'])) {
        $klient = $_GET['klient'];
        $sql = "UPDATE test SET srodki = srodki - 1 WHERE ID = $klient";
        mysqli_query($conn, $sql);
    }
    ?>
</body>
</html>