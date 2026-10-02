<?php
require "../conexion.php";
$datos = $pdo->query("SELECT * FROM alumnos WHERE estatus='Baja' ORDER BY apaterno, nombre")->fetchAll();
?>
<!DOCTYPE html><html lang="es"><head><meta charset="UTF-8"><title>Alumnos de baja</title></head><body>
<h1>Salida - Alumnos de baja</h1>
<table border="1" cellpadding="6">
<tr><th>Matrícula</th><th>Nombre</th><th>Correo</th><th>Teléfono</th><th>Estatus</th></tr>
<?php foreach ($datos as $a): ?>
<tr>
<td><?=htmlspecialchars($a["matricula"])?></td>
<td><?=htmlspecialchars($a["nombre"]." ".$a["apaterno"]." ".$a["amaterno"])?></td>
<td><?=htmlspecialchars($a["correo"])?></td>
<td><?=htmlspecialchars($a["telefono"])?></td>
<td><?=htmlspecialchars($a["estatus"])?></td>
</tr>
<?php endforeach; ?>
</table><br><a href="../index.php">Regresar</a>
</body></html>