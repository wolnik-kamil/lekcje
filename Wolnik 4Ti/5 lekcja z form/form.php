<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
    
        if(!isset($_GET['login']) || $_GET['login']!='janusz') {
            echo "acces denied";
            die();
        }
    
?>
<body>
    <?php
        if (isset($_GET['submit'])) {
            $a = $_GET['a'];
            $b = $_GET['b'];

            if ((is_numeric($a) && is_numeric($b)))
            {
                if($a==0 || $b==0){
                    echo "wpisales zero";
                } else {
                echo "Pole = ", $a*$b;
                echo "<br> Obwód = ", ($a*2)+($b*2);
                }
            } else
            {
                echo "Złe dane";
            };
        } else {
        
    ?>
    <form>
        <fieldset>
            <legend>Prostokąt</legend>
            <label for="text">Wpisz pierwsza liczbe<input type="number" name="a"></label><br>
            <label for="text">Wpisz druga liczbe <input type="number" name="b"></label><br>
            <input type="submit" value="Accept" name="submit">
            <input type="hidden" name="login" id="log" value="janusz">

        </fieldset>
    </form>

    <?php 
    
        }
    
    ?>
</body>

</html>