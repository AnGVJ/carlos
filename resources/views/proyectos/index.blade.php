@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Proyectos</h1>

    <a href="{{ route('proyectos.create') }}" class="btn btn-success mb-3">Agregar Nuevo Proyecto</a>

    <!-- Botón para importar proyectos -->
    <form action="{{ route('proyectos.import') }}" method="POST" enctype="multipart/form-data" class="mb-3">
        @csrf
        <input type="file" name="file" accept=".xls,.xlsx" required>
        <button type="submit" class="btn btn-primary">Importar Proyectos</button>
    </form>

    <table class="table">
        <thead>
            <tr>
                <th>Código</th>
                <th>Nombre del Proyecto</th>
                <th>Fecha de Inicio</th>
                <th>Fecha de Finalización</th>
                <th>Avance</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($proyectos as $proyecto)
                <tr>
                    <td>{{ $proyecto->Codigo }}</td>
                    <td>{{ $proyecto->Nombreproyecto }}</td>
                    <td>{{ $proyecto->Fechainicio }}</td>
                    <td>{{ $proyecto->Fechafinal }}</td>
                    <td>{{ $proyecto->Avance }}</td>
                    <td>
                        @if($proyecto->Estado == 'Faltante')
                            <span class="badge bg-danger text-white">Faltante</span>
                        @elseif($proyecto->Estado == 'En proceso')
                            <span class="badge bg-warning text-dark">En proceso</span>
                        @elseif($proyecto->Estado == 'Terminado')
                            <span class="badge bg-success text-white">Terminado</span>
                        @else
                            <span class="badge bg-secondary text-white">{{ $proyecto->Estado }}</span>
                        @endif
                    </td>

                    <td>
                        <a href="{{ route('proyectos.edit', $proyecto->id) }}" class="btn btn-warning">Editar</a>

                        <form action="{{ route('proyectos.destroy', $proyecto->id) }}" method="POST"
                            style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection