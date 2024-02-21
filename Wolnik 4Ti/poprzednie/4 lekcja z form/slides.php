<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>

    <style>

        body {background-color: #222222; font-size: 24px; color: white;}

    </style>

    <script
            src="https://code.jquery.com/jquery-3.6.1.js"
            integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
            crossorigin="anonymous"></script>

    <script type="text/javascript">

        var numer = Math.floor(Math.random()*5+1)

        var timer1 = 0;
        var timer2 = 0;
        var timer3 = 0;

        function ustaw(nrsjaldu) {

            clearTimeout(timer1);
            clearTimeout(timer2);
            numer = nrsjaldu - 1;

            schowaj();
            timer3 = setTimeout("zmienslajd()", 500);

        }

        function schowaj() {
            $("#slider").stop();
            $("#slider").fadeOut(500);
        }

        function zmienslajd() {

            clearTimeout(timer3);
            numer++;if (numer>5)numer=1;

            var plik = "<img src=\"slajdy/slajd"+numer+".jpg\"/>";

            document.getElementById("slider").innerHTML = plik;
            $("#slider").fadeIn(500);

            timer1 = setTimeout("zmienslajd()", 5000);
            timer2 = setTimeout("schowaj()", 4750)

        }

    </script>
</head>
<?php
    
        if(!isset($_GET['janusz']) || $_GET['janusz']!='janusz12') {
            echo "acces denied";
            die();
        }
    
    ?>
<body onload="zmienslajd()">

    <span onclick="ustaw(1)" style="cursor: pointer">[ 1 ]</span>
    <span onclick="ustaw(2)" style="cursor: pointer">[ 2 ]</span>
    <span onclick="ustaw(3)" style="cursor: pointer">[ 3 ]</span>
    <span onclick="ustaw(4)" style="cursor: pointer">[ 4 ]</span>
    <span onclick="ustaw(5)" style="cursor: pointer">[ 5 ]</span>

    <div id="slider"></div>

</body>
</html>