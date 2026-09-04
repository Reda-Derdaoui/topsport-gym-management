const closeActiviteModal = document.getElementById("closeActiviteModal");

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
document.querySelectorAll(".edit-activite").forEach((button) => {
    button.addEventListener("click", function () {
        const id = this.dataset.id;
        editActivite(id);
    });
});

async function editActivite(id) {
    try {
        const response = await fetch(`/admin/activities/${id}/edit`);

        console.log("Status:", response.status);

        if (!response.ok) {
            throw new Error("Erreur lors de la récupération");
        }

        const activite = await response.json();

        // ID
        document.getElementById("activiteId").value = activite.id;

        // Libellé
        document.getElementById("libelleAct").value = activite.Libelle;

        // Type
        document.getElementById("type").value = activite.type_activite_id;

        // Entraîneur
        document.getElementById("entraineur").value =
            activite.entraineur_id ;

        // Planning
        const planningSelect = document.getElementById("planning");

        // Reset all options
        Array.from(planningSelect.options).forEach((option) => {
            option.selected = false;
        });

        // Get existing planning IDs
        const planningIds = activite.planning.map((planning) =>
            Number(planning.id),
        );

        // Select existing plannings
        Array.from(planningSelect.options).forEach((option) => {
            if (planningIds.includes(Number(option.value))) {
                option.selected = true;
            }
        });

        // IMPORTANT: use activiteForm
        document.getElementById("activiteForm").action =
            `/admin/activities/${id}`;

        // Open modal
        openModal("activiteModal");
    } catch (error) {
        console.error(error);

        alert("Impossible de récupérer l'activité.");
    }
}
//window close

if (closeActiviteModal) {
    closeActiviteModal.addEventListener("click", function () {
        const modal = document.getElementById("activiteModal");
        if (modal) modal.classList.add("hidden");
    });
}
