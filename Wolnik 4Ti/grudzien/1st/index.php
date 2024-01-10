<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="">
        imie <input type="text" name="imie">
        wiadomosc <input type="text" name="tekst">
        <input type="submit">
    </form>
    <?php
    
    if (isset($_GET['tekst'])){
        $f=fopen("czat.txt","a");
        fputs($f,$_GET['imie'].": ".$_GET['tekst']."\n");
        fclose($f);
    }
    ?>
    <hr>
    <?php
    
    if(!file_exists("czat.txt")) {
        $f=fopen("czat.txt","w");
        fclose($f);
    }
    $f=fopen("czat.txt","r");
    while (!feof($f)) {
        echo "<p>".fgets($f)."</p>";
    }
    fclose($f);
    
    ?>
</body>
</html>