<script type="text/javascript">
	 function hitungTahunAjaran() {
            // Ambil semua checkbox yang tercentang
            const checkboxes = document.querySelectorAll('input[name="makul[]"]:checked');

            // Buat objek untuk menyimpan tahun ajaran yang diambil
            const tahunAjaran = {};

            // Loop melalui checkbox yang tercentang dan tambahkan tahun ajaran ke objek
            checkboxes.forEach((checkbox) => {
                const tahunAjaranMakul = checkbox.dataset.tahunajaran;
                tahunAjaran[tahunAjaranMakul] = 1;
            });

            // Hitung jumlah tahun ajaran yang diambil
            const jumlahTahunAjaran = Object.keys(tahunAjaran).length;

            // Masukkan jumlah tahun ajaran ke input hidden
            document.getElementById("jumlah_tahun_ajaran").value = jumlahTahunAjaran;
        }
</script>