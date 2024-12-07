@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Proyecto</h1>
    <form action="{{ route('proyectos.update', $proyecto->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="Codigo">Código</label>
            <input type="text" name="Codigo" id="Codigo" class="form-control"
                value="{{ old('Codigo', $proyecto->Codigo) }}" required>
        </div>

        <div class="form-group">
            <label for="Nombreproyecto">Nombre del Proyecto</label>
            <input type="text" name="Nombreproyecto" id="Nombreproyecto" class="form-control"
                value="{{ old('Nombreproyecto', $proyecto->Nombreproyecto) }}" required>
        </div>

        <div class="form-group">
            <label for="Fechainicio">Fecha de Inicio</label>
            <input type="date" name="Fechainicio" id="Fechainicio" class="form-control"
                value="{{ old('Fechainicio', $proyecto->Fechainicio) }}">
        </div>

        <div class="form-group">
            <label for="Fechafinal">Fecha Final</label>
            <input type="date" name="Fechafinal" id="Fechafinal" class="form-control"
                value="{{ old('Fechafinal', $proyecto->Fechafinal) }}">
        </div>

        <div class="form-group">
            <label for="Avance">Avance</label>
            <input type="number" name="Avance" id="Avance" class="form-control"
                value="{{ old('Avance', $proyecto->Avance) }}">
        </div>

        <div class="form-group">
            <label for="Municipiodelaobra">Municipio de la Obra</label>
            <input type="text" name="Municipiodelaobra" id="Municipiodelaobra" class="form-control"
                value="{{ old('Municipiodelaobra', $proyecto->Municipiodelaobra) }}">
        </div>

        <div class="form-group">
            <label for="Localidad">Localidad</label>
            <input type="text" name="Localidad" id="Localidad" class="form-control"
                value="{{ old('Localidad', $proyecto->Localidad) }}">
        </div>

        <div class="form-group">
            <label for="NoOficio">Número de Oficio</label>
            <input type="text" name="NoOficio" id="NoOficio" class="form-control"
                value="{{ old('NoOficio', $proyecto->NoOficio) }}">
        </div>

        <div class="form-group">
            <label for="Montototal">Monto Total</label>
            <input type="number" name="Montototal" id="Montototal" class="form-control"
                value="{{ old('Montototal', $proyecto->Montototal) }}">
        </div>

        <div class="form-group">
            <label for="Abono">Abono</label>
            <input type="number" name="Abono" id="Abono" class="form-control"
                value="{{ old('Abono', $proyecto->Abono) }}">
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Proyecto</button>
    </form>
</div>
@endsection