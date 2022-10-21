<?php
    require 'includes/database.php';
    require 'includes/getIp.php';

    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $recup_books = $dbh->prepare('SELECT * FROM books WHERE books.id_autor = ?');
        $recup_books->execute([$_GET['id']]);
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

    <div id="content">
        <table>
            <thead>
                <tr class="entete">
                    <th class="contenu">Titre</th>
                    <th class="contenu">Synopsis</th>
                    <th class="contenu">Auteur</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($i = $recup_books->fetch()){
                        $id = htmlspecialchars($i['id']);
                        $title =  htmlspecialchars($i['title']);
                        $synopsis = htmlspecialchars($i['synopsis']);
                        $autorid = htmlspecialchars($i['id_autor']);
                        $extract_autor = $dbh->prepare('SELECT * FROM autors WHERE id = ?');
                        $extract_autor->execute([$autorid]);
                        $autor = $extract_autor->fetch();
                        ?>
                        <tr>
                            <td class="contenu"><a href="<?= "/book/" . $id ?>"><?= $title ?></a></td>
                            <td class="contenu"><a href="<?= "/book/" . $id ?>"><?= $synopsis ?></a></td>
                            <td class="contenu"><a href="<?= "/autor/" . $autor['id'] ?>"><?= $autor['name'] ?></a></td><br>
                        </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <footer>
        <?php require "includes/footer.php"; ?>
    </footer>
</body>
</html>