<div>
    <canvas id="GraficPO" width="400" height="150"></canvas>

    <input type="hidden" wire:model="LabelsPo">
    <input type="hidden" wire:model="dataPo">




    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.6.1/dist/chart.min.js"></script>
    <script>
        var etiquetas = '<?php echo $LabelsPo; ?>';
        var valores = '<?php echo $dataPo; ?>';
        var val = JSON.parse(valores);
        var eti = JSON.parse(etiquetas);
        var lasEtiquetas = [];
        var losValores = [];

        for (var i = 0; i < eti.length; i++) {

            lasEtiquetas.push(eti[i].po_order);
            losValores.push(val[i].suma);
            //  console.log(losValores);
        }


        generarGrafica();


        function generarGrafica() {
            var ctx = document.getElementById('GraficPO').getContext('2d');

            var grafica = new Chart(ctx, {

                type: 'line',

                data: {
                    labels: lasEtiquetas,
                    datasets: [{
                        label: 'Ventas Por día',
                        data: losValores,
                        fill: false,
                        borderColor: 'rgb(75, 192, 192)',
                        tension: 0.1
                    }]
                },

                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                },
                responsive: true

            });
        }
    </script>





</div>
