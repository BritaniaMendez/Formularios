<?php
require "../conexion.php";
$datos = $pdo->query("
SELECT a.matricula, CONCAT(a.nombre,' ',a.apaterno,' ',a.amaterno) AS alumno,
       m.descripcion AS materia, p.no_empleado
FROM asignar_materia am
JOIN alumnos a ON a.id_alumno = am.id_alumno
JOIN materias m ON m.id_materia = am.id_materia
JOIN profesores p ON p.id_profesor = am.id_profesor
ORDER BY a.apaterno, a.nombre, m.descripcion
")->fetchAll();
?>
<!DOCTYPE html><html lang="es"><head><meta charset="UTF-8"><title>Boletas</title></head><body>
<h1>Salida - Boletas</h1>
<table border="1" cellpadding="6">
<tr><th>Matrícula</th><th>Alumno</th><th>Materia</th><th>No. empleado profesor</th></tr>
<?php foreach ($datos as $b): ?>
<tr>
<td><?=htmlspecialchars($b["matricula"])?></td>
<td><?=htmlspecialchars($b["alumno"])?></td>
<td><?=htmlspecialchars($b["materia"])?></td>
<td><?=htmlspecialchars($b["no_empleado"])?></td>
</tr>
<?php endforeach; ?>
</table><br><a href="../index.php">Regresar</a>
</body></html>