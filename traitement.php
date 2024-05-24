<?php
// On test les données du $_POST
if (
    empty($_POST['titre']) ||
    empty($_POST['artiste']) ||
    empty($_POST['image']) ||
    !filter_var($_POST['image'], FILTER_VALIDATE_URL) ||
    empty($_POST['description']) ||
    strlen($_POST['description']) < 3
) {
    // Si une donnée est invalide, on affiche une alert, on redirige sur ajouter et on arrête le script
    echo '<script type="text/javascript">';
    echo 'alert("Les données fournies sont incomplètes ou invalides.");';
    echo 'window.location.href = "ajouter.php";';
    echo '</script>';
    exit();
} else {
    // Si les données sont valides, on les récupère dans des variables en échappant le code HTML
    $titre = htmlspecialchars($_POST['titre']);
    $artiste = htmlspecialchars($_POST['artiste']);
    $image = htmlspecialchars($_POST['image']);
    $description = htmlspecialchars($_POST['description']);
    // On envoi la nouvelle oeuvre en BDD
}
?>