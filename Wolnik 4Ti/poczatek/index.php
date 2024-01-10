<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    &lt;COS TAM&gt;
    <br>
    <?php
    $a = 3;
    $b = 4;
    $c = 5;
    $obwod = $a+$b+$c;
    $p = $obwod/2;
    
    

    echo $obwod;
    echo "<br>";
    echo (sqrt($p*($p-$a)*($p-$b)*($p-$c)));
    ?>
</body>
</html>