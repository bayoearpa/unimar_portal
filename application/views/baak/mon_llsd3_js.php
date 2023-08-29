 <script>
    $(document).ready(function() {
        $('#filter-form').submit(function(e) {
            e.preventDefault();
            var year = $('#year').val();

            $.ajax({
                type: 'GET',
                url: '<?php echo base_url('baak/mon_llsd3'); ?>',
                data: { year: year },
                success: function(response) {
                    $('#example1').html(response); // Ganti isi #item-list dengan hasil AJAX
                }
            });
        });
    });
    </script>