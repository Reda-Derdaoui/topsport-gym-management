import "./admin/adminEntraineur";
import "./admin/adminResponsable";
import "./admin/adminTypeActivite";
import "./admin/adminTypeAbonnement";
import "./admin/adminPlanning";
import "./admin/adminActivite";

const items = document.querySelectorAll(".sidebar-link");
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
        item.classList.add("rounded-md", "p-2");

        if (linkPath === currentPath) {
            item.classList.add(...activeClasses);
            item.classList.remove(...inactiveClasses);
        } else {
            item.classList.remove(...activeClasses);
            item.classList.add(...inactiveClasses);
        }
    });
});
