<?php
    require 'includes/database.php';
    require 'includes/getIp.php';

    if (isset($_GET['id'])) {
        $id = htmlspecialchars($_GET['id']);
        $recup_book = $dbh->prepare('SELECT * FROM books WHERE id = ?');
        $recup_book->execute([$id]);
        $recup_book = $recup_book->fetch();
        $title = htmlspecialchars($recup_book['title']);
        $synopsis = htmlspecialchars($recup_book['synopsis']);
        $img = $recup_book['img'];
        $extract_autor = $dbh->prepare('SELECT * FROM autors WHERE id = ?');
        $extract_autor->execute([$recup_book['id_autor']]);
        $autor = htmlspecialchars($extract_autor->fetch()['name']);

    }else{
        header('Location: /books');
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
    <link rel="stylesheet" href="/css/book.css">

</head>
<body>
    <header>
        <?php require "includes/header.php"; ?>
    </header>

    <div class="book">
        <ul>
            <li class="title">Couverture</li>
            <li class="title">Titre</li>
            <li class="title">Synopsis</li>
            <li class="title">Auteur</li>
        </ul>
        <ul class="list-ul">
            <li class="book-li logo">
                <img src="<?= $img ?>" alt="">
            </li>
            <li class="book-li">
                <?= $title ?>
            </li>
            <li class="book-li">
                <?= $synopsis ?>
            </li>
            <li class="book-li">
                <?= $autor ?>
            </li>
        </ul>
    </div>
    <footer>
        <?php require "includes/footer.php"; ?>
    </footer>
    
</body>
</html>