<?php
namespace App\Imports;

use App\Models\Material;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;
use Carbon\Carbon;

class MaterialesImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        $obra = null;

        foreach ($rows as $index => $row) {
            // Detectar el nombre de la obra (fila específica)
            // Aquí se asume que la fila con el nombre de la obra está en el índice 6, ajusta según tu archivo Excel
            if ($index == 6) {
                $obra = $row[1]; // Ajusta la columna donde se encuentra el nombre de la obra
                continue;
            }

            // Evitar procesar filas vacías o encabezados
            // Detectamos la fila donde comienza la tabla de materiales, en este caso desde el índice 17
            if ($index >= 17) {
                // Filtramos filas vacías o que contienen datos no relevantes (por ejemplo, encabezados)
                if (is_null($row[0]) || $row[0] == "Código") {
                    continue;
                }

                // Procesar la fecha solo si está presente y es válida
                $fecha = isset($row[3]) && $this->isValidDate($row[3])
                    ? Carbon::parse($row[3])->format('Y-m-d')
                    : null;

                // Guardar el material solo si tiene datos relevantes
                Material::create([
                    'codigo' => $row[0] ?? null,                       // Columna "Código"
                    'concepto' => $row[1] ?? null,                       // Columna "Concepto"
                    'unidad' => $row[2] ?? null,                       // Columna "Unidad"
                    'fecha' => $fecha,                                // Columna "Fecha" convertida a formato 'Y-m-d'
                    'cantidad' => $row[4] ?? null,                       // Columna "Cantidad"
                    'obra' => $obra,                                 // Nombre de la obra
                ]);
            }
        }
    }

    /**
     * Verifica si un valor puede ser considerado como una fecha válida.
     */
    private function isValidDate($value)
    {
        try {
            // Intentamos parsear la fecha y si no es válida, la función devuelve false
            Carbon::parse($value);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
