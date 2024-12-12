<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form action="form.php">
        <label>
            Nazwa tabeli <input type="text" name="nazwa">
        </label>
        <label>
            Ilość kolumn <input type="number" name="ilosc" value="4">
        </label>
        <input type="submit" name="submit" value="Wyślij">
    </form>

</body>
</html>
<?php

    // SELECT nazwa_p, cena, rodzina_zapachow 
    // FROM perfumy JOIN
    // (SELECT rodzina_zapachow AS rodzina, MIN(cena) as min_cena FROM perfumy GROUP BY rodzina_zapachow ) AS d
    // ON cena = min_cena AND perfumy.rodzina_zapachow = d.rodzina
    // ORDER BY rodzina_zapachow
    //
    // takie łone notatka sprawdzian moze ten tego.
    ?>