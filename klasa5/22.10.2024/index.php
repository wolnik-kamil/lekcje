<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .del {
        background-color: red;
        padding: 10px;
        border-radius: 15px;
        color: black;
        font-size: 18px;
    }
    .del:hover {
        padding: 12px;
        color: white;
        cursor: pointer;
    }
</style>
<body>
    <form action="">
        <label>
            <select name="klient">
                <?php
                
                $conn = mysqli_connect("localhost", "root", "", "5ti_g2_konta");
                $sql = "SELECT imie, nazwisko, ID FROM test ORDER BY nazwisko, imie";
                $result = mysqli_query($conn, $sql);

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value=\"".$row['ID']."\">".$row['imie']." ".$row['nazwisko']."</option>";
                }
    

                ?>
            </select>
        </label>
        <input type="submit" name="sub" value="Wyswietl">
        <input type="number" name="ilosc" value="10">
        <input type="submit" name="sub" value="Dodaj">
        <input type="submit" class="del" name="sub" value="Usun">
    </form>
    </body>
    <?php

    if(isset($_GET['sub'])) {
        $klient = $_GET['klient'];
        
        if($_GET['sub'] == 'Dodaj') {
            $ilosc = $_GET['ilosc'];
            $sql = "UPDATE test SET srodki = srodki + $ilosc WHERE ID = $klient;";
            mysqli_query($conn, $sql);
        }
        if($_GET['sub'] == 'Usun') {
            $sql = "DELETE FROM test WHERE ID = $klient";
            mysqli_query($conn, $sql);
        }
        $sql = "SELECT srodki, imie, nazwisko FROM test WHERE ID = $klient";
        $result = mysqli_query($conn, $sql);
        
        $row = mysqli_fetch_assoc($result);
        echo "<p>".$row['imie']." ".$row['nazwisko']." ma ".$row['srodki']." PLN</p>";
    }


    mysqli_close($conn);    

    ?>
</body>
</html>