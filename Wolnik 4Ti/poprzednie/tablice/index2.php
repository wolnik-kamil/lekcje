<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="">

        <?php
        
        for($i=0;$i<50; $i++) {
            echo "<input name=\"a$i\" value=\"$i\"><br>\n";
        }
        
        ?>
        <input type="submit" value="oblicz">

    </form>

    <?php
    
    // function fibo($n) {
    //     $F = array(0,1);
    //     for($i=2;$i<=$n;$i++) {
    //         $F[$i] = $F[$i-1]+$F[$i-2];
    //         echo $F[$i]."<br>";
    //     }
    

    // }

    // $F=[0,1];
    // $F[5]=5;


    // $F = array("Kasia"=>50, "Franek"=>34, "Ola"=>19);
    // foreach($F as $key => $value) {
    //     echo "$key : $value <br>";
    // }

    if (isset($_GET['a1'])) {
        foreach($_GET as $k => $v) {
            echo "$k zawiera $v<br>";
        }
    }
    
    

    ?>
</body>
</html>