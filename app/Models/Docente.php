<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Docente extends Model
{
    use HasFactory;

    protected $connection = 'mysql_docente';
    protected $table = 'docentes';

    protected $fillable = ['ci', 'nombres', 'apellidos', 'email', 'especialidad'];

    public function asignaciones(): HasMany
    {
        return $this->hasMany(AsignacionDocente::class, 'docente_id');
    }
}
