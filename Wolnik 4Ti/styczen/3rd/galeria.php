<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        form {
            display: inline;
        }
        table, tr, td, th {
            border: 1px solid black;
            border-collapse: collapse;
        }

        tr:hover {
            background-color:aqua;
        }
    </style>
</head>
<body>
    <?php

    if (isset($_GET['usunplik'])) {
        $plik = $_GET ['plik'];
        $login = $_GET['login'];
        unlink("users/$login/$plik");
        header("Location:galeria.php?login=$login");
    }

    //Przesył zdjecia
    if (isset($_POST['nowyplik'])) {
        $login = $_POST['login'];
        if (is_uploaded_file($_FILES['plik']['tmp_name'])) {
            $ext = pathinfo($_FILES['plik']['name'])['extension'];
            if($ext=="png" || $ext="jpg" || $ext=="gif" || $ext=="webp") {
                move_uploaded_file($_FILES['plik']['tmp_name'],"users/$login/".$_FILES['plik']['name']);
            }
        }
        //header("Location:galeria.php?login=$login");
    }

    if(isset($_GET['login'])) {
        $login = $_GET['login'];
        echo "OK. Witaj $login";
        $form = <<<FORM
        <form method="post" enctype="multipart/form-data">
        <input type="checkbox" name="podglad" checked>
        <input type="file" name="plik">
        <input type="submit" name="nowyplik">
        <input type="hidden" name="login" value="$login">
        </form>
        FORM;
        echo $form;

        $dir = "users\\$login";
        $img = scandir($dir);
        
        echo "<table>";
        //echo "<tr><th>Nazwa pliku</th><th>Rozmiar</th><th>Podgląd</th><th>Usuń</th></tr>";
        foreach($img as $plik) {
            $f = pathinfo($plik);
            if ($f['extension']=='png' || $f['extension']=='jpg' || $f['extension']=='gif' || $f['extension']=='webp'){
                $rozmiar = filesize("users/$login/$plik");
                echo "<tr><td>$plik</td><td>$rozmiar</td>";
                if (isset($_POST['podglad']))
                echo "<td><img src=\"$dir/$plik\"></td>";
                echo "<td>";
                // $opis = $dir."\\".$f['filename'].".txt";
                // if (file_exists($opis))
                //     echo file_get_contents($opis); <-- pliki txt
                $form = <<<FORM
                <form>
                <input type="submit" name="usunplik" value="X">
                <input type="hidden" name="plik" value="$plik">
                <input type="hidden" name="login" value="$login">
                </form>
                FORM;
                echo $form;
                echo "</td></tr>\n";
            }
        }
        echo "</table>";
}
    ?>
</body>
</html>