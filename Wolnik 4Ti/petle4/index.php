<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        ol {
            list-style-type: upper-roman;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        button{
            background: green;
            margin: 5px;
        }
        button:hover{
            opacity: 0.8;
        }

    </style>
    <script>
        function zmiana() {
            console.log(this)
        document.getElementsByTagName('button')[0].style.backgroundColor = "red";
        }
    </script>
</head>
<body>
    <form>

    liczba miejsc w kinie <input type="number" value="100" min="10" max="1000" name="kino"><br>
    liczba miejsc w rzedzie <input type="number" min="5" value="10" max="20" name="mwr"><br>
    <input type="submit">

    </form>

    <?php
    
    if(isset($_GET['kino'])) {
        $miejsca=$_GET['kino'];
        $mwr = $_GET['mwr'];
        $rzedy = intval($miejsca/$mwr);
        echo "<ol>";
        for ($r=1;$r<=$rzedy;$r++) {
            echo "<li>";
            for ($m=1;$m<=$mwr;$m++){
                echo "<button onclick='zmiana()'>$m</button>";
            }
            echo "</li>";
        }
        if ($miejsca%$mwr>0){
        echo "<li>";
        
            for ($m=1;$m<=$miejsca%$mwr;$m++){
                echo "<button onclick='zmiana()'>$m</button>";
            }
        echo "</li>";
        }
        echo "</ol>";
    }
    
    ?>
</body>
</html>