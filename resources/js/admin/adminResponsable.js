const closeResponsableModal = document.getElementById("closeResponsableModal");

// edite responsable
function openModal(id) {
    const modal = document.getElementById(id);
    modal.classList.remove("hidden");
    modal.classList.add("flex");
}

function closeModal(id) {
    const modal = document.getElementById(id);
    modal.classList.add("hidden");
    modal.classList.remove("flex");
}
document.querySelectorAll(".edit-responsable").forEach((button) => {
    button.addEventListener("click", function () {
        const id = this.dataset.id;
        editResponsable(id);
    });
});

async function editResponsable(id) {
    const response = await fetch(`/admin/responsables/${id}/edit`);

    console.log("Status:", response.status);

    const responsable = await response.json();

    document.getElementById("resId").value = responsable.id;

    document.getElementById("resNom").value = responsable.personne.Nom;

    document.getElementById("resPrenom").value = responsable.personne.Prenom;

    document.getElementById("resPhone").value = responsable.personne.Tele;

    document.getElementById("resDateNaissance").value =
        responsable.personne.DateNaissance;

    document.getElementById("responsableForm").action =
        `/admin/responsables/${id}`;

    openModal("responsableModal");
}

//window close

if (closeResponsableModal) {
    closeResponsableModal.addEventListener("click", function () {
        const modal = document.getElementById("responsableModal");
        if (modal) modal.classList.add("hidden");
    });
}
