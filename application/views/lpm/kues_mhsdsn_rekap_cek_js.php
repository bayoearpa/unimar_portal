      <script type="text/javascript">
// var randomScalingFactor = function(){ return Math.round(Math.random()*100)};

  var barChartData = {
    labels : ["MD_A1","MD_A2","MD_A3","MD_B1","MD_B2","MD_B3","MD_C1","MD_C2","MD_C3","MD_D1","MD_D2","MD_D3","MD_E1","MD_E2","MD_E3"],
    datasets : [
      {
        fillColor : "rgba(151,187,205,0.5)",
        strokeColor : "rgba(151,187,205,0.8)",
        highlightFill : "rgba(151,187,205,0.75)",
        highlightStroke : "rgba(151,187,205,1)",
        data : [<?php echo $send_item_per_prodi ?>]
      },
      // {
      //   fillColor : "rgba(151,187,205,0.5)",
      //   strokeColor : "rgba(151,187,205,0.8)",
      //   highlightFill : "rgba(151,187,205,0.75)",
      //   highlightStroke : "rgba(151,187,205,1)",
      //   data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
      // }
    ]

  }
  console.log(barChartData);
  
  window.onload = function(){
    var ctx = document.getElementById("canvas").getContext("2d");
    window.myBar = new Chart(ctx).Bar(barChartData, {
      responsive : true
    });
  }

<?php foreach ($list_pert as $key) {?>
      /*
     * DONUT CHART
     * -----------
     */

    var donutData<?php echo $key->id_mhsdsn ?> = [
     { label: 'STS', data: <?php echo $lpm->countitem_persentase_mhsdsn($key->id_mhsdsn,$prodi,$ta,'1') ?>, color: '#f20b0b' },
      { label: 'TS', data: <?php echo $lpm->countitem_persentase_mhsdsn($key->id_mhsdsn,$prodi,$ta,'2') ?>, color: '#ffad5f' },
      { label: 'KS', data: <?php echo $lpm->countitem_persentase_mhsdsn($key->id_mhsdsn,$prodi,$ta,'3') ?>, color: '#ffd966' },
      { label: 'S', data: <?php echo $lpm->countitem_persentase_mhsdsn($key->id_mhsdsn,$prodi,$ta,'4') ?>, color: '#9af073' },
      { label: 'SS', data: <?php echo $lpm->countitem_persentase_mhsdsn($key->id_mhsdsn,$prodi,$ta,'5') ?>, color: '#89ddfc' }
    ]
    $.plot('#donut-chart-<?php echo $key->id_mhsdsn ?>', donutData<?php echo $key->id_mhsdsn; ?>, {
        series: {
          pie: { 
            show: true,
            radius: 1,
            label: {
              show: true,
              radius: 3/4,
              formatter: labelFormatter,
              background: {
                opacity: 0.5
              }
            }
          }
        },
        legend: {
          show: false
        }
      });


    <?php } ?>
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