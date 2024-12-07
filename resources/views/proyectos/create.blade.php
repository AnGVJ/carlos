<!-- resources/views/proyectos/create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Agregar Nuevo Proyecto</h1>

    <form action="{{ route('proyectos.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="Codigo">Código</label>
            <input type="text" class="form-control" id="Codigo" name="Codigo" required>
        </div>

        <div class="form-group">
            <label for="Nombreproyecto">Nombre del Proyecto</label>
            <input type="text" class="form-control" id="Nombreproyecto" name="Nombreproyecto" required>
        </div>

        <div class="form-group">
            <label for="Fechainicio">Fecha de Inicio</label>
            <input type="date" class="form-control" id="Fechainicio" name="Fechainicio" required>
        </div>

        <div class="form-group">
            <label for="Fechafinal">Fecha de Finalización</label>
            <input type="date" class="form-control" id="Fechafinal" name="Fechafinal" required>
        </div>

        <div class="form-group">
            <label for="Avance">Avance</label>
            <input type="number" class="form-control" id="Avance" name="Avance" value="0" required>
        </div>

        <div class="form-group">
            <label for="Municipiodelaobra">Municipio de la Obra</label>
            <input type="text" class="form-control" id="Municipiodelaobra" name="Municipiodelaobra" required>
        </div>

        <div class="form-group">
            <label for="Localidad">Localidad</label>
            <input type="text" class="form-control" id="Localidad" name="Localidad" required>
        </div>

        <div class="form-group">
            <label for="NoOficio">Número de Oficio</label>
            <input type="text" class="form-control" id="NoOficio" name="NoOficio" required>
        </div>

        <div class="form-group">
            <label for="Montototal">Monto Total</label>
            <input type="number" class="form-control" id="Montototal" name="Montototal" required>
        </div>

        <div class="form-group">
            <label for="Abono">Abono</label>
            <input type="number" class="form-control" id="Abono" name="Abono" value="0" required>
        </div>

        <div class="form-group">
            <label for="Estado">Estado</label>
            <input type="text" class="form-control" id="Estado" name="Estado" maxlength="30">
        </div>

        <button type="submit" class="btn btn-primary">Guardar Proyecto</button>
    </form>
</div>
@endsection