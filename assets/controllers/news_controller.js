import { Controller } from "@hotwired/stimulus";

export default class extends Controller {
    static targets = ["project", "toggleButton"];

    toggle(event) {
        event.preventDefault();

        const button = event.currentTarget;
        const newsId = button.dataset.id;
        const projectElement = this.projectTargets.find(el => el.dataset.id === newsId);

        if (!projectElement) {
            console.warn("Project element not found!");
            return;
        }

        // Check if open
        const isOpen = projectElement.classList.contains("max-h-[1000px]");

        if (isOpen) {
            // Collapse
            projectElement.classList.remove("max-h-[1000px]", "opacity-100", "py-4");
            projectElement.classList.add("max-h-0", "opacity-0", "overflow-hidden");
            button.querySelector("span").textContent = "Læs mere";
            button.querySelector("svg").classList.remove("rotate-180");
        } else {
            // Expand
            projectElement.classList.remove("max-h-0", "opacity-0", "overflow-hidden");
            projectElement.classList.add("max-h-[1000px]", "opacity-100", "py-4");
            button.querySelector("span").textContent = "Vis mindre";
            button.querySelector("svg").classList.add("rotate-180");
        }
    }
}
