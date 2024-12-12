<!DOCTYPE html>
<?php

    if(isset($_GET['sort'])) {
        $s = $_GET['sort'];
    } elseif (isset($_COOKIE['sortCookie']))
        $s= $_COOKIE['sortCookie'];
    else
        $s=0;
setcookie("sortCookie",$s);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

        table, tr, td, th {
            border: 1px solid black;
            border-collapse: collapse;
        }

    </style>
</head>
<body>
    <form>
        <select name="sort">
            <option value="0"<?php if($s==0) echo "selected"; ?>>Rosnąco wg. nazwy</option>
            <option value="1" <?php if($s==1) echo "selected"; ?>>Malejąco wg. nazwy</option>
            <option value="2" <?php if($s==2) echo "selected"; ?>>Rosnąco wg. rozmiaru</option>
            <option value="3" <?php if($s==3) echo "selected"; ?>>Malejąco wg.rozmiaru</option>
        </select>
        <input type="submit" value="Sortuj">
    </form>
    <?php
    $files = scandir("files/");
    $tab = [];
    foreach ($files as $name) {
        if($name!="." && $name!=".."){
            $tab[$name] = filesize("files/$name");
        }
    }

    if($s==0)
        ksort($tab);
    elseif ($s==1)
        krsort($tab);
    elseif ($s==2)
        asort($tab);
    else
        arsort($tab);

    echo "<table>\n";
    echo "<tr><th>Nazwa pliku</th><th>Rozmiar</th></tr>\n";
    foreach ($tab as $name => $rozmiar) {
        
        echo "<tr><td>$name</td><td>$rozmiar B</td></tr>\n";
    
    }
    
    echo "</table>\n";
    ?>
</body>
</html>