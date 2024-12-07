<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InicioController extends Controller
{
    public function inici()
    {
        return view('Inicio.inici'); // Asegúrate de usar la notación correcta con punto
    }

}
