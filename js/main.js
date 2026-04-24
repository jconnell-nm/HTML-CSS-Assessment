document.addEventListener("DOMContentLoaded", function () {
    initSidebarToggle();
    initHeroCarousel();
    initCookieBanner();
    initResponsiveServicesNav();
    initInfiniteSliders();
    initSmoothScroll();
    initContactAccordion();
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
    const carousel = document.querySelector(".main-carousel");
    const slides = document.querySelectorAll(".main-carousel .slide");
    const dots = document.querySelectorAll(".main-carousel .dot");

    if (!carousel || !slides.length || !dots.length) return;

    let currentIndex = 0;
    let autoPlay = null;
    const interval = 5000;

    function showSlide(index) {
        slides.forEach((slide, i) => {
            const isActive = i === index;
            slide.classList.toggle("active", isActive);
            slide.setAttribute("aria-hidden", String(!isActive));
        });

        dots.forEach((dot, i) => {
            const isActive = i === index;
            dot.classList.toggle("active", isActive);
            dot.setAttribute("aria-pressed", String(isActive));
        });

        currentIndex = index;
    }

    function nextSlide() {
        showSlide((currentIndex + 1) % slides.length);
    }

    function startAutoPlay() {
        stopAutoPlay();
        autoPlay = setInterval(nextSlide, interval);
    }

    function stopAutoPlay() {
        if (autoPlay) {
            clearInterval(autoPlay);
            autoPlay = null;
        }
    }

    dots.forEach((dot) => {
        dot.addEventListener("click", function () {
            const index = parseInt(this.dataset.slide, 10);
            showSlide(index);
            startAutoPlay();
        });
    });

    showSlide(0);
    startAutoPlay();
}

function initInfiniteSliders() {
    createSteppedSlider(".view-our-work .slider");
    createSteppedSlider(".company-slider .slider");
}

function createSteppedSlider(selector) {
    const stepDuration = 450;
    const pauseDuration = 1400;

    const slider = document.querySelector(selector);
    if (!slider) return;

    const track = slider.querySelector(".slider-track");
    if (!track) return;

    let stepIndex = 0;
    let originalCount = 0;
    let stepPositions = [];
    let timer = null;
    let paused = false;
    let resetTimer = null;

    function getOriginalItems() {
        const allItems = Array.from(track.children);

        return allItems.filter(function (item) {
            return !item.hasAttribute("data-clone");
        });
    }

    function clearClones() {
        track.querySelectorAll("[data-clone='true']").forEach(function (clone) {
            clone.remove();
        });
    }

    function buildTrack() {
        clearClones();

        const originalItems = getOriginalItems();
        originalCount = originalItems.length;

        if (!originalCount) return;

        originalItems.forEach(function (item) {
            const clone = item.cloneNode(true);
            clone.setAttribute("data-clone", "true");
            clone.setAttribute("aria-hidden", "true");

            clone.querySelectorAll("img").forEach(function (img) {
                img.setAttribute("alt", "");
            });

            track.appendChild(clone);
        });

        measureStepPositions();
        stepIndex = 0;
        jumpToStep(stepIndex, false);
    }

    function measureStepPositions() {
        const originalItems = getOriginalItems();
        stepPositions = [];

        if (!originalItems.length) return;

        const trackRect = track.getBoundingClientRect();

        originalItems.forEach(function (item) {
            const itemRect = item.getBoundingClientRect();
            const offsetLeft = itemRect.left - trackRect.left;
            stepPositions.push(offsetLeft);
        });
    }

    function jumpToStep(index, animate = true) {
        if (!stepPositions.length) return;

        const safeIndex = Math.max(0, Math.min(index, stepPositions.length - 1));
        const targetX = stepPositions[safeIndex];

        track.style.transition = animate
            ? `transform ${stepDuration}ms ease`
            : "none";

        track.style.transform = `translate3d(-${targetX}px, 0, 0)`;
    }

    function scheduleNextStep() {
        clearTimeout(timer);
        clearTimeout(resetTimer);

        if (paused|| !originalCount || !stepPositions.length) {
            return;
        }

        timer = setTimeout(function () {
            stepIndex += 1;

            if (stepIndex < originalCount) {
                jumpToStep(stepIndex, true);
                scheduleNextStep();
                return;
            }

            jumpToStep(originalCount - 1, true);

            resetTimer = setTimeout(function () {
                stepIndex = 0;
                jumpToStep(stepIndex, false);
                scheduleNextStep();
            }, stepDuration);
        }, pauseDuration);
    }

    function start() {
        stop();
        scheduleNextStep();
    }

    function stop() {
        clearTimeout(timer);
        clearTimeout(resetTimer);
    }

    function rebuild() {
        stop();
        buildTrack();

        if (!paused) {
            start();
        }
    }

    function waitForImages() {
        const images = track.querySelectorAll("img");

        const promises = Array.from(images).map(function (img) {
            if (img.complete) return Promise.resolve();

            return new Promise(function (resolve) {
                img.addEventListener("load", resolve, { once: true });
                img.addEventListener("error", resolve, { once: true });
            });
        });

        Promise.all(promises).then(rebuild);
    }

    slider.addEventListener("mouseenter", function () {
        paused = true;
        stop();
    });

    slider.addEventListener("mouseleave", function () {
        paused = false;
        start();
    });

    slider.addEventListener("focusin", function () {
        paused = true;
        stop();
    });

    slider.addEventListener("focusout", function () {
        paused = false;
        start();
    });

    waitForImages();
}

function initSidebarToggle() {
    const body = document.body;
    const menuTrigger = document.getElementById("menuTrigger");
    const mobileSidebar = document.getElementById("mobileSidebar");
    const sidebarOverlay = document.querySelector(".sidebar-overlay");

    console.log(mobileSidebar);

    if (!menuTrigger || !mobileSidebar || !sidebarOverlay) return;

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

    if (!servicesNav || !sidebarNav) return;

    const contactButton = sidebarNav.querySelector(".mobile-sidebar__contact-btn");
    const originalServicesSection = sidebarNav.querySelector(".mobile-sidebar__services");

    if (!contactButton || !originalServicesSection) return;

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
function initSmoothScroll() {
    const scrollButtons = document.querySelectorAll(".scroll-top-btn");

    if (!scrollButtons.length) return;

    scrollButtons.forEach(function (button) {
        button.addEventListener("click", function () {
            window.scrollTo({
                top: 0,
                behavior: "smooth",
            });
        });
    });
}

function initContactAccordion() {
    const accordion = document.querySelector(".contact-details__accordion");

    if (!accordion) return;

    const toggle = accordion.querySelector(".contact-details__toggle");
    const content = accordion.querySelector(".contact-details__content");

    if (!toggle || !content) return;

    // Start closed
    content.style.height = "0px";
    content.style.overflow = "hidden";

    toggle.addEventListener("click", () => {
        const isOpen = accordion.classList.contains("is-open");

        if (isOpen) {
            // CLOSE
            content.style.height = content.scrollHeight + "px"; // set current height
            requestAnimationFrame(() => {
                content.style.height = "0px";
            });
            accordion.classList.remove("is-open");
        } else {
            // OPEN
            content.style.height = content.scrollHeight + "px";
            accordion.classList.add("is-open");
        }
    });

    // Clean up inline height after opening (so content can resize naturally)
    content.addEventListener("transitionend", (e) => {
        if (e.propertyName !== "height") return;

        if (accordion.classList.contains("is-open")) {
            content.style.height = "auto";
        }
    });
}