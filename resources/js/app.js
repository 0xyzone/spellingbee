import "./bootstrap";
import "flowbite";
import Alpine from "alpinejs";
import collapse from '@alpinejs/collapse';

// 1. Initialize Alpine
Alpine.plugin(collapse);
window.Alpine = Alpine;
Alpine.start();

// 2. Sponsor Carousel Logic
$(document).ready(function () {
    const sponsorCarousel = $(".owl-carousel-sponsors");
    if (sponsorCarousel.length) {
        sponsorCarousel.owlCarousel({
            loop: true,
            nav: false,
            dots: false,
            margin: 40,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            autoWidth: true,
            items: 6,
            responsive: {
                0: { items: 2 },
                600: { items: 4 },
                1000: { items: 6 }
            }
        });
    }
});

// 3. GSAP Scroll Animations
const initAnimations = () => {
    if (typeof gsap !== "undefined" && typeof ScrollTrigger !== "undefined") {
        gsap.registerPlugin(ScrollTrigger);

        // Slide in from left
        gsap.utils.toArray(".left-item").forEach((item) => {
            gsap.fromTo(item, 
                { x: -60, opacity: 0 },
                {
                    x: 0, opacity: 1, duration: 1, ease: "power2.out",
                    scrollTrigger: { trigger: item, start: "top 85%", toggleActions: "play none none reverse" }
                }
            );
        });

        // Slide in from right
        gsap.utils.toArray(".right-item").forEach((item) => {
            gsap.fromTo(item, 
                { x: 60, opacity: 0 },
                {
                    x: 0, opacity: 1, duration: 1, ease: "power2.out",
                    scrollTrigger: { trigger: item, start: "top 85%", toggleActions: "play none none reverse" }
                }
            );
        });
    }
};

window.addEventListener("load", initAnimations);