@extends('layouts.dashboard-admin')
@section('title', 'Hasil Sementara')
@section('container')
    <div class="container pt-md-3 mt-5 pt-5">
        <h3 class="display-6 fw-bold lh-1">Hasil Sementara</h3>
        <hr>
    </div>
    <div class="container mb-5">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <canvas class="mt-5" id="mpm" height="280" width="600"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <script>
            var teams = <?php echo $teams; ?>;
            var votes = <?php echo $votes; ?>;
            var barChartData = {
                labels: teams,
                datasets: [{
                    label: 'Votes',
                    backgroundColor: "#2c3e50",
                    data: votes
                }]
            };

            window.onload = function() {
                var ctx = document.getElementById("mpm").getContext("2d");
                window.myBar = new Chart(ctx, {
                    type: 'bar',
                    data: barChartData,
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        },
                        elements: {
                            rectangle: {
                                borderWidth: 1,
                                borderColor: '#c1c1c1',
                                borderSkipped: 'bottom'
                            }
                        },
                        responsive: true,
                        title: {
                            display: true,
                            text: '<?= $name ?>'
                        },
                    }
                });
            };
        </script>
    </div>
@endsection
