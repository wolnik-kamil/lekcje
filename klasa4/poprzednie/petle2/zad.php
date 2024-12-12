<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form>
        <fieldset>
            <label>Podaj liczbe a: <input type="number" name="a"></label><br>
            <label>Podaj liczbe b: <input type="number" name="b"></label><br>
            <label><input type="checkbox" name="NWDchk"> NWD</label>
            <label><input type="checkbox" name="NWWchk"> NWW</label>
            <label><input type="checkbox" name="czynniki"> Rozklad na czynniki</label>
            <label><input type="checkbox" name="dzielniki"> Rozklad na dzielniki</label>
            <input type="submit" name="submit">
        </fieldset>
    </form>

    <?php
    
        if(isset($_GET['NWDchk'])){

            if(isset($_GET['a'])) {
                $a=$_GET['a'];
                $b=$_GET['b'];
                $a0 = $a;
                $b0 = $b;
                
                while($b>0) {
                    $c = $a%$b;
                    $a = $b;
                    $b = $c;
                }
                echo"NWD($a0, $b0) = $a<br>";
            }
        }

        if(isset($_GET['NWWchk'])){

            if(isset($_GET['a'])) {
                $a=$_GET['a'];
                $b=$_GET['b'];
                $a0 = $a;
                $b0 = $b;
                
                while($b>0) {
                    $c = $a%$b;
                    $a = $b;
                    $b = $c;
                }
                    echo"NWW($a0, $b0) = ".$a0*$b0/$a."<br>";
                }
        }


        if(isset($_GET['czynniki'])){
            if (isset($_GET['a']))
            {
                $n=$_GET['a'];
                $d=2;
                echo "Czynniki pierwsze liczby a: ";
                while($d*$d<=$n){
                    if($n%$d==0){
                        echo"$d,";
                        $n/=$d;
                    } else
                        $d++;
                }
                echo $n."<br>";
            }
        }
        if(isset($_GET['dzielniki'])){
            if(isset($_GET['a'])) {
            $n=$_GET['a'];
            echo "Dzielniki liczby a: ";
            for ($d=1;$d*$d<=$n;$d++){
                if($n%$d==0){
                    echo "$d, ";
                    if ($d != $n/$d)
                    echo $n/$d.",";
                }
            }

        }
        }
    
    ?>
</body>
</html>