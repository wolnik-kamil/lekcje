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
            width: 100px;
            margin-top: 350px;
        }

        body {
            margin: 0;
            display: flex;
            justify-content: center;
        }


    </style>
</head>
<body>

    <?php
    
        

        if(isset($_POST['submit'])) {
            $login = $_POST['login'];
            $password = $_POST['password'];

            if($login=="janusz" && $password=="janusz12") {
                header('Location: form.php?login=janusz');
            }else {
                header('Location: form.php');
            }
        } else {
    
    ?>

    
    <form method="POST">
        <fieldset>
            <legend>Zaloguj</legend>
            <label for="log">Login:<input type="text" name="login" id="passwd"></label>
            <label for="passwd">Haslo:<input type="password" name="password" id="passwd"></label>
            <input type="submit" name="submit" id="sub" value="Zaloguj" size="5">
        </fieldset>
     </form> 

    <?php
    }
    ?>
</body>
</html>