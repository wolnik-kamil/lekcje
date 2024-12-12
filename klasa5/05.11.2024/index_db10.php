<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            display: flex;
            justify-content: space-evenly;
        }
        table,td,th {border: 1px solid black}
        .bokiem {
            width: 1em;
            transform: translateY(3em) rotate(-90deg);
        }
        tr:first-child {
            height:8em;
            
        }
        tr:hover {
            background-color: pink;
        }
        input[type="submit"] {
            width: 100%;
        }
        input[type="submit"]:hover {
            cursor: pointer;
            padding: 3px;
        }
    </style>
</head>
<body>
    <?php
    $conn = mysqli_connect("localhost","root","","5ti_g1_mecze");
    $sql_s = "SELECT * from sedziowie";
    $result_s = mysqli_query($conn, $sql_s);
    echo "<table>\n";
    echo "<tr><td>Sędzia</td>";
    $sql_k = "SELECT nazwa FROM kluby ORDER BY nazwa";
    $result_k = mysqli_query($conn,$sql_k);
    while ($klub = mysqli_fetch_assoc($result_k)) {
        echo "<td><div class=\"bokiem\">".$klub['nazwa']."</div></td>";
    }
    echo "</tr>";
    while ($sedzia = mysqli_fetch_assoc($result_s)) {
        echo "<tr><td><form><input type=\"hidden\" name=\"id\" value=\"".$sedzia['Id_sedziego']."\"><input type=\"submit\" name=\"sedzia\" value=\"".$sedzia['Imie']." ".$sedzia['Nazwisko']."\"></form></td>\n";
        $id_sedziego = $sedzia['Id_sedziego'];
        $sql_k = "select id_klubu, count(id_sedziego) as ile\n"
        . "from kluby left join\n"
        . "(SELECT * from mecze where id_sedziego = $id_sedziego) as pom\n"
        . "using (id_klubu)\n"
        . "GROUP by Id_klubu ORDER BY nazwa;";
        $result_k = mysqli_query($conn,$sql_k);
        while ($klub = mysqli_fetch_assoc($result_k)) {
            echo "<td>".$klub['ile']."</td>";
        }
        echo "</tr>\n";
    }
    echo "</table>\n";

    if(isset($_GET['id'])) {
        $sedzia = $_GET['sedzia'];
        $id = $_GET['id'];
        $sql = 
        " 
            SELECT mecze.data as 'data', nazwa, miasto,  sety_wygrane, sety_przegrane
            FROM mecze JOIN sedziowie USING(id_sedziego)
            JOIN kluby USING(id_klubu)
            WHERE id_sedziego = $id;
        ";
        $result = mysqli_query($conn, $sql);
        echo "<div><h1>$sedzia</h1><table><tr><th>Data</th><th>Klub</th><th>Miasto</th><th>W</th><th>L</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>".$row['data']."</td><td>".$row['nazwa']."</td><td>".$row['miasto']."</td><td>".$row['sety_wygrane']."</td><td>".$row['sety_przegrane']."</td></tr>\n";
        }
        echo "</table></div>";
    }


    mysqli_close($conn);
    ?>
    
</body>
</html>