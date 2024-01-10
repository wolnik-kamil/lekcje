<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        form {
            display: inline-block;
        }
        fieldset{
            width: 150px;
            display: flex;
            flex-direction: column;
        }
        body {
            display: flex;
            flex-direction: column-reverse;
        }

    </style>
</head>
<body>

    <div class="first">
    <?php
        echo "<div>";
        if(isset($_GET['sub1'])){
            $n=$_GET['n'];
            if(isset($_GET['dzielniki'])){
                echo "Dzielniki: <br>";
                for ($d=1;$d*$d<=$n;$d++){
                    if($n%$d==0){
                    echo "$d, ";
                    if ($d != $n/$d)
                    echo $n/$d.",";
                    }
                }   
            }
        echo "</div>";
        echo "<div>";
            if(isset($_GET['wielokrotnosc'])){
                $ile = $_GET['ile'];
                echo "Wielokrotnosci: <br>";
                for($i=1; $i<=$ile; $i++){
                    echo $n*$i."<br>";
                }
            }
        }
        echo "</div>";
        echo "<div>";
        if (isset($_GET['sub2'])){
            $k=$_GET['k'];
            if($_GET['x']=="fibo"){
                $fib[]= 100000;
                $fib[0]=1;
                $fib[1]=1;
                for($i=2; $i<$k; $i++){
                    $fib[$i]=$fib[$i-1]+$fib[$i-2];
                }
                for($i=0;$i<$k;$i++){
                    echo "Wyraz nr.",$i+1,": ",$fib[$i],"<br>";
                }
            }
            elseif($_GET['x']=="pot"){
                echo "Potegi liczby 2: <br>";
                for($i=0;$i<=$k;$i++){
                    echo 2**$i,"<br>";
                }
            }
            else{
                echo "Liczby pierwsze z zakresu ".$k.": <br>";
                
            }
        }
        echo "</div>";
        
    ?>
    </div>
    <div class="form">
    <form>
        <fieldset>
            <legend>Pierwszy form</legend>
            <label>n: <input type="number" name="n"></label>
            <label><input type="checkbox" name="dzielniki">Dzielniki</label>
            <label><input type="checkbox" name="wielokrotnosc">Wielokrotnosc Ile?<input type="text" name="ile" style="width: 25px;"></label>
            <input type="submit" name="sub1" value="Wyslij">
        </fieldset>
    </form>
    <form>
        <fieldset>
            <legend>Drugi form</legend>
            <label>k: <input type="number" name="k"></label>
            <label><input type="radio" name="x" value="fibo" selected>cg. fibo</label>
            <label><input type="radio" name="x" value="pot">potegi</label>
            <label><input type="radio" name="x" value="pierw">l. pierwsze</label>
            <input type="submit" name="sub2" value="Generuj">
        </fieldset>
    </form>
    </div>
</body>
</html>