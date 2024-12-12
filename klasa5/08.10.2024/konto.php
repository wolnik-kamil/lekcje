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
            Bank:
            <select name="bank">
            <?php
        
            require 'connect.php';

            $sql = 'SELECT DISTINCT bank FROM konta;';
            $result = mysqli_query($conn, $sql);

            while($row = mysqli_fetch_assoc($result)) {
                echo "<option>".$row['bank']."</option>\n";
            }

            ?>
        </select>
        </label>
        <label>
            Numer konta
            <input type="text" maxlength="26" pattern="\d{26}" name="nr_konta">
        </label>
        <label>
            Wybierz siebie na tej liscie:
            <select name="osoba">
        <?php
        

            $sql = 'SELECT imie, nazwisko, id_osoby FROM osoby ORDER BY nazwisko, imie;';
            $result = mysqli_query($conn, $sql);

            while($row = mysqli_fetch_assoc($result)) {
                echo "<option value=".$row['id_osoby'].">".$row['imie']." ".$row['nazwisko']."</option>\n";
            }

        ?>
                </select>
            </label>
            <a href="./index.php"><input type="submit" name="sub"></a>
    </form>
    <?php
    if(isset($_GET['sub'])) {

        $osoba = $_GET['osoba'];
        $nr_konta = $_GET['nr_konta'];
        $bank = $_GET['bank'];

        $sql = "INSERT INTO konta (bank, nr_konta, id_osoby, dostepne_srodki) VALUES ('$bank', '$nr_konta', $osoba, 0);";
        mysqli_query($conn, $sql);
    }
    

    mysqli_close($conn)
    ?>
</body>
</html>