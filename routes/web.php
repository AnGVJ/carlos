<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\MaterialController;

use App\Http\Controllers\ProyectoController;
use Illuminate\Support\Facades\Route;


Route::get('/proceso', function () {
    return view('proceso');
})->name('proceso');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::resource('materiales', MaterialController::class);
Route::post('/materiales/import', [MaterialController::class, 'import'])->name('materiales.import');

Route::get('/inicio', [InicioController::class, 'inici'])->name('Inicio.inici');

Route::resource('proyectos', ProyectoController::class);
Route::post('proyectos/import', [ProyectoController::class, 'import'])->name('proyectos.import');
// web.php
Route::get('/proyectos/create', [ProyectoController::class, 'create'])->name('proyectos.create');
// web.php



//Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');




require __DIR__ . '/auth.php';

Route::get('/register', [ProfileController::class, 'register'])->name('register');
Route::post('/register', [ProfileController::class, 'store']);
Route::get('/', function () {
    return redirect()->route('login'); // Redirige a la ruta del login
});
Route::get('/dashboard', [ProyectoController::class, 'showProyectosEnDashboard'])->name('dashboard');
Route::get('/datos-grafica', [ProyectoController::class, 'obtenerDatosGrafica']);
Route::get('/proceso', [ProyectoController::class, 'show'])->name('proceso');
