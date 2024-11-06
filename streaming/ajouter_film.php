<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titre = $_POST['titre'];
    $duree = $_POST['duree'];
    $annee_sortie = $_POST['annee_sortie'];
    $id_real = $_POST['id_real'];

    createFilm($titre, $duree, $annee_sortie, $id_real);
    header("Location: films.php");
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un Film</title>
</head>
<body>
    <h1>Ajouter un Nouveau Film</h1>
    <form action="ajouter_film.php" method="post">
        <label for="titre">Titre :</label>
        <input type="text" name="titre" required><br>
        
        <label for="duree">Durée (en minutes) :</label>
        <input type="number" name="duree" required><br>
        
        <label for="annee_sortie">Année de Sortie :</label>
        <input type="number" name="annee_sortie" required><br>
        
        <label for="id_real">ID Réalisateur :</label>
        <input type="number" name="id_real" required><br>
        
        <button type="submit">Ajouter</button>
    </form>
</body>
</html>
