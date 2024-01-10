<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    
    $dir = "images";
    $a = scandir($dir);
    foreach($a as $f) {
        if (!$a[0]||!$a[1])
        echo "<img src'imgaes\\$f'>";
    }
    ?>
</body>
</html>