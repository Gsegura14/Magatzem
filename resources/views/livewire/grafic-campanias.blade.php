<div>
    <canvas id="graficCampanias" width="300" height="80"></canvas>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.6.1/dist/chart.min.js"></script>

    <script>
        var datos = '<?php echo $campaniasVentas; ?>';
        var datosCampanias = JSON.parse(datos);

        var etiCampanias = [];
        var suma = [];

        for (var i = 0; i < datosCampanias.length; i++) {
            etiCampanias.push(datosCampanias[i].campania);
            suma.push(datosCampanias[i].suma);
        }
        generarGraficaCampanias();

        function generarGraficaCampanias() {
            var ctx4 = document.getElementById('graficCampanias').getContext('2d');
            var graficaCampanias = new Chart(ctx4, {
                type: 'line',

                data: {
                    labels: etiCampanias,
                    datasets: [{
                        label:'Ventas por campaña',
                        data: suma,
                        backgroundColor: [
                            'rgb(255, 99, 132)',
                            'rgb(255, 159, 64)',
                            'rgb(255, 205, 86)',
                            'rgb(75, 192, 192)',
                            'rgb(54, 162, 235)',
                            'rgb(153, 102, 255)',
                            'rgb(201, 203, 207)'

                        ],
                    }]

                },
            });
        }
    </script>







</div>
