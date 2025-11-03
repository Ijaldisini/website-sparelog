document.addEventListener("DOMContentLoaded", () => {
    const iframe = document.getElementById("content-frame");
    const menuButtons = document.querySelectorAll(".menu-btn");
    const logoBtn = document.getElementById("logo-btn");

    // Klik tombol menu -> load route ke iframe
    menuButtons.forEach((btn) => {
        btn.addEventListener("click", function (e) {
            e.preventDefault();
            iframe.src = this.getAttribute("href");
            menuButtons.forEach((b) => b.classList.remove("active"));
            this.classList.add("active");
        });
    });

    // Klik logo -> kosongkan iframe
    logoBtn.addEventListener("click", (e) => {
        e.preventDefault();
        iframe.src = "";
        menuButtons.forEach((b) => b.classList.remove("active"));
    });
});
