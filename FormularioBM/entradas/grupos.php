<?php
require "../conexion.php";
$mensaje = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $pdo->prepare("INSERT INTO grupos (descripcion, estatus) VALUES (?, ?)");
    $stmt->execute([$_POST["descripcion"], $_POST["estatus"]]);
    $mensaje = "Grupo registrado correctamente.";
}
?>
<!DOCTYPE html><html lang="es"><head><meta charset="UTF-8"><title>Grupos</title></head><body>
<h1>Entrada - Grupos</h1>
<?php if ($mensaje) echo "<p>$mensaje</p>"; ?>
<form method="post">
Descripción: <input name="descripcion" required><br><br>
Estatus: <select name="estatus"><option>Activo</option><option>Inactivo</option></select><br><br>
<button type="submit">Guardar grupo</button>
</form>
<br><a href="../index.php">Regresar</a>
</body></html>