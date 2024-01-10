<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $masa = 86;
        $wzrost = 1.86;
        $bmi = $masa/($wzrost**2);
        echo "$bmi";
        "<br>";
        
        if ($bmi<18) { 
            echo "za małe";
        } elseif ($bmi>25);
        {;
           echo "za duze";
        } else {
            echo "genau";
        };
    ?>
</body>
</html>