<script>
   $(document).ready(function () {
  $('#filter-form').submit(function (e) {
    e.preventDefault();
    var year = $('#year').val();
    var programStudi = $('#program_studi').val();

    if (year !== '' && programStudi !== '') {
      $.ajax({
        type: 'GET',
        url: '<?php echo base_url('ppk/mon_summarydata'); ?>/' + programStudi + '/' + year,
        success: function (response) {
          var data = JSON.parse(response);
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
      alert('Pilih Tahun dan Program Studi terlebih dahulu.');
    }
  });

  // Handle tombol detail
  $(document).on('click', '.detail-btn', function () {
    var type = $(this).data('type');
    var year = $('#year').val();
    var programStudi = $('#program_studi').val();

    if (year !== '' && programStudi !== '') {
      $.ajax({
        url: '<?php echo base_url("ppk/mon_summary_get_detail_data"); ?>',
        type: 'GET',
        data: {
          type: type,
          year: year,
          program_studi: programStudi
        },
        success: function (data) {
          $('#detail-content').html(data);
          $('#detailModal').modal('show');
        }
      });
    } else {
      alert('Pilih Tahun dan Program Studi terlebih dahulu.');
    }
  });
});






</script>