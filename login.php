<?php
    require 'includes/database.php';
    require 'includes/getIp.php';

    if (isset($_POST['submit']) && isset($_POST['email']) && isset($_POST['password'])) {
        $email = htmlspecialchars($_POST['email']);
        $password = $_POST['password'];
        if (!empty($email) && !empty($password)) {
            $verif = $dbh->prepare('SELECT ');
        }else{
            $error = "Veuillez renseignez tout les champs !";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Librairie de Joachim</title>
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/general.css">
    <link rel="stylesheet" href="/css/login.css">
</head>
<body>
    <header>
        <?php require "includes/header.php"; ?>
    </header>

    <div id="content">
        <form method="post">
            <input type="email" name="email" id="email" placeholder="exemple@uwu.fr" class="input-general" required>
            <input type="password" name="password" id="password" placeholder="Password" class="input-general" required>
            <input type="submit" value="Submit" name="submit" id="submit" class="input-general input-submit">
        </form>
    </div>
    <footer>
        <?php require "includes/footer.php"; ?>
    </footer>
</body>
</html>