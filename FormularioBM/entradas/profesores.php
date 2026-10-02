<?php
require "../conexion.php";
$mensaje = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $pdo->prepare("INSERT INTO profesores (matricula, no_empleado) VALUES (?, ?)");
    $stmt->execute([$_POST["matricula"], $_POST["no_empleado"]]);
    $mensaje = "Profesor registrado correctamente.";
}
?>
<!DOCTYPE html><html lang="es"><head><meta charset="UTF-8"><title>Profesores</title></head><body>
<h1>Entrada - Profesores</h1>
<?php if ($mensaje) echo "<p>$mensaje</p>"; ?>
<form method="post">
Matrícula: <input name="matricula"><br><br>
No. de empleado: <input name="no_empleado" required><br><br>
<button type="submit">Guardar profesor</button>
</form>
<br><a href="../index.php">Regresar</a>
</body></html>