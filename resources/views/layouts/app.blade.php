<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="/css/style.css">

    <script src="/js/app.js"></script> 
    <script src="/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="/vendors/chart.js/Chart.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="/js/off-canvas.js"></script>
    <script src="/js/hoverable-collapse.js"></script>
    <script src="/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="/js/dashboard.js"></script>
    <script src="/js/todolist.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.js"></script>
    <title>Corona Virus Tracker App | 2020 </title>
</head>
<style>
    .table th img, .table td img {
        border-radius: 0%;
    }
</style>
<script>
    $(document).ready(function() {
       $(".count-numbers").counterUp({delay:15,time:1500});

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        var speedCanvas = document.getElementById("world-wide-chart");

        var worldwideCases = [];
        var worldwideRecovered = [];
        var worldwideDeaths = [];
        fetch("https://pomber.github.io/covid19/timeseries.json")
        .then(response => response.json())
        .then(data => {
            data["Argentina"].forEach(({ date, confirmed, recovered, deaths }) =>
            console.log(`${date} active cases: ${confirmed - recovered - deaths}`)
            );
        });

        var dataFirst = {
            label: "Stock A",
            fill: false,
            lineTension: 0.1,
            backgroundColor: "rgba(225,0,0,0.4)",
            borderColor: "red", // The main line color
            borderCapStyle: 'square',
            borderDash: [], // try [5, 15] for instance
            borderDashOffset: 0.0,
            borderJoinStyle: 'miter',
            pointBorderColor: "black",
            pointBackgroundColor: "white",
            pointBorderWidth: 1,
            pointHoverRadius: 8,
            pointHoverBackgroundColor: "yellow",
            pointHoverBorderColor: "brown",
            pointHoverBorderWidth: 2,
            pointRadius: 4,
            pointHitRadius: 10,
            // notice the gap in the data and the spanGaps: true
            data: [65, 59, 80, 81, 56, 55, 40, ,60,55,30,78],
            spanGaps: true
        };

        var dataSecond = {
            label: "Car B - Speed (mph)",
            data: [20, 15, 60, 60, 65, 30, 70],
            lineTension: 0,
            fill: false,
        borderColor: 'blue'
        };

        var speedData = {
        labels: ["0s", "10s", "20s", "30s", "40s", "50s", "60s"],
        datasets: [dataFirst, dataSecond]
        };

        var chartOptions = {
        legend: {
            display: true,
            position: 'top',
            labels: {
            boxWidth: 80,
            fontColor: 'black'
            }
        }
        };

        var lineChart = new Chart(speedCanvas, {
        type: 'line',
        data: speedData,
        options: chartOptions
        });
});
</script>
<body>
    <div id='app'></div>
        <div class="container">
        @yield('content')

        </div>
</body>
</html>