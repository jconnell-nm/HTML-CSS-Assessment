document.addEventListener("DOMContentLoaded", function () {
    initSidebarToggle();
    initHeroCarousel();
    initCookieBanner();
    initResponsiveServicesNav();

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
    const stickyHeader = document.getElementById("stickyHeader");
    const pageContent = document.querySelector(".page-content");

    if (!stickyHeader || !pageContent) return;

    let lastScrollY = window.scrollY;

    function updateStickyHeader() {
        const currentScrollY = window.scrollY;
        const headerHeight = stickyHeader.offsetHeight;

        if (currentScrollY > 0) {
            stickyHeader.classList.add("is-sticky");
            pageContent.style.paddingTop = headerHeight + "px";
        } else {
            stickyHeader.classList.remove("is-sticky");
            stickyHeader.classList.remove("is-hidden");
            pageContent.style.paddingTop = "0";
        }

        if (currentScrollY > lastScrollY && currentScrollY > headerHeight) {
            stickyHeader.classList.add("is-hidden");
        } else {
            stickyHeader.classList.remove("is-hidden");
        }

        lastScrollY = currentScrollY;
    }

    window.addEventListener("scroll", updateStickyHeader);
    window.addEventListener("resize", updateStickyHeader);

    updateStickyHeader();
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

function initSidebarToggle() {
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
}

function initCookieBanner() {
    const cookieBanner = document.getElementById("cookieBanner");
    const acceptButton = document.getElementById("cookieAccept");
    const declineButton = document.getElementById("cookieDecline");

    if (!cookieBanner) return;

    const cookieConsent = localStorage.getItem("cookieConsent");

    function openBanner() {
        cookieBanner.classList.remove("cookie-banner--hidden");
        document.body.classList.add("cookie-modal-open");
    }

    function closeBanner() {
        cookieBanner.classList.add("cookie-banner--hidden");
        document.body.classList.remove("cookie-modal-open");
    }

    if (!cookieConsent) {
        openBanner();
    }

    if (acceptButton) {
        acceptButton.addEventListener("click", function () {
            localStorage.setItem("cookieConsent", "accepted");
            closeBanner();
        });
    }

    if (declineButton) {
        declineButton.addEventListener("click", function () {
            localStorage.setItem("cookieConsent", "declined");
            closeBanner();
        });
    }
}

function initResponsiveServicesNav() {
    const servicesNav = document.querySelector(".services_nav");
    const sidebarNav = document.querySelector(".mobile-sidebar__nav");
    const contactButton = sidebarNav.querySelector(".mobile-sidebar__contact-btn");
    const originalServicesSection = sidebarNav.querySelector(".mobile-sidebar__services");

    if (!servicesNav || !sidebarNav || !contactButton) return;

    const originalContainer = servicesNav.parentElement;
    const originalNextSibling = servicesNav.nextElementSibling;

    const mediaQuery = window.matchMedia("(max-width: 992px)");

    function updateNavLocation(e) {
        const isMobile = e.matches;

        if (isMobile) {
            if (servicesNav.parentElement !== sidebarNav) {
                sidebarNav.insertBefore(servicesNav, contactButton.nextSibling);
            }

            servicesNav.classList.add("services_nav--sidebar");

            if (originalServicesSection) {
                originalServicesSection.style.display = "none";
            }

            contactButton.classList.add("is-visible");
        } else {
            if (servicesNav.parentElement !== originalContainer) {
                if (originalNextSibling) {
                    originalContainer.insertBefore(servicesNav, originalNextSibling);
                } else {
                    originalContainer.appendChild(servicesNav);
                }
            }

            servicesNav.classList.remove("services_nav--sidebar");

            if (originalServicesSection) {
                originalServicesSection.style.display = "";
            }

            contactButton.classList.remove("is-visible");
        }
    }

    updateNavLocation(mediaQuery);
    mediaQuery.addEventListener("change", updateNavLocation);
}