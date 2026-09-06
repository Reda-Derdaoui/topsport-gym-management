const modal = document.querySelector("#edit-adherent-modal");
const editForm = document.querySelector("#edit-adherent-form");
const editButtons = document.querySelectorAll(".edit-adherent");
const showModal = document.querySelector("#show-adherent-modal");
const adherentRows = document.querySelectorAll("[data-adherent-row]");

if (modal && editForm) {
    const closeModal = () => {
        modal.classList.add("hidden");
        modal.classList.remove("flex");
        modal.setAttribute("aria-hidden", "true");
        document.body.classList.remove("overflow-hidden");
    };

    const openModal = (button) => {
        const fields = {
            nom: button.dataset.nom,
            prenom: button.dataset.prenom,
            tele: button.dataset.tele,
            date: button.dataset.date,
            prixAssurance: button.dataset.assurance,
            typeAbon: button.dataset.typeAbonnement,
            dateDebut: button.dataset.dateDebut,
            prixAbonnement: button.dataset.prixAbonnement,
            activite: button.dataset.activite,
        };

        Object.entries(fields).forEach(([name, value]) => {
            const field = editForm.elements[name];
            if (field) {
                field.value = value || "";
            }
        });

        editForm.action = `${editForm.dataset.baseUrl}/${button.dataset.id}`;
        modal.classList.remove("hidden");
        modal.classList.add("flex");
        modal.setAttribute("aria-hidden", "false");
        document.body.classList.add("overflow-hidden");
        editForm.elements.nom.focus();
    };

    editButtons.forEach((button) => {
        button.addEventListener("click", () => openModal(button));
    });

    modal.querySelectorAll("[data-modal-close]").forEach((element) => {
        element.addEventListener("click", closeModal);
    });

    document.addEventListener("keydown", (event) => {
        if (event.key === "Escape" && !modal.classList.contains("hidden")) {
            closeModal();
        }
    });
}

if (showModal) {
    const showFields = {
        nom: "nom",
        prenom: "prenom",
        tele: "tele",
        date: "date",
        assurance: "assurance",
        responsable: "responsable",
        "type-abonnement": "typeLabel",
        "prix-abonnement": "prixAbonnement",
        "date-debut": "dateDebut",
        "date-fin": "dateFin",
        activites: "activites",
    };

    const closeShowModal = () => {
        showModal.classList.add("hidden");
        showModal.classList.remove("flex");
        showModal.setAttribute("aria-hidden", "true");
        document.body.classList.remove("overflow-hidden");
    };

    const openShowModal = (button) => {
        Object.entries(showFields).forEach(([field, datasetKey]) => {
            const target = showModal.querySelector(`#show-${field}`);
            if (target) {
                target.textContent = button.dataset[datasetKey] || "-";
            }
        });

        showModal.classList.remove("hidden");
        showModal.classList.add("flex");
        showModal.setAttribute("aria-hidden", "false");
        document.body.classList.add("overflow-hidden");
    };

    adherentRows.forEach((row) => {
        row.addEventListener("click", (event) => {
            if (event.target.closest("button, form, a")) {
                return;
            }

            const editButton = row.querySelector(".edit-adherent");
            if (editButton) {
                openShowModal(editButton);
            }
        });
    });

    showModal.querySelectorAll("[data-show-modal-close]").forEach((element) => {
        element.addEventListener("click", closeShowModal);
    });

    document.addEventListener("keydown", (event) => {
        if (event.key === "Escape" && !showModal.classList.contains("hidden")) {
            closeShowModal();
        }
    });
}
