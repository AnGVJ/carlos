@extends('layouts.app')

@section('title', 'Editar Material')

@section('content')
<div class="container">
    <h1 class="mb-4">Editar Material</h1>
    <form action="{{ route('materiales.update', $material->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Método HTTP para actualización -->
        <div class="mb-3">
            <label for="codigo" class="form-label">Código</label>
            <input type="text" class="form-control" id="codigo" name="codigo" value="{{ $material->codigo }}" placeholder="Código del material">
        </div>
        <div class="mb-3">
            <label for="concepto" class="form-label">Concepto</label>
            <input type="text" class="form-control" id="concepto" name="concepto" value="{{ $material->concepto }}" placeholder="Concepto">
        </div>
        <div class="mb-3">
            <label for="unidad" class="form-label">Unidad</label>
            <input type="text" class="form-control" id="unidad" name="unidad" value="{{ $material->unidad }}" placeholder="Unidad">
        </div>
        <div class="mb-3">
            <label for="fecha" class="form-label">Fecha</label>
            <input type="date" class="form-control" id="fecha" name="fecha" value="{{ $material->fecha }}">
        </div>
        <div class="mb-3">
            <label for="cantidad" class="form-label">Cantidad</label>
            <input type="number" step="0.01" class="form-control" id="cantidad" name="cantidad" value="{{ $material->cantidad }}" placeholder="Cantidad">
        </div>
        <div class="mb-3">
            <label for="obra" class="form-label">Obra</label>
            <input type="text" class="form-control" id="obra" name="obra" value="{{ $material->obra }}" placeholder="Nombre de la obra">
        </div>
        <div class="mb-3">
            <label for="estado" class="form-label">Estado</label>
            <select class="form-select" id="estado" name="estado">
                <option value="completo" {{ $material->estado === 'completo' ? 'selected' : '' }}>Completo (Verde)</option>
                <option value="incompleto" {{ $material->estado === 'incompleto' ? 'selected' : '' }}>Incompleto (Rojo)</option>
                <option value="pendiente" {{ $material->estado === 'pendiente' ? 'selected' : '' }}>Pendiente (Amarillo)</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('materiales.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
