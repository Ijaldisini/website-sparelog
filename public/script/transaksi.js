document.addEventListener("DOMContentLoaded", () => {
    const tableBody = document.getElementById("barang-body");
    const addRowBtn = document.getElementById("add-row-btn");
    const totalInput = document.getElementById("total-harga");
    const form = document.getElementById("transaksi-form");

    const buatBarisBaru = () => {
        const row = document.createElement("tr");
        row.innerHTML = `
            <td><input type="text" class="nama-barang"></td>
            <td><input type="number" class="jumlah" min="1"></td>
            <td><input type="text" class="harga" readonly></td>
        `;
        tableBody.appendChild(row);
        aktifkanLogikaBaris(row);
    };

    const aktifkanLogikaBaris = (row) => {
        const namaInput = row.querySelector(".nama-barang");
        const jumlahInput = row.querySelector(".jumlah");
        const hargaInput = row.querySelector(".harga");
        let hargaBarang = 0;

        namaInput.addEventListener("input", async () => {
            const nama = namaInput.value.trim().toLowerCase();
            if (!nama) return;

            try {
                const res = await fetch(`/api/barang/${nama}`);
                if (res.ok) {
                    const data = await res.json();
                    hargaBarang = data.harga;
                } else hargaBarang = 0;
            } catch {
                hargaBarang = 0;
            }
        });

        jumlahInput.addEventListener("input", () => {
            const jumlah = parseInt(jumlahInput.value) || 0;
            hargaInput.value = (hargaBarang * jumlah).toLocaleString("id-ID");
            hitungTotal();
        });
    };

    const hitungTotal = () => {
        let total = 0;
        tableBody.querySelectorAll(".harga").forEach((h) => {
            const val = h.value.replace(/\./g, "");
            total += parseFloat(val) || 0;
        });
        totalInput.value = total.toLocaleString("id-ID");
    };

    tableBody.querySelectorAll("tr").forEach(aktifkanLogikaBaris);
    addRowBtn.addEventListener("click", buatBarisBaru);

    // --- SweetAlert ---
    const swalSuccess = (msg) => {
        Swal.fire({
            icon: "success",
            title: "Berhasil!",
            text: msg,
            showConfirmButton: false,
            timer: 1800,
        });
    };

    const swalError = (msg) => {
        Swal.fire({
            icon: "error",
            title: "Gagal!",
            text: msg,
            confirmButtonColor: "#b52a38",
        });
    };

    // --- Simpan Transaksi ---
    form.addEventListener("submit", async (e) => {
        e.preventDefault();

        const barang = [];
        tableBody.querySelectorAll("tr").forEach((row) => {
            const nama = row.querySelector(".nama-barang").value.trim();
            const jumlah = parseInt(row.querySelector(".jumlah").value);
            if (nama && jumlah > 0) barang.push({ nama_barang: nama, jumlah });
        });

        const payload = {
            nomor_polisi: form.nomor_polisi.value,
            nama_pelanggan: form.nama_pelanggan.value,
            tanggal: form.tanggal.value,
            barang,
        };

        try {
            const res = await fetch("/transaksi", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector(
                        'input[name="_token"]'
                    ).value,
                },
                body: JSON.stringify(payload),
            });

            const result = await res.json();

            if (result.success) {
                swalSuccess(result.message);
                form.reset();
                totalInput.value = "";
                tableBody.innerHTML = ""; // clear dan tambah 2 row baru
                buatBarisBaru();
                buatBarisBaru();
            } else {
                swalError(result.message || "Transaksi gagal disimpan.");
            }
        } catch (err) {
            swalError("Terjadi kesalahan koneksi ke server.");
        }
    });
});
