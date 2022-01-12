<?php 
	// echo $skala;
	foreach ($skala as $key => $value) {
		# code...
		echo "jawaban :".$key." skor :".$value."</br>";
		// echo " </br>";
		// echo $value;
	}
	echo "jumlah makul : ".$makul;

 ?>
 <div class="box-body">
              <div id="donut-chart" style="height: 300px;"></div>
               <div id="donut-chart-md_a1" style="height: 300px;"></div>
            </div>
 <!-- jQuery 3 -->
<script src="<?php echo base_url() ?>assets/2/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url() ?>assets/2/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- FLOT CHARTS -->
<script src="<?php echo base_url() ?>assets/2/bower_components/Flot/jquery.flot.js"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="<?php echo base_url() ?>assets/2/bower_components/Flot/jquery.flot.pie.js"></script>
 <script type="text/javascript">
 	 /*
     * DONUT CHART
     * -----------
     */

    var donutData = [
      { label: 'STS', data: 30, color: '#f20b0b' },
      { label: 'TS', data: 20, color: '#ffad5f' },
      { label: 'KS', data: 50, color: '#ffd966' },
      { label: 'S', data: 20, color: '#9af073' },
      { label: 'SS', data: 50, color: '#89ddfc' }
    ]
    $.plot('#donut-chart', donutData, {
      series: {
        pie: {
          show       : true,
          radius     : 1,
          innerRadius: 0.5,
          label      : {
            show     : true,
            radius   : 2 / 3,
            formatter: labelFormatter,
            threshold: 0.1
          }

        }
      },
      legend: {
        show: false
      }
    })
    /*
     * END DONUT CHART
     */
     /*
     * DONUT CHART
     * -----------
     */

    var donutDatamd_a1= [
      { label: 'STS', data: 30, color: '#f20b0b' },
      { label: 'TS', data: 20, color: '#ffad5f' },
      { label: 'KS', data: 50, color: '#ffd966' },
      { label: 'S', data: 20, color: '#9af073' },
      { label: 'SS', data: 50, color: '#89ddfc' }
    ]
    $.plot('#donut-chart-md_a1', donutDatamd_a1, {
      series: {
        pie: {
          show       : true,
          radius     : 1,
          innerRadius: 0.5,
          label      : {
            show     : true,
            radius   : 2 / 3,
            formatter: labelFormatter,
            threshold: 0.1
          }

        }
      },
      legend: {
        show: false
      }
    })
    /*
     * END DONUT CHART
     */


  /*
   * Custom Label formatter
   * ----------------------
   */
  function labelFormatter(label, series) {
    return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">'
      + label
      + '<br>'
      + Math.round(series.percent) + '%</div>'
  }
 </script>