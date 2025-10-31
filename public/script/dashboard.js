document.addEventListener("DOMContentLoaded", () => {
    const iframe = document.getElementById("content-frame");
    const menuButtons = document.querySelectorAll(".menu-btn");
    const logoBtn = document.getElementById("logo-btn");

    // Navigasi antar menu
    menuButtons.forEach((btn) => {
        btn.addEventListener("click", function (e) {
            e.preventDefault();
            iframe.src = this.getAttribute("href");
        });
    });

    // Klik logo => tampilkan halaman Welcome Admin
    logoBtn.addEventListener("click", function (e) {
        e.preventDefault();
        iframe.src = "/dashboard/welcome";
    });
});
