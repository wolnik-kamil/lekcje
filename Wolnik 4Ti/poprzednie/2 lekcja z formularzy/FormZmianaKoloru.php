<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        

        h1 {
            font-size: 100px;
        }

        body {
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>
<body>


    <?php
            if (isset($_GET['submit'])) {
                $napis = $_GET['napis'];
                $color = $_GET['color'];
                $letter = $_GET['letter'];
                echo "<h1>$napis</h1>";
            } else {
        ?>

    <form>

        <input type="text" name="napis"><br>
        <label for="color">Zmien kolor tła: <input type="color" name="color"></label><br>
        <label for="letter">Zmien kolor napisu <input type="color" name="letter"></label><br>
        <input type="submit" value="Accept" name="submit">
    </form>

    <?php
        
        }
    ?>

</body>

    <style>

        <?php 
        
            echo "body {background-color: $color; color: $letter;}";
        
        ?>

    </style>

</html>