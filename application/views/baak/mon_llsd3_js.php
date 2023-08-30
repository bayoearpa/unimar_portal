 <script>
    $(document).ready(function() {
        $('#filter-form').submit(function(e) {
            e.preventDefault();
            var year = $('#year').val();
            var programStudi = $('#program_studi').val();

            $.ajax({
                type: 'GET',
                url: '<?php echo base_url('baak/mon_llsd3data'); ?>',
                ddata: { year: year, program_studi: programStudi }, // Send both year and program_studi
                success: function(response) {
                    $('#example1').html(response); // Ganti isi #item-list dengan hasil AJAX
                }
            });
        });
    });
    </script>