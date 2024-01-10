<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    
    $tab = array("Janek","Franek", 15, 3.5);
    
    // $tab[] = "Ola";
    // for($i=0;$i<count($tab);$i++)
    //     echo $tab[$i]."<br>";
    
    function fibo($n) {
        $F = array(0,1);
        for($i=2;$i<=$n;$i++) {
            $F[$i] = $F[$i-1]+$F[$i-2];
            echo $F[$i]."<br>";
        }
    

    }
    
    fibo(50)
    
    ?>
</body>
</html>