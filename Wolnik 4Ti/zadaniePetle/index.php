<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        label {
            display: block;
        }

        fieldset {
            width: 200px;
        }

        table, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        table {
            margin: 0 auto;
            width: 500px;
            height: 500px;
            text-align: center;
            font-size: 50px;
        }
        tr:first-child{
            background-color: aqua;
        }

        td:first-child {
            background-color: aqua;
        }
    </style>
</head>
<body>
    <form>
        <fieldset>
            <label>x: <input type="number" name="x"></label>
            <label>y: <input type="number" name="y"></label>
            <input type="submit" name="submit">
        </fieldset>
    </form>
    <?php
    
    if(isset($_GET['submit'])){
        $x=$_GET['x'];
        $y=$_GET['y'];
        echo "<table>";

        for($i=1;$i<=$y;$i++){
            echo "<tr>";
            
            echo "<td>$i</td>";
            for($j=2;$j<=$x;$j++){
                echo "<td>".$j*$i."</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }
    
    ?>
    
</body>
</html>