<?php
include 'include/config.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Étudiants</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min">

    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/jQuery.js"></script>
</head>

<body class="bg-light"> 
    <!-- Conteneur pour afficher les informations de l'étudiant -->
<div id="popover-container" style="display: none; border: 1px solid #ccc; padding: 10px; margin-top: 20px;"></div>

    <div class="container mt-4">
        <div class="text-center">
            <h2 class="text-dark fw-bold">Gestion des Étudiants</h2>
        </div>

        <div class="d-flex justify-content-between my-3">
            <input type="text" id="test-target" class="form-control w-50" placeholder="🔍 Rechercher un étudiant..." />
            <button type="button" class="btn btn-outline-dark add" data-bs-toggle="modal" data-bs-target="#addStudentModal">
                <i class="fas fa-plus">Ajouter un étudiant</i> 
            </button>
        </div>

        <div id="test">
            <div class="table-responsive">
                <table class="table table-hover table-bordered text-center">
                    <thead class="table-light">
                        <tr>
                            <th>Prénom</th>
                            <th>Nom</th>
                            <th >Voir</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- dynamique depuis scripts -->
                    </tbody>
                </table>
            </div> 
        </div>
    </div>
    <div class="modal fade" id="addStudentModal" tabindex="-1" aria-labelledby="addStudentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 id="test"></h6>
                    <h5 class="modal-title" id="addStudentModalLabel">Ajouter un étudiant</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="ajout">
                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom</label>
                            <input type="text" class="form-control" name="nom" required>
                        </div>
                        <div class="mb-3">
                            <label for="first" class="form-label">Prénom</label>
                            <input type="text" class="form-control" name="first" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Téléphone</label>
                            <input type="text" class="form-control" name="phone" required>
                        </div>
                        <div class="mb-3">
                            <label for="dates" class="form-label">Date de naissance</label>
                            <input type="date" class="form-control" name="dates" required>
                        </div>
                        <div class="mb-3">
                            <label for="filiere" class="form-label">Filière</label>
                            <input type="text" class="form-control" name="filiere" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-outline-dark" id="add">Ajouter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> 
<div class="modal fade" id="modifierEtudiantModal" tabindex="-1" aria-labelledby="modifierEtudiantModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modifierEtudiantModalLabel">Modifier un étudiant</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="formModification">
            <input type="hidden" id="etudiantId" name="id_modif">
            <div class="mb-3">
              <label for="nom_modif" class="form-label">Nom</label>
              <input type="text" class="form-control" id="nom_modif" name="nom_modif" required>
            </div>
            <div class="mb-3">
              <label for="prenom_modif" class="form-label">Prénom</label>
              <input type="text" class="form-control" id="prenom_modif" name="prenom_modif" required>
            </div>
            <div class="mb-3">
              <label for="email_modif" class="form-label">Email</label>
              <input type="email" class="form-control" id="email_modif" name="email_modif" required>
            </div>
            <div class="mb-3">
              <label for="telephone_modif" class="form-label">Téléphone</label>
              <input type="tel" class="form-control" id="telephone_modif" name="telephone_modif" required>
            </div>
            <div class="mb-3">
              <label for="naissance_modif" class="form-label">Date de naissance</label>
              <input type="date" class="form-control" id="naissance_modif" name="naissance_modif" required>
            </div>
            <div class="mb-3">
              <label for="filiere_modif" class="form-label">Filière</label>
              <input type="text" class="form-control" id="filiere_modif" name="filiere_modif" required>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="sauvegarderModifications">Confirmer</button>
        </div>
      </div>
    </div>
  </div>
    <script src="script.js"></script>
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
