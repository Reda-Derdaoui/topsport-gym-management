const closePlanningModal = document.getElementById("closePlanningModal");

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
document.querySelectorAll(".edit-planning").forEach((button) => {
    button.addEventListener("click", function () {
        const id = this.dataset.id;
        editPlanning(id);
    });
});

async function editPlanning(id) {
    const response = await fetch(`/admin/plannings/${id}/edit`);

    console.log("Status:", response.status);

    const planning = await response.json();

    document.getElementById("planningId").value = planning.id;

    document.getElementById("planningHeureDebut").value = planning.heure_debut;

    document.getElementById("planningHeureFin").value = planning.heure_fin;

    document.getElementById("planningJour").value = planning.jour_semain;

    document.getElementById("planningForm").action =
        `/admin/plannings/${id}`;

    openModal("planningModal");
}

//window close

if (closePlanningModal) {
    closePlanningModal.addEventListener("click", function () {
        const modal = document.getElementById("planningModal");
        if (modal) modal.classList.add("hidden");
    });
}
