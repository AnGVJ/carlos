<x-app-layout>
    <style>
        body {
            background-color: #0d1117;
            color: white;
            font-family: Arial, sans-serif;
        }

        .table-d {
            color: white;
            background-color: #181A32;
        }

        .table-d tr {
            color: white;
        }

        .table-d th,
        .table-d td {
            vertical-align: middle;
            border-color: #212529;
            color: white;
        }

        .progress {
            height: 25px;
            border-radius: 15px;
        }

        .btn-outline-light {
            border-radius: 20px;
        }

        .icon-container {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .dropdown-icon {
            cursor: pointer;
            font-size: 1.2rem;
        }

        .cone {
            background-color: #181A32;
            border-radius: 5px;
            text-align: center;
            width: 250px;
            margin-left: 15px;
        }

        .custom-select {
            background-color: transparent;
            border: 1px solid #ced4da;
            color: white;
            padding: 10px 20px;
            border-radius: 10px;
            font-size: 16px;
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
        }
    </style>

    <div class="container my-5">
        <div class="row mb-4">
            <!-- Planificación -->
            <div class="col-md-4 cone">
                <div class="icon-container">
                    <img src="images/planificacion.png" alt="Planificación" style="width: 40px; height: 40px;">
                    <h5>PLANIFICACIÓN</h5>
                </div>
                <select class="form-select custom-select" id="selectProyecto"
                    onchange="actualizarProyecto(); cambiarIcono();">
                    <option value="" selected disabled>Selecciona un proyecto</option>
                    @foreach ($proyectos as $proyecto)
                        <option value="{{ $proyecto->Nombreproyecto }}" data-fechainicial="{{ $proyecto->Fechainicio }}"
                            data-fechafinal="{{ $proyecto->Fechafinal }}">
                            {{ $proyecto->Nombreproyecto }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Avance Total -->
            <div class="col-md-4 text-center">
                <h5>AVANCE TOTAL</h5>
                <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 80%;" aria-valuenow="80"
                        aria-valuemin="0" aria-valuemax="100">80%</div>
                </div>
            </div>

            <!-- Botones con fechas -->
            <div class="col-md-4 text-end">
                <button class="btn btn-outline-light" id="botonFechaInicial">DE LA SEMANA XX-XX-XXXX</button>
                <button class="btn btn-outline-light" id="botonFechaFinal">A LA SEMANA XX-XX-XXXX</button>
            </div>
        </div>

        <!-- Tabla -->
        <div class="table-responsive">
            <table class="table table-d table-striped">
                <thead>
                    <tr>
                        <th>NOMBRE DE LA HERRAMIENTA O MATERIAL</th>
                        @foreach ($semanas as $semana)
                            <th>{{ $semana['inicio'] }} al {{ $semana['fin'] }}</th>
                        @endforeach
                        <th>Actividad completada</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($materiales as $material)
                                    <tr>
                                        <td>{{ $material->concepto }}</td>
                                        @foreach ($semanas as $semana)
                                                            @php
                                                                $fechaMaterial = \Carbon\Carbon::parse($material->fecha);
                                                                $inicioSemana = \Carbon\Carbon::parse($semana['inicio']);
                                                                $finSemana = \Carbon\Carbon::parse($semana['fin']);
                                                            @endphp
                                                            <td>
                                                                @if ($fechaMaterial >= $inicioSemana && $fechaMaterial <= $finSemana)
                                                                    {{ $material->cantidad }} {{ $material->unidad }}
                                                                @endif
                                                            </td>
                                        @endforeach
                                        <td><span class="text-success">&#10004;</span></td>
                                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Botones -->
        <div class="row mt-4">
            <div class="col-md-6">
                <button class="btn btn-outline-light">Guardar</button>
            </div>
            <div class="col-md-6 text-end">
                <button class="btn btn-outline-light">Imprimir</button>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</x-app-layout>