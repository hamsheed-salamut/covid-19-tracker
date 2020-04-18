<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="/img/coronavirus.ico" type="image/icon" sizes="16x16">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="/css/app.css">
    <script src="/js/app.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
    <title>Corona Virus Tracker App | 2020 </title>
</head>

<style>
svg:not(:root).svg-inline--fa {
    margin-left: -35%;
}
p {
    font-weight: bold;
}
</style>

<script>
    $(document).ready(function() {
       $(".count-numbers").counterUp({delay:15,time:1500});
        
        var labelDeaths = []; 
        var dataDeaths = [];

        var labelCases = [];
        var dataCases = [];

        var labelRecovered = [];
        var dataRecovered = [];

        $.getJSON('https://corona.lmao.ninja/v2/historical?lastdays=30', function (data) {

            result = data.map(function(e){return {cases: e.timeline.cases, deaths: e.timeline.deaths, recovered: e.timeline.recovered};}).reduce(function(acc, e){
    
            Object.keys(e).forEach(function(t){
            Object.keys(e[t]).forEach(function(d){
                    acc[t][d] = (acc[t][d] || 0) + e[t][d];
            });
            });
            return acc;
        }, {deaths: {}, recovered: {}, cases: {}});

            labelDeaths.push(Object.keys(result.deaths));
            dataDeaths.push(Object.values(result.deaths));

            labelCases.push(Object.keys(result.cases));
            dataCases.push(Object.values(result.cases));
            console.log(result.deaths);
            labelRecovered.push(Object.keys(result.recovered));
            dataRecovered.push(Object.values(result.recovered));


            var ctx = document.getElementById('lineChart').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'line',

            // The data for our dataset
            data: {
                labels:  labelDeaths[0],
                datasets: [{
                    label: 'Deaths',
                    borderColor: '#ef5350',
                    data: dataDeaths[0],
                    fill: false
                },
                {
                    label: 'Cases',
                    borderColor: '#007bff',
                    data: dataCases[0],
                    fill: false
                },
                {
                    label: 'Recovered',
                    borderColor: '#66bb6a',
                    data: dataRecovered[0],
                    fill: false
                }
                ]
            },

            // Configuration options go here
            options: {
                    scales: {
      xAxes: [{
        type: 'time',
        time: {
          displayFormats: {
          	'millisecond': 'MMM DD',
            'second': 'MMM DD',
            'minute': 'MMM DD',
            'hour': 'MMM DD',
            'day': 'MMM DD',
            'week': 'MMM DD',
            'month': 'MMM DD',
            'quarter': 'MMM DD',
            'year': 'MMM DD',
          }
        }
      }],
    },
  
            }
        });

});

$('#modelWindow').modal({
        keyboard: true,
        backdrop: "static",
        show: false,

    }).on('show', function () {

    });

    $(".table-striped").find('tr[data-id]').on('click', function () {

        //do all your operation populate the modal and open the modal now. DOnt need to use show event of modal again

        $('#orderDetails').html($('<b> Order Id selected: ' + $(this).data('id') + '</b>'));
        $('#modelWindow').modal('show');
        // line-chart-country

        var labelDeaths = []; 
        var dataDeaths = [];

        var labelCases = [];
        var dataCases = [];

        var labelRecovered = [];
        var dataRecovered = [];
        const entries = Object.entries
        const fromEntries = Object.fromEntries
        const URL = "https://corona.lmao.ninja/v2/historical/mauritius?lastdays=30"
        async function go() {  
        const { timeline: { cases, deaths } } = await (await fetch(URL)).json();
        const newCases = fromEntries(deltas(entries(cases)));
        const newDeaths = fromEntries(deltas(entries(deaths)));

        labelCases.push(Object.keys(newCases));
        dataCases.push(Object.values(newCases));
        console.log(labelCases[0]);
        console.log(`New cases: ${JSON.stringify(newCases, null, 2)}`)
        console.log(`New deaths: ${JSON.stringify(newDeaths, null, 2)}`)
        }
        function nonZero(arr) {
        return arr.filter(([_,v]) => v > 0)
        }
        function deltas(arr) {
        let prev = 0
        return arr.reduce((acc, [date, curr]) => {
            acc.push([date, curr - prev])
            prev = curr
            return acc
        }, [])
        }
        go()

        console.log(dataCases);
        console.log(labelCases);

            var ctx = document.getElementById('line-chart-country').getContext('2d');
            var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'line',

            // The data for our dataset
            data: {
                labels:  ["3/19/20", "3/20/20", "3/21/20", "3/22/20", "3/23/20", "3/24/20", "3/25/20", "3/26/20", "3/27/20", "3/28/20", "3/29/20", "3/30/20", "3/31/20", "4/1/20", "4/2/20", "4/3/20", "4/4/20", "4/5/20", "4/6/20", "4/7/20", "4/8/20", "4/9/20", "4/10/20", "4/11/20", "4/12/20", "4/13/20", "4/14/20", "4/15/20", "4/16/20", "4/17/20"],
                datasets: [{
                    label: 'Deaths',
                    borderColor: '#ef5350',
                    lineTension: 0,  
                    data: [3, 9, 2, 14, 8, 3, 6, 33, 3, 18, 5, 21, 15, 38, 8, 17, 0, 31, 7, 4, 5, 41, 4, 6, 5, 0, 0, 4, 0, 0],
                    fill: false
                },
                {
                    label: 'Cases',
                    borderColor: '#007bff', 
                    data: [3, 9, 2, 14, 8, 6, 6, 33, 13, 8, 5, 21, 15, 18, 8, 17, 10, 31, 17, 24, 5, 41, 4, 1, 5, 0, 0, 0, 0, 0],
                    fill: false
                }
                ]
            },

            // Configuration options go here
                    options: {
                            scales: {
                    xAxes: [{
                    type: 'time',
                    time: {
                    displayFormats: {
                    'millisecond': 'MMM DD',
                    'second': 'MMM DD',
                    'minute': 'MMM DD',
                    'hour': 'MMM DD',
                    'day': 'MMM DD',
                    'week': 'MMM DD',
                    'month': 'MMM DD',
                    'quarter': 'MMM DD',
                    'year': 'MMM DD',
                    }
                    }
                    }],
                    },

            }
            });

    });

});

       

</script>
<body>
    
    <div id='app'></div>
    <div class="container">
        @yield('content')
    </div>

    <div class="modal fade" id="modelWindow" role="dialog">
        <div class="modal-dialog modal-dialog modal-lg vertical-align-center">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Statistics</h4>
            </div>
            <div class="modal-body">
                <h3 class="card-title text-center">Mauritius</h3>
                <canvas id="line-chart-country"></canvas>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-info">Close</button>
            </div>
          </div>
        </div>
    </div>

</body>
</html>