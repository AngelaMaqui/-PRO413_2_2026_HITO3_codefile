<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GestionAcademica extends Model
{
    use HasFactory;

    protected $connection = 'mysql_docente';
    protected $table = 'gestion_academica';

    protected $fillable = ['anio', 'periodo', 'fecha_inicio', 'fecha_fin', 'activa'];
}
