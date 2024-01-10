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
    // $y=7;
    // echo "x=$x y=$y<br>";
    // function Swap(&$x, &$y) {
    //     $c = $x;
    //     $x = $y;
    //     $y = $c;
    //     // lub
    //     // $x ^= $y;
    //     // $y ^= $x;
    //     // $x ^= $y;
    // }
    
    // Swap($x, $y);
    // echo "x=$x y=$y<br>";

    // function test($n, $f) {
    //     return $f($n);
    // }

    // $kwadrat = function ($n) {
    //     return $n**2;
    // };

    // echo Test(5, $kwadrat)."<br>";
    // echo Test(6, function ($n) {return $n**2;})."<br>";
    // echo Test(7, fn($n) => $n**2)."<br>";// strzalkowa tylko jak jest return cos tam, nic wiecej
    
    // $test = fn($a) => fn($b) => $a*$b;
         
        

    // echo $test(5)(7)."<br>";
    // // pierwszy (dla test), drugi (dla strzalkowej)

    // function NWD($a, $b) {
    //     while ($b>0) {
    //         $c = $a % $b;
    //         $a = $b;
    //         $b = $c;
    //     }
    //     return $a;
    // }

    // $NWW = fn($a, $b) => $a*$b/NWD($a, $b);

    // echo $NWW(8, 4)." <== NWW<br>NWD ==> ".NWD(8, 4);

    function silnia($n) {
        $s=1;
        for($i=1;$i<=$n;$i++){
            $s *= $i;
        }
        return $s;
    }
    
    function silniaR($n){
        return $n ? silniaR($n-1)*$n : 1;
    }


    $silniaR = fn($n) => $n ? $silniaR($n-1)*$n : 1; // rekurencyjna strzalkowa ale nie przechodzi niestety
    

    function NWD($a, $b) {
        if ($b==0) return $a;
        return NWD($b, $a % $b);
    }


    // //to samo co to 
    // function NWD($a, $b) {
    //     while ($b>0) {
    //         $c = $a % $b;
    //         $a = $b;
    //         $b = $c;
    //     }
    //     return $a;
    // }
    
    function fiboR($n) {
        if($n<3) return 1;
        return fibo($n-1)+fibo($n-2);
        
    }//wypisuje ost liczbe ciagu fibo - nieefektywnie rekurencja


    function fiboI($n) {
        $a = 1;
        $b = 1;
        for($i=3;$i<=$n;$i++) {
            $c = $a + $b;
            $a = $b;
            $b = $c;
        }
        return $b;
    } //iteracyjnie - efektownie
    echo fiboI(10);

    ?>
</body>
</html>