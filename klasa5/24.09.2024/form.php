<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form>
    <?php
    
    if(isset($_GET['wykonaj'])) {
        
        
        $nazwa = $_GET['nazwa'];
        $nazwa_col = $_GET['nazwa_col'];
        $typ = $_GET['typ'];

        $sql = "CREATE TABLE IF NOT EXISTS $nazwa (";
        for ($i=0; $i<count($typ); $i++) {
            $sql .= $nazwa_col[$i]." ".$typ[$i];
            if ($i<count($typ)-1)
                $sql .= ", ";
        }
        $sql .= ")";
        echo $sql;
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "5ti_test";
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        mysqli_query($conn, $sql);
    }

    if(isset($_GET['submit'])) {
        $ilosc = $_GET['ilosc'];
        $nazwa = $_GET['nazwa'];
    for($i=1; $i<=$_GET['ilosc']; $i++) {
        echo "<label>Nazwa kolumny $i <input type=\"text\" name=\"nazwa_col[]\"></label>\n";
        echo "<label>Typ <select name=\"typ[]\"><option>INT</option><option>TEXT</option></select></label><br>\n";
    } 
    echo "<input type='hidden' value='$nazwa' name='nazwa'><input type='submit' name='wykonaj' value='Wykonaj'>\n";
    }
    
    
    ?>
    
    </form>
</body>
</html>