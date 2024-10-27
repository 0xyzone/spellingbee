import "./bootstrap";
import "flowbite";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

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



gsap.registerPlugin(ScrollTrigger);

gsap.utils.toArray(".left-item").forEach((leftItem) => {
    gsap.fromTo(
        leftItem,
        { x: -100 },
        {
            x: 0,
            duration: 1.5,
            // ease: "power2.out",
            scrollTrigger: {
                trigger: leftItem,
                start: "top 80%",
                end: "top 30%",
                scrub: 2.5,
            },
        }
    );
});

gsap.utils.toArray(".right-item").forEach((rightItem) => {
    gsap.fromTo(
        rightItem,
        { x: 100 },
        {
            x: 0,
            duration: 1.5,
            // ease: "power2.out",
            scrollTrigger: {
                trigger: rightItem,
                start: "top 80%",
                end: "top 30%",
                scrub: 2.5,
            },
        }
    );
});
