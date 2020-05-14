<?php

  session_start();

  if (isset($_SESSION['user_id'])) {
    header('Location: index.php');
  }

  require 'database.php';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $query = $connection->prepare('SELECT id, email, password FROM brujas WHERE email = :email');
    $query->bindParam(':email', $_POST['email']);
    $query->execute();
    $results = $query->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
      $_SESSION['user_id'] = $results['id'];
      header("Location: index.php");
    } else {
      $message = 'Lo sentimos, el santo y seña es incorrecto.';
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
    <title>Login</title>
</head>

<body>
    
    <?php require 'partials/header.php' ?>

    <?php if(!empty($message)): ?>
        <p> <?= $message ?></p>
    <?php endif; ?>

    <section class="forms">
        <h1>Bienvenida de nuevo</h1>
        <span>or <a href="signup.php">Únete al aquelarre</a></span>

        <form action="login.php" method="POST">
            <input name="email" type="text" placeholder="Introduce tu email">
            <input name="password" type="password" placeholder="Introduce tu password">
            <input type="submit" value="Submit">
        </form>
    </section>

    <?php require 'partials/wave.php' ?>
</body>

</html>