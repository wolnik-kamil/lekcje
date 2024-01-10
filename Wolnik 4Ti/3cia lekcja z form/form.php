<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    $a = $_GET['a'];
    $b = $_GET['b'];
    if (isset($_GET['submit'])) {
        $a = $_GET['a'];
        $b = $_GET['b'];

        if ((is_numeric($a) && is_numeric($b)))
        {
            echo "$a+$b = ", $a+$b;
            echo "<br> $a-$b = ", $a-$b;
            echo "<br> $a","x","$b = ", $a*$b;
            echo "<br> $a:$b = ", $a/$b;
            echo "<br> $a<sup>$b</sup> = ", $a**$b;
        } else
        {
            echo "nie jest to liczba";
        };
    }
    ?>
</body>
</html>