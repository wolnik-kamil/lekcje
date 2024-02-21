<!DOCTYPE html>
<?php

session_start()

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="index.php">Formularz</a>
    <?php

    $folder = session_id();
    $img = scandir($folder);
    foreach($img as $im) {
        if($img!="." && $img!="..")
            echo "<img src=\"".$folder."/".$im."\">";
    }
    
    ?>
</body>
</html>