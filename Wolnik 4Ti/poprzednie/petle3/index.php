<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        label {
            display: block;
        }
        input {
            margin: 5px;
        }
        fieldset {
            width: 230px
        }
    </style>
</head>
<body>

        <?php
        
            if(isset($_GET['submit'])) {
                $cg=$_GET['cg'];
                $a1=$_GET['a1'];
                $rq=$_GET['rq'];
                $n=$_GET['n'];
                if ($cg=="geo"){
                    for($i=1;$i<=$n;$i++){
                        echo $a1.", ";
                        $a1 *= $rq;
                    }
                } else
                {
                    for($i=1;$i<=$n;$i++){
                        echo $a1.", ";
                        $a1 += $rq;
                    }
                }
            } else {
        
        ?>

    <form>
        <fieldset>
            <legend>Ciągi</legend>
            <label for="ciag">Rodzaj cg.
                <select name="cg" id="ciag">
                    <option value="geo">Geometryczny</option>
                    <option value="aryt">Arytmetyczny</option>
                </select>
            </label>
            <label for="ajeden">a<sub>1<sub><input type="number" name="a1" id="ajeden"></label>
            <label for="ajeden">r/q<input type="number" name="rq" id="rlubq"></label>
            <label for="ajeden">n<input type="number" name="n" id="nty"></label>
            <input type="submit" name="submit" value="Wygeneruj">
        </fieldset>
    </form>
    <?php
    }
    ?>
</body>
</html>