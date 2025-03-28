document.addEventListener("DOMContentLoaded", function() {
    const navbarMenu = document.querySelector(".navbar .links");
    const hamburgerBtn = document.querySelector(".hamburger-btn");
    const hideMenuBtn = document.createElement("span");
    hideMenuBtn.classList.add("hamburger-btn", "close");
    hideMenuBtn.innerHTML = '&times;';
    navbarMenu.insertBefore(hideMenuBtn, navbarMenu.firstChild);
    
    const showPopupBtn = document.querySelector(".login-btn");
    const formPopup = document.querySelector(".form-popup");
    const hidePopupBtn = formPopup.querySelector(".close-btn");
    const signupLoginLink = formPopup.querySelectorAll(".bottom-link a");

    if (!window.location.pathname.endsWith("index.php")) {
        const mainPageLink = document.createElement("li");
        mainPageLink.classList.add("mobile-only");
        mainPageLink.innerHTML = '<a href="../index.php">Hlavní stránka</a>';
        navbarMenu.insertBefore(mainPageLink, navbarMenu.firstChild);
    }

    hamburgerBtn.addEventListener("click", () => {
        navbarMenu.classList.toggle("show-menu");
        hideMenuBtn.style.display = 'block';
    });

    hideMenuBtn.addEventListener("click", () => {
        navbarMenu.classList.remove("show-menu");
        hideMenuBtn.style.display = 'none';
    });

    showPopupBtn.addEventListener("click", () => {
        document.body.classList.toggle("show-popup");
    });

    hidePopupBtn.addEventListener("click", () => {
        document.body.classList.remove("show-popup");
    });

    signupLoginLink.forEach(link => {
        link.addEventListener("click", (e) => {
            e.preventDefault();
            formPopup.classList[link.id === 'signup-link' ? 'add' : 'remove']("show-signup");
        });
    });
});