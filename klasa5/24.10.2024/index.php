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
        echo "<tr><td>".$row['imie']."</td><td>".$row['nazwisko']."</td><td>".$row['srodki']."</td></tr>";
        echo "<form>";
        echo "<input type=\"hidden\" name=\"klient\" value=\"".$row['imie'].$row['nazwisko']."\">";
        echo "<input type=\"submit\" value=\"+\">";
        echo "</form></td></tr>";
    }
    echo "</table>";

    if(isset($_GET['klient'])) {
        $sql = "DELETE FROM test WHERE CONCAT(imie, ' ', nazwisko) LIKE '$klient';";
    }
    ?>
</body>
</html>