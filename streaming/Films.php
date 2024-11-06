<?php
function createFilm($titre, $duree, $annee_sortie, $id_real) {
    global $pdo;
    $sql = "INSERT INTO films (titre, duree, annee_sortie, id_real) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$titre, $duree, $annee_sortie, $id_real]);
}

function readFilms() {
    global $pdo;
    $sql = "SELECT * FROM films ORDER BY annee_sortie DESC";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function updateFilm($id_film, $titre, $duree, $annee_sortie, $id_real) {
    global $pdo;
    $sql = "UPDATE films SET titre = ?, duree = ?, annee_sortie = ?, id_real = ? WHERE id_film = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$titre, $duree, $annee_sortie, $id_real, $id_film]);
}

function deleteFilm($id_film) {
    global $pdo;
    $sql = "DELETE FROM films WHERE id_film = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id_film]);
}

