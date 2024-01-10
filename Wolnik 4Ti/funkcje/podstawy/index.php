<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<form action="">
    a <input type="text" name="a"><br>
    b <input type="text" name ="b"><br>
    <input type="submit" value="Oblicz">
</form>
    <?php

        function NWD($a, $b) {
            while ($b>0) {
                $c = $a % $b;
                $a = $b;
                $b = $c;
            }
            return $a;
        }

        $NWW = function ($a, $b) {
            return $a*$b/NWD($a, $b);
        };

        if (isset($_GET['a'])) {
            $a = $_GET['a'];
            $b = $_GET['b'];
            echo "NWD($a,$b) = ".NWD($a,$b)."<br>";
            echo "NWW($a,$b) = ".$NWW($a,$b)."<br>";
        }
        

        function czypierwsza($a) {
            
        }
        

        


    ?>
</body>
</html>