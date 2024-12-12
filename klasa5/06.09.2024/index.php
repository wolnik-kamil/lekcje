<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .con {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-evenly;
            align-items: flex-start;
        }
        table, tr, td, th {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <?php
    
    require 'connect.php';
        // do klientow dane
    $sql = 
    "SELECT
        klienci.Imie,
        klienci.Nazwisko,
        COUNT(*) AS `Liczba wypozyczen`
    FROM
        klienci
    JOIN wypozyczenia USING(pesel)
    GROUP BY
        pesel
    ORDER BY
        nazwisko,
        imie";
    $result = mysqli_query($conn,$sql);
        //do filmow dane
    $sql2 = 
    "SELECT
        filmy.Tytul,
        COUNT(*) AS `Ilosc wypozyczen`
    FROM
        filmy
    JOIN 
        wypozyczenia USING(ID_filmu)
    GROUP BY
        Tytul
    ORDER BY
        `Ilosc wypozyczen`
    DESC";
    $result2 = mysqli_query($conn, $sql2);
    ?>
    <div class="con">
        <table>
            <tr><th>Imię</th><th>Nazwisko</th><th>Liczba filmów</th></tr>
            <?php
            
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td>".$row['Imie']."</td><td>".$row['Nazwisko']."</td><td>".$row['Liczba wypozyczen']."</td>\n";
                
            }

            ?>
        </table>
        <table>
            <tr><th>Tytul</th><th>Ilosc wypozyczen</th></tr>
            <?php
            
            while($row = mysqli_fetch_assoc($result2)) {
                echo "<tr><td>".$row['Tytul']."</td><td>".$row['Ilosc wypozyczen']."</td>\n";
                
            }

            ?>
        </table>
    </div>
    
</body>
</html>