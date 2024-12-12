<!DOCTYPE html>
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
    <?php
        // $servername = "localhost";
        // $username = "root";
        // $password = "";
        // $dbname = "kwolnik4ti_psy";

        // $conn = mysqli_connect($servername, $username, $password, $dbname);
        // if(! $conn) {
        //     die("Połącznie nieudane.". mysqli_connect_error());
        // } else {
        //     echo "Połączenie udane";
        // }

        // mysqli_close($conn);
        // Normalnie 



        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "kwolnik4ti_psy";

        //$conn = new mysqli($servername, $username, $password, $dbname);
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        //if($conn->connect_error)
        if(!$conn)
            die("Połącznie nieudane.".$conn ->connect_error);
        
        echo "Połączenie udane. <br>";
        $sql = "SELECT * FROM `osoby` ORDER BY nazwisko, imię;";
        //$result = $conn->query($sql);
        $result = mysqli_query($conn,$sql);
        //if ($result->num_rows>0)
        if(mysqli_num_rows($result)>0)
        {
            echo "<table><tr><th>Lp.</th><th>ID</th><th>Imię</th><th>Nazwisko</th><th>NR. TEL.</th></tr>";
            //while ($row = $result->fetch_assoc()) 
            $i = 0;
            while ($row = mysqli_fetch_assoc($result))
            {
                
                $i++;
                echo "<tr><td>".$i."</td><td>".$row['id_osoby']."</td><td>".$row['imię']."</td><td>".$row['nazwisko']."</td><td>".$row['nr_tel']."</td></tr>";
            }
            echo "</table>";
        } else { 
            echo "Brak wyników";
        }

        //$conn->close();
        mysqli_close($conn);

        //obiektowo -> sa zakomentowane
    ?>
</body>
</html>