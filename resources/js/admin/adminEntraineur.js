const items = document.querySelectorAll(".sidebar-link");
const closeEntraineurModal = document.getElementById("closeEntraineurModal");

document.addEventListener("DOMContentLoaded", function () {
    const activeClasses = [
        "bg-[#1B2A41]",
        "text-[#F8FAFC]",
        "border-[#3B82F6]",
    ];

    const inactiveClasses = ["text-[#A1A1AA]", "border-transparent"];

    items.forEach((item) => {
        const link = item.querySelector("a");
        const linkPath = new URL(link.href).pathname;
        const currentPath = window.location.pathname;

        // Always have the transition
        item.classList.add(
            "transition-all",
            "duration-400",
            "rounded-md",
            "p-2",
        );

        if (linkPath === currentPath) {
            item.classList.add(...activeClasses);
            item.classList.remove(...inactiveClasses);
        } else {
            item.classList.remove(...activeClasses);
            item.classList.add(...inactiveClasses);
        }
    });
});

// adite responsable
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
document.querySelectorAll(".edit-entraineur").forEach((button) => {
    button.addEventListener("click", function () {
        const id = this.dataset.id;
        editEntraineur(id);
    });
});

async function editEntraineur(id) {
    const response = await fetch(`/admin/entraineurs/${id}/edit`);

    console.log("Status:", response.status);

    const entraineur = await response.json();

    document.getElementById("entId").value = entraineur.id;

    document.getElementById("entNom").value = entraineur.personne.Nom;

    document.getElementById("entPrenom").value = entraineur.personne.Prenom;

    document.getElementById("entPhone").value = entraineur.personne.Tele;

    document.getElementById("entDateNaissance").value =
        entraineur.personne.DateNaissance;

    document.getElementById("entSpecialite").value =
        entraineur.Specialite;

    document.getElementById("entponsableForm").action =
        `/admin/entraineurs/${id}`;

    openModal("entraineurModal");
}

//window close

if (closeEntraineurModal) {
    closeEntraineurModal.addEventListener("click", function () {
        const modal = document.getElementById("entraineurModal");
        if (modal) modal.classList.add("hidden");
    });
}
