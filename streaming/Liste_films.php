<?php

require 'db.php';
$films = readFilms();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Films</title>
</head>
<body>
    <h1>Liste des Films</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Titre</th>
            <th>Durée</th>
            <th>Année de Sortie</th>
            <th>Réalisateur</th>
        </tr>
        <?php foreach ($films as $film): ?>
            <tr>
                <td><?= htmlspecialchars($film['id_film']); ?></td>
                <td><?= htmlspecialchars($film['titre']); ?></td>
                <td><?= htmlspecialchars($film['duree']); ?> min</td>
                <td><?= htmlspecialchars($film['annee_sortie']); ?></td>
                <td><?= htmlspecialchars($film['id_real']); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
