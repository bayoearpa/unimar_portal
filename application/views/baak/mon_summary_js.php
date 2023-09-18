<script>
    $(document).ready(function() {
        $('#filter-form').submit(function(e) {
            e.preventDefault();
            var year = $('#year').val();
            var programStudi = $('#program_studi').val();

            $.ajax({
                type: 'GET',
                url: '<?php echo base_url('baak/mon_summarydata'); ?>',
                data: { year: year, program_studi: programStudi },
                success: function(response) {
                    var data = JSON.parse(response);
                    // Tampilkan hasil perhitungan summary di dalam elemen dengan ID yang sesuai
                    $('#jml_taruna').text(data.countTaruna);
                    $('#lls_ukp_pra').text(data.countLulusUKPPra);
                    $('#sb_prala').text(data.countStandByPrala);
                    $('#onboard').text(data.countOnBoard);
                    $('#offboard').text(data.countOffBoard);
                    $('#lls-ukp-pasca').text(data.countLulusUKPPasca);
                    $('#lls-d3').text(data.countTotalD3);
                }
            });
        });
    });
</script>