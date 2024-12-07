<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    // Asocia el modelo con la tabla 'materiales'
    protected $table = 'materiales';

    protected $fillable = [
        'codigo',
        'concepto',
        'unidad',
        'fecha',
        'cantidad',
        'obra',
        'estado',
    ];



    public function proyecto()
    {
        return $this->belongsTo(Proyecto::class, 'obra', 'Nombreproyecto');
    }

}
