<?php
    require '../includes/database.php';
    require '../includes/getIp.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/errors/404.css">
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/general.css">
    <title>Document</title>
</head>
<header>
    <?php require "../includes/header.php"; ?>
</header>

<body>
    <section class="notFound">
        <div class="img">
        <img src="https://assets.codepen.io/5647096/backToTheHomepage.png" alt="Back to the Homepage"/>
        <img src="https://assets.codepen.io/5647096/Delorean.png" alt="El Delorean, El Doc y Marti McFly"/>
        </div>
        <div class="text">
        <h1>404</h1>
        <h2>PAGE NOT FOUND</h2>
        <h3>BACK TO HOME?</h3>
        <a href="/" class="yes">YES</a>
        <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">NO</a>
        </div>
    </section>
    <footer>
        <?php require "/includes/footer.php"; ?>
    </footer>
</body>
</html>