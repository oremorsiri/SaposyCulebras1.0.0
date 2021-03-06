<?php

    require 'database.php';

    if (!empty($_POST['email']) && !empty($_POST['password'])) {

        if($_POST['password'] == $_POST['confirm_password']) {

            $sql = "INSERT INTO brujas (email, password) VALUES (:email, :password)";
            $stmt = $connection->prepare($sql);
            $stmt->bindParam(':email', $_POST['email']);
            $password_hash = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $stmt->bindParam(':password', $password_hash);

            if ($stmt->execute()) {
                $message = 'Bienvenida al aquelarre';
            } else {
                $message = 'Rayos y retruecanos, alguna fuerza maligna ha impedido tu unión';
            }
        
        } else {
            $message = 'El santo y seña no coincide.';
        }
        
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <!-- CUSTOM CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Sign Up</title>
</head>

<body>
    
    <?php require 'partials/header.php' ?>
    
    <?php if(!empty($message)): ?>
        <p> <?= $message ?></p>
    <?php endif; ?>

    <section class="forms">
        <h1>Únete al aquelarre</h1>
        <span>or <a href="login.php">Login</a></span>
        
        <form action="signup.php" method="POST">
            <input name="email" type="text" placeholder="Introduce tu email">
            <input name="password" type="password" placeholder="Introduce tu password">
            <input name="confirm_password" type="password" placeholder="Confirma tu password">
            <input type="submit" value="Submit">
        </form>
    </section>
        
    <?php require 'partials/wave.php' ?>
</body>

</html>