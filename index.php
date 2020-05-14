<?php

  session_start();

  require 'database.php';

  if (isset($_SESSION['user_id'])) {
    $query = $connection->prepare('SELECT id, email, password FROM brujas WHERE id = :id');
    $query->bindParam(':id', $_SESSION['user_id']);
    $query->execute();
    $results = $query->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
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
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Vollkorn+SC&display=swap" rel="stylesheet">
    <!-- CUSTOM CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
    <title>Sapos y Culebras</title>
</head>

<body>
    <section>

    <?php require 'partials/header.php' ?>

        <div class="container">
            <div class="textos">
                <h1>Sapos y culebras</h1>
                <h2>Pócimas y encantamientos a domicilio online cerca de ti</h2>
                <a class="botonInicio" href="login.php">Bienvenida de nuevo</a>
                <a class="botonInicio" href="signup.php">Únete al aquelarre</a>
                <!-- <a class="botonInicio" href="#">Busca tu bruja más cercana</a> -->
            </div>
            <div>
                <img src="assets/media/witch-cauldron.png" alt="Caldero de bruja con ingredientes alrededor">
            </div>
        </div>
    </section>

    <!-- <audio class="audio" src="assets/media/AbuseInTheOrphanage.ogg">
        Tu navegador no soporta el elemento <code>audio</code>.
    </audio> -->
    <?php require 'partials/wave.php' ?>
    
</body>

</html>