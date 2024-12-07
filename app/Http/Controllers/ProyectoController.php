<?php

// app/Http/Controllers/ProyectoController.php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use App\Models\Material;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

use App\Imports\ProyectosImport;

class ProyectoController extends Controller
{
    public function index()
    {
        $proyectos = Proyecto::all();
        return view('proyectos.index', compact('proyectos'));
    }
    public function showProyectosEnDashboard()
    {
        // Obtener todos los proyectos de la base de datos
        $proyectos = Proyecto::all();

        // Retornar la vista 'dashboard' con los proyectos
        return view('dashboard', compact('proyectos'));
    }
    public function mostrarProyectosParaVista()
    {
        // Obtener todos los proyectos de la base de datos
        $proyectos = Proyecto::all();

        // Retornar la vista 'dashboard' con los proyectos
        return view('proceso', compact('proyectos'));
    }

    public function show(Request $request)
    {
        $proyectos = Proyecto::all();
        $materiales = collect();
        $semanas = []; // Inicializamos la variable semanas

        if ($request->has('selectProyecto')) {
            $proyecto = Proyecto::where('Nombreproyecto', $request->selectProyecto)->first();

            if ($proyecto) {
                $materiales = Material::where('obra', $proyecto->Nombreproyecto)->get();
                $fechainicio = $proyecto->Fechainicio;
                $fechafinal = $proyecto->Fechafinal;

                // Generar las semanas entre Fechainicio y Fechafinal
                $semanas = $this->calcularSemanas($fechainicio, $fechafinal);
            }
        }

        return view('proceso', compact('proyectos', 'materiales', 'semanas'));
    }


    private function calcularSemanas($fechainicio, $fechafinal)
    {
        $semanas = [];
        $fechaInicio = \Carbon\Carbon::parse($fechainicio);
        $fechaFin = \Carbon\Carbon::parse($fechafinal);

        while ($fechaInicio <= $fechaFin) {
            $finSemana = $fechaInicio->copy()->endOfWeek();
            $semanas[] = [
                'inicio' => $fechaInicio->format('d-m-Y'),
                'fin' => $finSemana->format('d-m-Y'),
            ];
            $fechaInicio->addWeek();
        }

        return $semanas;
    }



    public function listarProyectos()
    {
        // Obtén los proyectos
        $proyectos = Proyecto::all();
        return view('materiales.index', compact('proyectos'));
    }


    public function obtenerDatosGrafica()
    {
        // Consulta para obtener la cantidad de proyectos por fecha de inicio
        $datos = Proyecto::selectRaw('Fechainicio as fecha, COUNT(*) as cantidad')
            ->groupBy('Fechainicio')
            ->orderBy('Fechainicio', 'asc')
            ->get();

        // Devuelve los datos como JSON
        return response()->json($datos);
    }


    // Método para manejar la importación de proyectos
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xls,xlsx'
        ]);

        Excel::import(new ProyectosImport, $request->file('file'));

        return back()->with('success', 'Proyectos importados correctamente.');
    }


    public function create()
    {
        return view('proyectos.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'Codigo' => 'required|string|max:5',
            'Nombreproyecto' => 'required|string|max:200',
            'Fechainicio' => 'required|date',
            'Fechafinal' => 'required|date',
            'Avance' => 'required|integer',
            'Municipiodelaobra' => 'required|string|max:105',
            'Localidad' => 'required|string|max:500',
            'NoOficio' => 'required|string|max:45',
            'Montototal' => 'required|integer',
            'Abono' => 'required|integer',
            'Estado' => 'nullable|string|max:30', // Validación para el campo estado
        ]);

        Proyecto::create($validated);

        return redirect()->route('proyectos.index')->with('success', 'Proyecto creado con éxito');
    }

    public function edit($id)
    {
        $proyecto = Proyecto::findOrFail($id);
        return view('proyectos.edit', compact('proyecto'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'Codigo' => 'required|string|max:5',
            'Nombreproyecto' => 'required|string|max:200',
            'Fechainicio' => 'required|date',
            'Fechafinal' => 'required|date',
            'Avance' => 'required|integer',
            'Municipiodelaobra' => 'required|string|max:105',
            'Localidad' => 'required|string|max:500',
            'NoOficio' => 'required|string|max:45',
            'Montototal' => 'required|integer',
            'Abono' => 'required|integer',
            'Estado' => 'nullable|string|max:30', // Validación para el campo estado
        ]);

        $proyecto = Proyecto::findOrFail($id);
        $proyecto->update($validated);

        return redirect()->route('proyectos.index')->with('success', 'Proyecto actualizado con éxito');
    }

    public function destroy($id)
    {
        $proyecto = Proyecto::findOrFail($id);
        $proyecto->delete();

        return redirect()->route('proyectos.index')->with('success', 'Proyecto eliminado con éxito');
    }
}
