<!DOCTYPE html>
<?php
setcookie("test",1);
if(isset($_COOKIE['ktoryraz'])){
    if(isset($_COOKIE['licznik']))
    $ktoryraz = $_COOKIE['ktoryraz'];
    else
    $ktoryraz = $_COOKIE['ktoryraz']+1;
}
else 
    $ktoryraz = 1;
setcookie("ktoryraz",$ktoryraz,time()+365*24*3600);
setcookie("czas",time(),time()+365*24*3600);
setcookie("licznik", 1);

if(isset($_GET['color'])) {
    $color = $_GET['color'];
    setcookie("color",$color,time()+365*24*3600);
} else if(isset($_COOKIE['color'])) {
    $color = $_COOKIE['color'];
} else 
    $color = "#0000ff";

if(isset($_GET['Lcolor'])) {
    $Lcolor = $_GET['Lcolor'];
    setcookie("Lcolor",$Lcolor,time()+365*24*3600);
} else if(isset($_COOKIE['Lcolor'])) {
    $Lcolor = $_COOKIE['Lcolor'];
} else 
    $Lcolor = "#ff0000";

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-color: <?php echo $color; ?>;
            color: <?php echo $Lcolor; ?>;
        }
        fieldset {
            width: max-content;
        }
        form {
            position: fixed;
            right: 0px;
            top: 0px;
            background: <?php echo $color; ?>;
            z-index: 0;
        }
    </style>
</head>
<body>
    <form>
        <fieldset>
            <input type="color" name="color" value="<?php echo $color; ?>"> <--Zmien kolor tła<br>
            <input type="color" name="Lcolor" value="<?php echo $Lcolor; ?>"> <--Zmien kolor liter<br>
            <input type="submit">
        </fieldset>
    </form>
    <?php
        echo "Witaj! Jestes tu po raz $ktoryraz.<br>"; 
        if ($ktoryraz>1){
            echo "Ostatnio byleś tu: ".date("Y-m-d H:i:s", $_COOKIE['czas']);
        }
        var_dump($_COOKIE);
    ?>
    
</body>
</html>