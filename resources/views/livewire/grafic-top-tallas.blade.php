<div>
<input type="hidden" wire:model="dataTallas">
<canvas id="graficTallas" width="300" height="100"></canvas>


<script src="https://cdn.jsdelivr.net/npm/chart.js@3.6.1/dist/chart.min.js"></script>

<script>
    var datos = '<?php echo $dataTallas; ?>';

    var datosTallas = JSON.parse(datos);
console.log(datos);
    var etiTallas = [];
    var dataSizes = [];
//console.log(datosTallas.length);
    for(var i = 0;i < datosTallas.length; i++)
    {   
        
        etiTallas.push(datosTallas[i].talla);
        dataSizes.push(datosTallas[i].suma);
    }

    generarGraficaTallas();

    function generarGraficaTallas()
    {
        var ctx2 = document.getElementById('graficTallas').getContext('2d');

        var graficaTallas = new Chart(ctx2, {
            type: 'doughnut',

            data: {
                labels: etiTallas,
                datasets: [{
                    label: 'Ventas por Talla',
                    data: dataSizes,
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
