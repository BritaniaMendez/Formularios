<?php
require "../conexion.php";
$mensaje = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "INSERT INTO alumnos
    (nombre, apaterno, amaterno, domicilio, correo, telefono, estatus, matricula)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        $_POST["nombre"], $_POST["apaterno"], $_POST["amaterno"],
        $_POST["domicilio"], $_POST["correo"], $_POST["telefono"],
        $_POST["estatus"], $_POST["matricula"]
    ]);
    $mensaje = "Alumno registrado correctamente.";
}
?>
<!DOCTYPE html><html lang="es"><head><meta charset="UTF-8"><title>Alumnos</title></head><body>
<h1>Entrada - Alumnos</h1>
<?php if ($mensaje) echo "<p>$mensaje</p>"; ?>
<form method="post">
Nombre: <input name="nombre" required><br><br>
Apellido paterno: <input name="apaterno" required><br><br>
Apellido materno: <input name="amaterno"><br><br>
Domicilio: <input name="domicilio"><br><br>
Correo: <input type="email" name="correo"><br><br>
Teléfono: <input name="telefono"><br><br>
Estatus: <select name="estatus"><option>Activo</option><option>Baja</option></select><br><br>
Matrícula: <input name="matricula" required><br><br>
<button type="submit">Guardar alumno</button>
</form>
<br><a href="../index.php">Regresar</a>
</body></html>