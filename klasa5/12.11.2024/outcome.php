<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form>
        <input type="submit" name="wyloguj" >
    </form>
    <?php
        if(isset($_SESSION['login'])&&isset($_SESSION['passwd'])) {
            echo "Hej, ".$_SESSION['login'].". Witaj!";
            if(isset($_GET['wyloguj'])) {
                header('Location: index.php');
            }
            $id = $_SESSION['passwd'];
            require 'connect.php';
            $sql = "SELECT oferty.*, 'TAK' as zainteresowany
                    FROM oferty 
                    JOIN zainteresowania USING(Id_oferty) 
                    WHERE zainteresowania.id_klienta = $id
                    UNION
                    SELECT *, 'NIE' as zainteresowany
                    FROM oferty
                    WHERE Id_oferty NOT IN (SELECT Id_oferty FROM zainteresowania WHERE id_klienta = $id)
                    ORDER BY zainteresowany DESC;
                    ";
            $result = mysqli_query($conn, $sql);
            echo '<table><tr><th>ID oferty</th><th>Woj</th><th>Zainterere</th></tr>';

            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";

                echo "<td>".$row['Id_oferty']."</td><td>".$row['Woj']."</td>";
                if($row['zainteresowany']=='TAK') {
                    echo "<td><form><input type=\"submit\" name=\"usun\" value=\"Zainteresowany\"><input type=\"hidden\" name=\"oferta\" value=\"".$row['Id_oferty']."\"></form></td>";
                } else {
                    echo "<td><form><input type=\"submit\" name=\"dodaj\" value=\"Nie zainteresowany\"><input type=\"hidden\" name=\"oferta\" value=\"".$row['Id_oferty']."\"></form></td>";
                }

                echo "</tr>";
            }

            echo '</table>';

            if(isset($_GET['dodaj'])) {
                $idof = $_GET['oferta'];
                $id = $_SESSION['passwd'];
                $sql = "INSERT INTO zainteresowania (Id_oferty, Id_klienta) VALUES ($idof, $id);";
                mysqli_query($conn, $sql);
            }
            if(isset($_GET['usun'])) {
                $idof = $_GET['oferta'];
                $id = $_SESSION['passwd'];
                $sql = "DELETE FROM zainteresowania WHERE Id_oferty = $idof AND Id_klienta = $id;";
                mysqli_query($conn, $sql);
            }
        } else 
            echo "Access denied!";
    ?>
</body>
</html>