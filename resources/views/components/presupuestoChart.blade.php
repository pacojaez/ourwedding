<div class="flex flex-col lg:flex-row w-full min-h-screen bg-white justify-center align-items-center mt-10 p-2">
    <div class="lg:w-1/2 m-2 p-2">
        <h2 class="font-bold text-2xl text-center p-2">EVOLUCIÓN DEL PRESUPUESTO </h2>
        <div class="overflow-auto lg:overflow-visible">
            <div class="chart-container" style="height:100%; width:100%">
                <canvas id="myChart"></canvas>
            </div>
        </div>
    </div>
    <div class="lg:w-1/2 m-2 p-2">
        <h2 class="font-bold text-2xl text-center p-2">PAGADO / POR PAGAR </h2>
        <div class="overflow-auto lg:overflow-visible">
            <div class="chart-container" style="height:80%; width:80%">
                <canvas id="myChart2"></canvas>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script>
        var ctx = document.getElementById("myChart");
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [],
                datasets:
                    // [{
                    //     label: 'TOTAL',
                    //     data: [],
                    //     borderWidth: 1
                    // }]
                    [{
                        label: 'TOTAL',
                        data: [],
                        borderWidth: 1
                    }]
            },
            options: {
                scales: {
                    xAxes: [],
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
        var updateChart = function() {
            $.ajax({
                url: "{{ route('api.chart') }}",
                type: 'GET',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    myChart.data.labels = data.labels;
                    myChart.data.datasets[0].data = data.data;
                    myChart.update();
                },
                error: function(data) {
                    console.log(data);
                }
            });
        }

        updateChart();

        var ctx2 = document.getElementById("myChart2");
        myChart2 = new Chart(ctx2, {
            type: 'doughnut',
            data: {
                labels: [
                    'PAGADO',
                    'PENDIENTE',
                ],
                datasets: [{
                    label: 'Paid',
                    data: [],
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                    ],
                    hoverOffset: 4
                }, ]
            },
            options: {
                scales: {
                    xAxes: [],
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

        var updateChart2 = function() {
            $.ajax({
                url: "{{ route('api.chart') }}",
                type: 'GET',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    const datos = myChart2.data.datasets[0].data;
                    datos.push(data.paid);
                    datos.push(data.pending);
                    console.log('DAToS: ' + datos);
                    console.log('DATA paid: ' + data.paid);
                    console.log('DATA pending: ' + data.pending);

                    // myChart.data.datasets[2].data = pending.data;
                    myChart2.update();
                },
                error: function(data) {
                    console.log(data);
                }
            });
        }

        updateChart2();
    </script>
@endpush
