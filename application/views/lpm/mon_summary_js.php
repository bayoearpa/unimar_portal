<script>
    $(document).ready(function() {
    $('#filter-form').submit(function(e) {
        e.preventDefault();
        var year = $('#year').val();
        var programStudi = $('#program_studi').val();

        // Tambahkan logika untuk memeriksa apakah kedua nilai telah dipilih
        if (year !== '' && programStudi !== '') {
            $.ajax({
                type: 'GET',
                url: '<?php echo base_url('baak/mon_summarydata'); ?>/' + programStudi + '/' + year,
                success: function(response) {
                    var data = JSON.parse(response);
                    // Tampilkan hasil perhitungan summary di dalam elemen dengan ID yang sesuai
                    $('#jml_taruna').text(data.countTaruna);
                    $('#lls_ukp_pra').text(data.lulusUKPPraCount);
                    $('#sb_prala').text(data.standByPralaCount);
                    $('#onboard').text(data.onBoardCount);
                    $('#offboard').text(data.offBoardCount);
                    $('#lls_ukp_pasca').text(data.lulusUKPPascaCount);
                    $('#lls_d3').text(data.totalD3Count);
                }
            });
        } else {
            // Tampilkan pesan kesalahan jika tahun dan program studi belum dipilih
            alert('Pilih Tahun dan Program Studi terlebih dahulu.');
        }
    });
});





</script>