document.addEventListener("DOMContentLoaded", () => {
    const tabPelanggan = document.getElementById("tab-pelanggan");
    const tabToko = document.getElementById("tab-toko");
    const body = document.getElementById("riwayat-body");
    const totalCell = document.getElementById("total-cell");
    const filterBtn = document.getElementById("filter-btn");
    const namaInput = document.getElementById("nama");
    const tanggalInput = document.getElementById("tanggal");

    let currentTab = "pelanggan";

    async function loadRiwayat() {
        try {
            const res = await fetch(`/api/riwayat/${currentTab}`);
            if (!res.ok) throw new Error("Gagal memuat data");
            const data = await res.json();

            if (data.length === 0) {
                body.innerHTML = `<tr><td colspan="6" class="empty">Belum ada data transaksi</td></tr>`;
                totalCell.textContent = "Rp 0";
                return;
            }

            let html = "";
            let total = 0;
            const namaFilter = namaInput.value.toLowerCase();
            const tanggalFilter = tanggalInput.value;

            data.forEach((t) => {
                if (
                    (!namaFilter ||
                        t.nama.toLowerCase().includes(namaFilter)) &&
                    (!tanggalFilter || t.tanggal === tanggalFilter)
                ) {
                    t.detail.forEach((d) => {
                        html += `
                            <tr>
                                <td>${t.id}</td>
                                <td>${t.tanggal}</td>
                                <td>${t.nama}</td>
                                <td>${d.barang?.nama_barang || "-"}</td>
                                <td>${d.jumlah}</td>
                                <td>Rp ${d.subtotal.toLocaleString(
                                    "id-ID"
                                )}</td>
                            </tr>`;
                        total += parseFloat(d.subtotal);
                    });
                }
            });

            body.innerHTML =
                html ||
                `<tr><td colspan="6" class="empty">Tidak ada hasil</td></tr>`;
            totalCell.textContent = `Rp ${total.toLocaleString("id-ID")}`;
        } catch (err) {
            Swal.fire("Error", err.message, "error");
        }
    }

    filterBtn.addEventListener("click", () => {
        loadRiwayat();
    });

    tabPelanggan.addEventListener("click", () => {
        tabPelanggan.classList.add("active");
        tabToko.classList.remove("active");
        currentTab = "pelanggan";
        loadRiwayat();
    });

    tabToko.addEventListener("click", () => {
        tabToko.classList.add("active");
        tabPelanggan.classList.remove("active");
        currentTab = "toko";
        loadRiwayat();
    });

    loadRiwayat();
});
