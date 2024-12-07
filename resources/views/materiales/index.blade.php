@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #1a1a2e;
        color: #fff;
    }

    .custom-card {
        background-color: #2a2a4e;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
    }

    .custom-button {
        background-color: #4c4c90;
        border: none;
        color: #fff;
        padding: 10px 20px;
        border-radius: 8px;
        transition: 0.3s;
    }

    .custom-button:hover {
        background-color: #6666b3;
    }

    .search-bar {
        background-color: #3a3a5e;
        border: none;
        color: #fff;
        border-radius: 8px;
    }

    .search-bar::placeholder {
        color: #b3b3cc;
    }

    table th,
    table td {
        color: #fff;
    }
</style>
<div class="container my-5">
    <!-- Botones de acción -->
    <div class="d-flex justify-content-between mb-4">
        <button class="custom-button d-flex align-items-center">
            <img src="/images/icon.png" alt="Icono" style="width: 30px; height: 30px; margin-right: 10px;">
            Ver Inventario de
        </button>
        <a href="{{ route('materiales.create') }}" class="custom-button">Agregar nueva herramienta o material</a>
        <!-- Botón para mostrar/ocultar el formulario -->
        <button id="excelButton" class="custom-button" onclick="toggleForm()">Agregar desde Excel</button>
    </div>

    <!-- Formulario de importación (inicialmente oculto) -->
    <div id="excelForm" class="custom-card p-4 mb-4" style="display: none;">
        <form action="{{ route('materiales.import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-3">
                <label for="file" class="form-label">Subir archivo Excel</label>
                <input type="file" name="file" class="form-control" required>
            </div>
            <button type="submit" class="custom-button">Importar</button>
        </form>
    </div>

    <!-- Barra de búsqueda -->
    <div class="custom-card p-4 mb-4">
        <input type="text" class="form-control search-bar" placeholder="Buscar insumo">
    </div>

    <!-- Tabla de materiales -->
    <div class="custom-card p-4">
        <table class="table table-borderless">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Cantidad</th>
                    <th>Faltante</th>
                    <th>Unidad</th>
                    <th>Tipo</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($materiales as $material)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $material->id }}</td>
                                <td>{{ $material->concepto }}</td>
                                <td>{{ $material->cantidad }}</td>
                                <td>{{ $material->faltante }}</td>
                                <td>{{ $material->unidad }}</td>
                                <td>{{ $material->tipo }}</td>
                                <td>
                                    <span class="badge" style="background-color: 
                                                                    {{ $material->estado === 'completo' ? 'green' :
                    ($material->estado === 'incompleto' ? 'red' : 'yellow') }}">
                                        {{ ucfirst($material->estado) }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('materiales.edit', $material->id) }}"
                                        class="btn btn-warning btn-sm">Editar</a>
                                    <form action="{{ route('materiales.destroy', $material->id) }}" method="POST"
                                        style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center">No hay materiales disponibles.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Paginación -->
        <div class="d-flex justify-content-center mt-3">
            {{ $materiales->links() }}
        </div>
    </div>

    <!-- Botón de guardar -->
    <div class="d-flex justify-content-end mt-3">
        <button class="custom-button">Guardar</button>
    </div>
</div>

<script>
    // Función para mostrar/ocultar el formulario al hacer clic en el botón
    function toggleForm() {
        var form = document.getElementById("excelForm");
        if (form.style.display === "none") {
            form.style.display = "block";
        } else {
            form.style.display = "none";
        }
    }
</script>

@endsection

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>