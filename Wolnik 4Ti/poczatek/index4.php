<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ES</title>
</head>
<body>
    <?php

        $a = $_GET['a'];
        $b = $_GET['b'];
        if ((is_numeric($a) && is_numeric($b))) {
            echo "Pole wynosi = ", $a*$b;
            echo "<br> Obwod wynosi = ", ($a*2)*($b*2);
            echo "<br> Przekatna wynosi = ", round(sqrt($a**2+$b**2),2);
        }
        elseif ($a==0 || $a==0 )
        {
            echo "<br> Ni ma";
        }
        else
        {
            echo "nie ma"
        };
    ?>
</body>
</html>