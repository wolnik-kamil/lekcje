<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    
        if (isset($_GET['submit'])) {
            $a = $_GET['a'];
            $b = $_GET['b'];
            $c = $_GET['c'];
            if ((is_numeric($a) && is_numeric($b) && is_numeric($c))){
                if(($a+$b>$c)&&($a+$c>$b)&&($b+$c>$a)){
                    if ($a==0 || $b==0 || $c==0) {
                        echo "<br> Wpisales zero";
                    }
                    else
                    {
                        $p=($a+$b+$c)/2;
                        echo "Pole wynosi = ", round(sqrt($p*($p-$a)*($p-$c)*($p-$c)),2);
                        echo "<br> Obwod wynosi = ", $a+$b+$c;
                        echo "<style>body{background-color: green;}</style>";
                    }
                
                }
                else
                {
                    echo "<h1>To nie jest trójkąt</h1><style>body{background-color:orange;}</style>";
                }
            }
            else {
                    echo "<h1>Złe dane</h1> <style>
                                body {background-color: red;}
                        </style>";
            }
        }
        else 
        {   
    ?>
    
    
    <form>
        <input type="text" name="a" placeholder="podaj a"><br>
        <input type="text" name="b" placeholder="podaj b"><br>
        <input type="text" name="c" placeholder="podaj c"><br>
        <input type="submit" name="submit">
    </form>

    <?php
                
            
    }  
    ?>
</body>

</html>