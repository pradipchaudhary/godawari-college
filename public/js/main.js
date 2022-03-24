// Menu
const toggleButton = document.getElementsByClassName("toggle-button")[0];
const navbarLinks = document.getElementsByClassName("navbar-links")[0];

toggleButton.addEventListener("click", () => {
    navbarLinks.classList.toggle("active");
});

// Slider
$(".banner").owlCarousel({
    loop: true,
    margin: 10,
    nav: true,
    autoplay: true,
    animateOut: "fadeOut",
    autoplayTimeout: 10000,
    navText: [
        "<i class='fa-solid fa-arrow-right'></i>",
        "<i class='fa-solid fa-arrow-left'></i>",
    ],
    responsive: {
        0: {
            items: 1,
        },
        600: {
            items: 1,
        },
        1000: {
            items: 1,
        },
    },
});

// Testimonials
$(document).ready(function () {
    $("#testimonial-slider").owlCarousel({
        items: 2,
        // itemsDesktop: [1000, 2],
        // itemsDesktopSmall: [980, 1],
        // itemsTablet: [768, 1],
        // pagination: true,
        // navigation: true,
        // navigationText: ["<", ">"],
        loop: true,
        autoplay: true,
        autoplayTimeout: 7000,
        mouseDrag: true,
        // autoPlay: true,
    });
});
