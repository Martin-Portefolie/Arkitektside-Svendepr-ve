import { Controller } from "@hotwired/stimulus";

export default class extends Controller {
    static targets = ["results", "input"];

    search(event) {
        event.preventDefault(); // Prevent full page reload

        const form = event.currentTarget;
        const searchValue = this.inputTarget.value.trim();

        // Construct the search URL dynamically
        const url = new URL(form.action, window.location.origin);

        if (searchValue) {
            url.searchParams.set("search", searchValue);
        } else {
            url.searchParams.delete("search"); // Remove search param if empty
        }

        url.hash = "News"; // Ensure it stays on the News section

        // Fetch search results via AJAX
        fetch(url, { headers: { "X-Requested-With": "XMLHttpRequest" } })
            .then(response => response.text())
            .then(html => {
                this.resultsTarget.innerHTML = html;
                history.pushState({}, "", url); // Update URL without reloading
            })
            .catch(error => console.error("Search failed:", error));
    }
}
