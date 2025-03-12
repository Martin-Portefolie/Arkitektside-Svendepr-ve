import { Controller } from "@hotwired/stimulus";

export default class extends Controller {
    static targets = ["logo", "menu"];
    

    connect() {
        window.addEventListener("scroll", this.handleScroll.bind(this));
        console.log("News Controller Connected!");
    }

    handleScroll() {
        const header = this.element;

        if (window.scrollY > 50) {
            header.classList.add("scrolled");
        } else {
            header.classList.remove("scrolled");
        }
    }

    toggleMenu() {
        this.menuTarget.classList.toggle("hidden");
        this.menuTarget.classList.toggle("show");
    }
}
