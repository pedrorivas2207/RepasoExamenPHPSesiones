<?php
session_start();

if (!isset($_SESSION["total"])) {
    $_SESSION["total"] = 0;
    $_SESSION["cantidad"] = 0;
    $_SESSION["terminado"] = false;
}

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && !$_SESSION["terminado"]) {
    $numero = (float) $_POST["numero"];

    $_SESSION["total"] += $numero;
    $_SESSION["cantidad"]++;

    if ($_SESSION["total"] > 10000) {
        $_SESSION["terminado"] = true;
        $media = $_SESSION["total"] / $_SESSION["cantidad"];

        $mensaje = "Se ha superado 10000.<br>";
        $mensaje .= "Total: " . $_SESSION["total"] . "<br>";
        $mensaje .= "Cantidad de números: " . $_SESSION["cantidad"] . "<br>";
        $mensaje .= "Media: " . number_format($media, 2);
    } else {
        $mensaje = "Total acumulado: " . $_SESSION["total"];
    }
}

if (isset($_POST["reiniciar"])) {
    session_destroy();
    header("Location: ejercicio3_suma_10000.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>Ejercicio 3</title></head>
<body>
<h1>Suma hasta superar 10000</h1>
<?php if (!$_SESSION["terminado"]): ?>
<form method="post">
    <label>Introduce un número:</label>
    <input type="number" name="numero" step="any" required>
    <button type="submit">Añadir</button>
</form>
<?php endif; ?>
<p><?= $mensaje ?></p>
<form method="post">
    <button type="submit" name="reiniciar">Reiniciar</button>
</form>
</body>
</html>
