<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
        <!-- <form>
            <fieldset>
                <legend>NWW i NWD</legend>
                <label>Podaj liczbe a: <input type="number" name="a"></label><br>
                <label>Podaj liczbe b: <input type="number" name="b"></label><br>
                <input type="submit" name="submit">
            </fieldset>
        </form> -->
        <form>
            <fieldset>
                <label>Podaj liczbe n: <input type="number" name="n"></label><br>
                <input type="submit" name="submit">
            </fieldset>
        </form>

    <?php
        
        // if(isset($_GET['a'])) {
        //     $a=$_GET['a'];
        //     $b=$_GET['b'];
        //     while($a!=$b) {
        //         if ($a>$b)
        //             $a -= $b;
        //         else
        //             $b -= $a;
        //     }
        //     echo"NWD=$a";
        // }    gorsza wersja
    

        // if(isset($_GET['a'])) {
        //     $a=$_GET['a'];
        //     $b=$_GET['b'];
        //     while($a>0 && $b>0) {
        //         if ($a>$b)
        //             $a %= $b;
        //         else
        //             $b %= $a;
        //     }
        //     echo"NWD=".$a+$b;
        // }    lepsza wersja ale nie najlepsza

        // if(isset($_GET['a'])) {
        //     $a=$_GET['a'];
        //     $b=$_GET['b'];
        //     $a0 = $a;
        //     $b0 = $b;
            
        //     while($b>0) {
        //         $c = $a%$b;
        //         $a = $b;
        //         $b = $c;
        //     }
        //     echo"NWD($a0, $b0) = $a<br>";
        //     echo"NWW($a0, $b0) = ".$a0*$b0/$a;
        // }    najlepsza
        

        // if(isset($_GET['n'])) {
        //     $n=$_GET['n'];
        //     for ($d=1;$d*$d<=$n;$d++){
        //         if($n%$d==0){
        //             echo "$d, ";
        //             if ($d != $n/$d)
        //             echo $n/$d.",";
        //         }
        //     }

        // } rozklad na dzielniki liczby
    

        if (isset($_GET['n']))
        {
            $n=$_GET['n'];
            $d=2;
            while($d*$d<=$n){
                if($n%$d==0){
                    echo"$d,";
                    $n/=$d;
                } else
                    $d++;
            }
            echo $n;
        }
    ?>
</body>
</html>