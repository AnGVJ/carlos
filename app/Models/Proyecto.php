<?php

// app/Models/Proyecto.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    use HasFactory;

    protected $fillable = [
        'Codigo',
        'Nombreproyecto',
        'Fechainicio',
        'Fechafinal',
        'Avance',
        'Municipiodelaobra',
        'Localidad',
        'NoOficio',
        'Montototal',
        'Abono',
        'Estado'
    ];

    public function proyecto()
    {
        return $this->belongsTo(Proyecto::class, 'obra', 'Nombreproyecto');
    }

}
