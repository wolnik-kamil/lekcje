<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        form {
            margin-top: 50px;
            width: 200px;
            height: 1000px;
        }
    </style>
</head>
<body>
    <?php
    
    // $napis = 'Ala ma kota';
    // echo $napis[strlen($napis)-1]; // strlen($napis) --> liczy znaki !wszystkie!
    
    if(isset($_GET['napis'])) {
        // $imie = $_GET['imie'];
        // if(strtolower($imie[strlen($imie)-1])=='a') {
        //     echo "Jesteś baba";
        // } else {
        //     echo "Jesteś chłop";
        // }
        
        
        $napis = $_GET['napis'];
        //$napis2 = "";
        // for($i=strlen($napis)-1;$i>=0;$i--)
        //     echo $napis[$i];
        // for($i=0;$i<strlen($napis);$i++)
        //     $napis2= $napis[$i].$napis2; 
        // echo $napis2."<br>";   
        // echo $napis2==$napis ? "Palindrom" : "Nie jest plaindrom";

        
        echo strrev($napis)."<br>";
        $tab = explode(" ",$napis);
        $rtab = array_reverse($tab);
        implode(" ", $napis);
        echo $napis;

    }

    ?>

    <form action="">
        <!-- Podaj imię <input type="text" name="imie"><br> -->
        Podaj napis <input type="text" name="napis"><br>
        <input type="submit">
    </form>

</body>
</html>