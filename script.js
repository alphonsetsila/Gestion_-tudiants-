$(document).ready(function () {
    let studentsData = [];

    function loadStudents() {
        $.ajax({
            url: 'actions/select.php',
            type: 'POST',
            dataType: 'json',
            success: function (data) {
                studentsData = data; // Stocke pour réutilisation
                let rows = '';
                data.forEach(student => {
                    rows += `<tr>
                        <td>${student.nom}</td>
                        <td>${student.prenom}</td>
                        <td>
                            <button class="btn btn-outline-dark btn-sm voir-btn" 
                                    data-nom="${student.nom}"
                                    data-prenom="${student.prenom}"
                                    data-email="${student.email}"
                                    data-telephone="${student.telephone}"
                                    data-date_naissance="${student.date_naissance}"
                                    data-filiere="${student.filiere}">
                                <i class="fas fa-eye">Voir</i>
                            </button>
                        </td>
                        <td>
                            <button class="btn btn-outline-dark btn-sm edit-btn" 
                                    data-bs-toggle="modal"
                                    data-bs-target="#modifierEtudiantModal"
                                    data-id="${student.id}">
                                <i class="fa fa-edit">Modifier</i>
                            </button>
                            <button class="btn btn-outline-dark btn-sm">Supprimer</button>
                        </td>
                    </tr>`;
                });
                $("tbody").html(rows);

                // Gestion bouton "Modifier"
                $('.edit-btn').on("click", function () {
                    const id = $(this).data("id");
                    const student = studentsData.find(s => s.id == id);
                    if (student) {
                        $("#etudiantId").val(student.id);
                        $("#nom_modif").val(student.nom);
                        $("#prenom_modif").val(student.prenom);
                        $("#email_modif").val(student.email);
                        $("#telephone_modif").val(student.telephone);
                        $("#naissance_modif").val(student.date_naissance);
                        $("#filiere_modif").val(student.filiere);
                    }
                });

                // Gestion bouton "Voir"
                $('.voir-btn').click(function () {
                    alert(`
                        Nom: ${$(this).data('nom')}
                        Prénom: ${$(this).data('prenom')}
                        Email: ${$(this).data('email')}
                        Téléphone: ${$(this).data('telephone')}
                        Date de naissance: ${$(this).data('date_naissance')}
                        Filière: ${$(this).data('filiere')}`);
                });
            }
        });
    }

    loadStudents();

    // Ajout étudiant
    $('.ajout').submit(function (e) {
        e.preventDefault();
        let values = $(this).serialize();
        $.ajax({
            url: 'actions/add.php',
            type: 'POST',
            data: values,
            success: function (data) {
                if (data =="success") {
                    alert("Succès : Étudiant ajouté!");   
                    loadStudents();
                } else {
                    alert("Erreur : " + data);
                }
            },
            error: function (xhr, error) {
                $('#test').html("<p class='text-red-500'>Erreur AJAX</p>");
            }
        });
     
    });

    // Recherche
    $("#test-target").on("keyup", function () {
        let search = $(this).val().toLowerCase();
        $("tbody tr").each(function () {
            let nom = $(this).find("td:nth-child(1)").text().toLowerCase();
            let prenom = $(this).find("td:nth-child(2)").text().toLowerCase();
            $(this).toggle(nom.includes(search) || prenom.includes(search));
        });
    });

    // Sauvegarde des modifications
    $("#sauvegarderModifications").on("click", function () {
        const formData = $("#formModification").serialize();
        $.ajax({
            url: "actions/modify.php",
            method: "POST",
            data: formData,
            dataType: "json",
            success: function (response) {
                if (response.success) {
                    $("#modifierEtudiantModal").modal("hide");
                    loadStudents();                     
                } else {
                    alert("Erreur : " + response.error);
                }
            },
            error: function (xhr, status, error) {
                alert("Erreur AJAX : " + error);
            }
        });
    });
});
