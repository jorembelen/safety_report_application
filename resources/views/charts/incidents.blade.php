<script>
    var sBar = {
        chart: {
            height: 350,
            type: 'bar',
            toolbar: {
                show: false,
            }
        },
        plotOptions: {
            bar: {
                horizontal: true,
            }
        },
        dataLabels: {
            enabled: false
        },
        series: [{
            data: [400, 430, 448, 470, 540, 580, 690, 1100, 1200, 1380]
        }],
        xaxis: {
            categories: ['South Korea', 'Canada', 'United Kingdom', 'Netherlands', 'Italy', 'France', 'Japan', 'United States', 'China', 'Germany'],
        }
    }

    var chart = new ApexCharts(
    document.querySelector("#incidents-chart"),
    sBar
    );

    chart.render();
</script>