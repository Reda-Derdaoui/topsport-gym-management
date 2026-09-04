const closeTypeActiviteModal = document.getElementById(
    "closeTypeActiviteModal",
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
    const response = await fetch(`/admin/typeActivities/${id}/edit`);

    console.log("Status:", response.status);

    const type_activite = await response.json();

    document.getElementById("typId").value = type_activite.id;

    document.getElementById("typLibelle").value = type_activite.Libelle;

    document.getElementById("typeActiviteForm").action =
        `/admin/typeActivities/${id}`;

    openModal("typeActiviteModal");
}

//window close

if (closeTypeActiviteModal) {
    closeTypeActiviteModal.addEventListener("click", function () {
        const modal = document.getElementById("typeActiviteModal");
        if (modal) modal.classList.add("hidden");
    });
}
