<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <form action="">
        Podaj pierw napis <input type="text" name="napis1"><br>
        Podaj dwa napis <input type="text" name="napis2"><br>
        <input type="submit">
    </form>
    <?php
    
    if(isset($_GET['napis1'])) {
        $a = $_GET['napis1'];
        $b = $_GET['napis2'];
        if (czyAna(strtolower($a),strtolower($b)))
            echo "'$a' i '$b' to anagramy";
        else
            echo "'$a' i '$b' to nie anagramy";
        
    }

    function czyAna2($a, $b) {
        sort(str_split($a));
        sort(str_split($b));
        return $a==$b;
        
    }
    
    function czyAna($a, $b) {
        $tab1 = liczLitery($a);
        $tab2 = liczLitery($b);

        return $tab1 == $tab2;
    }

    function liczLitery($napis) {
        $tablica = array();
        for($i=0;$i<strlen($napis);$i++){
            $z = $napis[$i];
            if (isset($tablica[$z]))
                $tablica[$z]++;
            else
                $tablica[$z]=1;
        }
        return $tablica;
    }

    function czyPal($napis){
        
        for ($i=0;$i<strlen($napis)/2;$i++)
            if(mb_substr($napis,$i,1)!=mb_substr($napis,-1-$i,1))
                return false;
        return true;
    }
    ?>
    
</body>
</html>