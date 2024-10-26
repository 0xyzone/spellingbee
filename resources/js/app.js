import "./bootstrap";
import "flowbite";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

document.addEventListener("alpine:init", () => {
    Alpine.store("accordion", {
        tab: 0,
    });

    Alpine.data("accordion", (idx) => ({
        init() {
            this.idx = idx;
        },
        idx: -1,
        handleClick() {
            this.$store.accordion.tab =
                this.$store.accordion.tab === this.idx ? 0 : this.idx;
        },
        handleRotate() {
            return this.$store.accordion.tab === this.idx ? "rotate-180" : "";
        },
        handleToggle() {
            return this.$store.accordion.tab === this.idx
                ? `max-height: ${this.$refs.tab.scrollHeight}px`
                : "";
        },
    }));
});

$(document).ready(function () {
    $(".owl-carousel-sponsors").owlCarousel({
        loop: false,
        nav: false,
        dots: true,
        margin: 30,
        autoWidth: true,
        items: 6,
    });
});

// mobile responsive navbar
const openMobileNavButton = document.getElementById("open-mobile-nav");
if (openMobileNavButton) {
    console.log("clicked");
    openMobileNavButton.addEventListener("click", function () {
        document.getElementById("mobile-sidebar").classList.add("show");
    });
}

const closeMobileNavButton = document.getElementById("close-mobile-nav");
if (closeMobileNavButton) {
    closeMobileNavButton.addEventListener("click", function () {
        document.getElementById("mobile-sidebar").classList.remove("show");
    });
}

const closeMobileNavBlankRight = document.getElementById(
    "mobile-sidebar-right"
);
if (closeMobileNavBlankRight) {
    closeMobileNavBlankRight.addEventListener("click", function () {
        document.getElementById("mobile-sidebar").classList.remove("show");
    });
}
