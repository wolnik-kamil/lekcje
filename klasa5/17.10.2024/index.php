<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form>
            <label>
                Wybierz osobę:
                <select name="osoba">
        <?php
        
            require 'connect.php';

            $sql = 'SELECT imie, nazwisko FROM test ORDER BY nazwisko, imie;';
            $result = mysqli_query($conn, $sql);

            while($row = mysqli_fetch_assoc($result)) {
                echo "<option>".$row['imie']." ".$row['nazwisko']."</option>\n";
            }

        ?>
                </select>
            </label>
            <label>
                Ile? <input type="number" name="kwota" value="0">
            </label>
            <input type="submit" name="sub">
        </form>
        <table>
        <tr><th>Imie</th><th>Nazwisko</th><th>Środki</th></tr>
    <?php
    if(isset($_GET['sub'])) {
        $kwota = $_GET['kwota'];
        $osoba = $_GET['osoba'];
        $sql = "UPDATE test SET Kasa = Kasa + $kwota WHERE CONCAT(imie, ' ', nazwisko) LIKE '$osoba'; ";
        mysqli_query($conn, $sql);
        $sql = "SELECT imie, nazwisko, kasa FROM test;";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>".$row['imie']."</td><td>".$row['nazwisko']."</td><td>".$row['kasa']."</td></tr>\n";
        }
    }
    

    mysqli_close($conn)
    ?>
</body>
</html>