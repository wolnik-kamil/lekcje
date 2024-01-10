<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table, td, th {
            border: 1px solid black;
            border-collapse: collapse;
        }
        
    </style>
</head>
<body>
    <table>
        <tr>
            <th>n</th>
            <th>n&sup2</th>
        </tr>
    <?php
    if(isset($_GET['submit'])){
        $liczba = $_GET['liczba'];
        for($i=1; $i<=$liczba ; $i++){
            echo "
            <tr>
                <td>$i</td>
                <td>",$i**2,"</td>
            </tr>\n";
        }
     } else {

    
    ?>
    </table>

    <form>
        <label>Podaj liczbe<input type="number" name="liczba"></label>
        <input type="submit" name="submit">
    </form>
    <?php
        }
    ?>
</body>
</html>