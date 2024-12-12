<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        td, th {
            border: 1px solid black;
            border-collapse: collapse;
            text-align: center;
        }
        form {
            margin: 15px;
        }
        table {
            margin: 15px;
        }
        .con {
            display: flex;
            flex-direction: row;
            justify-content: space-evenly;
        }
        fieldset.second {
            height: max-content;
        }
        .second form {
            display: flex;
            flex-direction: column;
        }
    </style>
</head>
<body>
    <div class="con">
    
        <fieldset>
            <legend>Operacje na meczach danej drużyny</legend>
            <form>
            <label>
                Wybierz drużynę! :
                <select name="team">
        <?php
        
            require 'connect.php';

            $sql = 'SELECT nazwa, id_druzyny FROM druzyny ORDER BY nazwa;';
            $result = mysqli_query($conn, $sql);

            while($row = mysqli_fetch_assoc($result)) {
                echo "<option value=\"".$row['id_druzyny']."\">".$row['nazwa']."</option>\n";
            }

        ?>
                </select>
            </label>
            <input type="submit">
        </form>
        <?php
        
        if(isset($_GET['team'])) {
            $team = $_GET['team'];

            $sql = "SELECT * FROM wyniki JOIN druzyny USING(id_druzyny) JOIN sedziowie USING(nr_licencji) WHERE id_druzyny = $team ORDER BY Data_meczu DESC";
            $result = mysqli_query($conn, $sql);
            echo "<table>";
            echo "<tr><th>Data</th><th>Wynik</th><th>Sędzia</th><th>Rodzaj i gdzie</th><th>Usuń mecz</th></tr>";
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>\n<td>".$row['Data_meczu']."</td>\n";
                echo "<td>".$row['Bramki_zdobyte']." : ".$row['Bramki_stracone']."</td>\n";
                echo "<td>".$row['Imie']." ".$row['Nazwisko']."</td><td>".$row['Rodzaj_meczu'].$row['Gdzie']."</td>\n";
                echo "<td><form><input type=\"hidden\" name=\"mecz\" value=\"".$row['Id_meczu']."\"><input type=\"hidden\" name=\"team\" value=\"".$team."\">";
                echo "<input type=\"submit\" name=\"minus\" value=\"X\"></form></td>\n";
                echo "</tr>\n";
            }
            echo "</table>";
            echo "<form>Zmień nazwę tej drużyny >>> <label><input type =\"text\" name=\"newName\"></label><input type=\"hidden\" name=\"team\" value=\"$team\"><input type=\"submit\"></form>";
            if(isset($_GET['minus'])) {
                $mecz = $_GET['mecz'];
                $sql = "DELETE FROM wyniki WHERE Id_meczu = $mecz";
                mysqli_query($conn, $sql);
            }
            if(isset($_GET['newName'])) {
                $name = $_GET['newName'];
                $team = $_GET['team'];
                $sql = "UPDATE druzyny SET nazwa = '$name' WHERE Id_druzyny = $team";
                mysqli_query($conn, $sql);
            }
        }

        ?>
        </fieldset>
        
        <fieldset class="second">
            <legend>Dodawanie meczu</legend>
        <form>
            <label>
                Jaka grała drużyna? :
                <select name="team">
        <?php
        
            require 'connect.php';

            $sql = 'SELECT nazwa, id_druzyny FROM druzyny ORDER BY nazwa;';
            $result = mysqli_query($conn, $sql);

            while($row = mysqli_fetch_assoc($result)) {
                echo "<option value=\"".$row['id_druzyny']."\">".$row['nazwa']."</option>\n";
            }

        ?>
                </select>
            </label>
            Rodzaj meczu: <input name="rodzaj" type="text" maxlength="1" pattern="[LP]" placeholder="L lub P" required>
            Gdzie mecz: <input name="gdzie" type="text" maxlength="1" pattern="[GW]" placeholder="G lub W" required>
            Nr licencji sedziego: <input type="text" name="sedzia" placeholder="np. XX0000" maxlength="6" required>
            Bramki zdobyte <input type="number" name="zdo" required> stracone <input type="number" name="stra" required>
            <input type="submit">
        </form>
        </fieldset>
        <?php
        
        if(isset($_GET['sedzia'])){
            $ro = $_GET['rodzaj'];
            $gdz = $_GET['gdzie'];
            $id = $_GET['team'];
            $nr=$_GET['sedzia'];
            $zdo = $_GET['zdo'];
            $stra = $_GET['stra'];
            $sql = "INSERT INTO wyniki (Data_meczu, Rodzaj_meczu, Gdzie, Id_druzyny, Nr_licencji, Bramki_zdobyte, Bramki_stracone) VALUES (CURRENT_DATE, '$ro', '$gdz', $id, '$nr', $zdo, $stra)";
            mysqli_query($conn, $sql);
        }
        ?>
        
    </div>
        
        
</body>
</html>