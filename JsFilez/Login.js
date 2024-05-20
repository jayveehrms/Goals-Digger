document.querySelector("#show-login").addEventListener("click", function() {
    var wrapper = document.querySelector(".wrapper.login");
    var popup = document.querySelector(".login-popup");
    wrapper.style.zIndex = '2';
    wrapper.style.display = 'flex';
    popup.classList.add("active");

    // Make the webpage dimmed when the modal is active
    document.querySelectorAll('section').forEach(el => el.classList.add('dimmed'));
});

// Switch to signup form
document.querySelector("#signup-btn").addEventListener("click", function(event) {
    event.preventDefault();
    var loginWrapper = document.querySelector(".wrapper.login");
    var signupWrapper = document.querySelector(".wrapper.signup");
    var loginPopup = document.querySelector(".login-popup");
    var signupPopup = document.querySelector(".signup-popup");

    loginPopup.classList.remove("active");
    loginWrapper.style.display = 'none';

    signupWrapper.style.zIndex = '2';
    signupWrapper.style.display = 'flex';
    signupPopup.classList.add("active");
});

// Switch to login form
document.querySelector("#login-btn").addEventListener("click", function(event) {
    event.preventDefault();
    var signupWrapper = document.querySelector(".wrapper.signup");
    var loginWrapper = document.querySelector(".wrapper.login");
    var signupPopup = document.querySelector(".signup-popup");
    var loginPopup = document.querySelector(".login-popup");

    signupPopup.classList.remove("active");
    signupWrapper.style.display = 'none';

    loginWrapper.style.zIndex = '2';
    loginWrapper.style.display = 'flex';
    loginPopup.classList.add("active");
});

// Close button of Modal for login
document.querySelector('#close-btn').addEventListener('click', function() {
    var wrapper = document.querySelector(".wrapper.login");
    wrapper.style.zIndex = '-1';
    wrapper.style.display = 'none';
    document.querySelector(".login-popup").classList.remove("active");

    // Remove dimmed effect from webpage
    document.querySelectorAll('section').forEach(el => el.classList.remove('dimmed'));
});

// Close button of Modal for signup
document.querySelector('#signup-close-btn').addEventListener('click', function() {
    var wrapper = document.querySelector(".wrapper.signup");
    wrapper.style.zIndex = '-1';
    wrapper.style.display = 'none';
    document.querySelector(".signup-popup").classList.remove("active");

    // Remove dimmed effect from webpage
    document.querySelectorAll('section').forEach(el => el.classList.remove('dimmed'));
});





