<?php
require "../conexion.php";
$datos = $pdo->query("SELECT * FROM grupos ORDER BY descripcion")->fetchAll();
?>
<!DOCTYPE html><html lang="es"><head><meta charset="UTF-8"><title>Lista de grupos</title></head><body>
<h1>Salida - Lista de grupos</h1>
<table border="1" cellpadding="6">
<tr><th>ID</th><th>Descripción</th><th>Estatus</th></tr>
<?php foreach ($datos as $g): ?>
<tr><td><?=$g["id_grupo"]?></td><td><?=htmlspecialchars($g["descripcion"])?></td><td><?=htmlspecialchars($g["estatus"])?></td></tr>
<?php endforeach; ?>
</table><br><a href="../index.php">Regresar</a>
</body></html>