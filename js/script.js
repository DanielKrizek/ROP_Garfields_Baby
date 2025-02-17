const preklady = {
    "cz": {
        "navbar1": "Kočky",
        "navbar2": "Koťata",
        "navbar3": "Kocouři",
        "navbar4": "Kastráti",
        "navbar5": "Plán",
        "navbar6": "Fotogalerie",
        "navbar7": "Odchovy",
        "navbar8": "Novinky",
        "login": "PŘIHLÁSIT",
        "loginText1": "PŘIHLÁSIT SE",
        "email1": "Zadej email",
        "passw1": "Zadej heslo",
        "signupText": "Zaregistrovat se",
        "email2": "Zadej email",
        "passw2": "Zadej heslo",
        "registerButton": "Zaregistrovat se",
        "alreadyRegistered": "Už máš účet?",
        "notRegistered": "Ještě nejsi zaregistrovaný?",
        "loginBtn": "Přihlásit se"
    },
    
    "en": {
        "navbar1": "Cats",
        "navbar2": "Kittens",
        "navbar3": "Toms",
        "navbar4": "Neuters",
        "navbar5": "Plan",
        "navbar6": "Photo Gallery",
        "navbar7": "Litters",
        "navbar8": "News",
        "login": "LOGIN",
        "loginText1": "LOG IN",
        "email1": "Enter email",
        "passw1": "Enter password",
        "signupText": "Sign up",
        "email2": "Enter email",
        "passw2": "Enter password",
        "registerButton": "Register",
        "alreadyRegistered": "Already have an account?",
        "notRegistered": "Not registered yet?",
        "loginBtn": "Log in"
    }
};

const lang = document.querySelector('select');

const elements = {
    navbar1: document.getElementById("navbar1"),
    navbar2: document.getElementById("navbar2"),
    navbar3: document.getElementById("navbar3"),
    navbar4: document.getElementById("navbar4"),
    navbar5: document.getElementById("navbar5"),
    navbar6: document.getElementById("navbar6"),
    navbar7: document.getElementById("navbar7"),
    navbar8: document.getElementById("navbar8"),
    login: document.getElementById("login"),
    loginText1: document.getElementById("login-text1"),
    email1: document.getElementById("type-email1"),
    passw1: document.getElementById("type-passw1"),
    signupText: document.getElementById("login-text2"),
    email2: document.getElementById("type-email2"),
    passw2: document.getElementById("type-passw2"),
    registerButton: document.getElementById("loginBtn2"),
    alreadyRegistered: document.getElementById("bottom2"),
    notRegistered: document.getElementById("bottom1"),
    loginBtn: document.getElementById("loginBtn1")
};

lang.addEventListener("change", (event) => {
    setLanguage(event.target.value);
});

const setLanguage = (selectedLang) => {
    const translations = preklady[selectedLang];
    if (translations) {
        elements.navbar1.textContent = translations.navbar1;
        elements.navbar2.textContent = translations.navbar2;
        elements.navbar3.textContent = translations.navbar3;
        elements.navbar4.textContent = translations.navbar4;
        elements.navbar5.textContent = translations.navbar5;
        elements.navbar6.textContent = translations.navbar6;
        elements.navbar7.textContent = translations.navbar7;
        elements.navbar8.textContent = translations.navbar8;
        elements.login.textContent = translations.login;

        elements.loginText1.textContent = translations.loginText1;
        elements.email1.textContent = translations.email1;
        elements.passw1.textContent = translations.passw1;
        elements.signupText.textContent = translations.signupText;
        elements.email2.textContent = translations.email2;
        elements.passw2.textContent = translations.passw2;
        elements.registerButton.textContent = translations.registerButton;
        
        elements.alreadyRegistered.childNodes[0].textContent = translations.alreadyRegistered + " ";
        elements.alreadyRegistered.querySelector("a").textContent = translations.loginBtn;

        elements.notRegistered.childNodes[0].textContent = translations.notRegistered + " ";
        elements.notRegistered.querySelector("a").textContent = translations.signupText;

        elements.loginBtn.textContent = translations.loginBtn;
    }
};