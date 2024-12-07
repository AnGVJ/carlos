<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{

    public function buscar(Request $request)
    {
        $query = $request->input('q');
        // Lógica para buscar en la base de datos
        $resultados = TuModelo::where('nombre', 'like', "%$query%")->get();

        return view('resultados', compact('resultados'));
    }

}
