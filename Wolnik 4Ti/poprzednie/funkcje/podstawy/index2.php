<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

        // $x = 5;
        // function Test() {
        //     //global $x;
        //     //return $a+$x;
        //     static $a = 10; //teraz jest zostawiania w pamieci
        //     $a++;
        //     echo "a=$a<br>";
        // }
        // for ($i=0; $i<10;$i++){
        //     Test();
        // }

        $x = 5;
        $y=7;
        echo "x=$x y=$y<br>";
        function Test(&$x, $y) { //(&$x) zabiera z globalnej
            $x *=2;
            $y += 10;
            echo "x=$x y=$y<br>";
        }
        
        Test($x, $y);
        echo "x=$x y=$y<br>";
        
        

    ?>
</body>
</html>