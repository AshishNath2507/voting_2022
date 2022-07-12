<?php

require "./connect.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Bootstrap links -->
    <link rel="stylesheet" href="library/css/bootstrap.min.css">
    <!-- Bootstrap script -->
    <script src="library/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container w-50 h-50">
        <canvas id="myChart"></canvas>
    </div>
    <script>
       

        //Ajax Block
        const xmlhttp = new XMLHttpRequest();
        const url = 'http://localhost/voting/back.php';

        xmlhttp.open('GET', url, true)
        xmlhttp.send();

        xmlhttp.onreadystatechange = function() {
            if(this.readyState == 4 && this.status == 200){
                console.log(JSON.parse(this.responseText));
            }
        }


        const labels = ['jan', 'feb', 'mar', 'apr', 'may', 'jun', 'july']
        const data = {
            labels: labels,
            datasets: [{
                label: 'My First Dataset',
                data: [65, 59, 80, 81, 56, 55, 40],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 205, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(201, 203, 207, 0.2)'
                ],
                borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(54, 162, 235)',
                    'rgb(153, 102, 255)',
                    'rgb(201, 203, 207)'
                ],
                borderWidth: 1
            }]
        };
        const config = {
            type: 'line',
            data: data,
        };

        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
        <?php
        //  };
        ?>
    </script>
</body>

</html>