document.addEventListener("DOMContentLoaded", () => {
    const iframe = document.getElementById("content-frame");
    const menuButtons = document.querySelectorAll(".menu-btn");
    const logoBtn = document.getElementById("logo-btn");

    menuButtons.forEach((btn) => {
        btn.addEventListener("click", function (e) {
            e.preventDefault();
            iframe.src = this.getAttribute("href");
        });
    });

    logoBtn.addEventListener("click", function (e) {
        e.preventDefault();
        iframe.src = "/dashboard/welcome";
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const buttons = document.querySelectorAll(".menu-btn");
    const logo = document.querySelector(".logo-img");

    buttons.forEach((btn) => {
        btn.addEventListener("click", function () {
            buttons.forEach((b) => b.classList.remove("active"));
            this.classList.add("active");
        });
    });

    if (logo) {
        logo.addEventListener("click", function () {
            buttons.forEach((b) => b.classList.remove("active"));
        });
    }
});