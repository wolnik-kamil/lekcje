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
            text-align: center;
            padding: 5px;
        }
        tr:hover {
            background-color: #abcabc;
        }
        div {
            display: flex;
            flex-direction: row;
            justify-content: space-evenly;
            margin-bottom: 20px;
            width: 620px;
        }
    </style>
</head>
<body>
    <div>
        <form>
            <label>
                Wybierz osobę:
                <select name="osoba">
                    <option value="*" selected>Wszyscy</option>
        <?php
        
            require 'connect.php';

            $sql = 'SELECT imie, nazwisko, id_osoby FROM osoby ORDER BY nazwisko, imie;';
            $result = mysqli_query($conn, $sql);

            while($row = mysqli_fetch_assoc($result)) {
                echo "<option value=".$row['id_osoby'].">".$row['imie']." ".$row['nazwisko']."</option>\n";
            }

        ?>
                </select>
            </label>
            <input type="submit" name="sub">
        </form>
        <a href="./konto.php"><button>Dodaj konto</button></a>
        <a href="./osoba.php"><button>Dodaj osobę</button></a>
    </div>
    <table>
        <tr><th>Bank</th><th>Nr Konta</th><th>Właściciel</th><th>Stan konta</th></tr>
    <?php
    if(isset($_GET['sub'])) {

        $osoba = $_GET['osoba'];

        if($osoba != '*')
            $sql = 'SELECT bank, nr_konta, imie, nazwisko, dostepne_srodki FROM konta JOIN osoby USING(id_osoby) WHERE id_osoby LIKE '.$osoba.' ORDER BY nazwisko, imie;';
        else
            $sql = 'SELECT bank, nr_konta, imie, nazwisko, dostepne_srodki FROM konta JOIN osoby USING(id_osoby) ORDER BY nazwisko, imie;';

        $result = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>".$row['bank']."</td><td>".$row['nr_konta']."</td><td>".$row['imie']." ".$row['nazwisko']."</td><td>".$row['dostepne_srodki']."</td></tr>\n";
        }
    }
    

    mysqli_close($conn)
    ?>
    
</body>
</html>