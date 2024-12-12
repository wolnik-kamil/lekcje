<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table, tr, td {
            border: 1px solid black;
            border-collapse: collapse;
            user-select: none;
        }

        tr:hover {
            background: #444444;
            color: white;
        }
    </style>
</head>
<body>
    <form>
        <label>n: <input type="number" name="n"></label><br>
        <input type="submit" name="submit">
    </form>
    <hr>
    <?php
    
        if(isset($_GET['n'])){
            echo "<table>";
            echo "<tr><th>n</th><th>Dzielniki</th><th>Czy pierwsza?</th><th>Czynniki</th></tr>";
                for($n=2;$n<=$_GET['n'];$n++){
                    echo"<tr><th>$n</th><td>";
                    $ile=0;
                    for($d=1;$d<=$n;$d++){
                        if($n % $d == 0){
                            echo "$d, ";
                            $ile++;
                        }
                    }
                    echo "</td><td>";
                    echo $ile==2 ? "TAK" : "";
                    $j=2;
                    $m = $n;
                    echo "<td>";
                    while($j*$j<=$m){
                        
                        if($m%$j==0){
                            echo"$j,";
                            $m/=$j;
                        } else
                            $j++;
                    
                    }
                    echo "$m";
                            
                    echo "</td></tr>";
                }

            echo "</table>";
        }
    
    ?>
</body>
</html>