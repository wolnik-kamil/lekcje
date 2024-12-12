<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form>
        Wybierz agenta: 
        <select name="agent">
    <?php
    
    $conn = mysqli_connect("localhost", "root", "", "5ti_g1_nieruchomosci");

    $sql = "SELECT * from agenci;";
    $result = mysqli_query($conn, $sql);

    while($row=mysqli_fetch_assoc($result)) {
        echo "<option value=\"".$row['Id_agenta']."\">".$row['Imie']." ".$row['Nazwisko']."</option>";
    }

    ?>
        </select>
        <input type="submit">
    </form>
    <?php
    $sql_f = "
        DROP FUNCTION IF EXISTS ile_zarobil_agent;
        DELIMITER //
        CREATE FUNCTION if not EXISTS ile_zarobil_agent(agent INT) RETURNS INT
        BEGIN
            RETURN
            (SELECT SUM(cena) FROM oferty WHERE oferty.status = 'S' AND oferty.ID_agenta = agent);
        END//
        DELIMITER ;
        ";
    mysqli_query($conn, $sql_f);
    if(isset($_GET['agent'])) {
        $agent = $_GET['agent'];
        $sql_a = "SELECT ile_zarobil_agent($agent) as Zarobek;";
        $result = mysqli_query($conn, $sql_a);
        echo "Agent o id $agent zarobil - ".mysqli_fetch_assoc($result)['Zarobek'];
    }

    ?>
</body>
</html>