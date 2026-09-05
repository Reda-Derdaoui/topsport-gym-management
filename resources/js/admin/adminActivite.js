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
            throw new Error("Erreur HTTP : " + response.status);
        }

        const activite = await response.json();

        console.log("ACTIVITE:", activite);

        // Fill basic information
        document.getElementById("activiteId").value = activite.id;
        document.getElementById("editLibelle").value = activite.Libelle;

        // Type
        document.getElementById("editType").value = activite.type_activite_id;

        // Entraîneur
        document.getElementById("editEntraineur").value =
            activite.entraineur_id ?? "";

        // IMPORTANT: set UPDATE URL
        document.getElementById("activiteForm").action =
            `/admin/activities/${id}`;

        console.log(
            "FORM ACTION:",
            document.getElementById("activiteForm").action,
        );

        // Planning
        const planningSelect = document.getElementById("editPlanning");

        Array.from(planningSelect.options).forEach((option) => {
            option.selected = false;
        });

        const planningIds = (activite.planning ?? []).map((planning) =>
            Number(planning.id),
        );

        Array.from(planningSelect.options).forEach((option) => {
            if (planningIds.includes(Number(option.value))) {
                option.selected = true;
            }
        });

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
