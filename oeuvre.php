<?php
    require 'header.php';
    require 'bdd.php';

    // Si l'URL ne contient pas d'id, on redirige sur la page d'accueil, sans déclancher de requête et on coupe le script
    if(empty($_GET['id'])) {
        header('Location: index.php');
        exit();
    }

    // récupération de la bonne oeuvre dans la BDD
    $bdd = connexionbdd();
    $requete = $bdd->prepare('SELECT * FROM oeuvres WHERE id = ?');
    $requete->execute([$_GET['id']]);
    $oeuvre = $requete->fetch();

    // Si aucune oeuvre trouvé, on redirige vers la page d'accueil et on coupe le script
    if($oeuvre === false) {
        header('Location: index.php');
        exit();
    }
?>

<article id="detail-oeuvre">
    <div id="img-oeuvre">
        <img src="<?= $oeuvre['image'] ?>" alt="<?= $oeuvre['titre'] ?>">
    </div>
    <div id="contenu-oeuvre">
        <h1><?= $oeuvre['titre'] ?></h1>
        <p class="description"><?= $oeuvre['artiste'] ?></p>
        <p class="description-complete">
             <?= $oeuvre['description'] ?>
        </p>
    </div>
</article>

<?php require 'footer.php'; ?>
