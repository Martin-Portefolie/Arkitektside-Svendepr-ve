import { Controller } from "@hotwired/stimulus";

export default class extends Controller {
    static targets = ["email", "successMessage", "errorMessage"];

    subscribe(event) {
        event.preventDefault(); // Prevent full page reload

        const emailInput = this.emailTarget;
        const email = emailInput.value.trim();
        const successMessage = this.successMessageTarget;
        const errorMessage = this.errorMessageTarget;

        // Basic email validation
        if (!email || !email.includes("@") || email.length < 5) {
            emailInput.classList.add("border-red-500");
            emailInput.placeholder = "Ugyldig email!";
            emailInput.value = "";
            return;
        }

        emailInput.classList.remove("border-red-500");

        // Send the email via AJAX to Symfony
        fetch("/newsletter/subscribe", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-Requested-With": "XMLHttpRequest",
            },
            body: JSON.stringify({ email: email }),
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                successMessage.classList.remove("hidden");
                errorMessage.classList.add("hidden");
                emailInput.value = ""; // Clear input
            } else {
                successMessage.classList.add("hidden");
                errorMessage.classList.remove("hidden");
            }
        })
        .catch(() => {
            successMessage.classList.add("hidden");
            errorMessage.classList.remove("hidden");
        });
    }
}
