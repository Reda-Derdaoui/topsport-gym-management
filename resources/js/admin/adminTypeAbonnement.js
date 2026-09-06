const closeTypeAbonnementModal = document.getElementById(
    "closeTypeAbonnementModal",
);

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
document.querySelectorAll(".edit-typeActivite").forEach((button) => {
    button.addEventListener("click", function () {
        const id = this.dataset.id;
        editTypeActivitie(id);
    });
});

async function editTypeActivitie(id) {
    const response = await fetch(`/admin/typeAbonnements/${id}/edit`);

    console.log("Status:", response.status);

    const type_abonnement = await response.json();

    document.getElementById("typAbId").value = type_abonnement.id;

    document.getElementById("typAbLibelle").value = type_abonnement.Libelle;

    document.getElementById("typeAbonnementForm").action =
        `/admin/typeAbonnements/${id}`;

    openModal("typeAbonnementModal");
}

//window close

if (closeTypeAbonnementModal) {
    closeTypeAbonnementModal.addEventListener("click", function () {
        const modal = document.getElementById("typeAbonnementModal");
        if (modal) modal.classList.add("hidden");
    });
}
