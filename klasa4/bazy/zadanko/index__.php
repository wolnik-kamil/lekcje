<!DOCTYPE html>
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
        td:last-child {
            text-align: right;
        }
    </style>
</head>
<body>
<form>
        <select name="osoby">
            <option value="%">wszystkie osoby</option>
    <?php
    
    require 'connect.php';

    $sql = "SELECT DISTINCT imie, nazwisko, id_osoby FROM osoby ORDER BY nazwisko, imie;";
    $result = mysqli_query($conn,$sql);

    
    
    while($row = mysqli_fetch_assoc($result)) {
        echo "<option value  =".$row['id_osoby'].">".$row['imie']." ".$row['nazwisko']."</option>\n";
    }
   
    ?>
        </select>
        <input type="submit" name="submit">
        <br>
        <table>
            <tr><th>Bank</th><th>NR konta</th><th>Srodki</th></tr>
    <?php
        $sqlid = "";
        if(isset($_GET['submit'])) {
            $id = $_GET['osoby'];
            if ($id == '%')
            $sqlid = "";
            else
            $sqlid = "WHERE konta.id_osoby = '$id'";
            $suma = 0;
    }
        $sql = "SELECT bank, nr_konta, dostepne_srodki FROM konta $sqlid;";
        $result = mysqli_query($conn,$sql);

        while($row = mysqli_fetch_assoc($result)) {
            $suma = $suma + $row['dostepne_srodki'];
            echo "<tr><td>".$row['bank']."</td><td>".$row['nr_konta']."</td><td>".$row['dostepne_srodki']."</td>\n";
            
        }
        echo "<tr><td>Suma środków</td><td></td><td>$suma</td></tr>";
    ?>
        
        
        </table>
</body>
</html>