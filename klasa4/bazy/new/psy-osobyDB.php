<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PSY</title>
</head>
<body>
    <form>
        <select name="rasa">
            <option value="%">wszystkie rasy</option>
    <?php
    
    require 'connectPSY.php';

    $sql = "SELECT DISTINCT rasa FROM psy ORDER BY rasa;";
    $result = mysqli_query($conn,$sql);

    
    
    while($row = mysqli_fetch_assoc($result)) {
        echo "<option>".$row['rasa']."</option>\n";
    }
   
    ?>
        </select>
        <br>
        <select name="osoby">
            <option value="%">wszystkie osoby</option>
    <?php
    $sql = "SELECT * FROM osoby ORDER BY nazwisko, imię;";
    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_assoc($result)) {
        echo "<option value=".$row['id'].">".$row['imię']." ".$row['nazwisko']."</option>\n";
    }
    
    ?>
        </select>
        <input type="submit">
    </form>
    <ol>
    <?php
    $sqlnew = "";
    if(isset($_GET['rasa'])) {
        $rasa = $_GET['rasa'];
        $id = $_GET['osoby'];
        if($id != "%") {
            $sqlnew = "WHERE osoby.id LIKE '$id'";
        }
        if ($rasa != "%") {
            
            $sqlnew = "WHERE rasa LIKE '$rasa'";
        }
        if (($rasa != '%') && ($id != '%')) {
            $sqlnew = "WHERE rasa LIKE '$rasa' AND osoby.id LIKE '$id'";
        }

    }

    $sql = "SELECT * FROM psy JOIN osoby ON psy.id_osoby = osoby.id $sqlnew;";
    $result = mysqli_query($conn,$sql);

    while($row = mysqli_fetch_assoc($result)) {
        echo "<li>".$row['płeć']." rasy ".$row['rasa'].", ".$row['wiek']." lat, ma "
        .$row['medale']." medali. Właściciele; ".$row['imię']." ".$row['nazwisko'].".</li>\n";
    }
   

    mysqli_close($conn);
    ?>
    </ol>
</body>
</html>