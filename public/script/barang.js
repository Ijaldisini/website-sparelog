document.addEventListener("DOMContentLoaded", function () {
    // Ambil semua tombol delete
    const deleteButtons = document.querySelectorAll(".btn-delete");

    deleteButtons.forEach((button) => {
        button.addEventListener("click", function () {
            const form = this.closest("form"); // ambil form terdekat
            const itemId = this.getAttribute("data-id"); // ambil id barang

            Swal.fire({
                title: "Apakah kamu yakin?",
                text: "Data barang ini akan dihapus secara permanen!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#6c757d",
                confirmButtonText: "Ya, hapus!",
                cancelButtonText: "Batal",
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit(); // submit form kalau dikonfirmasi
                }
            });
        });
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const flashData = document.getElementById("flash-data");
    if (!flashData) return;

    const successMessage = flashData.getAttribute("data-success");
    const errorMessage = flashData.getAttribute("data-error");

    if (successMessage) {
        Swal.fire({
            icon: "success",
            title: "Berhasil!",
            text: successMessage,
            showConfirmButton: false,
            timer: 2000,
        });
    }

    if (errorMessage) {
        Swal.fire({
            icon: "error",
            title: "Gagal!",
            text: errorMessage,
        });
    }
});

document.addEventListener("DOMContentLoaded", function () {
    const flashData = document.getElementById("flash-data");
    if (!flashData) return;

    const successMessage = flashData.getAttribute("data-success");
    const errorMessage = flashData.getAttribute("data-error");

    if (successMessage) {
        Swal.fire({
            icon: "success",
            title: "Berhasil!",
            text: successMessage,
            showConfirmButton: false,
            timer: 2000,
        });
    }

    if (errorMessage) {
        Swal.fire({
            icon: "error",
            title: "Gagal!",
            text: errorMessage,
        });
    }
});
