import { Controller } from "@hotwired/stimulus";

export default class extends Controller {
    connect() {
        window.addEventListener("scroll", this.toggleButtonVisibility.bind(this));
    }

    toggleButtonVisibility() {
        const scrollToTopButton = this.element;
        if (window.scrollY > 300) {
            scrollToTopButton.classList.remove("opacity-0");
            scrollToTopButton.classList.add("opacity-100");
        } else {
            scrollToTopButton.classList.remove("opacity-100");
            scrollToTopButton.classList.add("opacity-0");
        }
    }

    scrollToTop(event) {
        event.preventDefault();
        window.scrollTo({ top: 0, behavior: "smooth" });
    }
}
