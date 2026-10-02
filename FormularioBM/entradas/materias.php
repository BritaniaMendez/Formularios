<?php
require "../conexion.php";
$mensaje = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $pdo->prepare("INSERT INTO materias (descripcion, cantidad_alumnos) VALUES (?, ?)");
    $stmt->execute([$_POST["descripcion"], $_POST["cantidad_alumnos"]]);
    $mensaje = "Materia registrada correctamente.";
}
?>
<!DOCTYPE html><html lang="es"><head><meta charset="UTF-8"><title>Materias</title></head><body>
<h1>Entrada - Materias</h1>
<?php if ($mensaje) echo "<p>$mensaje</p>"; ?>
<form method="post">
Descripción: <input name="descripcion" required><br><br>
Cantidad de alumnos: <input type="number" name="cantidad_alumnos" min="0" value="0"><br><br>
<button type="submit">Guardar materia</button>
</form>
<br><a href="../index.php">Regresar</a>
</body></html>