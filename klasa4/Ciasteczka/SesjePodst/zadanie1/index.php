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
<?php
    $folder = session_id();
        if(!file_exists($folder)){
        mkdir($folder);
        }
        if(isset($_POST['submit'])){
            if (is_uploaded_file($_FILES['foto']['tmp_name'])) {
                $ext = pathinfo($_FILES['foto']['name'])['extension'];
                if($ext=="png" || $ext="jpg" || $ext=="gif" || $ext=="webp") {
                    move_uploaded_file($_FILES['foto']['tmp_name'],"$folder/".$_FILES['foto']['name']);
                }
            }
        }
    ?>
    <form method="post" enctype="multipart/form-data">
        <label>
            <p>Zyciorys</p>
            <textarea name="life" cols="30" rows="10">

                <?php
                
                if(isset($_POST['life']))
                    $_SESSION['life']=$_POST['life'];
                if(isset($_SESSION['life']))
                    echo $_SESSION['life'];

                ?>
            </textarea><br>
            <input type="submit" name='submit'>
            <input type="file" name="foto">
        </label>
    </form>
    <a href="galeria.php">Galeria</a>
</body>
</html>