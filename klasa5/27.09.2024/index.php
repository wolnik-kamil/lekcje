<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table, tr, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>
<body>
    <?php
    
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "5ti_g2_domy";

        $conn = mysqli_connect($servername, $username, $password, $dbname);
        $sql = "SELECT DISTINCT imie, nazwisko, id_agenta FROM agenci ORDER BY nazwisko, imie;";
        $result = mysqli_query($conn,$sql);
    
    ?>
    <form>
        <select name="agent">
    
    <?php

    while($row = mysqli_fetch_assoc($result)) {
        echo "<option value  =".$row['id_agenta'].">".$row['imie']." ".$row['nazwisko']."</option>\n";
    }

    ?>
        </select>
    <input type="submit" name="submit">
    </form>
    <?php
    
    if(isset($_GET['submit'])) {
        $x = $_GET['agent'];
        $where = "WHERE id_agenta = $x AND `status` = 'A'";
        $sql2 = "SELECT id_agenta, `status`, cena, id_oferty FROM oferty JOIN agenci USING(id_agenta) $where ; ";
        $result2 = mysqli_query($conn, $sql2);
        echo "<table><tr><th>Id_oferty</th><th>Cena</th></tr>";
        while($row = mysqli_fetch_assoc($result2)) {
            echo "<tr><td>".$row['id_oferty']."</td><td>".$row['cena']."</td></tr>";
        }
        $row = mysqli_fetch_assoc($result2);
        echo $row['imie']." ".$row['nazwisko'];
        echo "</table>";
    }

    ?>
</body>
</html>