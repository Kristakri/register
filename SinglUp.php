<?php

    include 'registration.php';
    include 'bd.php';
    $data = $_REQUEST;
    
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>
        <?php
           if (isset($data['do_singup'])){
                $user = new Registration($data['login'], $data['password'], $data['password_2'], $data['email'], $mysqli);
                $user->registration();
           }
        ?>

        <form action="<?=$_SERVER['SCRIPT_NAME']?>" method="POST">
            
            <p>
                <p><strong>Login:</strong></p>
                <input type="text" name="login">
            </p>
            
            <p>
                <p><strong>Password:</strong></p>
                <input type="text" name="password">
            </p>

            <p>
                <p><strong>Repeat password:</strong></p>
                <input type="text" name="password_2">
            </p>

            <p>
                <p><strong>Email:</strong></p>
                <input type="email" name="email">
            </p>

            <p>
                <input type="submit" name="do_singup" value="Done">
            </p>
        </form>
        
    </body>
</html>

