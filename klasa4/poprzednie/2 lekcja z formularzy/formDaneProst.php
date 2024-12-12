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
            if ($a==0 || $b==0 ) {
                echo "<br> Wpisales zero";
            }
            elseif ((is_numeric($a) && is_numeric($b)))
            {
                echo "Pole wynosi = ", $a*$b;
                echo "<br> Obwod wynosi = ", ($a*2)+($b*2);
                echo "<br> Przekatna wynosi = ", round(sqrt($a**2+$b**2),2);
            }
            else
            {
                echo "nie jest to liczba";
            };
        } else {
    ?>

    <form>
        <input type="text" name="a" required><br>
        <input type="text" name="b" required><br>
        <input type="submit" value="Oblicz" name="submit">
    </form>
    <?php
    
        }
    
    ?>
</body>
</html>