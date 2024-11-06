<?php
function createActeur($nom, $prenom, $date_naissance, $role) {
    global $pdo;
    $sql = "INSERT INTO acteurs (nom, prenom, date_naissance, role) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nom, $prenom, $date_naissance, $role]);
}

function readActeurs() {
    global $pdo;
    $sql = "SELECT * FROM acteurs ORDER BY nom";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function updateActeur($id_acteur, $nom, $prenom, $date_naissance) {
    global $pdo;
    $sql = "UPDATE acteurs SET nom = ?, prenom = ?, date_naissance = ? WHERE id_acteur = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nom, $prenom, $date_naissance, $role, $id_acteur]);
}

function deleteActeur($id_acteur) {
    global $pdo;
    $sql = "DELETE FROM acteurs WHERE id_acteur = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id_acteur]);
}

