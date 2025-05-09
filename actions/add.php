<?php
  include '../include/config.php';
$message = ''; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
    $name = $_POST['nom'];
    $first = $_POST['first'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $date_naiss = $_POST['dates'];
    $filaree = $_POST['filiere'];
    
    $stmt = $conn->prepare("SELECT MAX(id) AS max_id FROM etudiants");
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    // Calculer le nouvel ID
    $new_id = $row['max_id'] + 1;
    
  
    $stmt = $conn->prepare("INSERT INTO etudiants (id, nom, prenom, email, telephone, date_naissance, filiere) VALUES (?,?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("issssss", $new_id, $name, $first, $email, $phone, $date_naiss, $filaree);

    if ($stmt->execute()) {
          echo "success";  
          exit();
    } else {
        echo "Erreur lors de l'ajout de l'étudiant.";  
    }

    $stmt->close();
}
?>  