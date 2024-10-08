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

   

 // Fungsi untuk menghitung persentase dan menyesuaikan selisih agar total 100%
    function adjustPercentages(ts, ks, s, ss) {
        // Fungsi untuk membulatkan ke 2 angka desimal
        function roundToTwoDecimals(num) {
            return Math.round(num * 100) / 100;
        }

        // Membulatkan setiap nilai ke 2 angka desimal
        let rounded_ts = roundToTwoDecimals(ts);
        let rounded_ks = roundToTwoDecimals(ks);
        let rounded_s = roundToTwoDecimals(s);
        let rounded_ss = roundToTwoDecimals(ss);

        // Hitung total dari persentase yang dibulatkan
        let total = rounded_ts + rounded_ks + rounded_s + rounded_ss;

        // Hitung selisih dari 100%
        let difference = roundToTwoDecimals(100 - total);

        // Sesuaikan berdasarkan selisih
        if (difference !== 0) {
            if (difference > 0) {
                // Tambahkan ke nilai persentase yang terkecil
                if (rounded_ts <= rounded_ks && rounded_ts <= rounded_s && rounded_ts <= rounded_ss) {
                    rounded_ts += difference;
                } else if (rounded_ks <= rounded_ts && rounded_ks <= rounded_s && rounded_ks <= rounded_ss) {
                    rounded_ks += difference;
                } else if (rounded_s <= rounded_ts && rounded_s <= rounded_ks && rounded_s <= rounded_ss) {
                    rounded_s += difference;
                } else {
                    rounded_ss += difference;
                }
            } else {
                // Kurangkan dari nilai persentase yang terbesar
                if (rounded_ts >= rounded_ks && rounded_ts >= rounded_s && rounded_ts >= rounded_ss) {
                    rounded_ts += difference;
                } else if (rounded_ks >= rounded_ts && rounded_ks >= rounded_s && rounded_ks >= rounded_ss) {
                    rounded_ks += difference;
                } else if (rounded_s >= rounded_ts && rounded_s >= rounded_ks && rounded_s >= rounded_ss) {
                    rounded_s += difference;
                } else {
                    rounded_ss += difference;
                }
            }
        }

        // Kembalikan nilai yang sudah disesuaikan
        return [
            roundToTwoDecimals(rounded_ts),
            roundToTwoDecimals(rounded_ks),
            roundToTwoDecimals(rounded_s),
            roundToTwoDecimals(rounded_ss)
        ];
    }

    // Panggil fungsi adjustPercentages secara langsung tanpa deklarasi ulang variabel
    document.getElementById('data-ts-<?php echo $key->id_mhsdsn ?>').innerText = 
        adjustPercentages(
            <?php echo round($lpm->countitem_persentase_mhsdsn($key->id_mhsdsn, $prodi, $ta, '2'), 2); ?>,
            <?php echo round($lpm->countitem_persentase_mhsdsn($key->id_mhsdsn, $prodi, $ta, '3'), 2); ?>,
            <?php echo round($lpm->countitem_persentase_mhsdsn($key->id_mhsdsn, $prodi, $ta, '4'), 2); ?>,
            <?php echo round($lpm->countitem_persentase_mhsdsn($key->id_mhsdsn, $prodi, $ta, '5'), 2); ?>
        )[0] + '%';

    document.getElementById('data-ks-<?php echo $key->id_mhsdsn ?>').innerText = 
        adjustPercentages(
            <?php echo round($lpm->countitem_persentase_mhsdsn($key->id_mhsdsn, $prodi, $ta, '2'), 2); ?>,
            <?php echo round($lpm->countitem_persentase_mhsdsn($key->id_mhsdsn, $prodi, $ta, '3'), 2); ?>,
            <?php echo round($lpm->countitem_persentase_mhsdsn($key->id_mhsdsn, $prodi, $ta, '4'), 2); ?>,
            <?php echo round($lpm->countitem_persentase_mhsdsn($key->id_mhsdsn, $prodi, $ta, '5'), 2); ?>
        )[1] + '%';

    document.getElementById('data-s-<?php echo $key->id_mhsdsn ?>').innerText = 
        adjustPercentages(
            <?php echo round($lpm->countitem_persentase_mhsdsn($key->id_mhsdsn, $prodi, $ta, '2'), 2); ?>,
            <?php echo round($lpm->countitem_persentase_mhsdsn($key->id_mhsdsn, $prodi, $ta, '3'), 2); ?>,
            <?php echo round($lpm->countitem_persentase_mhsdsn($key->id_mhsdsn, $prodi, $ta, '4'), 2); ?>,
            <?php echo round($lpm->countitem_persentase_mhsdsn($key->id_mhsdsn, $prodi, $ta, '5'), 2); ?>
        )[2] + '%';

    document.getElementById('data-ss-<?php echo $key->id_mhsdsn ?>').innerText = 
        adjustPercentages(
            <?php echo round($lpm->countitem_persentase_mhsdsn($key->id_mhsdsn, $prodi, $ta, '2'), 2); ?>,
            <?php echo round($lpm->countitem_persentase_mhsdsn($key->id_mhsdsn, $prodi, $ta, '3'), 2); ?>,
            <?php echo round($lpm->countitem_persentase_mhsdsn($key->id_mhsdsn, $prodi, $ta, '4'), 2); ?>,
            <?php echo round($lpm->countitem_persentase_mhsdsn($key->id_mhsdsn, $prodi, $ta, '5'), 2); ?>
        )[3] + '%';


    var ts = <?php echo round($lpm->countitem_persentase_mhsdsn($key->id_mhsdsn, $prodi, $ta, '2'), 2); ?>;
    var ks = <?php echo round($lpm->countitem_persentase_mhsdsn($key->id_mhsdsn, $prodi, $ta, '3'), 2); ?>;
    var s = <?php echo round($lpm->countitem_persentase_mhsdsn($key->id_mhsdsn, $prodi, $ta, '4'), 2); ?>;
    var ss = <?php echo round($lpm->countitem_persentase_mhsdsn($key->id_mhsdsn, $prodi, $ta, '5'), 2); ?>;
   // Gunakan data yang dikirim dari PHP ke JavaScript
    var adjustedPercentages = adjustPercentages(ts, ks, s, ss);

    // Update nilai persentase di HTML
    document.getElementById('data-ts-<?php echo $key->id_mhsdsn ?>').innerText = adjustedPercentages[0].toFixed(2) + '%';
    document.getElementById('data-ks-<?php echo $key->id_mhsdsn ?>').innerText = adjustedPercentages[1].toFixed(2) + '%';
    document.getElementById('data-s-<?php echo $key->id_mhsdsn ?>').innerText = adjustedPercentages[2].toFixed(2) + '%';
    document.getElementById('data-ss-<?php echo $key->id_mhsdsn ?>').innerText = adjustedPercentages[3].toFixed(2) + '%';

    // Update donut chart dengan persentase yang sudah disesuaikan
    var donutData<?php echo $key->id_mhsdsn ?> = [
        { label: 'K', data: adjustedPercentages[0].toFixed(2), color: '#ffad5f' },
        { label: 'C', data: adjustedPercentages[1].toFixed(2), color: '#ffd966' },
        { label: 'B', data: adjustedPercentages[2].toFixed(2), color: '#9af073' },
        { label: 'SB', data: adjustedPercentages[3].toFixed(2), color: '#89ddfc' }
    ];

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
      // + Math.round(series.percent) + '%</div>'
      + series.percent + '%</div>'
  }
      

      </script>


