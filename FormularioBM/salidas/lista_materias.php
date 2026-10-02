<?php
require "../conexion.php";
$datos = $pdo->query("SELECT * FROM materias ORDER BY descripcion")->fetchAll();
?>
<!DOCTYPE html><html lang="es"><head><meta charset="UTF-8"><title>Lista de materias</title></head><body>
<h1>Salida - Lista de materias</h1>
<table border="1" cellpadding="6">
<tr><th>ID</th><th>Materia</th><th>Cantidad de alumnos</th></tr>
<?php foreach ($datos as $m): ?>
<tr><td><?=$m["id_materia"]?></td><td><?=htmlspecialchars($m["descripcion"])?></td><td><?=$m["cantidad_alumnos"]?></td></tr>
<?php endforeach; ?>
</table><br><a href="../index.php">Regresar</a>
</body></html>