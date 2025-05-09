<?php
header('Content-Type: application/json');
include '../include/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id_modif'];
    $nom = $_POST['nom_modif'];
    $prenom = $_POST['prenom_modif'];
    $email = $_POST['email_modif'];
    $telephone = $_POST['telephone_modif'];
    $date_naissance = $_POST['naissance_modif'];
    $filiere = $_POST['filiere_modif'];

    $stmt = $conn->prepare("UPDATE etudiants SET nom = ?, prenom = ?, email = ?, telephone = ?, date_naissance = ?, filiere = ? WHERE id = ?");
    $stmt->bind_param("ssssssi", $nom, $prenom, $email, $telephone, $date_naissance, $filiere, $id);

    if ($stmt->execute()) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false, "error" => $stmt->error]);
    }

    $stmt->close();
}
?>
