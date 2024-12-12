<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gierki</title>
    <style>
        body {
            display: flex;
            flex-wrap: wrap;
            flex-direction: row-reverse;
            justify-content: space-evenly;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            color: lightskyblue;
            background-color: #888888;
        }
        table, tr, td, th {
            border: 1px solid black;
            border-collapse: collapse;
            
        }
        input
        {
            background-color: #444444;
            color: lightskyblue;
            font-size: 20px;
        }
        input:hover {
            cursor: pointer;
            opacity: 0.7;
        }
        select {
            background-color: #444444;
            color: lightskyblue;
            border-radius: 10px;
            font-size: 20px;
        }
        table {
            background-color: #444444;
            font-size: 20px;
        }
        tr:hover {
            background-color: #666666;
        }
        form {
            width: max-content;
            height: max-content;
            font-size: 30px;
        }
        td:last-child {
            text-align: right;
        }
        fieldset {
            height: max-content;
            width: max-content;
            background-color: #444444;
        }
    </style>
</head>
<body>
    
    <form>
        <fieldset>
            Sortuj <br>
            <select name="kategoria">
                <option value="%">wszystkie kategorie</option>
            <?php
            
            require 'connect.php';

            $sql = "SELECT DISTINCT gry.kategoria FROM gry ORDER BY gry.kategoria;";
            $result = mysqli_query($conn,$sql);

            
            
            while($row = mysqli_fetch_assoc($result)) {
                echo "<option>".$row['kategoria']."</option>\n";
            }
            ?>
            </select>
            <br>
            
                <legend>Sortowanie</legend>
                
                rosnąco: <input type="radio" name="ilosc" value="rosnaco" checked> lub malejąco: <input type="radio" name="ilosc" value="malejaco"> <br>
                po liczbie ocen: <input type="radio" name="wybor" value="oceny" > lub sredniej <input type="radio" name="wybor" value="srednia" checked>
                <br>
                <input type="submit" name="submit">
                <br>
            </fieldset>
        </form>
        <table>
        <tr><th>Nazwa</th><th>Liczba ocen</th><th>Średnia ocen</th></tr>
          
    <?php
        $kat = "%";
        $sort = "gry.nazwa";
        if(isset($_GET['submit'])) {
            $kat = $_GET['kategoria'];
            $ilosc = $_GET['ilosc'];
            $wybor = $_GET['wybor'];
            if ($ilosc == 'rosnaco' && $wybor == 'oceny') 
                $sort = 'ilosc_ocen';
            elseif ($ilosc == 'malejaco' && $wybor == 'oceny')
            $sort = 'ilosc_ocen DESC';
            elseif ($ilosc == 'rosnaco' && $wybor == 'srednia')
            $sort = 'srednia_ocen';
            else 
            $sort = 'srednia_ocen DESC';
            

            
    }
        $sql = "SELECT gry.nazwa, COUNT(oceny.ocena) AS ilosc_ocen, round(AVG(oceny.ocena), 2) AS srednia_ocen
                FROM gry 
                LEFT JOIN oceny ON gry.id_gry = oceny.id_gry
                WHERE gry.kategoria LIKE '$kat'
                GROUP BY gry.nazwa, gry.kategoria
                ORDER BY $sort;";
        $result = mysqli_query($conn,$sql);

        while($row = mysqli_fetch_assoc($result)) {
           
            echo "<tr><td>".$row['nazwa']."</td><td>".$row['ilosc_ocen']."</td><td>".$row['srednia_ocen']."</td>\n";
            
        }
        
    ?>
        
        
        </table>
</body>
</html>