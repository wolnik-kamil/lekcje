<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table, td, th, tr {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>
<body>
    <form>
        <label>
            Film
            <select name="film">
    <?php
        require 'connect.php';
        $sql = 'SELECT DISTINCT Tytul, id_filmu FROM filmy ORDER BY tytul;';
        $result  = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)) {
            echo "<option value='".$row['id_filmu']."'>".$row['Tytul']."</option>";
        }
    ?>
            </select>
        </label>
        <label>
            Klient
            <select name="klient">
    <?php
        require 'connect.php';
        $sql = 'SELECT imie, nazwisko, pesel FROM klienci GROUP BY pesel ORDER BY nazwisko, imie;';
        $result  = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)) {
            echo "<option value='".$row['pesel']."'>".$row['imie']." ".$row['nazwisko']."</option>";
        }
    ?>
            </select>
        </label>
        <input type="date" name="data" required>
        <input type="submit" name="sub" value="Dodaj">
    </form>
    <table>
    <?php
        
    if(isset($_GET['sub'])) {
        echo '<tr><th>Data</th><th>Klient</th><th>Film</th></tr>'; 

        $film = $_GET['film'];
        $klient = $_GET['klient'];
        $data = $_GET['data'];

        $sqlDisplay = "SELECT imie, nazwisko, tytul, Data_wyp as 'Data' FROM wypozyczenia JOIN klienci USING(Pesel) JOIN filmy USING(ID_filmu) ORDER BY Data_wyp DESC;";
        $resultDisplay  = mysqli_query($conn, $sqlDisplay);
        while($row = mysqli_fetch_assoc($resultDisplay)) {
            echo "<tr><td>".$row['Data']."</td><td>".$row['imie']." ".$row['nazwisko']."</td><td>".$row['tytul']."</td></tr>";
        }

        $sql = "INSERT INTO wypozyczenia (ID_filmu, Pesel, Data_wyp) VALUES ('$film', '$klient', DATE('$data'));";
        $result = mysqli_query($conn, $sql);
        $result;

    }
    
    ?>
    </table>
</body>
</html>