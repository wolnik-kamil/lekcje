<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    
        $osoby = array();
        //$osoby2 = array();
        for($i=0;$i<10;$i++) {
            $osoby[$_GET["imie$i"]] = $_GET["wiek$i"];
            //$osoby2[] = [$_GET["imie$i"],$_GET["wiek$i"]];
        }
        $s = $_GET['type'];
        $s($osoby);
        echo "<ol type=\"I\">";

        
        // foreach($osoby2 as $ktos){
        //     echo "<li>".$ktos[0]." ma ".$ktos[1]." lat</li>";
        // }

        

        foreach($osoby as $imie => $wiek)
            echo "<li>$imie ma $wiek lat.</li>";
        

        echo "</ol>";
    
        

    ?>
</body>
</html>