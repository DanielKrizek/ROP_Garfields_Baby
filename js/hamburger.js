document.addEventListener("DOMContentLoaded", function() {
    const navbarMenu = document.querySelector(".navbar .links");
    const hamburgerBtn = document.querySelector(".hamburger-btn");
    const hideMenuBtn = document.createElement("span");
    hideMenuBtn.classList.add("hamburger-btn", "close");
    hideMenuBtn.innerHTML = '&times;'; // Přidání symbolu pro zavření
    navbarMenu.insertBefore(hideMenuBtn, navbarMenu.firstChild);
    
    const showPopupBtn = document.querySelector(".login-btn");
    const formPopup = document.querySelector(".form-popup");
    const hidePopupBtn = formPopup.querySelector(".close-btn");
    const signupLoginLink = formPopup.querySelectorAll(".bottom-link a");

    // Add main page link to mobile menu only if not on index.php
    if (!window.location.pathname.endsWith("index.php")) {
        const mainPageLink = document.createElement("li");
        mainPageLink.classList.add("mobile-only");
        mainPageLink.innerHTML = '<a href="../index.php">Hlavní stránka</a>';
        navbarMenu.insertBefore(mainPageLink, navbarMenu.firstChild);
    }

    // Show mobile menu
    hamburgerBtn.addEventListener("click", () => {
        navbarMenu.classList.toggle("show-menu");
        hideMenuBtn.style.display = 'block'; // Ensure close button is shown
    });

    // Hide mobile menu
    hideMenuBtn.addEventListener("click", () => {
        navbarMenu.classList.remove("show-menu");
        hideMenuBtn.style.display = 'none'; // Ensure close button is hidden
    });

    // Show login popup
    showPopupBtn.addEventListener("click", () => {
        document.body.classList.toggle("show-popup");
    });

    // Hide login popup
    hidePopupBtn.addEventListener("click", () => {
        document.body.classList.remove("show-popup");
    });

    // Show or hide signup form
    signupLoginLink.forEach(link => {
        link.addEventListener("click", (e) => {
            e.preventDefault();
            formPopup.classList[link.id === 'signup-link' ? 'add' : 'remove']("show-signup");
        });
    });
});