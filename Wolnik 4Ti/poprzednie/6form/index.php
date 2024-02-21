<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        fieldset {
            display: flex;
            flex-direction: column;
            width: 200px;
        }

        label {
            margin: 5px
        }
    </style>
</head>
<body>

    <?php
    
        if(isset($_GET['submit'])) {
            $a=$_GET['a'];
            $b=$_GET['b'];
            $c=$_GET['c'];
            $figura=$_GET['figura'];
            if($figura=="trojkat")
            {
                $p=($a+$b+$c)/2;
                echo "Pole to: ", round(sqrt($p*($p-$a)*($p-$b)*($p-$c)),2), "<br>";
                echo "Obwod to: ", $a+$b+$c;
            }
            elseif($figura=="prostopadloscian") {
                echo "Objetosc: ", $a*$b*$c, "<br>";
                echo "Pole: ", 2*$a*$b+2*$b*$c+2*$a*$c, "<br>";
                echo "Przekatna: ", round(sqrt($a**2+$b**2+$c**2),2);
            } else {
                echo "zle";
            }
        } 
        else {
    
    ?>

    <form>
        <fieldset>
            <legend>Obliczenia</legend>
            <label for="troj"><input type="radio" name="figura" value="trojkat" id="troj" selected>Trójkąt</label>
            <label for="prost"><input type="radio" name="figura" value="prostopadloscian" id="prost">Prostopadłościan</label>
            <label for="aval">Wartość a:<input type="number" name="a" id="aval"></label>
            <label for="bval">Wartość b:<input type="number" name="b" id="bval"></label>
            <label for="cval">Wartość c:<input type="number" name="c" id="cval"></label>
            <input type="submit" name="submit">
        </fieldset>
    </form>

    <?php

        }

    ?>
</body>
</html>