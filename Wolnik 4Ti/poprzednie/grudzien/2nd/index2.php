<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    
    
    $d1 = fopen("dane1.txt", "r");
    $dp = fopen("daneP.txt", "w");
    $dn = fopen("daneN.txt", "w");

    $ip = 0;
    $in = 0;
    
    
    while(!feof($d1)) {
        $liczba = intval(trim(fgets($d1)));
        if(!$liczba) break;
        if($liczba % 2==0){
            $ip++;
            fputs($dp, $liczba."\n");
        } else {
            $in++;
            fputs($dn, $liczba."\n");
        }
    }
    fclose($dp);
    fclose($dn);
    fclose($d1);
    echo "Przystych bylo $ip, a nieparzystych $in.";
    ?>
</body>
</html>