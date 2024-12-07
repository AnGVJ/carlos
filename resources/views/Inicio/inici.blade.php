<x-app-layout>

    <div class="container py-4">
        <!-- Primera fila -->
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="cardis shadow p-3 text-center bgd text-white">
                    <!-- Botón Crear nuevo Proyecto -->



                </div>


            </div>
            <div class="col-md-5">
                <div class="cardis shadow p-3 bgd text-white">
                    <h6 style="font-size:12px;">Análisis de Proyectos</h6>
                    <!-- Aquí va el gráfico -->
                    <canvas id="chart" width="550" height="350"></canvas>
                </div>
            </div>
            <div class="col-md-4">
                <div class="cardis shadow p-3 text-center bgd text-white cardu">
                    <img src="https://via.placeholder.com/100" class="rounded-circle perfilimg mb-3" alt="User">
                    <!-- Aquí se muestra el nombre del usuario autenticado -->
                    <div>{{ Auth::user()->name }}</div>
                    <small>Persona</small>
                </div>
            </div>
        </div>

        <!-- Segunda fila -->
        <div class="row">
            <div class="col-md-8">
                <div class="card shadow p-3 bgd text-white">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6>Todos los proyectos</h6>
                        <div>
                            <input type="date" class="form-control d-inline w-auto">
                            <button class="btn btn-primary">Filtrar</button>
                        </div>
                    </div>
                    <table class="table table-dark table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th>Nombre de la obra</th>
                                <th>Comunidad de la obra</th>
                                <th>Fecha de inicio</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>101</td>
                                <td>Proyecto A</td>
                                <td>Ciudad X</td>
                                <td>01/01/2024</td>
                                <td><span class="badge bg-success">Terminado</span></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>102</td>
                                <td>Proyecto B</td>
                                <td>Ciudad Y</td>
                                <td>15/02/2024</td>
                                <td><span class="badge bg-warning text-dark">En proceso</span></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>103</td>
                                <td>Proyecto C</td>
                                <td>Ciudad Z</td>
                                <td>10/03/2024</td>
                                <td><span class="badge bg-danger">Pendiente</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow p-3 mb-3 bgd text-white">
                    <h6>Herramientas totales</h6>
                    <div class="d-flex align-items-center justify-content-between">
                        <span>100%</span>
                        <canvas id="chart1" width="50" height="50"></canvas>
                    </div>
                    <small class="text-success">+1.5% Más personal que antes</small>
                </div>
                <div class="card shadow p-3 mb-3 bgd text-white">
                    <h6>Materiales totales</h6>
                    <div class="d-flex align-items-center justify-content-between">
                        <span>100%</span>
                        <canvas id="chart2" width="50" height="50"></canvas>
                    </div>
                    <small class="text-success">+1.5% Más personal que antes</small>
                </div>
                <div class="card shadow p-3 bgd text-white">
                    <h6>Mano de obra</h6>
                    <div class="d-flex align-items-center justify-content-between">
                        <span>100%</span>
                        <canvas id="chart3" width="50" height="50"></canvas>
                    </div>
                    <small class="text-success">+1.5% Más personal que antes</small>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const ctx = document.getElementById('chart').getContext('2d');
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre'],
                    datasets: [{
                        label: 'Proyectos',
                        data: [10, 20, 5, 30, 40, 60, 50, 70, 90],
                        borderColor: 'rgba(75, 192, 192, 1)',
                        tension: 0.4,
                    }]
                }
            });
        </script>

    </div>
</x-app-layout>