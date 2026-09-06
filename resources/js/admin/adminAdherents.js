const modal = document.getElementById("admin-adherent-details-modal");
const adherentRows = document.querySelectorAll("tr.show-admin-adherent");

if (modal) {
    const fields = [
        "nom",
        "prenom",
        "tele",
        "date",
        "assurance",
        "responsable",
        "type",
        "debut",
        "fin",
        "prix",
        "activites",
    ];

    const closeModal = () => {
        modal.classList.add("hidden");
        modal.classList.remove("flex");
        modal.setAttribute("aria-hidden", "true");
        document.body.classList.remove("overflow-hidden");
    };

    adherentRows.forEach((row) => {
        row.addEventListener("click", () => {
            fields.forEach((field) => {
                const target = document.getElementById(`admin-show-${field}`);
                if (target) {
                    target.textContent = row.dataset[field] || "-";
                }
            });

            modal.classList.remove("hidden");
            modal.classList.add("flex");
            modal.setAttribute("aria-hidden", "false");
            document.body.classList.add("overflow-hidden");
        });
    });

    modal.querySelectorAll("[data-admin-modal-close]").forEach((element) => {
        element.addEventListener("click", closeModal);
    });

    document.addEventListener("keydown", (event) => {
        if (event.key === "Escape" && !modal.classList.contains("hidden")) {
            closeModal();
        }
    });
}
