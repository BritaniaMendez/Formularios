<?php
require "../conexion.php";
$alumnos = $pdo->query("SELECT id_alumno, matricula, nombre, apaterno FROM alumnos WHERE estatus='Activo' ORDER BY apaterno")->fetchAll();
$materias = $pdo->query("SELECT id_materia, descripcion FROM materias ORDER BY descripcion")->fetchAll();
$profesores = $pdo->query("SELECT id_profesor, no_empleado, matricula FROM profesores ORDER BY no_empleado")->fetchAll();
$mensaje = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $pdo->prepare("INSERT INTO asignar_materia (id_materia, id_alumno, id_profesor) VALUES (?, ?, ?)");
    $stmt->execute([$_POST["id_materia"], $_POST["id_alumno"], $_POST["id_profesor"]]);
    $mensaje = "Materia asignada correctamente.";
}
?>
<!DOCTYPE html><html lang="es"><head><meta charset="UTF-8"><title>Asignar materia</title></head><body>
<h1>Proceso - Asignar materia</h1>
<?php if ($mensaje) echo "<p>$mensaje</p>"; ?>
<form method="post">
Materia:
<select name="id_materia" required>
<?php foreach ($materias as $m) echo "<option value='{$m['id_materia']}'>{$m['descripcion']}</option>"; ?>
</select><br><br>
Alumno:
<select name="id_alumno" required>
<?php foreach ($alumnos as $a) echo "<option value='{$a['id_alumno']}'>{$a['matricula']} - {$a['nombre']} {$a['apaterno']}</option>"; ?>
</select><br><br>
Profesor:
<select name="id_profesor" required>
<?php foreach ($profesores as $p) echo "<option value='{$p['id_profesor']}'>Empleado {$p['no_empleado']} - {$p['matricula']}</option>"; ?>
</select><br><br>
<button type="submit">Asignar materia</button>
</form>
<br><a href="../index.php">Regresar</a>
</body></html>