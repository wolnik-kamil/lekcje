<!DOCTYPE html>
<?php
$l = '%';

if(isset($_GET['submit'])) {
    $litera = $_GET['litera'];
    $l = "$litera%";
   
}
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
    <form>
        <select name="litera">
            <option value="%">wszystkie osoby</option>
    </form>
    <?php
    // ja mam nazwe bazy zmieniona na g2...
    require 'connect.php'; 

    $sql = "SELECT DISTINCT Left(Nazwisko, 1) AS `Litera` FROM klienci GROUP BY Nazwisko";
    $result = mysqli_query($conn,$sql);

    
    
    while($row = mysqli_fetch_assoc($result)) {
        echo "<option value =".$row['Litera']." $s >".$row['Litera']."</option>\n";
    }

    ?>
        </select>
        <input type="submit" name="submit" value="Pokaz">
    </form>
    <table>
     <tr><th>Klient</th><th>Wydatki</th></tr>
    <?php
        $sql2 = "SELECT Imie, Nazwisko, SUM(filmy.Cena_w_zl) AS `Suma` FROM klienci JOIN wypozyczenia USING(Pesel) JOIN filmy USING(ID_filmu) WHERE Nazwisko LIKE '$l' GROUP BY Pesel ORDER BY `Suma` DESC;";
        $result2 = mysqli_query($conn, $sql2);

        while($row = mysqli_fetch_assoc($result2)) {
            
            echo "<tr><td>".$row['Imie']." ".$row['Nazwisko']."</td><td>".$row['Suma']."</td>\n";
            
        }
        mysqli_close($conn);
    ?>
    </table>
</body>
</html>