<?php
    require 'includes/database.php';
    require 'includes/getIp.php';

    if (isset($_GET['search']) && !empty($_GET['search'])) {
        $id_autor = $dbh->prepare('SELECT id FROM autors WHERE name LIKE "%' . $_GET['search'] . '%"');
        $id_autor->execute();
        $id_autor = $id_autor->fetch()['id'];
        $recup_books = $dbh->prepare('SELECT * FROM books WHERE title LIKE "%' . $_GET['search'] .' %" OR synopsis LIKE "' . $_GET['search'] . '%" OR id_autor LIKE "%' . $id_autor . '%"');
        $recup_books->execute();
    }else{
        $recup_books = $dbh->prepare('SELECT * FROM books ORDER BY id_autor');
        $recup_books->execute();
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
    <link rel="stylesheet" href="/css/login.css">
</head>
<body>
    <header>
        <?php require "includes/header.php"; ?>
    </header>

    <div id="content">
        <form method="get">
            <input type="search" name="search" class="input-general">
            <input type="submit" value="Search" class="input-general input-submit">
        </form>
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
                        ?><tr>
                            <td class="contenu"><a href="<?= "/book/" . $id ?>"><?= $title ?></a></td>
                            <td class="contenu"><a href="<?= "/book/" . $id ?>"><?= $synopsis ?></a></td>
                            <td class="contenu"><a href="<?= "/autor/" . $autor['id'] ?>"><?= $autor['name'] ?></a></td>
                        </tr> <?php } ?>
            </tbody>
        </table>
    </div>
    <footer>
        <?php require "includes/footer.php"; ?>
    </footer>
</body>
</html>