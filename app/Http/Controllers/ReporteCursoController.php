<?php

namespace App\Http\Controllers;

use App\Models\AsignacionDocente;
use App\Models\Asignatura;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Throwable;

class ReporteCursoController extends Controller
{
    public function index(): View
    {
        try {
            $asignaciones = AsignacionDocente::with(['docente', 'aula', 'gestionAcademica'])->get();
            $asignaturas = class_exists(Asignatura::class) ? Asignatura::all()->keyBy('id') : collect();

            $reporteCursos = $asignaciones->map(function (AsignacionDocente $asignacion) use ($asignaturas) {
                $asignatura = $asignaturas->get($asignacion->asignatura_id);

                return [
                    'id_asignacion' => $asignacion->id,
                    'asignatura_nombre' => $asignatura ? $asignatura->nombre : 'Asignatura ID #' . $asignacion->asignatura_id,
                    'asignatura_codigo' => $asignatura ? $asignatura->codigo : 'N/A',
                    'docente' => $asignacion->docente ? $asignacion->docente->nombres . ' ' . $asignacion->docente->apellidos : 'Sin Docente',
                    'aula' => $asignacion->aula ? $asignacion->aula->codigo : 'Por Asignar',
                    'horario' => $asignacion->horario,
                    'gestion' => $asignacion->gestionAcademica ? $asignacion->gestionAcademica->periodo : 'N/A',
                ];
            });

            return view('reportes.cursos', compact('reporteCursos'));
        } catch (Throwable $e) {
            return view('reportes.cursos', [
                'reporteCursos' => collect(),
                'error' => 'Error al consultar servidores MySQL: ' . $e->getMessage()
            ]);
        }
    }
}
