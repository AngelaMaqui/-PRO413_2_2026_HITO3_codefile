<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte Cruzado de Cursos</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background-color: #f4f6f9; }
        h1 { color: #333; }
        table { width: 100%; border-collapse: collapse; background: #fff; margin-top: 15px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background-color: #007bff; color: white; }
        tr:nth-child(even) { background-color: #f2f2f2; }
        .alert { padding: 10px; background: #f8d7da; color: #721c24; margin-bottom: 15px; border-radius: 4px; }
    </style>
</head>
<body>
    <h1>Reporte Consolidado de Cursos (DB Docker + DB Docente)</h1>

    @if(isset($error))
        <div class="alert">{{ $error }}</div>
    @endif

    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Asignatura (DB Docker)</th>
                <th>Docente (DB Docente)</th>
                <th>Aula (DB Docente)</th>
                <th>Horario</th>
                <th>Gestión</th>
            </tr>
        </thead>
        <tbody>
            @forelse($reporteCursos as $item)
                <tr>
                    <td>{{ $item['asignatura_codigo'] }}</td>
                    <td>{{ $item['asignatura_nombre'] }}</td>
                    <td>{{ $item['docente'] }}</td>
                    <td>{{ $item['aula'] }}</td>
                    <td>{{ $item['horario'] }}</td>
                    <td>{{ $item['gestion'] }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">No hay datos para mostrar en este momento.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
