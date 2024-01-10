<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        tr, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>
<body>
    <form action="osoby.php">
        <table>
            <tr><th>Imie</th><th>Wiek</th></tr>
        <?php

        $imiona = ["Franek", "Basia", "Janusz", "Jurek", "Juras", "Grzegorz"];
        for($i=0;$i<10;$i++) {
            $imie = $imiona[rand(0,count($imiona)-1)];
            echo "<tr><td><input name=\"imie$i\" value=\"$imie\"></td><td><input name=\"wiek$i\" value=\"".rand(18,80)."\"></td></tr>\n";
        }
        ?>
        </table>
        imiona rosnaco<input type="radio" name="type" value="ksort" checked><br>
        im malej<input type="radio"name="type" value="asort"><br>
        wiek ros<input type="radio" name="type" value="krsort"><br>
        wiek malej<input type="radio" name="type" value="arsort"><br>
        <input type="submit">
    </form>
</body>
</html>