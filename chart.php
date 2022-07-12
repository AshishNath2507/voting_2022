<?php
require "./connect.php";
include "./users/slugify.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>chart</title>
    <script src="./library/jquery.min.js"></script>
    <!-- ChartJS -->
    <script src="./plugins/chart.js/Chart.js"></script>
    <!-- ChartJS Horizontal Bar -->
    <script src="./plugins/chart.js/Chart.HorizontalBar.js"></script>
</head>

<body>
    <div class="container">
        <?php
        $sql = "SELECT * FROM posts ORDER BY p_id ASC";
        $query = $con->query($sql);
        $inc = 2;
        while($row = $query->fetch_assoc()){
          $inc = ($inc == 2) ? 1 : $inc+1; 
          if($inc == 1) echo "<div class='row'>";
          echo "
            <div class='col-sm-6'>
              <div class='box box-solid'>
                <div class='box-header with-border'>
                  <h4 class='box-title'><b>".$row['p_name']."</b></h4>
                </div>
                <div class='box-body'>
                  <div class='chart'>
                    <canvas id='".slugify($row['p_name'])."' style='height:200px'></canvas>
                  </div>
                </div>
              </div>
            </div>
          ";
          if($inc == 2) echo "</div>";  
        }
        if($inc == 1) echo "<div class='col-sm-6'></div></div>";
        ?>

        <?php

        $sql = "SELECT * FROM posts ORDER BY p_id ASC";
        $query = $con->query($sql);
        while ($row = $query->fetch_assoc()) {
            $sql = "SELECT * FROM users WHERE cand_post = '" . $row['p_name'] . "'";
            $cquery = $con->query($sql);
            $carray = array();
            $varray = array();
            while ($crow = $cquery->fetch_assoc()) {
                array_push($carray, $crow['name']);
                $sql = "SELECT * FROM cand_pc WHERE candidate_id = '" . $crow['id'] . "'";
                $vquery = $con->query($sql);
                array_push($varray, $vquery->num_rows);
            }
            $carray = json_encode($carray);
            $varray = json_encode($varray);
        ?>

            <pre>
            <?php
            echo $carray;

            echo $varray;
            ?>
        </pre>
            <script>
                $(function() {
                    var rowid = '<?php echo $row['id']; ?>';
                    var description = '<?php echo slugify($row['p_name']); ?>';
                    var barChartCanvas = $('#' + description).get(0).getContext('2d')
                    var barChart = new Chart(barChartCanvas)
                    var barChartData = {
                        labels: <?php echo $carray; ?>,
                        datasets: [{
                            label: 'Votes',
                            fillColor: 'rgba(60,141,188,0.9)',
                            strokeColor: 'rgba(60,141,188,0.8)',
                            pointColor: '#3b8bba',
                            pointStrokeColor: 'rgba(60,141,188,1)',
                            pointHighlightFill: '#fff',
                            pointHighlightStroke: 'rgba(60,141,188,1)',
                            data: <?php echo $varray; ?>
                        }]
                    }
                    var barChartOptions = {
                        //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
                        scaleBeginAtZero: true,
                        //Boolean - Whether grid lines are shown across the chart
                        scaleShowGridLines: true,
                        //String - Colour of the grid lines
                        scaleGridLineColor: 'rgba(0,0,0,.05)',
                        //Number - Width of the grid lines
                        scaleGridLineWidth: 1,
                        //Boolean - Whether to show horizontal lines (except X axis)
                        scaleShowHorizontalLines: true,
                        //Boolean - Whether to show vertical lines (except Y axis)
                        scaleShowVerticalLines: true,
                        //Boolean - If there is a stroke on each bar
                        barShowStroke: true,
                        //Number - Pixel width of the bar stroke
                        barStrokeWidth: 2,
                        //Number - Spacing between each of the X value sets
                        barValueSpacing: 5,
                        //Number - Spacing between data sets within X values
                        barDatasetSpacing: 1,
                        //String - A legend template
                        legendTemplate: '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
                        //Boolean - whether to make the chart responsive
                        responsive: true,
                        maintainAspectRatio: true
                    }

                    barChartOptions.datasetFill = false
                    var myChart = barChart.HorizontalBar(barChartData, barChartOptions)
                    //document.getElementById('legend_'+rowid).innerHTML = myChart.generateLegend();
                });
            </script>
        <?php
        }
        ?>
    </div>
   
</body>

</html>