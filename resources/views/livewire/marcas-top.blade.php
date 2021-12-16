<div>
    <div class="card bg-light">
        <h3 class="text-center">Top Marcas</h3>
        <input type="hidden" wire:model="marcasTop">
        <canvas id="graficMarcas" width="80" height="80"></canvas>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.6.1/dist/chart.min.js"></script>
    <script>
        var datos= '<?php echo $marcasTop; ?>';
        var datosMarca = JSON.parse(datos);
    
        var etiMarcas = [];
        var suma = [];
    
        for(var i = 0; i < datosMarca.length; i++)
        {
            etiMarcas.push(datosMarca[i].marca);
            suma.push(datosMarca[i].suma);
        }
    
        generarGraficaMarca();
    
        function generarGraficaMarca()
    
        {
            var ctx4 = document.getElementById('graficMarcas').getContext('2d');
    
            var graficaMarcas = new Chart(ctx4, {
                type:'pie',
    
                data:{
                    labels:etiMarcas,
                    datasets:[{
                        label:'Ventas por marcas',
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
