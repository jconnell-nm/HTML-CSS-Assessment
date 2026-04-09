document.addEventListener("DOMContentLoaded", function () {
    initSidebarMenu();
    initHeroCarousel();

    // Smooth scroll for buttons
    const scrollButtons = document.querySelectorAll(".scroll-top-btn");
    scrollButtons.forEach(function (button) {
        button.addEventListener("click", function () {
            window.scrollTo({
                top: 0,
                behavior: "smooth",
            });
        });
    });
});

$(function () {
    initStickyHeader();
});

function initStickyHeader() {
  const $header = $(".site-header");
  const $pageContent = $(".page-content");
  const headerHeight = $header.outerHeight();

  $(window).on("scroll", function () {
    const isSticky = $(window).scrollTop() > 0;

    $header.toggleClass("is-sticky", isSticky);
    $pageContent.css("padding-top", isSticky ? headerHeight + "px" : "0");
  });
}

function initHeroCarousel() {
    const slides = document.querySelectorAll(".main-carousel .slide");
    const dots = document.querySelectorAll(".main-carousel .dot");

    if (!slides.length || !dots.length) return;

    let currentIndex = 0;

    function showSlide(index) {
        slides.forEach((slide, i) => {
            slide.classList.toggle("active", i === index);
        });

        dots.forEach((dot, i) => {
            dot.classList.toggle("active", i === index);
        });

        currentIndex = index;
    }

    dots.forEach((dot) => {
        dot.addEventListener("click", function () {
            const index = parseInt(this.dataset.slide, 10);
            showSlide(index);
        });
    });

    showSlide(0);
}

function initSidebarMenu() {
    const body = document.body;
    const menuTrigger = document.getElementById("menuTrigger");
    const mobileSidebar = document.getElementById("mobileSidebar");
    const sidebarOverlay = document.querySelector(".sidebar-overlay");

    function openMenu() {
        body.classList.add("menu-open");
        menuTrigger.setAttribute("aria-expanded", "true");
        mobileSidebar.setAttribute("aria-hidden", "false");
    }

    function closeMenu() {
        body.classList.remove("menu-open");
        menuTrigger.setAttribute("aria-expanded", "false");
        mobileSidebar.setAttribute("aria-hidden", "true");
    }

    function toggleMenu() {
        body.classList.contains("menu-open") ? closeMenu() : openMenu();
    }

    if (menuTrigger) {
        menuTrigger.addEventListener("click", toggleMenu);
    }

    if (sidebarOverlay) {
        sidebarOverlay.addEventListener("click", closeMenu);
    }

    document.addEventListener("keydown", function (e) {
        if (e.key === "Escape") {
            closeMenu();
        }
    });

    const mobileLinks = document.querySelectorAll(".mobile-sidebar a");
        mobileLinks.forEach(function (link) {
        link.addEventListener("click", closeMenu);
    });
}