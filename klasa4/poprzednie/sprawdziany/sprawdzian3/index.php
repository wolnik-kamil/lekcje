<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if (isset($_GET['zapisz'])){
        $filename = $_GET['filename'];
        $content = $_GET['content'];
        $f = fopen($filename,"w");
        fputs($f,$content);
        fclose($f);
    }
    
    if (isset($_GET['przeslij'])) {
        if (is_uploaded_file($_FILES['plik']['tmp_name'])) {
            $ext = pathinfo($_FILES['plik']['name'])['extension'];
            if($ext=="txt") {
                move_uploaded_file($_FILES['plik']['tmp_name'],"pliki/".$_FILES['plik']['name']);
            }
        }
    }
    
    ?>
    <form enctype="multipart/form-data"> 
        <textarea name="content" id="content" cols="30" rows="10"></textarea>
        <hr>
        <div class="nameNsub">
            <label for="nazwa">
                <input type="text" placeholder="nazwa pliku" name="filename">.txt
            </label>
            <input type="submit" name="zapisz" value="zapisz plik na serwerze">
        </div>
        <hr>
        <div class="sendtxt">
            <input type="file" name="plik">
            <input type="submit" name="przeslij">
        </div>
    </form>
    <h1>Pliki tekstowe:</h1>
</body>
</html>