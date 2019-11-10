<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <!-- CUSTOM CSS -->
    <link rel="stylesheet" href="assets/css/general.css">
    <title>Sign Up</title>
</head>

<body>
    
    <?php require 'partials/header.php' ?>
    
    <h1>Únete al aquelarre</h1>
    <span>or <a href="login.php">Login</a></span>

    <form action="signup.php" method="POST">
        <input name="email" type="text" placeholder="Introduce tu email">
        <input name="password" type="password" placeholder="Introduce tu password">
        <input name="confirm_password" type="password" placeholder="Confirma tu password">
        <input type="submit" value="Submit">
    </form>

    <?php require 'partials/wave.php' ?>

</body>

</html>