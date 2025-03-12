import { Controller } from "@hotwired/stimulus";

export default class extends Controller {
    static targets = ["slide"];
    index = 0;

    connect() {
        this.showSlide(this.index);
        this.startAutoSlide();
    }

    startAutoSlide() {
        setInterval(() => {
            this.nextSlide();
        }, 5000); // Change slide every 5 seconds
    }

    showSlide(index) {
        this.slideTargets.forEach((slide, i) => {
            slide.classList.toggle("opacity-100", i === index);
            slide.classList.toggle("opacity-0", i !== index);
        });
    }

    nextSlide() {
        this.index = (this.index + 1) % this.slideTargets.length;
        this.showSlide(this.index);
    }
}
