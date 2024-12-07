<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';

    protected $fillable = ['name'];

    // Relación inversa: un rol tiene muchos usuarios
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
