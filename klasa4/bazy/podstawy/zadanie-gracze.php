<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form>
        wiek od <input type="number" name="od" required min="1" max="100"> do <input type="number" name="do" required min="1" max="100">;
        <br><input type="submit">
    </form>
    <?php
    $add = "";
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "4ti_gr2_gry";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if(!$conn)
        die("Połącznie nieudane.".$conn ->connect_error);
    

    if(isset($_GET['do'])) {
        $do = $_GET['do'];
        $od = $_GET['od'];

        $add = "BETWEEN $od AND $do";
    } 

    $sql = " SELECT g.imie, g.nazwisko, g.wiek 
            FROM gracze g
            WHERE g.wiek $add
            ORDER BY g.wiek, g.nazwisko;
        ";
        $result = mysqli_query($conn,$sql);
        echo "Znaleziono ".mysqli_num_rows($result)." graczy. <br>";
        echo "Gracze z przedialu $od - $do lat.<br>";
        if(mysqli_num_rows($result)>0)
        {    
            $i = 0;
            echo "<ol>";
            while ($row = mysqli_fetch_assoc($result))
            {
                echo "<li>".$row['imie']." ".$row['nazwisko']." ".$row['wiek']." lat.</li>";
            }
            echo "</ol>";
        } else { 
            echo "Brak wyników";
        }
    
    mysqli_close($conn);


    ?>
</body>
</html>