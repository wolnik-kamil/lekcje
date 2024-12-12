<!DOCTYPE html>
<?php
$min = 0;
$surname = "";
$plec = "";
if(isset($_GET['min'])) {
    $min = $_GET['min'];
    $surname = $_GET['surname'];
    if(isset($_GET['plec']) && $_GET['plec']== "k") {
        $plec = "AND o.imie LIKE '%a'";
    } elseif(isset($_GET['plec']) && $_GET['plec']== "m") {
        $plec = "AND o.imie NOT LIKE '%a'";
    }
} 


setcookie("min", $min, time()+365*24*3600);
setcookie("surname", $surname, time()+365*24*3600);
setcookie("plec", $plec, time()+365*24*3600);

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table, tr, td, th {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>
<body>

    <form>
        <fieldset>
            <label>Kwota minimalna </label>
            <input type="number" value="0" name="min">
            <label>Początek nazwiska </label><input type="text" name="surname">
            <label>Płeć </label>K: <input type="radio" name="plec" value="k"> M: <input type="radio" name="plec" value="m">
            <input type="submit">
        </fieldset>
    </form>
    <?php
        
    
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "4ti_gr2_konta";

        $conn = mysqli_connect($servername, $username, $password, $dbname);

        if(!$conn)
            die("Połącznie nieudane.".$conn ->connect_error);
        
        echo "Połączenie udane. <br>";
        $sql = "SELECT o.imie, o.nazwisko, SUM(k.dostepne_srodki) as kasa 
                FROM osoby o
                JOIN konta k ON k.id_osoby = o.id_osoby
                WHERE o.nazwisko LIKE '$surname%' $plec
                GROUP BY nazwisko, imie
                HAVING kasa>=$min
                ORDER BY kasa
                DESC;
            ";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0)
        {
            echo "<table><tr><th>Lp.</th><th>Imię</th><th>Nazwisko</th><th>Kasa</th></tr>";
            $i = 0;
            while ($row = mysqli_fetch_assoc($result))
            {
                
                $i++;
                echo "<tr><td>".$i."</td><td>".$row['imie']."</td><td>".$row['nazwisko']."</td><td>".$row['kasa']." PLN</td></tr>";
            }
            echo "</table>";
        } else { 
            echo "Brak wyników";
        }
        mysqli_close($conn);

    ?>
</body>
</html>