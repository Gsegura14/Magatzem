<div>
    <canvas id="graficModelosTop" width="300" height="80"></canvas>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.6.1/dist/chart.min.js"></script>

<script>
    var datos= '<?php echo $modelosTop; ?>';
    var datosModelo = JSON.parse(datos);

    var etiModelos = [];
    var suma = [];

    for(var i = 0; i < datosModelo.length; i++)
    {
        etiModelos.push(datosModelo[i].modelo);
        suma.push(datosModelo[i].suma);
    }

    generarGraficaModelos();

    function generarGraficaModelos()

    {
        var ctx3 = document.getElementById('graficModelosTop').getContext('2d');

        var graficaModelos = new Chart(ctx3, {
            type:'bar',

            data:{
                labels:etiModelos,
                datasets:[{
                    label:'Ventas por modelo',
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
